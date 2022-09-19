<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reward extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Master');
        $this->load->model('Penempatan');
        $this->load->model('Perusahaan');
        $this->load->model('Lokal');
        $this->load->model('RewardModel');
        $this->load->model('Sektor');
        // $this->load->model('Disabilitas');
        $this->load->model('Autofill');
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
        
        $data['data_reward'] = $this->RewardModel->get_reward_perusahaan();
        // var_dump($data['data_reward']);
        // echo"<pre>";
        // die;
        $data['tb_reward'] = $this->RewardModel->get_tb_reward();

        $data['title'] = 'Penghargaan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reward/index', $data);
        $this->load->view('templates/footer');
    }



    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        $data['perusahaan'] = $this->Lokal->get_namaperusahaan();
        $data['jenis_sektor_usaha'] = $this->Sektor->get_sektor_usaha();
        $data['data_reward'] = $this->RewardModel->get_reward_perusahaan();
        // $data['ragam_disabilitas'] = $this->Disabilitas->get_ragam_disabilitas();
        $data['max_id'] = $this->RewardModel->max_id_perusahaan();
        $data['jenis'] = $this->RewardModel->get_jenis();
        // var_dump($data['jenis']);
        // die;

        
        // validation form
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('nama_pimpinan', 'Pimpinan', 'required|trim');
        $this->form_validation->set_rules('nama_kontak_person', 'Nama Kontak Person', 'trim');
        $this->form_validation->set_rules('no_kontak_person', 'Nomor telepon kontak person', 'trim');
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required|trim');
        $this->form_validation->set_rules('no_perusahaan', 'Nomor Telepon Perusahaan', 'required|trim');
        $this->form_validation->set_rules('email_perusahaan', 'E-mail Perusahaan', 'trim');
        $this->form_validation->set_rules('jenis_perusahaan', 'Jenis Perusahaan', 'required|trim');
        $this->form_validation->set_rules('sektor_usaha', 'Sektor Perusahaan', 'trim');
        $this->form_validation->set_rules('disabilitas_L', 'Disabilitas Laki-laki', 'trim');
        $this->form_validation->set_rules('disabilitas_P', 'Disabilitas Perempuan', 'trim');
        $this->form_validation->set_rules('disabilitas_total', 'Disabilitas Total', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_L', 'Total tenaga kerja Laki-laki', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_P', 'Total tenaga kerja Perempuan', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_total', 'Tenaga kerja total', 'trim');
        $this->form_validation->set_rules('presentase', 'Presentase', 'trim');
        $this->form_validation->set_rules('jenis[]', 'Jenis Disabilitas', 'required|trim');

        // var_dump($data); die;
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Penghargaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('reward/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('id_perusahaan') == null) {
                $id_perusahaan =$this->input->post('id_perusahaan_baru', true);
                // $id_perusahaan_baru = $mysqli->insert_id;
                // var_dump($id_perusahaan);
                // die;
            }else{
                $id_perusahaan = $this->input->post('id_perusahaan', true);
                }
                    $jenis =implode(',',$this->input->post('jenis', true));
                    // echo $jenis;
                    // die;
                $data_reward = [
                    'perusahaan_id' => $id_perusahaan,
                    
                    'disabilitas_L' => $this->input->post('disabilitas_L', true),
                    'disabilitas_P' => $this->input->post('disabilitas_P', true),
                    'disabilitas_total' => $this->input->post('disabilitas_total', true),
                    'tenaga_kerja_L' => $this->input->post('tenaga_kerja_L', true),
                    'tenaga_kerja_P' => $this->input->post('tenaga_kerja_P', true),
                    'tenaga_kerja_total' => $this->input->post('tenaga_kerja_total', true),
                    'presentase' => $this->input->post('presentase', true),
                    'jenis_disabilitas' => $jenis,
                    'date_created' => $this->input->post('tanggal_data'),
                ];
                // var_dump($id_perusahaan);
                // die;
                
            if ($this->input->post('id_perusahaan') == null) {
                $data_perusahaan = [
                    'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                    'fungsi' => $this->input->post('kabupaten_kota', true),
                    'nama_pimpinan' => $this->input->post('nama_pimpinan', true),
                    'nama_kontak_person' => $this->input->post('nama_kontak_person', true),
                    'no_kontak_person' => $this->input->post('no_kontak_person', true),
                    'alamat' => $this->input->post('alamat_perusahaan', true),
                    'kontak' => $this->input->post('no_perusahaan', true),
                    'email_perusahaan' => $this->input->post('email_perusahaan', true),
                    'jenis_perusahaan' => $this->input->post('jenis_perusahaan', true),
                    'sektor_perusahaan' => $this->input->post('sektor_usaha', true),
                    'date_created' => date('Y-m-d'),
                ];
                // var_dump($data_perusahaan, $data_reward);
                // echo"<pre>";
                // die;
               
                $this->db->insert('tb_perusahaan', $data_perusahaan);
                // $this->db->insert('tb_reward', $data_reward);
                
            }

            $id_perusahaan_update = $this->input->post('id_perusahaan', true);
            // var_dump($id_perusahaan_update);
            // die;

            $data_perusahaan = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                'fungsi' => $this->input->post('kabupaten_kota', true),
                'nama_pimpinan' => $this->input->post('nama_pimpinan', true),
                'nama_kontak_person' => $this->input->post('nama_kontak_person', true),
                'no_kontak_person' => $this->input->post('no_kontak_person', true),
                'alamat' => $this->input->post('alamat_perusahaan', true),
                'kontak' => $this->input->post('no_perusahaan', true),
                'email_perusahaan' => $this->input->post('email_perusahaan', true),
                'jenis_perusahaan' => $this->input->post('jenis_perusahaan', true),
                'sektor_perusahaan' => $this->input->post('sektor_usaha', true),
                'date_created' => date('Y-m-d'),
            ];
            
                $this->db->where('id', $id_perusahaan_update);
                $this->db->update('tb_perusahaan', $data_perusahaan);

                $this->db->insert('tb_reward', $data_reward);

            $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Ditambahkan !</strong> data telah berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('reward');
        }
    }
    // FUNCTION  add END

    public function edit($id)
    {
        // load data user login
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        $data['perusahaan'] = $this->Lokal->get_namaperusahaan();
        $data['jenis_sektor_usaha'] = $this->Sektor->get_sektor_usaha();

        $data['data_reward'] = $this->RewardModel->get_reward_perusahaan();
        $data['jenis'] = $this->RewardModel->get_jenis();
        $data['edit_reward'] = $this->RewardModel->get_rewardById($id);

        // PENGECEKAN JENIS DISABILITAS YANG PERNAH DIPILIH
        $n_jenis_dipilih = explode(",", $data['edit_reward'][0]['jenis_disabilitas']);
        $data['arr_jenis'] = array();
        foreach ($data['jenis'] as $val) {
           if (in_array($val->id_jenis, $n_jenis_dipilih)) {
            array_push($data['arr_jenis'], [
                'id_jenis' => $val->id_jenis,
                'jenis_disabilitas' => $val->jenis_disabilitas, 
                'disabilitas_ragam' => $val->disabilitas_ragam,
                'status' => "1"
            ]);
           }else {
            array_push($data['arr_jenis'], [
                'id_jenis' => $val->id_jenis,
                'jenis_disabilitas' => $val->jenis_disabilitas, 
                'disabilitas_ragam' => $val->disabilitas_ragam,
                'status' => "0"
            ]);
           }
        }
        // PENGECEKAN JENIS DISABILITAS YANG PERNAH DIPILIH

        // form validation
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        // $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/kota', 'required|trim');
        // $this->form_validation->set_rules('nama_pimpinan', 'Pimpinan', 'required|trim');
        // $this->form_validation->set_rules('nama_kontak_person', 'Nama Kontak Person', 'trim');
        // $this->form_validation->set_rules('no_kontak_person', 'Nomor telepon kontak person', 'trim');
        // $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required|trim');
        // $this->form_validation->set_rules('no_perusahaan', 'Nomor Telepon Perusahaan', 'required|trim');
        // $this->form_validation->set_rules('email_perusahaan', 'E-mail Perusahaan', 'trim');
        // $this->form_validation->set_rules('jenis_perusahaan', 'Jenis Perusahaan', 'trim');
        // $this->form_validation->set_rules('sektor_usaha', 'Sektor Perusahaan', 'trim');
        $this->form_validation->set_rules('disabilitas_L', 'Disabilitas Laki-laki', 'trim');
        $this->form_validation->set_rules('disabilitas_P', 'Disabilitas Perempuan', 'trim');
        $this->form_validation->set_rules('disabilitas_total', 'Disabilitas Total', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_L', 'Total tenaga kerja Laki-laki', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_P', 'Total tenaga kerja Perempuan', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_total', 'Tenaga kerja total', 'trim');
        $this->form_validation->set_rules('presentase', 'Presentase', 'trim');
        $this->form_validation->set_rules('jenis_edit[]', 'Jenis Disabilitas', 'required|trim');
       

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Penghargaan';
            // var_dump($data);
            // die;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('reward/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_perusahaan = $this->input->post('id_perusahaan', true);
            $id_reward = $id;
            // var_dump($id_reward);
            // die;
            $data_perusahaan = [
                // 'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                // 'fungsi' => $this->input->post('kabupaten_kota', true),
                // 'nama_pimpinan' => $this->input->post('nama_pimpinan', true),
                // 'nama_kontak_person' => $this->input->post('nama_kontak_person', true),
                // 'no_kontak_person' => $this->input->post('no_kontak_person', true),
                // 'alamat' => $this->input->post('alamat_perusahaan', true),
                // 'kontak' => $this->input->post('no_perusahaan', true),
                // 'email_perusahaan' => $this->input->post('email_perusahaan', true),
                // 'jenis_perusahaan' => $this->input->post('jenis_perusahaan', true),
                // 'sektor_perusahaan' => $this->input->post('sektor_usaha', true),
                // 'date_created' => $this->input->post('tanggal_data'),
            ];
            $jenis =implode(',',$this->input->post('jenis_edit', true));
            
            $data_reward = [
                'perusahaan_id' => $this->input->post('nama_perusahaan', true),
                'disabilitas_L' => $this->input->post('disabilitas_L', true),
                'disabilitas_P' => $this->input->post('disabilitas_P', true),
                'disabilitas_total' => $this->input->post('disabilitas_total', true),
                'tenaga_kerja_L' => $this->input->post('tenaga_kerja_L', true),
                'tenaga_kerja_P' => $this->input->post('tenaga_kerja_P', true),
                'tenaga_kerja_total' => $this->input->post('tenaga_kerja_total', true),
                'presentase' => $this->input->post('presentase', true),
                'jenis_disabilitas' => $jenis,
                'date_created' => $this->input->post('tanggal_data', true),
            ];
            // var_dump($id_reward); die;
            // $this->db->where('id', $id_perusahaan);
            // $this->db->update('tb_perusahaan', $data_perusahaan);

            $this->db->where('id_reward', $id_reward);
            $this->db->update('tb_reward', $data_reward);

            $this->session->set_flashdata('message',
             '<div class="alert alert-warning alert-dismissible fade show" role="alert">
             <strong>Disunting !</strong> data telah berhasil diupdate.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>   </div>');
            redirect('reward');
        }
    }


    public function hapus($id)
    {
        
        $this->db->where('id_reward', $id);
        $this->db->delete('tb_reward');

        $this->session->set_flashdata('message',
         '<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>Dihapus !</strong> data telah berhasil dihapus.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>   </div>');
        redirect('reward');
    }

    function get_autofill(){
        if (isset($_GET['term'])) {
            $result = $this->Autofill->search_perusahaan($_GET['term']);
            if (count ($result) > 0) {
                foreach ($result as $row) 
                    // $arr_result[] = $row->nama_perusahaan;
                    
                    $arr_result[] = array(

                        'id_perusahaan'     => $row->id,
                        'label'             => $row->nama_perusahaan,
                        'nama_perusahaan'   => $row->nama_perusahaan,
                        'kabupaten_kota'    => $row->fungsi,
                        'nama_pimpinan'     => $row->nama_pimpinan,
                        'nama_kontak_person'=> $row->nama_kontak_person,
                        'no_kontak_person'  => $row->no_kontak_person,
                        'alamat_perusahaan' => $row->alamat,
                        'no_perusahaan'     => $row->kontak, 
                        'email_perusahaan'  => $row->email_perusahaan,
                        'jenis_perusahaan'  => $row->jenis_perusahaan,
                        'sektor_usaha'      => $row->sektor_perusahaan,
                    );
                    echo json_encode ($arr_result);
                }
                
            }
    }

    function get_jenis_disabilitas(){
        $id_jenis=$this->input->post('id_jenis');
        $data=$this->RewardModel->get_jenis_disabilitas($id_jenis)->result();
        foreach ($data as $result) {
            $value[] = (float) $result->id_jenis;
        }
        echo json_encode($value);
    }

   
	function update(){
		$id_reward = $this->input->post('id_reward',TRUE);
		$id_jenis = $this->input->post('jenis_edit',TRUE);
		$this->RewardModel->update_jenis($id_reward,$id_jenis);
		redirect('reward');
	}
}

    

    
