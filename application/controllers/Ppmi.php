<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppmi extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Master');
        $this->load->model('Penempatan');
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data wilayah
        // $data['tb_pptkis'] = $this->Penempatan->get_pptkis();
        $data['ppmi'] = $this->Penempatan->get_ppmi();
        $data['formal'] =  $this->Penempatan->getTotFormalByPenempatan();
        $data['a'] =  $this->Penempatan->getTotalTKA();
        $data['b'] =  $this->Penempatan->getTotalPMIB();

        $data['title'] = 'Data Perusahaan Penempatan Pekerja Migran Indonesia ';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ppmi/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        //load data user login session
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data 
        $data['ppmi'] = $this->Penempatan->get_ppmi();
        $data['perusahaan'] = $this->Penempatan->get_perusahaan();
        // $data['perusahaan'] = $this->Perusahaan->get_perusahaan();
        // $data['negara'] = $this->Perusahaan->get_NegaraAll();

        $this->form_validation->set_rules('perusahaan', 'Nama Perusahaan PPMI', 'required');

        $this->form_validation->set_rules('taiwan_lk', 'Data Taiwan Laki-laki', 'required');
        $this->form_validation->set_rules('taiwan_p', 'Data Taiwan Perempuan', 'required');
        $this->form_validation->set_rules('hongkong_lk', 'Data Hongkong Laki-laki', 'required');
        $this->form_validation->set_rules('hongkong_p', 'Data Hongkong Perempuan', 'required');
        $this->form_validation->set_rules('singapura_lk', 'Data Singapura Laki-laki', 'required');
        $this->form_validation->set_rules('singapura_p', 'Data Singapura Perempuan', 'required');
        $this->form_validation->set_rules('malaysia_lk', 'Data Malaysia Laki-laki', 'required');
        $this->form_validation->set_rules('malaysia_p', 'Data Malaysia Laki-laki', 'required');
        $this->form_validation->set_rules('brunei_lk', 'Data Brunei Laki-laki', 'required');
        $this->form_validation->set_rules('brunei_p', 'Data Brunei Perempuan', 'required');
        $this->form_validation->set_rules('lain_lk', 'Data Lainnya Laki-laki', 'required');
        $this->form_validation->set_rules('lain_p', 'Fata Lainnya Perempuan', 'required');
        $this->form_validation->set_rules('formal', 'Data Sektor Formal', 'required');
        $this->form_validation->set_rules('informal', 'Data Sektor Informal', 'required');
        $this->form_validation->set_rules('jatim', 'Data Jatim', 'required');
        $this->form_validation->set_rules('luar_jatim', 'Data Luar Jatim', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Data PPPMI (Perusahan Penempatan Pekerja Migran Indonesia)';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ppmi/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_pptkis' => $this->input->post('perusahaan'),
                'taiwan_lk' => $this->input->post('taiwan_lk'),
                'taiwan_p' => $this->input->post('taiwan_p'),
                'hongkong_lk' => $this->input->post('hongkong_lk'),
                'hongkong_p' => $this->input->post('hongkong_p'),
                'singapura_lk' => $this->input->post('singapura_lk'),
                'singapura_p' => $this->input->post('singapura_p'),
                'malaysia_lk' => $this->input->post('malaysia_lk'),
                'malaysia_p' => $this->input->post('malaysia_p'),
                'brunei_lk' => $this->input->post('brunei_lk'),
                'brunei_p' => $this->input->post('brunei_p'),
                'lain_lk' => $this->input->post('lain_lk'),
                'lain_p' => $this->input->post('lain_p'),
                'formal' => $this->input->post('formal'),
                'informal' => $this->input->post('informal'),
                'jatim' => $this->input->post('jatim'),
                'luar_jatim' => $this->input->post('luar_jatim'),

                'date_created' => date('Y-m-d'),
            ];

            $this->db->insert('tb_pptkis', $data);
            $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert"> Data PPPMI succesfully Added! </div>');
            redirect('ppmi');
        }
    }

    public function edit($id)
    {
        //load data user login session
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data 
        $data['ppmi'] = $this->Penempatan->get_ppmi();
        $data['perusahaan'] = $this->Penempatan->get_perusahaan();
        // $data['jatim'] = $this->Perusahaan->get_Jatim();
        $data['edit_ppmi'] = $this->Penempatan->get_editppmi($id);


        $this->form_validation->set_rules('nama', 'Nama TKA', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('negara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('nama_perusahaan', 'Perusahaan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Perusahaan', 'required');;
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('no_rptka', 'NO. RPTKA', 'required');
        $this->form_validation->set_rules('masa_rptka', 'Masa Berlaku RPTKA', 'required');
        $this->form_validation->set_rules('no_imta', 'NO. IMTA', 'required');
        $this->form_validation->set_rules('masa_imta', 'Masa Berlaku IMTA', 'required');
        $this->form_validation->set_rules('lokasi', 'Loksi Kerja', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Form Laporan TKA per Perusahaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ppmi/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_tka' => $this->input->post('nama'),
                'jenis_kel' => $this->input->post('gender'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'status' => $this->input->post('status'),
                'alamat' => $this->input->post('alamat'),
                'kewarganegaraan' => $this->input->post('negara'),
                'jabatan' => $this->input->post('jabatan'),
                'sektor' => $this->input->post('sektor'),
                'no_rptka' => $this->input->post('no_rptka'),
                'masa_rptka' => $this->input->post('masa_rptka'),
                'no_imta' => $this->input->post('no_imta'),
                'masa_imta' => $this->input->post('masa_imta'),
                'lokasi_kerja' => $this->input->post('lokasi'),
                // 'date_created' => date('Y-m-d'),
            ];

            $this->db->where('id', $id);
            $this->db->update('tb_pptkis', $data);
            $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert"> Data PPPMI succesfully Updated! </div>');
            redirect('ppmi');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pptkis');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected PPMI has succesfully deleted, be carefull for manage data. </div>');
        redirect('ppmi');
    }
}
