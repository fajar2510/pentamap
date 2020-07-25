<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pmi extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master');
        $this->load->model('Wilayah', '', TRUE);
        $this->load->model('Penempatan');
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

        // Load Model User Role
        $data['pmi'] = $this->Master->getPmiJoinWilayah();
        // $data['pmi'] = $this->Master->get_PMI();

        //load data view
        $data['title'] = 'Data Pemulangan PMI-B Non-Prosedural';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pmi/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // dijalankan saat provinsi di klik
    public function pilih_kabupaten()
    {
        $data['kabupaten'] = $this->Wilayah->ambil_kabupaten($this->uri->segment(3));
        $this->load->view('pmi/v_drop_down_kabupaten', $data);
    }

    // dijalankan saat kabupaten di klik
    public function pilih_kecamatan()
    {
        $data['kecamatan'] = $this->Wilayah->ambil_kecamatan($this->uri->segment(3));
        $this->load->view('pmi/v_drop_down_kecamatan', $data);
    }

    // dijalankan saat kecamatan di klik
    public function pilih_kelurahan()
    {
        $data['kelurahan'] = $this->Wilayah->ambil_kelurahan($this->uri->segment(3));
        $this->load->view('pmi/v_drop_down_kelurahan', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();

        //load data negara
        $data['negara'] = $this->db->get('tb_negara')->result_array();
        // Load model PMI
        $data['pmi'] = $this->Master->getPmiJoinWilayah();
        //LOAD data chained dropdown
        $data['provinsi'] = $this->Wilayah->ambil_provinsi();


        // $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
        $this->form_validation->set_rules('provinsi_id', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kabupaten_id', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kelurahan_id', 'Desa', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara Bekerja', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('berangkat', 'Keberangkatan melalui', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'PT Pengirim', 'required|trim');
        $this->form_validation->set_rules('lama', 'Lama Bekerja', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Pemulangan Pekerja Migran Indonesia (PMI-B) Non-Prosedural ';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmi/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'status' => 'NON-PROSEDURAL',
                'nama' => $this->input->post('nama', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'alamat' => $this->input->post('alamat', true),
                'gender' => $this->input->post('gender', true),
                'provinsi' => $this->input->post('provinsi_id', true),
                'kabupaten' => $this->input->post('kabupaten_id', true),
                'kecamatan' => $this->input->post('kecamatan_id', true),
                'desa' => $this->input->post('kelurahan_id', true),
                'negara_bekerja' => $this->input->post('negara', true),
                'jenis_pekerjaan' => $this->input->post('jenis', true),
                'berangkat_melalui' => $this->input->post('berangkat', true),
                'pengirim' => $this->input->post('pengirim', true),
                'lama_bekerja' => $this->input->post('lama', true),
                'date_created' => date('Y-m-d'),
            ];
            // cek jika ada gambar yang akan di upload
            // masih salah dan belum bisa upload gambar
            // cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '5000';
                $config['upload_path']   = './assets/img/pmi';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pmi');
                }
            }

            $this->db->insert('tb_pmi', $data);
            // show alert
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! Data PMI has been added succesfully. </div>');
            redirect('pmi');
        }
    }

    public function edit($id)
    {
        // load data user login
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();

        $data['negara'] = $this->db->get('tb_negara')->result_array();
        // Load model pmi
        $data['pmi'] = $this->Master->getPmiById($id);
        $data['provinsi'] = $this->Wilayah->ambil_provinsi();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
        $this->form_validation->set_rules('provinsi_id', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kabupaten_id', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kelurahan_id', 'Desa', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara Bekerja', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('berangkat', 'Keberangkatan melalui', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'PT Pengirim', 'required|trim');
        $this->form_validation->set_rules('lama', 'Lama Bekerja', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Form Pemulangan Pekerja Migran Indonesia (PMI-B) Non-Prosedural ';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmi/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'gender' => $this->input->post('gender', true),
                'alamat' => $this->input->post('alamat', true),
                'provinsi' => $this->input->post('provinsi_id', true),
                'kabupaten' => $this->input->post('kabupaten_id', true),
                'kecamatan' => $this->input->post('kecamatan_id', true),
                'desa' => $this->input->post('kelurahan_id', true),
                'negara_bekerja' => $this->input->post('negara', true),
                'jenis_pekerjaan' => $this->input->post('jenis', true),
                'berangkat_melalui' => $this->input->post('berangkat', true),
                'pengirim' => $this->input->post('pengirim', true),
                'lama_bekerja' => $this->input->post('lama', true),
                // 'date_created' => date('Y-m-d'),
            ];
            // cek gambar upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '5000';
                $config['upload_path']   = './assets/img/pmi';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pmi');
                }
            }

            $this->db->where('id', $id);
            $this->db->update('tb_pmi', $data);
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! PMI data has been update . </div>');
            redirect('pmi');
        }
    }


    public function deletePmi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pmi');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected PMI has succesfully deleted, be carefull for manage data. </div>');
        redirect('pmi/');
    }
}
