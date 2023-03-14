<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    // keamanan akses user level, syarat login session
    public function __construct()
    {
        parent::__construct();
        $this->ci = get_instance();
        $this->load->model('Master');
        $this->load->model('Penempatan');
        $this->load->model('Perusahaan');
        $this->load->model('RewardModel');
        $this->load->model('Sebaran_Jatim');
        $this->load->model('Wilayah');
        $this->load->model('PelatihanModel');
        $this->load->model('Geo_Jatim');
        $this->load->model('Lokal');
        date_default_timezone_set('Asia/Jakarta');
        $this->tahun_ini=date("Y");
    }

    public function index()
    {
        is_logged_in();
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
        ";

        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        $data['lok'] = $this->Penempatan->getTotalLokal();
        $data['disabilitas'] = $this->Penempatan->getTotalDisabilitas();

        $data['tabel'] = $this->Master->tabel();

        $data['list_perusahaan'] = $this->db->query($perusahaan)->result();

        // data sebaran
        $data['sebaran_phk'] = $this->Sebaran_Jatim->get_sebaran_phk();
        // $data['sebaran_lokal'] = $this->Sebaran_Jatim->get_sebaran_lokal();
        $data['sebaran_cpmi'] = $this->Sebaran_Jatim->get_sebaran_cpmi();
        $data['sebaran_pmib'] = $this->Sebaran_Jatim->get_sebaran_pmib();
        $data['sebaran_tka'] = $this->Sebaran_Jatim->get_sebaran_tka();
        //  echo"<pre>";
        // var_dump($data['sebaran_tka']);
        // die;
        $data['sebaran_lokal'] = $this->Sebaran_Jatim->get_sebaran_lokal();
        // var_dump( $data['sebaran_lokal']);
        // die;
        $data['sebaran_disabilitas'] = $this->Sebaran_Jatim->get_sebaran_disabilitas();

        // data total cpmi, pmib , tka ,phk - per kabupaten
        $data['detail_kabupaten_array'] = $this->Sebaran_Jatim->detail_kabupaten();
        $data['detail_kabupaten'] = $this->Sebaran_Jatim->detail_kabupaten_object();

        $total = 0;
        $m = 0;
        foreach ($data['detail_kabupaten_array'] as $valx) {
            $total = $valx['totalTka'] + $valx['totalCpmi'] + $valx['totalPmib'] + $valx['totalPhk'] +  $valx['totLokal']  ;
            // echo $total."<br>";
            array_push($data['detail_kabupaten_array'][$m], ["total" => $total]);
            // break;
            $m++;
        }

        $data['kab_jatim'] = $this->Wilayah->get_kab_jatim();
        
        // $data['sebaran_disabilitas'] = $this->Sebaran_Jatim->get_sebaran_disabilitas();
        // var_dump($data['sebaran_phk']);
        // die;
        // $data['tka'] = $this->Perusahaan->getTotalTKA();
            foreach($data['tka'][0] as $tka1){ $tka = $tka1; }
            foreach($data['pmib'][0] as $pmib1){ $pmib = $pmib1; }
            foreach($data['cpmi'][0] as $cpmi1){ $cpmi = $cpmi1; }
            foreach($data['phk'][0] as $phk1){ $phk = $phk1; }
            foreach($data['lok'][0] as $lok1){ $lok = $lok1; }
            $jumlah_naker = $tka + $pmib + $cpmi + $phk + $lok;
            $data['presentase_cpmi'] = round($cpmi / $jumlah_naker * 100,2);
            $data['presentase_pmib'] = round($pmib / $jumlah_naker * 100,2);
            $data['presentase_tka'] = round($tka / $jumlah_naker * 100,2);
            $data['presentase_phk'] = round($phk / $jumlah_naker * 100,2);
            $data['presentase_lok'] = round($lok / $jumlah_naker * 100,2);
            $data['tabel'] = $this->Master->tabel();

            $data['data_tahun_tka'] = array();
            $data['data_tahun_pmib'] = array();
            $data['data_tahun_cpmi'] = array();
            $data['data_tahun_phk'] = array();
            $data['data_tahun_lok'] = array();
            $data['tahun_start'] = $this->tahun_ini - 3;
            $data['tahun_awal'] = strval($data['tahun_start']);
            for ($i=0; $i < 4; $i++) { 
                $data_tka = $this->Penempatan->getjumlahtahuntka($data['tahun_start']);
                $data_pmib = $this->Penempatan->getjumlahtahunpmib($data['tahun_start']);
                $data_cpmi = $this->Penempatan->getjumlahtahuncpmi($data['tahun_start']);
                $data_phk = $this->Penempatan->getjumlahtahunphk($data['tahun_start']);
                $data_lok = $this->Penempatan->getjumlahtahunlok($data['tahun_start']);
                array_push($data['data_tahun_tka'], $data_tka);
                array_push($data['data_tahun_pmib'], $data_pmib);
                array_push($data['data_tahun_cpmi'], $data_cpmi);
                array_push($data['data_tahun_phk'], $data_phk);
                array_push($data['data_tahun_lok'], $data_lok);
                $data['tahun_start'] += 1;
            }
            $data['tahun_ini'] = $this->tahun_ini;


        if ($this->ci->session->userdata('email')) {
            $data['is_login'] = 1;
        }else{
            $data['is_login'] = 0;
        }

        // data UPT get
        $data['data_pelatihan'] = $this->PelatihanModel->get_pelatihan();
        $kabupaten = $this->Geo_Jatim->get_GeoJatim();

        // presentase tidak/belum kerja per upt

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


        // $m = 0;
        // foreach ($data['data_pelatihan'] as $pelatihan) {
        //     $id_upt = $pelatihan['id_upt'];
        //     $n = 0;
        //     $id_kab = 0;
        //     $jumlah_total_upt = 0;
        //     $jumlah_pengurang_upt = 0;
        //     foreach ($kabupaten as $val) {
        //         $id_kab = $val['id_kabupaten'];
        //         $upt_id = $val['upt_id'];
        //         $jum_phk = count($this->Lokal->get_phk("wilayah = $id_kab"));
        //         $jum_lokal = count($this->Lokal->get_aktif("wilayah = $id_kab"));
        //         $jum_pmib = count($this->Master->getPmiJoinWilayah("kabupaten = $id_kab"));
        //         $jum_tka = count($this->Perusahaan->get_TkaPerusahaan("lokasi_kerja = $id_kab"));
        //         $jum_cpmi = count($this->Penempatan->get_cpmi("wilayah = $id_kab"));
        //         $jumlah_total = $jum_phk + $jum_lokal + $jum_pmib + $jum_tka + $jum_cpmi;
        //         $jum_pengurang = $jum_phk + $jum_pmib;
        //         if ($upt_id == $id_upt) {
        //             $jumlah_total_upt += $jumlah_total;
        //             $jumlah_pengurang_upt += $jum_pengurang;
        //         }
        //         $n++;
        //     }
        //     $percent = null;
        //     if ($jumlah_total_upt != 0) {
        //         $percent = $jumlah_pengurang_upt/$jumlah_total_upt*100;
        //     }
        //     array_push($data['data_pelatihan'][$m], ["percent" => $percent]);
        //     $m++;
        // }
        

        //load with templating view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/footer_map', $data);
    }

    public function kabupaten()
    {
        // is_logged_in();
        // $tahun = $this->input->post('tahun');
        $query =
            "SELECT  kabupaten.nama_kabupaten,kabupaten.geojson, kabupaten.warna,  kabupaten.luas_area, 
            kabupaten.kabupaten_lat, kabupaten.kabupaten_long, kabupaten.logo_kab, kabupaten.id_kabupaten,
            
            COUNT(DISTINCT tb_cpmi.id) AS totalCpmi,
            COUNT(DISTINCT tb_tka.id) AS totalTka , 
            COUNT(DISTINCT tb_pmi.id) AS totalPmib , 
            COUNT(CASE tb_phk.status_kerja WHEN 'aktif' THEN 1 END)  AS totLokal ,
            COUNT(CASE tb_phk.status_kerja WHEN 'phk' THEN 1 END)  AS totalPhk 
            FROM kabupaten 
            LEFT JOIN tb_cpmi ON tb_cpmi.wilayah = kabupaten.id_kabupaten 
            LEFT JOIN tb_tka ON tb_tka.lokasi_kerja = kabupaten.id_kabupaten
            LEFT JOIN tb_pmi ON tb_pmi.kabupaten = kabupaten.id_kabupaten 
            LEFT JOIN tb_phk ON tb_phk.wilayah = kabupaten.id_kabupaten 
            WHERE id_provinsi = '42385' 
            GROUP BY kabupaten.nama_kabupaten ; 
        ";
        
        $data = $this->db->query($query)->result();
        echo json_encode($data);
    }

    // function get_sub_category(){
    //     $category_id = $this->input->post('id',TRUE);
    //     $data = $this->product_model->get_sub_category($category_id)->result();
    //     echo json_encode($data);
    // }

        

    public function list_perusahaan()
    {
        $id=$this->input->post('id_kabupaten');
        $query =
            "SELECT *
            FROM tb_perusahaan 
            JOIN kabupaten ON kabupaten.id_kabupaten = tb_perusahaan.fungsi
            WHERE fungsi= $id 
        ";

        $kab = "SELECT *
        FROM kabupaten 
        WHERE id_kabupaten= $id";
 
        $data['perusahaan'] = $this->db->query($query)->result();
        $data['kab'] = $this->db->query($kab)->result();
        
        echo json_encode($data);
    }

    public function detail_reward_perusahaan()
    {
        $id=$this->input->post('id_prs');
        $data['perusahaan'] = $this->RewardModel->get_detail_reward_perusahaan($id);
        $panjang_array = count( $data['perusahaan']);

        // $r_d=array();
        // foreach ($data['perusahaan'] as $data_jenis) {
        //     if ($data_jenis['jenis_disabilitas'] != null) {
        //         $explode_jd = explode(",", $data_jenis['jenis_disabilitas']);
        //             $namanya="";
        //             $index_buatan=0;
        //             $temp="";
        //             foreach($explode_jd as $arr){
        //                 $query = "SELECT DISTINCT dis_jenis.ragam_id, dis_ragam.disabilitas_ragam
        //                 FROM dis_jenis 
        //                 JOIN dis_ragam
        //                 ON dis_jenis.ragam_id = dis_ragam.id_ragam 
        //                 WHERE id_jenis  = '$arr'";
        
        //                 $arr_result = $this->db->query($query)->result_array();
        //                 foreach ($arr_result as $val) {
        //                     $index_buatan+=1;
        //                 if ($val['disabilitas_ragam'] != $temp ) {
        //                     if ($index_buatan == 1) {
        //                         $namanya .= "";
        //                     }else {
        //                         $namanya .= ",&nbsp;";
        //                     }
        //                     $namanya .= $val['disabilitas_ragam']; 
        //                 }
        //                 $temp = $val['disabilitas_ragam'];
        //                 }
        //             }   
        //     }
        //     array_push($r_d, $namanya);
        // }

        // SINTAX MENAMPILKAN RAGAM DISABILITAS
        $tanpareward="no";
        $r_d=array();
        foreach ($data['perusahaan'] as $data_jenis) {
            if ($data_jenis['jenis_disabilitas'] != null) {
                $explode_jd = explode(",", $data_jenis['jenis_disabilitas']);
                    $namanya="";
                    $index_buatan=0;
                    $temp="";
                    foreach($explode_jd as $arr){
                        $query = "SELECT DISTINCT dis_jenis.ragam_id, dis_ragam.disabilitas_ragam
                        FROM dis_jenis 
                        JOIN dis_ragam
                        ON dis_jenis.ragam_id = dis_ragam.id_ragam 
                        WHERE id_jenis  = '$arr'";
        
                        $arr_result = $this->db->query($query)->result_array();
                        foreach ($arr_result as $val) {
                            $index_buatan+=1;
                        if ($val['disabilitas_ragam'] != $temp ) {
                            if ($index_buatan == 1) {
                                $namanya .= "";
                            }else {
                                $namanya .= ",&nbsp;";
                            }
                            $namanya .= $val['disabilitas_ragam']; 
                        }
                        $temp = $val['disabilitas_ragam'];
                        }
                    }   
                array_push($r_d, $namanya);
            }
            else{
                array_push($r_d, $tanpareward);
            }
        }
        // SINTAX MENAMPILKAN RAGAM DISABILITAS
        // SINTAX MENAMPILKAN JENIS DISABILITAS
        $j_d=array();
        foreach ($data['perusahaan'] as $data_jenis) {
            if ($data_jenis['jenis_disabilitas'] != null) {
                $explode_jd = explode(",", $data_jenis['jenis_disabilitas']);
                    $namanya_jenis="";
                    $index_buatan_jenis=0;
                    foreach($explode_jd as $arr){
                        $query = "SELECT DISTINCT dis_jenis.ragam_id, dis_jenis.jenis_disabilitas
                        FROM dis_jenis 
                        WHERE id_jenis  = '$arr'";
        
                        $arr_result = $this->db->query($query)->result_array();
                        foreach ($arr_result as $val) {
                            $index_buatan_jenis+=1;
                            if ($index_buatan_jenis == 1) {
                                $namanya_jenis .= "";
                            }else {
                                $namanya_jenis .= ",&nbsp;";
                            }
                            $namanya_jenis .= $val['jenis_disabilitas']; 
                        }
                    }   
                array_push($j_d, $namanya_jenis);
            }
            else{
                array_push($j_d, $tanpareward);
            }
        }
        // SINTAX MENAMPILKAN JENIS DISABILITAS

        // JENIS DISABILITAS NANTI DIMASUKKAN KESINI
            for ($i=0; $i<$panjang_array; $i++) {
                array_push($data['perusahaan'][$i], $r_d[$i]);
                array_push($data['perusahaan'][$i], $j_d[$i]);
            }
        // JENIS DISABILITAS NANTI DIMASUKKAN KESINI
        echo json_encode($data);
    }

    public function phk()
    {
        is_logged_in();
        $query =
            "SELECT *, max(jumlah_phk) FROM kabupaten WHERE id_provinsi= '42385' GROUP BY id_provinsi
        ";

        $phk = $this->db->query($query)->result();
        echo json_encode($phk);
    }

    public function lokal()
    {
        is_logged_in();
        $query =
            "SELECT *, max(jumlah_lokal) FROM kabupaten WHERE id_provinsi= '42385' GROUP BY id_provinsi
        ";

        $lokal = $this->db->query($query)->result();
        echo json_encode($lokal);
    }

    public function pmi()
    {
        is_logged_in();
        $query =
            "SELECT *,max(jumlah_pmi) as pmi_max FROM kabupaten WHERE id_provinsi= '42385' GROUP BY nama_kabupaten
        ";

        $pmi = $this->db->query($query)->result();
        echo json_encode($pmi);
    }

    public function pmib()
    {
        is_logged_in();
        $query =
            "SELECT max(jumlah_pmib) FROM kabupaten WHERE id_provinsi= '42385'
        ";

        $pmib = $this->db->query($query)->result();
        echo json_encode($pmib);
    }

    public function tka()
    {
        is_logged_in();
        $query =
            "SELECT max(jumlah_tka) FROM kabupaten WHERE id_provinsi= '42385'
        ";

        $tka = $this->db->query($query)->result();
        echo json_encode($tka);
    }

  
}
