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
        $data['tb_tka'] = $this->Perusahaan->get_tka();




        $data['title'] = 'Data TKA per Perusahaan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tka/index', $data);
        $this->load->view('templates/footer', $data);
    }



    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pptkis');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected PPTKIS has succesfully deleted, be carefull for manage data. </div>');
        redirect('perusahaan/');
    }
}
