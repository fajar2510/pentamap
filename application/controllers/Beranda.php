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
        // var_dump($data['total_cpmi']);
        // die;

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
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/footer_map', $data);
    }

    public function kabupaten()
    {
        // $tahun = $this->input->post('tahun');
        $query =
            "SELECT  kabupaten.nama_kabupaten,kabupaten.geojson, kabupaten.warna,  kabupaten.luas_area, 
            kabupaten.kabupaten_lat, kabupaten.kabupaten_long, kabupaten.logo_kab, kabupaten.id_kabupaten,
            
            COUNT(DISTINCT tb_cpmi.id) AS totalCpmi,
             COUNT(DISTINCT tb_tka.id) AS totalTka , 
             COUNT(DISTINCT tb_pmi.id) AS totalPmib , 
             COUNT(CASE tb_phk.status_kerja WHEN 'phk' THEN 1 END)  AS totalPhk 
             FROM kabupaten 
             LEFT JOIN tb_cpmi ON tb_cpmi.wilayah = kabupaten.id_kabupaten 
             LEFT JOIN tb_tka ON tb_tka.lokasi_kerja = kabupaten.id_kabupaten
              LEFT JOIN tb_pmi ON tb_pmi.kabupaten = kabupaten.id_kabupaten 
              LEFT JOIN tb_phk ON tb_phk.wilayah = kabupaten.id_kabupaten 
              WHERE id_provinsi = '42385' 
              GROUP BY kabupaten.nama_kabupaten ; 
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
