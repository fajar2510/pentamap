<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Model
{
    public function get_pptkis()
    {
        $query = "SELECT * FROM tb_pptkis";
        return $this->db->query($query)->result_array();
    }

    public function get_tka()
    {
        $query = "SELECT * FROM tb_tka";
        return $this->db->query($query)->result_array();
    }

    public function get_TkaPerusahaan()
    {
        $query = "SELECT `tb_tka`.*, `tb_perusahaan`. `nama_perusahaan`, `tb_perusahaan`. `alamat`
                    FROM `tb_tka` JOIN `tb_perusahaan`
                    ON `tb_tka`. `nama_perusahaan` = `tb_perusahaan`. `id`
                ";
        return $this->db->query($query)->result_array();
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
