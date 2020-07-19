<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Exportimport extends CI_Controller
{

    public function index()
    {
        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();

        $data['title'] = 'Export PDF';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('export/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
