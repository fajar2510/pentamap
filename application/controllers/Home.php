<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    // keamanan akses user level, syarat login session
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Master');
        $this->load->model('Penempatan');
        $this->load->model('Perusahaan');
        $this->load->model('RewardModel');
        $this->load->model('Sebaran_Jatim');
        $this->load->model('Wilayah');
    }

public function index()
    {
        $data['title'] = 'Peta Tenaga Kerja';

        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();

        $perusahaan =
            "SELECT *
            FROM tb_perusahaan 
            -- WHERE id_provinsi= '42385' 
        ";
        $data['list_perusahaan'] = $this->db->query($perusahaan)->result();

        // data sebaran
        $data['sebaran_phk'] = $this->Sebaran_Jatim->get_sebaran_phk();
        $data['sebaran_cpmi'] = $this->Sebaran_Jatim->get_sebaran_cpmi();
        $data['sebaran_pmib'] = $this->Sebaran_Jatim->get_sebaran_pmib();
        $data['sebaran_tka'] = $this->Sebaran_Jatim->get_sebaran_tka();
        $data['sebaran_phk'] = $this->Sebaran_Jatim->get_sebaran_phk();

        // data total cpmi, pmib , tka ,phk - per kabupaten
        $data['detail_kabupaten'] = $this->Sebaran_Jatim->detail_kabupaten();

        $data['kab_jatim'] = $this->Wilayah->get_kab_jatim();
        
        // $data['sebaran_disabilitas'] = $this->Sebaran_Jatim->get_sebaran_disabilitas();
        // var_dump($data['sebaran_phk']);
        // die;
        // $data['tka'] = $this->Perusahaan->getTotalTKA();

        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        $data['tabel'] = $this->Master->tabel();

        //load with templating view
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar_user', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/footer_map', $data);
    }
}