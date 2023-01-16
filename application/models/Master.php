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

    public function getAkses()
    {
        $query = "SELECT *  FROM `user_role` 
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

    public function getSektor()
    {
        $query = "SELECT * FROM jenis_sektor_usaha ORDER BY `id_sektor` ASC";
        return $this->db->query($query)->result_array();
    }

    public function getSektorById($id)
    {
        $query = "SELECT * FROM jenis_sektor_usaha WHERE jenis_sektor_usaha.id_sektor = '$id'
                ";
        return $this->db->query($query)->row();
    }

    public function getSubMenuJoinMenu()
    {
        $query = "SELECT  `user_sub_menu`. *, `user_menu`.`menu`
                 FROM `user_sub_menu` JOIN `user_menu`
                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                ";
        return $this->db->query($query)->row();
    }

    public function getSubMenuById($id)
    {
        $query = "SELECT * FROM user_sub_menu WHERE id='$id'
                ";
        return $this->db->query($query)->row();
    }

    public function getMenuById($id)
    {
        $query = "SELECT * FROM user_menu WHERE id='$id'
                ";
        return $this->db->query($query)->row();
    }

    // query ambil id Perusahaan
    public function getPerusahaanById($id)
    {
        $query = "SELECT * FROM tb_perusahaan WHERE tb_perusahaan.id = '$id'
                ";
        return $this->db->query($query)->row();
    }



    // query data PMI
    public function getPmiJoinWilayah($where = "")
    {

        if (isset($_POST['filter'])) {
            $post = $this->input->post();
            $tawal = $post['tawal'];
            $aw = date_create($tawal);
            $wal = date_format($aw, 'Y-m-d');

            $takhir = $post['takhir'];
            $akh = date_create($takhir);
            $hir = date_format($akh, 'Y-m-d');
            $query =
                "SELECT `tb_pmi`.*, `provinsi`. `nama_provinsi`, `kabupaten`. `nama_kabupaten`
                , `kecamatan`. `nama_kecamatan`, `kelurahan`. `nama_kelurahan`, `tb_negara`. *
                    FROM `tb_pmi` JOIN `provinsi`
                    ON `tb_pmi`. `provinsi` = `provinsi`. `id_provinsi`
                    JOIN `kabupaten`
                    ON `tb_pmi`. `kabupaten` = `kabupaten`. `id_kabupaten`
                    JOIN `tb_negara`
                    ON `tb_pmi`. `negara_bekerja` = `tb_negara`. `id_negara`
                    JOIN `kecamatan`
                    ON `tb_pmi`. `kecamatan` = `kecamatan`. `id_kecamatan`
                    JOIN `kelurahan`
                    ON `tb_pmi`. `desa` = `kelurahan`. `id_kelurahan` 
                    WHERE `date_created` 
                    BETWEEN '$wal' AND '$hir' ORDER BY `date_created` DESC
                ";
            return $this->db->query($query)->result_array();
        } else {



            // $query =
            //     "SELECT `tb_pmi`.*, `provinsi`. `nama_provinsi`, `kabupaten`. `nama_kabupaten`
            //     , `kecamatan`. `nama_kecamatan`, `kelurahan`. `nama_kelurahan`,`tb_negara`. *
            //         FROM `tb_pmi` JOIN `provinsi`
            //         ON `tb_pmi`. `provinsi` = `provinsi`. `id_provinsi`
            //         JOIN `kabupaten`
            //         ON `tb_pmi`. `kabupaten` = `kabupaten`. `id_kabupaten`
            //         JOIN `tb_negara`
            //         ON `tb_pmi`. `negara_bekerja` = `tb_negara`. `id_negara`
            //         -- JOIN `kecamatan`
            //         -- ON `tb_pmi`. `kecamatan` = `kecamatan`. `id_kecamatan`
            //         -- JOIN `kelurahan`
            //         -- ON `tb_pmi`. `desa` = `kelurahan`. `id_kelurahan` 
            //         ORDER BY `date_created` DESC
            //     ";
            // return $this->db->query($query)->result_array();

            $CI = &get_instance();
            $this->CI = $CI;
            $this->db = $CI->db;
            $this->db->select('tb_pmi.*, provinsi.nama_provinsi, kabupaten.nama_kabupaten, tb_negara.*');
            $this->db->from('tb_pmi');
            $this->db->join('provinsi', 'tb_pmi.provinsi = provinsi.id_provinsi');
            $this->db->join('kabupaten', 'tb_pmi.kabupaten = kabupaten.id_kabupaten');
            $this->db->join('tb_negara', 'tb_pmi.negara_bekerja = tb_negara.id_negara');
            if ($where != "") {
                $this->db->where($where);
            }
            $this->db->order_by('date_created', 'DESC');
            return $query = $this->db->get()->result_array();
        }
    }

    public function get_filter($negara)
    {

        if (isset($_POST['filter'])) {
            $post = $this->input->post();
            $tawal = $post['tawal'];
            $aw = date_create($tawal);
            $wal = date_format($aw, 'Y-m-d');

            $takhir = $post['takhir'];
            $akh = date_create($takhir);
            $hir = date_format($akh, 'Y-m-d');
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
                    WHERE `negara_bekerja` = '$negara' AND `date_created` 
                    BETWEEN '$wal' AND '$hir' ORDER BY `date_created` DESC
                ";
            return $this->db->query($query)->result_array();
        } else {



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
                    ON `tb_pmi`. `desa` = `kelurahan`. `id_kelurahan`  ORDER BY `date_created` DESC
                ";
            return $this->db->query($query)->result_array();
        }
    }


    public function getPmi_per_negara($negara, $tahun)
    {
        $thn = explode('-', $tahun);
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
                    WHERE `negara_bekerja` = '$negara' AND YEAR(date_created) = '$thn[0]' AND MONTH(date_created) = '$thn[1]' ORDER BY `date_created` DESC
                ";
        return $this->db->query($query)->result_array();
    }



    // query ambil id PMIgetPmiJoinWilayah
    public function getPmiById($id)
    {
        $query = "SELECT tb_pmi. * ,tb_negara.*,  kabupaten.nama_kabupaten,kecamatan.nama_kecamatan, kelurahan.nama_kelurahan
        FROM tb_pmi 
        JOIN kabupaten ON tb_pmi.kabupaten = kabupaten.id_kabupaten 
        JOIN tb_negara ON tb_pmi.negara_bekerja = tb_negara.id_negara 
        JOIN kecamatan ON tb_pmi.kecamatan = kecamatan.id_kecamatan 
        JOIN kelurahan ON tb_pmi.desa = kelurahan.id_kelurahan 
        WHERE tb_pmi.id='$id'
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

    public function get_PMI()
    {
        $query = "SELECT * FROM tb_pmi
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

    public function get_tb_phk()
    {
        $query = "SELECT  tb_phk . * , tb_phk.nama_tk , tb_phk.wilayah, tb_phk.status_kerja, 
       tb_phk.disabilitas, tb_phk.date_created, tb_perusahaan.nama_perusahaan, kabupaten.nama_kabupaten
        FROM tb_phk
        JOIN kabupaten ON tb_phk.wilayah = kabupaten.id_kabupaten 
        JOIN tb_perusahaan ON tb_phk.perusahaan = tb_perusahaan.id 
       
        ORDER BY date_created DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_phkById($id)
    {
        $query = "SELECT tb_phk . * , tb_perusahaan . * FROM tb_phk 
        JOIN tb_perusahaan ON tb_phk.perusahaan = tb_perusahaan.id
        WHERE tb_phk.id_phk = '$id'
                ";
        return $this->db->query($query)->row();
    }

    public function tabel()
    {
        $query =
            "SELECT * FROM kabupaten WHERE id_provinsi= '42385' ORDER BY nama_kabupaten ASC
        ";

        return $this->db->query($query)->result_array();
    }
}
