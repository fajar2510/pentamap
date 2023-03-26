<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pmi extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        
        $this->ci = get_instance();
        $this->load->model('Master');
        $this->load->model('Wilayah', '', TRUE);
        $this->load->model('Penempatan');
        $this->load->model('Sebaran_Jatim');
        $this->load->model('Perusahaan');
    }

    // FUNCTION Tambah START
    public function index()
    {
        //load data user login
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        $data['lok'] = $this->Penempatan->getTotalLokal();
        $data['disabilitas'] = $this->Penempatan->getTotalDisabilitas();

        // Load Model User Role
        
        $data['pmi'] = $this->Master->getPmiJoinWilayah();
        // $data['pmi'] = $this->Master->get_PMI();

        // $data['negara'] = $this->Penempatan->getnegarapmi();
        $data['negara'] = $this->Wilayah->list_negara();

        // echo "<pre>";
        // var_dump($data['negara']); die;

        //load data view
        $data['title'] = 'PMI Bermasalah';
        $this->load->view('templates/header', $data);
        if ($this->ci->session->userdata('email')) {
            $data['is_admin'] = 1;
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
        }else{
            $data['is_admin'] = 0;
            $this->load->view('templates/topbar_user', $data);
        }
        $this->load->view('pmi/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        is_logged_in();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        $data['lok'] = $this->Penempatan->getTotalLokal();
        $data['disabilitas'] = $this->Penempatan->getTotalDisabilitas();

        //load data negara
        $data['negara'] = $this->Wilayah->list_negara();

        // $data['negara'] = $this->db->get('tb_negara')->result_array();
        // Load model PMI
        $data['pmi'] = $this->Master->getPmiJoinWilayah();
        // $data['foto'] = $this->Master->get_foto($id);
        //LOAD data chained dropdown
        // $data['provinsi'] = $this->Wilayah->ambil_provinsi();
        $data['kabupaten'] = $this->Perusahaan->get_Jatim();


        // $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('long', 'Longitude', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
        // $this->form_validation->set_rules('provinsi_id', 'Provinsi', 'required|trim');
        // $this->form_validation->set_rules('kabupaten_id', 'Kabupaten', 'required|trim');
        // $this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'required|trim');
        // $this->form_validation->set_rules('kelurahan_id', 'Desa', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara Bekerja', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('berangkat', 'Keberangkatan melalui', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'PT Pengirim', 'required|trim');
        // $this->form_validation->set_rules('lama', 'Lama Bekerja', 'trim');
        $this->form_validation->set_rules('lamaInput', 'Lama Bekerja', 'trim');
      
        
        // $this->form_validation->set_rules('tanggal_data', 'Tanggal Data Inputan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'PMI Bermasalah';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmi/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'latitude' => $this->input->post('lat', true),
                'longitude' => $this->input->post('long', true),
                'status' => 'NON-PROSEDURAL',
                'nama' => $this->input->post('nama', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'alamat' => $this->input->post('alamat', true),
                'gender' => $this->input->post('gender', true),
                // 'provinsi' => $this->input->post('provinsi_id', true),
                // 'kabupaten' => $this->input->post('kabupaten_id', true),
                // 'kecamatan' => $this->input->post('kecamatan_id', true),
                // 'desa' => $this->input->post('kelurahan_id', true),
                'kabupaten' => $this->input->post('kabupaten', true),
                'negara_bekerja' => $this->input->post('negara', true),
                'jenis_pekerjaan' => $this->input->post('jenis', true),
                'berangkat_melalui' => $this->input->post('berangkat', true),
                'pengirim' => $this->input->post('pengirim', true),
                // 'lama_bekerja' => $this->input->post('lama', true),
                'lama_bekerja' => $this->input->post('lamaInput', true),
                'date_created' => date('Y-m-d'),
            ];

           
            // cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['upload_path']   = './assets/img/pmi';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pmi');
                }
            }

            $this->db->insert('tb_pmi', $data);

    
            // show alert
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Ditambahkan !</strong> data telah berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('pmi');
        }
    }

    public function edit($id)
    {
        is_logged_in();
        // load data user login
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        $data['lok'] = $this->Penempatan->getTotalLokal();
        $data['disabilitas'] = $this->Penempatan->getTotalDisabilitas();

        // $data['negara'] = $this->db->get('tb_negara')->result_array();
        $data['negara'] = $this->Wilayah->list_negara();


        // $data['provinsi_select'] = $this->db->get('provinsi')->result_array();
        $data['kabupaten'] = $this->db->get('kabupaten')->result_array();
        // $data['kecamatan'] = $this->db->get('kecamatan')->result_array();
        // $data['kelurahan'] = $this->db->get('kelurahan')->result_array();

        // $data['kelurahan'] = $this->db->get('kelurahan')->result_row();
        // // Load model pmi
        $data['pmi'] = $this->Master->getPmiById($id);
        // $data['provinsi'] = $this->Wilayah->ambil_provinsi();
        $data['kabupaten'] = $this->Perusahaan->get_Jatim();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('long', 'Longitude', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
        // $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten/kota', 'required|trim');
        // $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        // $this->form_validation->set_rules('kelurahan_id', 'Desa', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara Bekerja', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('berangkat', 'Keberangkatan melalui', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'PT Pengirim', 'required|trim');
        $this->form_validation->set_rules('lama', 'Lama Bekerja', 'required|trim');
        // $this->form_validation->set_rules('tanggal_data', 'Tanggal Data Inputan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'PMI Bermasalah';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmi/edit', $data);
            $this->load->view('templates/footer_edit_map', $data);
        } else {
            $data = [
                'latitude' => $this->input->post('lat', true),
                'longitude' => $this->input->post('long', true),
                'nama' => $this->input->post('nama', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'gender' => $this->input->post('gender', true),
                'alamat' => $this->input->post('alamat', true),
                // 'provinsi' => $this->input->post('provinsi', true),
                'kabupaten' => $this->input->post('kabupaten', true),
                // 'kecamatan' => $this->input->post('kecamatan', true),
                // 'desa' => $this->input->post('kelurahan_id', true),
                'negara_bekerja' => $this->input->post('negara', true),
                'jenis_pekerjaan' => $this->input->post('jenis', true),
                'berangkat_melalui' => $this->input->post('berangkat', true),
                'pengirim' => $this->input->post('pengirim', true),
                'lama_bekerja' => $this->input->post('lama', true),
                'date_created' => date('Y-m-d'),
            ];
            // cek gambar upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['upload_path']   = './assets/img/pmi';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message',
                     '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pmi');
                }
            }

            $this->db->where('id', $id);
            $this->db->update('tb_pmi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('pmi');
        }
    }

    public function edit_pmi($id_lokasi)
    {
        is_logged_in();
        // load data user login
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        $data['lok'] = $this->Penempatan->getTotalLokal();
        $data['disabilitas'] = $this->Penempatan->getTotalDisabilitas();

        // $data['negara'] = $this->db->get('tb_negara')->result_array();
        $data['negara'] = $this->Wilayah->list_negara();


        // $data['provinsi_select'] = $this->db->get('provinsi')->result_array();
        $data['kabupaten'] = $this->db->get('kabupaten')->result_array();
        // $data['kecamatan'] = $this->db->get('kecamatan')->result_array();
        // $data['kelurahan'] = $this->db->get('kelurahan')->result_array();

        // $data['kelurahan'] = $this->db->get('kelurahan')->result_row();
        // Load model pmi
        $data['lokasi'] = $this->Sebaran_Jatim->detail_pmib($id_lokasi);
        $data['detail_kabupaten'] = $this->Sebaran_Jatim->detail_kabupaten_object();
        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        // var_dump($data['lokasi']);
        // die;
        // $data['provinsi'] = $this->Wilayah->ambil_provinsi();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('long', 'Longitude', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
        // $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten/kota', 'required|trim');
        // $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        // $this->form_validation->set_rules('kelurahan_id', 'Desa', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara Bekerja', 'required');
        // $this->form_validation->set_rules('jenis-select', 'Jenis Pekerjaan');
        $this->form_validation->set_rules('jenis', 'Jenis Pekerjaan','required|trim');
        $this->form_validation->set_rules('berangkat', 'Keberangkatan melalui', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'PT Pengirim', 'required');
        $this->form_validation->set_rules('lama', 'Lama Bekerja', 'required');
        // $this->form_validation->set_rules('tanggal_data', 'Tanggal Data Inputan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'PMI Bermasalah';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmi/edit_map', $data);
            $this->load->view('templates/footer_edit_map', $data);
        } else {
            $data = [
                'latitude' => $this->input->post('lat', true),
                'longitude' => $this->input->post('long', true),
                'nama' => $this->input->post('nama', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'gender' => $this->input->post('gender', true),
                'alamat' => $this->input->post('alamat', true),
                // 'provinsi' => $this->input->post('provinsi', true),
                'kabupaten' => $this->input->post('kabupaten', true),
                // 'kecamatan' => $this->input->post('kecamatan', true),
                // 'desa' => $this->input->post('kelurahan_id', true),
                'negara_bekerja' => $this->input->post('negara', true),
                // 'jenis_pekerjaan' => $this->input->post('jenis-select', true),
                'jenis_pekerjaan' => $this->input->post('jenis', true),
                'berangkat_melalui' => $this->input->post('berangkat', true),
                'pengirim' => $this->input->post('pengirim', true),
                'lama_bekerja' => $this->input->post('lama', true),
                'date_created' => date('Y-m-d'),
            ];
            // cek gambar upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['upload_path']   = './assets/img/pmi';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message',
                     '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pmi/edit_pmi/' . $id_lokasi);
                }
            }

            $this->db->where('id', $id_lokasi);
            $this->db->update('tb_pmi', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('pmi/edit_pmi/' . $id_lokasi);
        }
    }

    public function detail($id_lokasi)
    {
        //load data user login
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        $data['lok'] = $this->Penempatan->getTotalLokal();
        $data['disabilitas'] = $this->Penempatan->getTotalDisabilitas();

        // Load Model User Role
        $data['lokasi'] = $this->Sebaran_Jatim->detail_pmib($id_lokasi);
        $data['kab_jatim'] = $this->Wilayah->get_kab_jatim();
        // var_dump($data['lokasi']);
        // die;

        //load data view
        $data['title'] = 'PMI Bermasalah';
        $this->load->view('templates/header', $data);
        if ($this->ci->session->userdata('email')) {
            $data['is_admin'] = 1;
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
        }else{
            $data['is_admin'] = 0;
            $this->load->view('templates/topbar_user', $data);
        }
        $this->load->view('pmi/detail', $data);
        // $this->load->view('templates/footer_detail_map', $data);
    }


    public function deletePmi($id)
    {
        is_logged_in();
        $this->db->where('id', $id);


        $this->db->delete('tb_pmi');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Dihapus !</strong> data telah berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
        redirect('pmi/');
    }

    public function hapusMap($id)
    {
        is_logged_in();
        $this->db->where('id', $id);


        $this->db->delete('tb_pmi');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Dihapus !</strong> data telah berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
        redirect('beranda');
    }
}
