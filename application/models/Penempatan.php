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


    // SELECT DISTINCT negara_penempatan FROM tb_cpmi
    public function get_cpmi()
    {
        $query =
            // "SELECT DISTINCT tb_cpmi.negara_penempatan, tb_cpmi.perusahaan, tb_perusahaan.nama_perusahaan, tb_negara.nama_negara
            //     FROM tb_cpmi 
            //     INNER JOIN tb_perusahaan
            //     ON tb_cpmi.perusahaan = tb_perusahaan.id
            //     INNER JOIN tb_negara
            //     ON tb_cpmi.negara_penempatan = tb_negara.id
            //     ORDER BY tb_cpmi.negara_penempatan ASC";
            "SELECT  `tb_cpmi`.*, `tb_perusahaan`.`nama_perusahaan`, `tb_perusahaan`.`fungsi`,
            `tb_negara`.`nama_negara`
            FROM `tb_cpmi` 
            JOIN `tb_perusahaan` ON `tb_cpmi`.`perusahaan` = `tb_perusahaan`.`id` 
            JOIN `tb_negara` ON `tb_cpmi`.`negara_penempatan` = `tb_negara`.`id` 
            
         ";
        return $this->db->query($query)->result_array();
    }

    public function get_distinct_cpmi()
    {
        $query =
            "SELECT DISTINCT   tb_perusahaan.nama_perusahaan, tb_perusahaan.status
            FROM tb_cpmi 
            INNER JOIN tb_perusahaan
            ON tb_cpmi.perusahaan = tb_perusahaan.id
            INNER JOIN tb_negara
            ON tb_cpmi.negara_penempatan = tb_negara.id
            ORDER BY tb_cpmi.negara_penempatan ASC";
        return $this->db->query($query)->result_array();
    }

    public function get_lap_pppmi()
    {
        $query =
            "SELECT nama_perusahaan,status,negara_penempatan,wilayah, 
        COUNT(CASE jenis_kelamin WHEN 'L' THEN 1 END) AS total_lk, 
        COUNT(CASE jenis_kelamin WHEN 'P' THEN 1 END) AS total_pr, 
        COUNT(CASE jabatan WHEN 'FORMAL' THEN 1 END) AS total_formal, 
        COUNT(CASE jabatan WHEN 'INFORMAL' THEN 1 END) AS total_informal 
        FROM tb_cpmi JOIN tb_perusahaan ON perusahaan = tb_perusahaan.id 
        JOIN tb_negara ON negara_penempatan = tb_negara.id 
        GROUP BY perusahaan,negara_penempatan,wilayah";
        //     "SELECT perusahaan,negara_penempatan,jenis_kelamin,nama_perusahaan,status,nama_negara,jabatan,wilayah,COUNT(*) AS total 
        // FROM tb_cpmi JOIN tb_perusahaan ON perusahaan=tb_perusahaan.id 
        // JOIN tb_negara ON negara_penempatan=tb_negara.id 
        // GROUP BY perusahaan,negara_penempatan,jenis_kelamin,jabatan,wilayah";
        return $this->db->query($query)->result_array();
    }

    public function get_pdf_cpmi($perusahaan, $negara)
    {
        $query =
            "SELECT   `tb_cpmi`.*,  `tb_perusahaan`.`nama_perusahaan`, `tb_perusahaan`.`fungsi`,
            `tb_negara`.`nama_negara`
            FROM `tb_cpmi` 
            JOIN `tb_perusahaan` ON `tb_cpmi`.`perusahaan` = `tb_perusahaan`.`id`
             JOIN `tb_negara` ON `tb_cpmi`.`negara_penempatan` = `tb_negara`.`id` 
             WHERE `perusahaan`='$perusahaan' AND `negara_penempatan` = '$negara'
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

    public function getTotalCPMI_byNegara($perusahaan, $negara)
    {
        $data = $this->db->query("SELECT COUNT(id) as cpmi FROM tb_cpmi WHERE negara_penempatan='$negara' AND perusahaan = '$perusahaan'");
        return $data->result();
    }

    public function getTotalPMIB()
    {
        $data = $this->db->query("SELECT COUNT(id) as pmib FROM tb_pmi ");
        return $data->result();
    }

    // laporan AN PMI 
    public function get_taiwan_lk()
    {
        $data = $this->db->query("SELECT COUNT(tb_cpmi.id) as taiwan_lk FROM tb_cpmi JOIN tb_perusahaan ON tb_cpmi.perusahaan= tb_perusahaan.id WHERE negara_penempatan='254' AND jenis_kelamin='L' AND tb_cpmi.perusahaan=tb_perusahaan.id");
        return $data->result();
    }
    public function get_taiwan_pr()
    {
        $data = $this->db->query("SELECT COUNT(id) as taiwan_pr FROM tb_cpmi WHERE negara_penempatan='254' AND jenis_kelamin='P'");
        return $data->result();
    }

    public function get_hongkong_lk()
    {
        $data = $this->db->query("SELECT COUNT(id) as hongkong_lk FROM tb_cpmi WHERE negara_penempatan='252' AND jenis_kelamin='L'");
        return $data->result();
    }
    public function get_hongkong_pr()
    {
        $data = $this->db->query("SELECT COUNT(id) as hongkong_pr FROM tb_cpmi WHERE negara_penempatan='252' AND jenis_kelamin='P'");
        return $data->result();
    }

    public function get_sin_lk()
    {
        $data = $this->db->query("SELECT COUNT(tb_cpmi.id) as sin_lk FROM tb_cpmi JOIN tb_perusahaan ON tb_cpmi.perusahaan= tb_perusahaan.id WHERE negara_penempatan='249' AND jenis_kelamin='L' AND tb_cpmi.perusahaan=tb_perusahaan.id");
        return $data->result();
    }
    public function get_sin_pr()
    {
        $data = $this->db->query("SELECT COUNT(id) as sin_pr FROM tb_cpmi WHERE negara_penempatan='249' AND jenis_kelamin='P'");
        return $data->result();
    }

    public function get_may_lk()
    {
        $data = $this->db->query("SELECT COUNT(id) as may_lk FROM tb_cpmi WHERE negara_penempatan='248' AND jenis_kelamin='L'");
        return $data->result();
    }
    public function get_may_pr()
    {
        $data = $this->db->query("SELECT COUNT(id) as may_pr FROM tb_cpmi WHERE negara_penempatan='248' AND jenis_kelamin='P'");
        return $data->result();
    }
}
