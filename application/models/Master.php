<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Model
{
    // query join user dan user_role untuk autentifikasi login
    public function getRole()
    {
        $query = "SELECT `user`.*, `user_role`. `role`
                    FROM `user` JOIN `user_role`
                    ON `user`. `role_id` = `user_role`. `id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM user WHERE id='$id'
                ";
        return $this->db->query($query)->row();
    }

    public function getRoleById($id)
    {
        $query = "SELECT * FROM user_role WHERE id='$id'
                ";
        return $this->db->query($query)->row();
    }

    // query ambil id Perusahaan
    public function getPerusahaanById($id)
    {
        $query = "SELECT * FROM tb_perusahaan WHERE id='$id'
                ";
        return $this->db->query($query)->row();
    }

    // query data PMI
    public function getPmiJoinWilayah()
    {
        $query =
            "SELECT `tb_pmi`.*, `provinsi`. `nama_provinsi`, `kabupaten`. `nama_kabupaten`
                , `kecamatan`. `nama_kecamatan`, `kelurahan`. `nama_kelurahan`
                    FROM `tb_pmi` JOIN `provinsi`
                    ON `tb_pmi`. `provinsi` = `provinsi`. `id_provinsi`
                    JOIN `kabupaten`
                    ON `tb_pmi`. `kabupaten` = `kabupaten`. `id_kabupaten`
                    JOIN `kecamatan`
                    ON `tb_pmi`. `kecamatan` = `kecamatan`. `id_kecamatan`
                    JOIN `kelurahan`
                    ON `tb_pmi`. `desa` = `kelurahan`. `id_kelurahan`
                ";
        return $this->db->query($query)->result_array();
    }

    // query ambil id PMI
    public function getPmiById($id)
    {
        $query = "SELECT * FROM tb_pmi WHERE id='$id'
                ";
        return $this->db->query($query)->row();
    }

    //query data Chainded Wilayah Prov, Kab, Kec, Kelurahan Indonesia
    public function getW_Prov()
    {
        $query = "SELECT * FROM wilayah_provinsi
                ";
        return $this->db->query($query)->result_array();
    }

    public function getW_Kab()
    {
        $query = "SELECT * FROM wilayah_kabupaten
                ";
        return $this->db->query($query)->result_array();
    }

    public function getW_Kec()
    {
        $query = "SELECT * FROM wilayah_kecamatan
                ";
        return $this->db->query($query)->result_array();
    }

    public function getW_Desa()
    {
        $query = "SELECT * FROM wilayah_desa
                ";
        return $this->db->query($query)->result_array();
    }

    //query data negara yang terdaftar(statis)
    public function get_Negara()
    {
        $query = "SELECT * FROM tb_negara
                ";
        return $this->db->query($query)->result_array();
    }
}
