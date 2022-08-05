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
        // $data['tambah_phk'] = $this->Master->get_tb_phk();

        $this->form_validation->set_rules('nama_tk', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_identitas', 'NIK', 'required|trim');
        $this->form_validation->set_rules('wilayah', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('kpj', 'KPJ BPJS', 'trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kontak', 'No.telp/hp/email', 'required|trim');
        $this->form_validation->set_rules('kode_segmen', 'Kode Segmen', 'trim');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required|trim');
        $this->form_validation->set_rules('status_kerja', 'Status_kerja', 'required|trim');
        $this->form_validation->set_rules('disabilitas', 'Berkebutuhan khusus', 'trim');
        $this->form_validation->set_rules('rincian', 'Rincian jenis', 'trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Penghargaan Perusahaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('reward/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'wilayah' => $this->input->post('wilayah', true),
                'kpj' => $this->input->post('kpj', true),
                'nama_tk' => $this->input->post('nama_tk', true),
                'alamat' => $this->input->post('alamat', true),
                'kontak' => $this->input->post('kontak', true),
                'nomor_identitas' => $this->input->post('no_identitas', true),
                'kode_segmen' => $this->input->post('kode_segmen', true),
                'nama_perusahaan' => $this->input->post('perusahaan', true),
                'status_kerja' => $this->input->post('status_kerja', true),
                'ragam_disabilitas' => $this->input->post('disabilitas', true),
                'jenis_disabilitas' => $this->input->post('rincian', true),
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
            alert-success" role="alert"> Berhasil! Data Usulan telah ditambahkan. </div>');
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
        $data['tambah_phk'] = $this->Master->get_tb_phk();
        

        // Load model lokal
        // $data['phk'] = $this->Master->get_tb_phk();
        $data['edit_phk'] = $this->Master->get_phkById($id);

        $this->form_validation->set_rules('nama_tk', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_identitas', 'NIK', 'required|trim');
        $this->form_validation->set_rules('wilayah', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('kpj', 'KPJ BPJS', 'trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kontak', 'No.telp/hp/email', 'required|trim');
        $this->form_validation->set_rules('kode_segmen', 'Kode Segmen', 'trim');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required|trim');
        $this->form_validation->set_rules('status_kerja', 'Status_kerja', 'required|trim');
        $this->form_validation->set_rules('disabilitas', 'Berkebutuhan khusus', 'trim');
        $this->form_validation->set_rules('rincian', 'Rincian jenis', 'trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Tenaga Kerja Lokal';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('reward/reward_edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'wilayah' => $this->input->post('wilayah', true),
                'kpj' => $this->input->post('kpj', true),
                'nama_tk' => $this->input->post('nama_tk', true),
                'alamat' => $this->input->post('alamat', true),
                'kontak' => $this->input->post('kontak', true),
                'nomor_identitas' => $this->input->post('no_identitas', true),
                'kode_segmen' => $this->input->post('kode_segmen', true),
                'nama_perusahaan' => $this->input->post('perusahaan', true),
                'status_kerja' => $this->input->post('status_kerja', true),
                'ragam_disabilitas' => $this->input->post('disabilitas', true),
                'jenis_disabilitas' => $this->input->post('rincian', true),
                'date_created' => date('Y-m-d'),
            ];


            $this->db->where('id_reward', $id);
            $this->db->update('tb_reward', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Data Tenaga Kerja Lokal telah diperbarui! </div>');
            redirect('reward');
        }
    }


    public function hapus($id)
    {
        $this->db->where('id_reward', $id);

        $reward =  $this->db->query("SELECT * FROM tb_reward WHERE id_reward='$id'");
        $kabupaten = $reward->row()->wilayah;

        $this->db->delete('tb_reward');

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
}
