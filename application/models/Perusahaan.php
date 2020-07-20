<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Model
{
    public function get_pptkis()
    {
        $query =
            "SELECT `tb_pptkis`.*, `tb_perusahaan`. `nama_perusahaan`, `tb_perusahaan`. `alamat`,`tb_perusahaan`. `status`
                    -- `kabupaten`.`nama_kabupaten`,`tb_tka`.`sektor`
                    FROM `tb_pptkis` JOIN `tb_perusahaan`
                    ON `tb_pptkis`. `nama_pptkis` = `tb_perusahaan`. `id`
                    -- JOIN `kabupaten`
                    -- ON `tb_pptkis`.`jatim` = `kabupaten`. `id_kabupaten`
                    -- JOIN `tb_tka`
                    -- ON `tb_pptkis`.`informal` = `tb_tka`. `id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_perusahaan()
    {
        $query = "SELECT * FROM tb_perusahaan";
        return $this->db->query($query)->result_array();
    }

    public function get_NegaraAll()
    {
        $query = "SELECT * FROM negara_all";
        return $this->db->query($query)->result_array();
    }

    public function get_Jatim()
    {
        $query = "SELECT * FROM `kabupaten` WHERE id_provinsi = '42385'";
        return $this->db->query($query)->result_array();
    }


    public function get_TkaPerusahaan()
    {
        $query =
            "SELECT `tb_tka`.*, `tb_perusahaan`. `nama_perusahaan`, `tb_perusahaan`. `alamat`,
                    `negara_all`.`country_code`, `negara_all`.`country_name`,
                    `kabupaten`.`nama_kabupaten`
                    FROM `tb_tka` JOIN `tb_perusahaan`
                    ON `tb_tka`. `nama_perusahaan` = `tb_perusahaan`. `id`
                    JOIN `negara_all`
                    ON `tb_tka`. `kewarganegaraan` = `negara_all`. `id`
                    JOIN `kabupaten`
                    ON `tb_tka`. `lokasi_kerja` = `kabupaten`. `id_kabupaten`
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
