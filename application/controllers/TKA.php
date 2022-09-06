<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tka extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Master');
        $this->load->model('Perusahaan');
        $this->load->model('Penempatan');
        $this->load->model('Wilayah');
        $this->load->model('Sebaran_Jatim');
    }


    // FUNCTION Tambah START
    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        // load data wilayah
        $data['tb_tka'] = $this->Perusahaan->get_TkaPerusahaan();

        $data['title'] = 'Tenaga Kerja Asing';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tka/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        //load data user login session
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();



        // load data 
        $data['tb_tka'] = $this->Perusahaan->get_TkaPerusahaan();
        $data['perusahaan'] = $this->Perusahaan->get_perusahaan();
        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        $data['negara'] = $this->Wilayah->list_negara();

        $this->form_validation->set_rules('nama', 'Nama TKA', 'trim|required');
        $this->form_validation->set_rules('long', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('negara', 'Kewarganegaraan', 'trim|required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required');
      
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $this->form_validation->set_rules('no_rptka', 'NO. RPTKA', 'required');
        $this->form_validation->set_rules('masa_rptka', 'Masa Berlaku RPTKA', 'required');
        $this->form_validation->set_rules('no_imta', 'NO. IMTA', 'required');
        $this->form_validation->set_rules('masa_imta', 'Masa Berlaku IMTA', 'required');
        $this->form_validation->set_rules('lokasi', 'Loksi Kerja', 'required');
        // $this->form_validation->set_rules('tanggal_data', 'Tangal Data Inputan', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tenaga Kerja Asing';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tka/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_tka' => $this->input->post('nama'),
                'latitude' => $this->input->post('lat'),
                'longitude' => $this->input->post('long'),
                'kewarganegaraan' => $this->input->post('negara'),
                'jenis_kel' => $this->input->post('gender'),
                'id_perusahaan' => $this->input->post('perusahaan'),
               
                'jabatan' => $this->input->post('jabatan'),
                'no_rptka' => $this->input->post('no_rptka'),
                'masa_rptka' => $this->input->post('masa_rptka'),
                'no_imta' => $this->input->post('no_imta'),
                'masa_imta' => $this->input->post('masa_imta'),
                'lokasi_kerja' => $this->input->post('lokasi'),
                'date_created' => date('Y-m-d'),
            ];

            // cek gambar upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['upload_path']   = './assets/img/tka';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message',
                     '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('tka');
                }
            }

            $this->db->insert('tb_tka', $data);

            $kabupaten = $this->input->post('lokasi');
            $jumlah_tka = $this->db->query("SELECT SUM(CASE WHEN lokasi_kerja='$kabupaten' THEN 1 ELSE 0 END) AS tka FROM tb_tka");

           $jumlah = $jumlah_tka->row()->tka;

            $update = [   
                'jumlah_tka' => $jumlah,
            ];

            $this->db->where('id_kabupaten', $kabupaten);
            $this->db->update('kabupaten', $update);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Ditambahkan !</strong> data telah berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('tka');
        }
    }
 
    public function edit($id)
    {
        //load data user login session
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['kabupaten'] = $this->Perusahaan->get_Jatim();


        // load data 
        $data['tb_tka'] = $this->Perusahaan->get_TkaPerusahaan();
        $data['perusahaan'] = $this->Perusahaan->get_perusahaan();
        $data['edit_tka'] = $this->Perusahaan->get_TkaPerusahaanById($id);
        $data['negara'] = $this->Wilayah->list_negara();
        // $data['sebaran_tka'] = $this->Sebaran_Jatim->get_sebaran_tka();
        // $data['lokasi'] = $this->Sebaran_Jatim->detail_tka($id);
        // var_dump($data['edit_tka']);
        // die;


        $this->form_validation->set_rules('nama_tka', 'Nama TKA', 'required');
        $this->form_validation->set_rules('long', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('negara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('no_rptka', 'NO. RPTKA', 'required');
        $this->form_validation->set_rules('masa_rptka', 'Masa Berlaku RPTKA', 'required');
        $this->form_validation->set_rules('no_imta', 'NO. IMTA', 'required');
        $this->form_validation->set_rules('masa_imta', 'Masa Berlaku IMTA', 'required');
        $this->form_validation->set_rules('lokasi', 'Loksi Kerja', 'required');
        // $this->form_validation->set_rules('tanggal_data', 'Tangal Data Inputan', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tenaga Kerja Asing';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tka/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_tka' => $this->input->post('nama_tka'),
                'latitude' => $this->input->post('lat'),
                'longitude' => $this->input->post('long'),
                'jenis_kel' => $this->input->post('gender'),
                'id_perusahaan' => $this->input->post('perusahaan'),
                'kewarganegaraan' => $this->input->post('negara'),
                'jabatan' => $this->input->post('jabatan'),
                'no_rptka' => $this->input->post('no_rptka'),
                'masa_rptka' => $this->input->post('masa_rptka'),
                'no_imta' => $this->input->post('no_imta'),
                'masa_imta' => $this->input->post('masa_imta'),
                'lokasi_kerja' => $this->input->post('lokasi'),
                'date_created' => date('Y-m-d'),
            ];

            // cek gambar upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['upload_path']   = './assets/img/tka';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message',
                     '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('tka');
                }
            }

            $this->db->where('id', $id);
            $this->db->update('tb_tka', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('tka');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);

        $tka =  $this->db->query("SELECT * FROM tb_tka WHERE id='$id'");
        $kabupaten = $tka->row()->lokasi_kerja;

        $this->db->delete('tb_tka');

            $jumlah_tka = $this->db->query("SELECT SUM(CASE WHEN lokasi_kerja='$kabupaten' THEN 1 ELSE 0 END) AS tka FROM tb_tka");

           $jumlah = $jumlah_tka->row()->tka;

            $update = [   
                'jumlah_tka' => $jumlah,
            ];

            $this->db->where('id_kabupaten', $kabupaten);
            $this->db->update('kabupaten', $update);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Dihapus !</strong> data telah berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
        redirect('tka');
    }
}
