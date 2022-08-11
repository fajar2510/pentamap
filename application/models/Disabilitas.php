<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disabilitas extends CI_Model
{
    public function get_disabilitas()
    {
        $query = "SELECT * FROM tb_disabilitas ORDER BY id_dis  ASC";
        return $this->db->query($query)->result_array();
    }

    // public function get_edit_disabilitas($id)
    // {
    //     $query = "SELECT * FROM tb_disabilitas WHERE tb_disabilitas.id_dis = '$id'
    //             ";
    //     return $this->db->query($query)->row();
    // }

}
