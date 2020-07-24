<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Model
{

    public function get_perusahaan()
    {
        $query = "SELECT * FROM tb_perusahaan WHERE fungsi = 'TKA'";
        return $this->db->query($query)->result_array();
    }

    public function get_Jatim()
    {
        $query = "SELECT * FROM `kabupaten` WHERE id_provinsi = '42385'";
        return $this->db->query($query)->result_array();
    }

    public function getTkaById($id)
    {
        $query = "SELECT * FROM tb_tka WHERE id='$id'
                ";
        return $this->db->query($query)->row();
    }

    public function get_TkaPerusahaan()
    {
        $query =
            "SELECT `tb_tka`.*
                    FROM `tb_tka` 
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_TkaPerusahaanById($id)
    {
        $query =
            "SELECT `tb_tka`.*
                    FROM `tb_tka` 
                     WHERE `tb_tka`.`id`='$id'
                ";
        return $this->db->query($query)->row();
    }

    public function getRole()
    {
        $query = "SELECT `user`.*, `user_role`. `role`
                    FROM `user` JOIN `user_role`
                    ON `user`. `role_id` = `user_role`. `id`
                ";
        return $this->db->query($query)->result_array();
    }
}
