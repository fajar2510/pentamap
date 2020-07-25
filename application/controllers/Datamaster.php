<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamaster extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master');
        $this->load->model('Penempatan');
    }

    // FUNCTION USER START
    public function user()
    {
        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();

        $data['user'] = $this->db->get()->row_array();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // Load Model User Role
        $data['user_role'] = $this->Master->getRole();


        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Pengguna';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! user account has been created. </div>');
            redirect('datamaster/user');
        }
    }

    public function user_edit($id)
    {
        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();

        // Load model pmi
        $data['userid'] = $this->Master->getUserById($id);
        $data['user_role'] = $this->Master->getRole();


        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        // ]);
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Pengguna';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/user', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                // 'password' => password_hash(
                //     $this->input->post('password1'),
                //     PASSWORD_DEFAULT
                // ),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
            ];


            $this->db->where('id', $id);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> User data has been updated! </div>');
            redirect('datamaster/user');
        }
    }


    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected user has succesfully deleted, be carefull for manage data. </div>');
        redirect('datamaster/user');
    }
    // FUNCTION USER END

    // FUNCTION DOCTOR START
    public function perusahaan()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();

        $data['tb_perusahaan'] = $this->db->get('tb_perusahaan')->result_array();

        $data['title'] = 'Data Perusahaan Terdaftar DISNAKERTRANS';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('datamaster/perusahaan', $data);
        $this->load->view('templates/footer');
    }



    public function perusahaan_add()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tb_perusahaan'] = $this->db->get('tb_perusahaan')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Specialist', 'required|trim');
        $this->form_validation->set_rules('kontak', 'Kontak', 'trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('fungsi', 'Fungsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data Perusahaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/perusahaan_add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                'alamat' => $this->input->post('alamat', true),
                'kontak' => $this->input->post('kontak', true),
                'status' => $this->input->post('status', true),
                'fungsi' => $this->input->post('fungsi', true),
            ];

            $this->db->insert('tb_perusahaan', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! Perusahaan has been added succesfully. </div>');
            redirect('datamaster/perusahaan');
        }
    }
    // FUNCTION  add END

    public function perusahaan_edit($id)
    {
        // load data user login
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();

        // Load model pmi
        $data['perusahaan'] = $this->Master->getPerusahaanById($id);

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Specialist', 'required|trim');
        $this->form_validation->set_rules('kontak', 'Kontak', 'trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('fungsi', 'Fungsi', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Perusahaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/perusahaan_edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                'alamat' => $this->input->post('alamat', true),
                'kontak' => $this->input->post('kontak', true),
                'status' => $this->input->post('status', true),
                'fungsi' => $this->input->post('fungsi', true),
            ];


            $this->db->where('id', $id);
            $this->db->update('tb_perusahaan', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Perusahaan has been updated! </div>');
            redirect('datamaster/perusahaan');
        }
    }


    public function hapusPerusahaan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_perusahaan');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected has succesfully deleted, be carefull for manage data. </div>');
        redirect('datamaster/perusahaan');
    }
}
