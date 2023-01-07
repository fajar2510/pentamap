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

        // data UPT get
        $data['data_pelatihan'] = $this->PelatihanModel->get_pelatihan();
        // data Kabupaten Jatim get
        $kabupaten = $this->Geo_Jatim->get_GeoJatim();

        // Data List Tenaga Kerja All
        
        // $data['data_lokal_aktif'] = $this->Lokal->get_aktif();
        // $data['data_pmib'] = $this->Master->getPmiJoinWilayah();
        // $data['data_tka'] = $this->Perusahaan->get_TkaPerusahaan();
        // $data['data_cpmi'] = $this->Penempatan->get_cpmi();

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
                if ($upt_id == $id_upt) {
                    $jumlah_total_upt += $jumlah_total;
                    $jumlah_pengurang_upt += $jum_pengurang;
                    // echo $jum_phk."-".$jum_lokal."-".$jum_pmib."-".$jum_tka."-".$jum_cpmi."<br>";
                    // echo "====<br>";
                    // echo $val['nama_kabupaten']."=".$id_kab."-".$jumlah_total."-".$jum_pengurang."<br>";
                }
                // array_push($kabupaten[$n], [
                //     "jum_total" => $jumlah_total,
                //     "jum_pengurang" => $jum_pengurang
                // ]);
                // echo $val['id_kabupaten']."\n";
                $n++;
            }
            $percent = null;
            if ($jumlah_total_upt != 0) {
                $percent = $jumlah_pengurang_upt/$jumlah_total_upt*100;
            }
            // elseif ($jumlah_total_upt == 0 && $jumlah_pengurang_upt == 0){
            //     percen
            // }
            array_push($data['data_pelatihan'][$m], ["percent" => $percent]);
            // echo $jumlah_pengurang_upt."-".$jumlah_total_upt."-".$percent."\n";
            $m++;
        }
        // echo"<pre>";
        // var_dump($data['data_pelatihan']);
        // die;
        
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