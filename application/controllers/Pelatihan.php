<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelatihan extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        
        $this->ci = get_instance();
        $this->load->model('Master');
        $this->load->model('Penempatan');
        $this->load->model('Perusahaan');
        $this->load->model('PelatihanModel');
        $this->load->model('Geo_Jatim');
        $this->load->model('Lokal');

    } // FUNCTION USER START

    // FUNCTION DOCTOR START
    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->session->set_userdata($data);

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        $data['lok'] = $this->Penempatan->getTotalLokal();
        $data['disabilitas'] = $this->Penempatan->getTotalDisabilitas();

        // data UPT get
        $data['data_pelatihan'] = $this->PelatihanModel->get_pelatihan();
        // data Kabupaten Jatim get
        $kabupaten = $this->Geo_Jatim->get_GeoJatim();

        // echo"<pre>";
        // var_dump($kabupaten);
        // die;
        $m = 0;
        foreach ($data['data_pelatihan'] as $pelatihan) {
            $id_upt = $pelatihan['id_upt'];
            // $id_upt = 16;
            $n = 0;
            $id_kab = 0;
            $jumlah_total_upt = 0;
            $jumlah_pengurang_upt = 0;
            $total_upt = 0;
            
            foreach ($kabupaten as $val) {
                $id_kab = $val['id_kabupaten'];
                $upt_id = $val['upt_id'];
                $jum_phk = count($this->Lokal->get_phk("wilayah = $id_kab"));
                $jum_lokal = count($this->Lokal->get_aktif("wilayah = $id_kab"));
                $jum_pmib = count($this->Master->getPmiJoinWilayah("kabupaten = $id_kab"));
                $jum_tka = count($this->Perusahaan->get_TkaPerusahaan("lokasi_kerja = $id_kab"));
                $jum_cpmi = count($this->Penempatan->get_cpmi("wilayah = $id_kab"));
                $jumlah_total = $jum_phk + $jum_lokal + $jum_pmib + $jum_tka + $jum_cpmi;
                $jum_pengurang = $jum_phk + $jum_pmib;

                // menghitung total pengurang masing-masing upt
                $total_upt += count($this->Master->getPmiJoinWilayah("kabupaten = $id_kab"));
                $total_upt += count($this->Lokal->get_phk("wilayah = $id_kab"));

                if ($upt_id == $id_upt) {
                    $jumlah_total_upt += $jumlah_total;
                    $jumlah_pengurang_upt += $jum_pengurang;
                }
                $n++;
            }

            $percent = null; // presentase per upt
            $percent2 = null; // peresentase seluruh upt
            if ($jumlah_total_upt != 0) {
                
               

                $percent = $jumlah_pengurang_upt/$jumlah_total_upt*100;           
                $percent2 = $jumlah_pengurang_upt/$total_upt*100;
                  
            }
            array_push($data['data_pelatihan'][$m], ["percent" => $percent]);
            array_push($data['data_pelatihan'][$m], ["jumlah_total_upt" =>  $jumlah_total_upt]);
            array_push($data['data_pelatihan'][$m], ["jumlah_pengurang_upt" =>  $jumlah_pengurang_upt]);
            array_push($data['data_pelatihan'][$m], ["percent2" => $percent2]);

            $m++;
        }
        $temp = [];
        $n_array = count($data['data_pelatihan']);
        // var_dump($data['data_pelatihan'][0][0]['percent']); die;
        for ($x=0; $x < $n_array; $x++) { 
            // $angka1 = $data['data_pelatihan'][$x][0]['percent'];
            // $arr_angka1 = $data['data_pelatihan'][$x];
            for ($y=0; $y < $n_array; $y++) { 
                // $angka2 = $data['data_pelatihan'][$y][0]['percent'];
                // $arr_angka2 = $data['data_pelatihan'][$y];
                if ($data['data_pelatihan'][$x][3]['percent2'] > $data['data_pelatihan'][$y][3]['percent2']) {
                    // echo "iki".$arr_angka2[0]['percent']." ";
                    $temp[0] = $data['data_pelatihan'][$x];
                    $data['data_pelatihan'][$x] = $data['data_pelatihan'][$y];
                    $data['data_pelatihan'][$y] = $temp[0];
                    // echo"<pre>";
                    // var_dump("yo1".$arr_angka1[0]['percent']);
                    // var_dump("yo2".$arr_angka2[0]['percent']);

                }
            }
        }
        
        $data['title'] = 'Pelatihan Lokasi';
        $this->load->view('templates/header', $data);
        if ($this->ci->session->userdata('email')) {
            $data['is_admin'] = 1;
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
        }else{
            $data['is_admin'] = 0;
            $this->load->view('templates/topbar_user', $data);
        }
        $this->load->view('pelatihan/index', $data);
        $this->load->view('templates/footer');
    }
}