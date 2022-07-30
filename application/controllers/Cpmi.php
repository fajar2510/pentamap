<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpmi extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Master');
        $this->load->model('Penempatan');
        // $this->load->model('Perusahaan');
    }

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

        $data['data_cpmi'] = $this->Penempatan->get_cpmi();
        // $data['formal'] =  $this->Penempatan->getTotFormalByPenempatan();
        $data['a'] =  $this->Penempatan->getTotalTKA();
        $data['b'] =  $this->Penempatan->getTotalPMIB();

        $data['title'] = 'Data Penempatan Calon Pekerja Migran Indonesia (CPMI) ke Luar Negeri ';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('cpmi/index', $data);
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

        $data['negara'] = $this->db->get('tb_negara')->result_array();
        $data['kabupaten'] = $this->Penempatan->get_Jatim();
        // load data 
        $data['data_cpmi'] = $this->Penempatan->get_cpmi();
        // $data['perusahaan'] = $this->Penempatan->get_perusahaanPMI();

        $this->form_validation->set_rules('perusahaan', 'Nama Perusahaan PPMI', 'required');

        $this->form_validation->set_rules('nama_pmi', 'Nama PMI', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat PMI', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Wilayah PMI', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan Kerja', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan Terakhir', 'required');
        $this->form_validation->set_rules('gaji', 'Gaji PMI', 'required');
        $this->form_validation->set_rules('paspor', 'Nomor Paspor', 'required');
        $this->form_validation->set_rules('negara_penempatan', 'Negara Penempatan', 'required');
        $this->form_validation->set_rules('kode_pesawat', 'Kode Pesawat', 'required');
        $this->form_validation->set_rules('pengguna_jasa', 'Pengguna Jasa', 'required');
        $this->form_validation->set_rules('alamat_pengguna_jasa', 'Alamat Pengguna Jasa', 'required');
        $this->form_validation->set_rules('tanggal_data', 'Tanggal Data Inputan', 'required');



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Data Penempatan Calon Pekerja Migran Indonesia (CPMI) ke Luar Negeri';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('cpmi/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'perusahaan' => $this->input->post('perusahaan'),

                'nama_pmi' => $this->input->post('nama_pmi'),
                'jenis_kelamin' => $this->input->post('gender'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'wilayah' => $this->input->post('lokasi'),
                'jabatan' => $this->input->post('jabatan'),
                'pendidikan_formal' => $this->input->post('pendidikan'),
                'gaji' => $this->input->post('gaji'),
                'paspor' => $this->input->post('paspor'),
                'negara_penempatan' => $this->input->post('negara_penempatan'),
                'kode_pesawat' => $this->input->post('kode_pesawat'),
                'pengguna_jasa' => $this->input->post('pengguna_jasa'),
                'alamat_pengguna_jasa' => $this->input->post('alamat_pengguna_jasa'),

                'date_created' => $this->input->post('tanggal_data'),
            ];

            // $data_perusahaan_negara = [
            //     'perusahaan' => $this->input->post('perusahaan'),
            //     'negara_penempatan' => $this->input->post('negara_penempatan'),
            // ];

            $this->db->insert('tb_cpmi', $data);
            // $this->db->insert('tb_perusahaan_negara', $data_perusahaan_negara);
            $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert"> Data CPMI berhasil ditambahkan! </div>');
            redirect('cpmi');
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

        // load data 
        $data['negara'] = $this->db->get('tb_negara')->result_array();
        $data['kabupaten'] = $this->Penempatan->get_Jatim();

        // $data['data_cpmi'] = $this->Penempatan->get_cpmi();
        // $data['perusahaan'] = $this->Penempatan->get_perusahaanPMI();
        $data['edit_cpmi'] = $this->Penempatan->get_edit_cpmi($id);


        $this->form_validation->set_rules('perusahaan', 'Nama Perusahaan PPMI', 'required');

        $this->form_validation->set_rules('nama_pmi', 'Nama PMI', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat PMI', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Wilayah PMI', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan Kerja', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan Terakhir', 'required');
        $this->form_validation->set_rules('gaji',  'Gaji PMI', 'required');

        $this->form_validation->set_rules('paspor', 'Nomor Paspor', 'required');
        $this->form_validation->set_rules('negara_penempatan', 'Negara Penempatan', 'required');
        $this->form_validation->set_rules('kode_pesawat', 'Kode Pesawat', 'required');
        $this->form_validation->set_rules('pengguna_jasa', 'Pengguna Jasa', 'required');
        $this->form_validation->set_rules('alamat_pengguna_jasa', 'Alamat Pengguna Jasa', 'required');
        $this->form_validation->set_rules('tanggal_data', 'Tanggal Data Inputan', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Calon Pekerja Migran Indonesia (CPMI) di Luar Negeri';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('cpmi/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'perusahaan' => $this->input->post('perusahaan'),

                'nama_pmi' => $this->input->post('nama_pmi'),
                'jenis_kelamin' => $this->input->post('gender'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'wilayah' => $this->input->post('lokasi'),
                'jabatan' => $this->input->post('jabatan'),
                'pendidikan_formal' => $this->input->post('pendidikan'),
                'gaji' => $this->input->post('gaji'),
                'paspor' => $this->input->post('paspor'),
                'negara_penempatan' => $this->input->post('negara_penempatan'),
                'kode_pesawat' => $this->input->post('kode_pesawat'),
                'pengguna_jasa' => $this->input->post('pengguna_jasa'),
                'alamat_pengguna_jasa' => $this->input->post('alamat_pengguna_jasa'),
                'date_created' => $this->input->post('tanggal_data'),
            ];


            $this->db->where('id', $id);
            $this->db->update('tb_cpmi', $data);

            // $this->db->update('tb_perusahaan_negara',$data_perusahaan_negara);
            $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert"> Data CPMI berhasil diperbarui ! </div>');
            redirect('cpmi');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_cpmi');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Data yang dipilih berhasil dihapus. </div>');
        redirect('cpmi');
    }

    public function laporan_pmi()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        // load data wilayah
        $data['perusahaan_pmi'] = $this->Penempatan->get_perusahaan();
        $data['data_pppmi'] = $this->Penempatan->get_lap_pppmi();
        $data['data_hongkong'] = $this->Penempatan->get_data_hongkong();
        $data['data_sin'] = $this->Penempatan->get_data_sin();
        $data['data_an'] = $this->Penempatan->data_an();

        $data['title'] = 'Data AN Perusahaan Penempatan Pekerja Migran Indonesia (P3MI) ';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('cpmi/laporan_pmi', $data);
        $this->load->view('templates/footer', $data);
    }
}
