<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Phk extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->ci = get_instance();
        $this->load->model('Master');
        $this->load->model('Penempatan');
        $this->load->model('Perusahaan');
        $this->load->model('Lokal');
        $this->load->model('Sebaran_Jatim');
    } // FUNCTION USER START

    // FUNCTION DOCTOR START
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        

        $data['data_phk'] = $this->Master->get_tb_phk();
        

        $data['title'] = 'Tenaga Kerja Daerah';
        $this->load->view('templates/header', $data);

        if ($this->ci->session->userdata('email')) {
            $data['is_admin'] = 1;
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
        }else{
            $data['is_admin'] = 0;
            $this->load->view('templates/topbar_user', $data);
        }
        $this->load->view('phk/index', $data);
        $this->load->view('templates/footer');
    }



    public function tambah()
    {
        is_logged_in();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        $data['perusahaan'] = $this->Lokal->get_namaperusahaan();
        $data['tambah_phk'] = $this->Master->get_tb_phk();

        $this->form_validation->set_rules('nama_tk', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('long', 'Longitude', 'required|trim');
        $this->form_validation->set_rules('no_identitas', 'NIK', 'trim');
        $this->form_validation->set_rules('wilayah', 'Kabupaten/kota', 'required|trim'); 
        $this->form_validation->set_rules('kpj', 'KPJ BPJS', 'trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim');
        $this->form_validation->set_rules('kontak', 'No.telp/hp/email', 'trim');
        $this->form_validation->set_rules('kode_segmen', 'Kode Segmen', 'trim');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required|trim');
        $this->form_validation->set_rules('status_kerja', 'Status_kerja', 'required|trim');
        $this->form_validation->set_rules('disabilitas', 'Berkebutuhan khusus', 'trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tenaga Kerja Daerah';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('phk/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'latitude' => $this->input->post('lat', true),
                'longitude' => $this->input->post('long', true),
                'wilayah' => $this->input->post('wilayah', true),
                'kpj' => $this->input->post('kpj', true),
                'nama_tk' => $this->input->post('nama_tk', true),
                'alamat_tk' => $this->input->post('alamat', true),
                'kontak' => $this->input->post('kontak', true),
                'nomor_identitas' => $this->input->post('no_identitas', true),
                'kode_segmen' => $this->input->post('kode_segmen', true),
                'perusahaan' => $this->input->post('perusahaan', true),
                'status_kerja' => $this->input->post('status_kerja', true),
                'disabilitas' => $this->input->post('disabilitas', true),
                'date_created' => date('Y-m-d'),
            ];
           
            // cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['upload_path']   = './assets/img/lokal';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('phk');
                }
            }

            $this->db->insert('tb_phk', $data);

            $kabupaten = $this->input->post('wilayah', true);
            // jumlah phk masih salah ya ingat
            $jumlah_phk = $this->db->query("SELECT SUM(CASE WHEN wilayah='$kabupaten' THEN 1 ELSE 0 END) AS phk FROM tb_phk");

            $jumlah = $jumlah_phk->row()->phk;

            $update = [   
                'jumlah_phk' => $jumlah,
            ];

            $this->db->where('id_kabupaten', $kabupaten);
            $this->db->update('kabupaten', $update);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Ditambahkan !</strong> data telah berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('phk');
        }
    }
    // FUNCTION  add END

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

        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        $data['perusahaan'] = $this->Lokal->get_namaperusahaan();
        $data['tambah_phk'] = $this->Master->get_tb_phk();

        // Load model lokal
        // $data['phk'] = $this->Master->get_tb_phk();
        $data['edit_phk'] = $this->Master->get_phkById($id);

        $this->form_validation->set_rules('nama_tk', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('long', 'Longitude', 'required|trim');
        $this->form_validation->set_rules('no_identitas', 'NIK', 'required|trim');
        $this->form_validation->set_rules('wilayah', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('kpj', 'KPJ BPJS', 'trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kontak', 'No.telp/hp/email', 'required|trim');
        $this->form_validation->set_rules('kode_segmen', 'Kode Segmen', 'trim');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required|trim');
        $this->form_validation->set_rules('status_kerja', 'Status_kerja', 'required|trim');
        $this->form_validation->set_rules('disabilitas', 'Berkebutuhan khusus', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tenaga Kerja Daerah';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('phk/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'latitude' => $this->input->post('lat', true),
                'longitude' => $this->input->post('long', true),
                'wilayah' => $this->input->post('wilayah', true),
                'kpj' => $this->input->post('kpj', true),
                'nama_tk' => $this->input->post('nama_tk', true),
                'alamat_tk' => $this->input->post('alamat', true),
                'kontak' => $this->input->post('kontak', true),
                'nomor_identitas' => $this->input->post('no_identitas', true),
                'kode_segmen' => $this->input->post('kode_segmen', true),
                'perusahaan' => $this->input->post('perusahaan', true),
                'status_kerja' => $this->input->post('status_kerja', true),
                'disabilitas' => $this->input->post('disabilitas', true),
                'date_created' => date('Y-m-d'),
            ];

            // cek gambar upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['upload_path']   = './assets/img/lokal';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message',
                     '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('phk');
                }
            }


            $this->db->where('id_phk', $id);
            $this->db->update('tb_phk', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('phk');
        }
    }

    public function edit_phk($id_lokasi)
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

        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        $data['perusahaan'] = $this->Lokal->get_namaperusahaan();
        // $data['tambah_phk'] = $this->Master->get_tb_phk();
        $data['lokasi'] = $this->Sebaran_Jatim->detail_phk($id_lokasi);
        // var_dump($data['lokasi']);
        // die;
        

        // Load model lokal
        // $data['phk'] = $this->Master->get_tb_phk();
        // $data['edit_phk'] = $this->Master->get_phkById($id_lokasi);

        $this->form_validation->set_rules('nama_tk', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('long', 'Longitude', 'required|trim');
        $this->form_validation->set_rules('no_identitas', 'NIK', 'required|trim');
        $this->form_validation->set_rules('wilayah', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('kpj', 'KPJ BPJS', 'trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kontak', 'No.telp/hp/email', 'required|trim');
        $this->form_validation->set_rules('kode_segmen', 'Kode Segmen', 'trim');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required|trim');
        $this->form_validation->set_rules('status_kerja', 'Status_kerja', 'required|trim');
        $this->form_validation->set_rules('disabilitas', 'Berkebutuhan khusus', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tenaga Kerja ter-PHK';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('phk/edit_map', $data);
            $this->load->view('templates/footer_edit_map', $data);
        } else {
            $data = [
                'latitude' => $this->input->post('lat', true),
                'longitude' => $this->input->post('long', true),
                'wilayah' => $this->input->post('wilayah', true),
                'kpj' => $this->input->post('kpj', true),
                'nama_tk' => $this->input->post('nama_tk', true),
                'alamat_tk' => $this->input->post('alamat', true),
                'kontak' => $this->input->post('kontak', true),
                'nomor_identitas' => $this->input->post('no_identitas', true),
                'kode_segmen' => $this->input->post('kode_segmen', true),
                'perusahaan' => $this->input->post('perusahaan', true),
                'status_kerja' => $this->input->post('status_kerja', true),
                'disabilitas' => $this->input->post('disabilitas', true),
                'date_created' => date('Y-m-d'),
            ];

            // cek gambar upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['upload_path']   = './assets/img/lokal';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message',
                     '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('phk/edit_phk/'. $id_lokasi);
                }
            }


            $this->db->where('id_phk', $id_lokasi);
            $this->db->update('tb_phk', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('phk/edit_phk/'. $id_lokasi);
        }
    }

    public function detail($id_lokasi)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        

        // $data['data_phk'] = $this->Master->get_tb_phk();
        $data['lokasi'] = $this->Sebaran_Jatim->detail_phk($id_lokasi);
        // var_dump($data['lokasi']);
        // die;
        $data['title'] = 'Tenaga Kerja Lokal';
        $this->load->view('templates/header', $data);
        if ($this->ci->session->userdata('email')) {
            $data['is_admin'] = 1;
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
        }else{
            $data['is_admin'] = 0;
            $this->load->view('templates/topbar_user', $data);
        }
        $this->load->view('phk/detail', $data);
        // $this->load->view('templates/footer');
    }


    public function hapus($id)
    {
        is_logged_in();
        $this->db->where('id_phk', $id);

        $phk =  $this->db->query("SELECT * FROM tb_phk WHERE id_phk='$id'");
        $kabupaten = $phk->row()->wilayah;

        $this->db->delete('tb_phk');

            $jumlah_phk = $this->db->query("SELECT SUM(CASE WHEN wilayah='$kabupaten' THEN 1 ELSE 0 END) AS phk FROM tb_phk");

           $jumlah = $jumlah_phk->row()->phk;

            $update = [   
                'jumlah_phk' => $jumlah,
            ];

            $this->db->where('id_kabupaten', $kabupaten);
            $this->db->update('kabupaten', $update);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Dihapus !</strong> data telah berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
        redirect('phk');
    }

    public function hapusMap($id)
    {
        is_logged_in();
        $this->db->where('id_phk', $id);

        $phk =  $this->db->query("SELECT * FROM tb_phk WHERE id_phk='$id'");
        $kabupaten = $phk->row()->wilayah;

        $this->db->delete('tb_phk');

            $jumlah_phk = $this->db->query("SELECT SUM(CASE WHEN wilayah='$kabupaten' THEN 1 ELSE 0 END) AS phk FROM tb_phk");

           $jumlah = $jumlah_phk->row()->phk;

            $update = [   
                'jumlah_phk' => $jumlah,
            ];

            $this->db->where('id_kabupaten', $kabupaten);
            $this->db->update('kabupaten', $update);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Dihapus !</strong> data telah berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
        redirect('beranda');
    }
}
