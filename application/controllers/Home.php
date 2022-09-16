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
        date_default_timezone_set('Asia/Jakarta');
        $this->tahun_ini=date("Y");
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
        // $data['tka'] = $this->Perusahaan->getTotalTKA();

            $data['tka'] = $this->Penempatan->getTotalTKA();
            $data['pmib'] = $this->Penempatan->getTotalPMIB();
            $data['cpmi'] = $this->Penempatan->getTotalCPMI();
            $data['phk'] = $this->Penempatan->getTotalPHK();

            foreach($data['tka'][0] as $tka1){ $tka = $tka1; }
            foreach($data['pmib'][0] as $pmib1){ $pmib = $pmib1; }
            foreach($data['cpmi'][0] as $cpmi1){ $cpmi = $cpmi1; }
            foreach($data['phk'][0] as $phk1){ $phk = $phk1; }
            $jumlah_naker = $tka + $pmib + $cpmi + $phk;
            $data['presentase_cpmi'] = round($cpmi / $jumlah_naker * 100,2);
            $data['presentase_pmib'] = round($pmib / $jumlah_naker * 100,2);
            $data['presentase_tka'] = round($tka / $jumlah_naker * 100,2);
            $data['presentase_phk'] = round($phk / $jumlah_naker * 100,2);
            $data['tabel'] = $this->Master->tabel();

            $data['data_tahun_tka'] = array();
            $data['data_tahun_pmib'] = array();
            $data['data_tahun_cpmi'] = array();
            $data['data_tahun_phk'] = array();
            $data['tahun_start'] = $this->tahun_ini - 3;
            $data['tahun_awal'] = strval($data['tahun_start']);
            for ($i=0; $i < 4; $i++) { 
                $data_tka = $this->Penempatan->getjumlahtahuntka($data['tahun_start']);
                $data_pmib = $this->Penempatan->getjumlahtahunpmib($data['tahun_start']);
                $data_cpmi = $this->Penempatan->getjumlahtahuncpmi($data['tahun_start']);
                $data_phk = $this->Penempatan->getjumlahtahunphk($data['tahun_start']);
                array_push($data['data_tahun_tka'], $data_tka);
                array_push($data['data_tahun_pmib'], $data_pmib);
                array_push($data['data_tahun_cpmi'], $data_cpmi);
                array_push($data['data_tahun_phk'], $data_phk);
                $data['tahun_start'] += 1;
            }
            $data['tahun_ini'] = $this->tahun_ini;

        //load with templating view
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar_user', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/footer_map', $data);
    }
}