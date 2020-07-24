<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penempatan extends CI_Model
{
    public function get_ppmi()
    {
        $query =
            "SELECT `tb_pptkis`.*, `tb_perusahaan`.`nama_perusahaan`, `tb_perusahaan`.`status`
            FROM `tb_pptkis` 
            JOIN `tb_perusahaan` ON `tb_pptkis`.`nama_pptkis` = `tb_perusahaan`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function get_perusahaan()
    {
        $query =
            "SELECT `tb_perusahaan`.*FROM `tb_perusahaan` ";
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

    public function getTotFormalByPenempatan()
    {
        $data = $this->db->query("SELECT COUNT(id) as formal FROM tb_pptkis WHERE  nama_pptkis='1' ");
        return $data->result();
    }

    public function getTotalTKA()
    {
        $data = $this->db->query("SELECT COUNT(id) as tka FROM tb_tka ");
        return $data->result();
    }
    public function getTotalPMIB()
    {
        $data = $this->db->query("SELECT COUNT(id) as pmib FROM tb_pmi ");
        return $data->result();
    }

    public function get_editppmi($id)
    {
        $query = "SELECT `tb_pptkis`.*, `tb_perusahaan`. `nama_perusahaan`,
                    `tb_perusahaan`.`status`
                    FROM `tb_pptkis` JOIN `tb_perusahaan`
                    ON `tb_pptkis`. `nama_pptkis` = `tb_perusahaan`. `id`
                    WHERE `tb_pptkis` .`id`= '$id'
                ";
        return $this->db->query($query)->row();
    }
}
