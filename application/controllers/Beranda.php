<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    // keamanan akses user level, syarat login session
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Master');
        $this->load->model('Penempatan');
    }

    public function index()
    {
        $data['title'] = 'Beranda';

        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();

        // $data['tka'] = $this->Perusahaan->getTotalTKA();

        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        $data['tabel'] = $this->Master->tabel();

        //load with templating view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kabupaten()
    {
        // $tahun = $this->input->post('tahun');
        $query =
            "SELECT *
            FROM kabupaten WHERE id_provinsi= '42385' 
        ";

        // if ($tahun == "all") {
        //     $query =
        //         "SELECT * FROM kabupaten WHERE id_provinsi= '42385'
        // ";
        // } else {
        //     $query =
        //         "SELECT * FROM kabupaten WHERE DATE(YEAR)='$tahun' id_provinsi= '42385'
        // ";
        // }
        $data = $this->db->query($query)->result();
        echo json_encode($data);
    }
    public function phk()
    {
        $query =
            "SELECT *, max(jumlah_phk) FROM kabupaten WHERE id_provinsi= '42385' GROUP BY id_provinsi
        ";

        $phk = $this->db->query($query)->result();
        echo json_encode($phk);
    }

    public function pmi()
    {
        $query =
            "SELECT *,max(jumlah_pmi) as pmi_max FROM kabupaten WHERE id_provinsi= '42385' GROUP BY nama_kabupaten
        ";

        $pmi = $this->db->query($query)->result();
        echo json_encode($pmi);
    }

    public function pmib()
    {
        $query =
            "SELECT max(jumlah_pmib) FROM kabupaten WHERE id_provinsi= '42385'
        ";

        $pmib = $this->db->query($query)->result();
        echo json_encode($pmib);
    }

    public function tka()
    {
        $query =
            "SELECT max(jumlah_tka) FROM kabupaten WHERE id_provinsi= '42385'
        ";

        $tka = $this->db->query($query)->result();
        echo json_encode($tka);
    }
}
