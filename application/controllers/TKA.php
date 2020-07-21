<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tka extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Master');
        $this->load->model('Perusahaan');
    }


    // FUNCTION Tambah START
    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data wilayah
        $data['tb_tka'] = $this->Perusahaan->get_TkaPerusahaan();


        $data['title'] = 'Data TKA per Perusahaan';
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

        // load data 
        $data['tb_tka'] = $this->Perusahaan->get_TkaPerusahaan();
        $data['perusahaan'] = $this->Perusahaan->get_perusahaan();
        $data['negara'] = $this->Perusahaan->get_NegaraAll();
        $data['jatim'] = $this->Perusahaan->get_Jatim();

        $this->form_validation->set_rules('nama', 'Nama TKA', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('negara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('sektor', 'Sektor', 'required');
        $this->form_validation->set_rules('no_rptka', 'NO. RPTKA', 'required');
        $this->form_validation->set_rules('masa_rptka', 'Masa Berlaku RPTKA', 'required');
        $this->form_validation->set_rules('no_imta', 'NO. IMTA', 'required');
        $this->form_validation->set_rules('masa_imta', 'Masa Berlaku IMTA', 'required');
        $this->form_validation->set_rules('lokasi', 'Loksi Kerja', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Laporan TKA per Perusahaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tka/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_tka' => $this->input->post('nama'),
                'nama_perusahaan' => $this->input->post('perusahaan'),
                'kewarganegaraan' => $this->input->post('negara'),
                'jenis_kel' => $this->input->post('gender'),
                'jabatan' => $this->input->post('jabatan'),
                'sektor' => $this->input->post('sektor'),
                'no_rptka' => $this->input->post('no_rptka'),
                'masa_rptka' => $this->input->post('masa_rptka'),
                'no_imta' => $this->input->post('no_imta'),
                'masa_imta' => $this->input->post('masa_imta'),
                'lokasi_kerja' => $this->input->post('lokasi'),
                'date_created' => date('Y-m-d'),
            ];

            $this->db->insert('tb_tka', $data);
            $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert"> Data TKA succesfully Added! </div>');
            redirect('tka');
        }
    }

    public function edit($id)
    {
        //load data user login session
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data 
        $data['tb_tka'] = $this->Perusahaan->get_TkaPerusahaan();
        $data['perusahaan'] = $this->Perusahaan->get_perusahaan();
        $data['negara'] = $this->Perusahaan->get_NegaraAll();
        $data['jatim'] = $this->Perusahaan->get_Jatim();
        $data['tka'] = $this->Perusahaan->get_TkaById($id);


        $this->form_validation->set_rules('nama', 'Nama TKA', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('negara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('sektor', 'Sektor', 'required');
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
            $this->load->view('tka/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_tka' => $this->input->post('nama'),
                'nama_perusahaan' => $this->input->post('perusahaan'),
                'kewarganegaraan' => $this->input->post('negara'),
                'jenis_kel' => $this->input->post('gender'),
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
            $this->db->update('tb_tka', $data);
            $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert"> Data TKA succesfully Updated! </div>');
            redirect('tka');
        }
    }



    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_tka');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected PPTKIS has succesfully deleted, be carefull for manage data. </div>');
        redirect('tka/');
    }

    public function pptkis()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data wilayah
        $data['tb_pptkis'] = $this->Perusahaan->get_pptkis();




        $data['title'] = 'Data AN Perusahaan TKA';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tka/pptkis', $data);
        $this->load->view('templates/footer', $data);
    }



    public function hapusPptkis($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pptkis');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected PPTKIS has succesfully deleted, be carefull for manage data. </div>');
        redirect('tka/pptkis');
    }
}
