<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // keamanan akses user level, syarat login session
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Master');
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

        //load with templating view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // index Role dan tambah Role
    public function role()
    {
        $data['title'] = 'Hak Akses';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role Akses', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Hak Akses';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role' =>
                htmlspecialchars($this->input->post('role', true)),
            ];
            $this->db->insert('user_role', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! Role Akses has been created. </div>');
            redirect('admin/role');
        }

       
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Manajemen Hak Akses ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' =>
        $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert 
        alert-success" role="alert"> Access Changed!</div>');
    }

    public function hapusRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected Role has succesfully deleted, be carefull for manage data. </div>');
        redirect('admin/role');
    }

    public function editRole($id)
    {
        // $this->form_validation->set_rules('role', 'Role Akses', 'required|trim');

        $role = $this->input->post('role', $id);


        $this->db->set('role', $role);
        $this->db->where('id', $id);
        $this->db->update('user_role');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected Role has been updated! </div>');
        redirect('admin/role');
    }
}
