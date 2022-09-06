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
            "SELECT *
            FROM kabupaten 
            -- JOIN tb_tka 
            -- ON kabupaten.id_kabupaten = tb_tka.lokasi_kerja
            WHERE id_provinsi= '42385' 
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

    public function edit_tka($id_lokasi)
    {
        //load data user login session
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

         // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['kabupaten'] = $this->Perusahaan->get_Jatim();


        // load data 
        // $data['tb_tka'] = $this->Perusahaan->get_TkaPerusahaan();
        $data['perusahaan'] = $this->Perusahaan->get_perusahaan();
        $data['negara'] = $this->Wilayah->list_negara();
        // $data['sebaran_tka'] = $this->Sebaran_Jatim->get_sebaran_tka();
        $data['lokasi'] = $this->Sebaran_Jatim->detail_tka($id_lokasi);
        // var_dump($data['lokasi']);
        // die;


        $this->form_validation->set_rules('nama_tka', 'Nama TKA', 'required');
        $this->form_validation->set_rules('long', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('negara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('no_rptka', 'NO. RPTKA', 'required');
        $this->form_validation->set_rules('masa_rptka', 'Masa Berlaku RPTKA', 'required');
        $this->form_validation->set_rules('no_imta', 'NO. IMTA', 'required');
        $this->form_validation->set_rules('masa_imta', 'Masa Berlaku IMTA', 'required');
        $this->form_validation->set_rules('lokasi', 'Loksi Kerja', 'required');
        // $this->form_validation->set_rules('tanggal_data', 'Tangal Data Inputan', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tenaga Kerja Asing';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tka/edit_map', $data);
            $this->load->view('templates/footer_edit_map', $data);
        } else {
            $data = [
                'nama_tka' => $this->input->post('nama_tka'),
                'latitude' => $this->input->post('lat'),
                'longitude' => $this->input->post('long'),
                'jenis_kel' => $this->input->post('gender'),
                'id_perusahaan' => $this->input->post('perusahaan'),
                'kewarganegaraan' => $this->input->post('negara'),
                'jabatan' => $this->input->post('jabatan'),
                'no_rptka' => $this->input->post('no_rptka'),
                'masa_rptka' => $this->input->post('masa_rptka'),
                'no_imta' => $this->input->post('no_imta'),
                'masa_imta' => $this->input->post('masa_imta'),
                'lokasi_kerja' => $this->input->post('lokasi'),
                'date_created' => date('Y-m-d'),
            ];

            // cek gambar upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['upload_path']   = './assets/img/tka';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message',
                     '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('beranda/edit_tka/'. $id_lokasi);
                }
            }

            $this->db->where('id', $id_lokasi);
            $this->db->update('tb_tka', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('beranda/edit_tka/'. $id_lokasi);
        }
    }
}
