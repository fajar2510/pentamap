<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Model
{
    public function get_pptkis()
    {
        $query = "SELECT * FROM tb_pptkis";
        return $this->db->query($query)->result_array();
    }
}
