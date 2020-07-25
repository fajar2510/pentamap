<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penempatan extends CI_Model
{

    public function getRole()
    {
        $query = "SELECT `user`.*, `user_role`. `role`
                    FROM `user` JOIN `user_role`
                    ON `user`. `role_id` = `user_role`. `id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_cpmi()
    {
        $query =
            "SELECT `tb_cpmi`.*, `tb_perusahaan`.`nama_perusahaan`, `tb_perusahaan`.`fungsi`
            FROM `tb_cpmi` 
            JOIN `tb_perusahaan` ON `tb_cpmi`.`perusahaan` = `tb_perusahaan`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function get_edit_cpmi($id)
    {
        $query = "SELECT `tb_cpmi`.*, `tb_perusahaan`. `nama_perusahaan`,
                    `tb_perusahaan`.`fungsi`
                    FROM `tb_cpmi` JOIN `tb_perusahaan`
                    ON `tb_cpmi`. `perusahaan` = `tb_perusahaan`. `id`
                    WHERE `tb_cpmi` .`id`= '$id'
                ";
        return $this->db->query($query)->row();
    }

    public function get_perusahaan()
    {
        $query =
            "SELECT `tb_perusahaan`.*FROM `tb_perusahaan` WHERE `fungsi`='PMI'";
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
    public function getTotalCPMI()
    {
        $data = $this->db->query("SELECT COUNT(id) as cpmi FROM tb_cpmi ");
        return $data->result();
    }
    public function getTotalPMIB()
    {
        $data = $this->db->query("SELECT COUNT(id) as pmib FROM tb_pmi ");
        return $data->result();
    }
}
