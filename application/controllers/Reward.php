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
        $this->load->model('Disabilitas');
    } // FUNCTION USER START

    // FUNCTION DOCTOR START
    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        
        $data['data_reward'] = $this->RewardModel->get_reward_perusahaan();
        $data['tb_reward'] = $this->RewardModel->get_tb_reward();

        $data['title'] = 'Penghargaan Perusahaan';
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

        $data["ragam_disabilitas"] = $this->db->get_where('tb_disabilitas')->result();
        // $data['hapus_reward'] = $this->RewardModel->get_tb_reward();
        // $data['tambah_phk'] = $this->Master->get_tb_phk();

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('nama_pimpinan', 'Pimpinan', 'required|trim');
        $this->form_validation->set_rules('nama_kontak_person', 'Nama Kontak Person', 'trim');
        $this->form_validation->set_rules('no_kontak_person', 'Nomor telepon kontak person', 'trim');
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required|trim');
        $this->form_validation->set_rules('no_perusahaan', 'Nomor Telepon Perusahaan', 'required|trim');
        $this->form_validation->set_rules('email_perusahaan', 'E-mail Perusahaan', 'trim');
        $this->form_validation->set_rules('jenis_perusahaan', 'Jenis Perusahaan', 'trim');
        $this->form_validation->set_rules('sektor_usaha', 'Sektor Perusahaan', 'trim');
        $this->form_validation->set_rules('disabilitas_L', 'Disabilitas Laki-laki', 'trim');
        $this->form_validation->set_rules('disabilitas_P', 'Disabilitas Perempuan', 'trim');
        $this->form_validation->set_rules('disabilitas_total', 'Disabilitas Total', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_L', 'Total tenaga kerja Laki-laki', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_P', 'Total tenaga kerja Perempuan', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_total', 'Tenaga kerja total', 'trim');
        $this->form_validation->set_rules('presentase', 'Presentase', 'trim');
        $this->form_validation->set_rules('ragam_disabilitas', 'Ragam Disabilitas', 'required|trim');
        $this->form_validation->set_rules('jenis_disabilitas', 'Jenis Disabilitas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Penghargaan Perusahaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('reward/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                'kabupaten_kota' => $this->input->post('kabupaten_kota', true),
                'nama_pimpinan' => $this->input->post('nama_pimpinan', true),
                'nama_kontak_person' => $this->input->post('nama_kontak_person', true),
                'no_kontak_person' => $this->input->post('no_kontak_person', true),
                'alamat_perusahaan' => $this->input->post('alamat_perusahaan', true),
                'no_perusahaan' => $this->input->post('no_perusahaan', true),
                'email_perusahaan' => $this->input->post('email_perusahaan', true),
                'jenis_perusahaan' => $this->input->post('jenis_perusahaan', true),
                'sektor_usaha' => $this->input->post('sektor_usaha', true),
                'disabilitas_L' => $this->input->post('disabilitas_L', true),
                'disabilitas_P' => $this->input->post('disabilitas_P', true),
                'disabilitas_total' => $this->input->post('disabilitas_total', true),
                'tenaga_kerja_L' => $this->input->post('tenaga_kerja_L', true),
                'tenaga_kerja_P' => $this->input->post('tenaga_kerja_P', true),
                'tenaga_kerja_total' => $this->input->post('tenaga_kerja_total', true),
                'presentase' => $this->input->post('presentase', true),
                'ragam_disabilitas' => $this->input->post('ragam_disabilitas', true),
                'jenis_disabilitas' => $this->input->post('jenis_disabilitas', true),
                'date_created' => date('Y-m-d'),
            ];

            $this->db->insert('tb_reward', $data);

        //     $kabupaten = $this->input->post('wilayah', true);
        //     // jumlah phk masih salah ya ingat
        //     $jumlah_phk = $this->db->query("SELECT SUM(CASE WHEN wilayah='$kabupaten' THEN 1 ELSE 0 END) AS phk FROM tb_phk");

        //    $jumlah = $jumlah_phk->row()->phk;

        //     $update = [   
        //         'jumlah_phk' => $jumlah,
        //     ];

        //     $this->db->where('id_kabupaten', $kabupaten);
        //     $this->db->update('kabupaten', $update);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Berhasil! Data telah ditambahkan. </div>');
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
        $data['edit_reward'] = $this->RewardModel->get_rewardById($id);

        // form validation
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('nama_pimpinan', 'Pimpinan', 'required|trim');
        $this->form_validation->set_rules('nama_kontak_person', 'Nama Kontak Person', 'trim');
        $this->form_validation->set_rules('no_kontak_person', 'Nomor telepon kontak person', 'trim');
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required|trim');
        $this->form_validation->set_rules('no_perusahaan', 'Nomor Telepon Perusahaan', 'required|trim');
        $this->form_validation->set_rules('email_perusahaan', 'E-mail Perusahaan', 'trim');
        $this->form_validation->set_rules('jenis_perusahaan', 'Jenis Perusahaan', 'trim');
        $this->form_validation->set_rules('sektor_usaha', 'Sektor Perusahaan', 'trim');
        $this->form_validation->set_rules('disabilitas_L', 'Disabilitas Laki-laki', 'trim');
        $this->form_validation->set_rules('disabilitas_P', 'Disabilitas Perempuan', 'trim');
        $this->form_validation->set_rules('disabilitas_total', 'Disabilitas Total', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_L', 'Total tenaga kerja Laki-laki', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_P', 'Total tenaga kerja Perempuan', 'trim');
        $this->form_validation->set_rules('tenaga_kerja_total', 'Tenaga kerja total', 'trim');
        $this->form_validation->set_rules('presentase', 'Presentase', 'trim');
        $this->form_validation->set_rules('ragam_disabilitas', 'Ragam Disabilitas', 'required|trim');
        $this->form_validation->set_rules('jenis_disabilitas', 'Jenis Disabilitas', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Penghargaan Perusahaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('reward/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                'kabupaten_kota' => $this->input->post('kabupaten_kota', true),
                'nama_pimpinan' => $this->input->post('nama_pimpinan', true),
                'nama_kontak_person' => $this->input->post('nama_kontak_person', true),
                'no_kontak_person' => $this->input->post('no_kontak_person', true),
                'alamat_perusahaan' => $this->input->post('alamat_perusahaan', true),
                'no_perusahaan' => $this->input->post('no_perusahaan', true),
                'email_perusahaan' => $this->input->post('email_perusahaan', true),
                'jenis_perusahaan' => $this->input->post('jenis_perusahaan', true),
                'sektor_usaha' => $this->input->post('sektor_usaha', true),
                'disabilitas_L' => $this->input->post('disabilitas_L', true),
                'disabilitas_P' => $this->input->post('disabilitas_P', true),
                'disabilitas_total' => $this->input->post('disabilitas_total', true),
                'tenaga_kerja_L' => $this->input->post('tenaga_kerja_L', true),
                'tenaga_kerja_P' => $this->input->post('tenaga_kerja_P', true),
                'tenaga_kerja_total' => $this->input->post('tenaga_kerja_total', true),
                'presentase' => $this->input->post('presentase', true),
                'ragam_disabilitas' => $this->input->post('ragam_disabilitas', true),
                'jenis_disabilitas' => $this->input->post('jenis_disabilitas', true),
            ];


            $this->db->where('id_reward', $id);
            $this->db->update('tb_reward', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Berhasil data telah diperbarui! </div>');
            redirect('reward');
        }
    }


    public function hapus($id)
    {
        
        $this->db->where('id_reward', $id);
        $this->db->delete('tb_reward');

        // $reward =  $this->db->query("SELECT * FROM tb_reward WHERE id_reward='$id'");
        // $kabupaten = $reward->row()->wilayah;

        

        //     $jumlah_reward = $this->db->query("SELECT SUM(CASE WHEN wilayah='$kabupaten' THEN 1 ELSE 0 END) AS reward FROM tb_reward");

        //    $jumlah = $jumlah_reward->row()->reward;

        //     $update = [   
        //         'jumlah_phk' => $jumlah,
        //     ];

        //     $this->db->where('id_kabupaten', $kabupaten);
        //     $this->db->update('kabupaten', $update);

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Data yang dipilih telah berhasil dihapus </div>');
        redirect('reward');
    }

    // function get_disabilitas_by_ragam(){
	// 	$id_dis=$this->input->post('id_dis');
    // 	$data=$this->RewardModel->get_disabilitas_by_ragam($id_dis)->result();
    // 	foreach ($data as $result) {
    // 		$value[] = (float) $result->id_dis;
    // 	}
    // 	echo json_encode($value);
	// }
}
