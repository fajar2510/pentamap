<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $this->load->view('headf');
        $this->load->view('header_menuf');
        $this->load->view('home');
        $this->load->view('footer');
    }
}
