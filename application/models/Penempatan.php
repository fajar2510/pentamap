<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penempatan extends CI_Model
{

    public function getnegarapmi()
    {
        $this->db->select('DISTINCT(id_negara), nama_negara' );
        $this->db->from('tb_negara');
        // $this->db->distinct('id_negara');
        $this->db->join('tb_pmi', 'negara_bekerja=id_negara', 'RIGHT');
        $query = $this->db->get()->result();
        return $query;
    }

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
            "SELECT  `tb_cpmi`.*, 
            `tb_negara`.`nama_negara`, `kabupaten`.`nama_kabupaten`
            FROM `tb_cpmi` 
            -- JOIN `tb_perusahaan` ON `tb_cpmi`.`perusahaan` = `tb_perusahaan`.`id` 
            JOIN `tb_negara` ON `tb_cpmi`.`negara_penempatan` = `tb_negara`.`id_negara` 
             JOIN `kabupaten` ON `tb_cpmi`.`wilayah` = `kabupaten`.`id_kabupaten` 
            
         ";
        return $this->db->query($query)->result_array();
    }

    public function get_edit_cpmi($id)
    {
        $query = "SELECT `tb_cpmi`.*, `kabupaten`.`nama_kabupaten`
                    FROM `tb_cpmi` 
                    JOIN `kabupaten` ON `tb_cpmi`.`wilayah` = `kabupaten`.`id_kabupaten` 
                    WHERE `tb_cpmi` .`id`= '$id'
                ";
        return $this->db->query($query)->row();
    }
    // public function get_distinct_cpmi()
    // {
    //     $query =
    //         "SELECT DISTINCT   tb_perusahaan.nama_perusahaan, tb_perusahaan.status
    //         FROM tb_cpmi 
    //         INNER JOIN tb_perusahaan
    //         ON tb_cpmi.perusahaan = tb_perusahaan.id
    //         INNER JOIN tb_negara
    //         ON tb_cpmi.negara_penempatan = tb_negara.id
    //         ORDER BY tb_cpmi.negara_penempatan ASC";
    //     return $this->db->query($query)->result_array();
    // }

    public function get_Jatim()
    {
        $query = "SELECT * FROM `kabupaten` WHERE id_provinsi = '42385'";
        return $this->db->query($query)->result_array();
    }

    public function get_lap_pppmi()
    {
        $query =

            "SELECT nama_perusahaan,status,negara_penempatan,nama_negara, 
        COUNT(CASE jenis_kelamin WHEN 'L' THEN 1 END) AS total_lk, 
        COUNT(CASE jenis_kelamin WHEN 'P' THEN 1 END) AS total_pr, 
        COUNT(CASE jabatan WHEN 'FORMAL' THEN 1 END) AS total_formal, 
        COUNT(CASE jabatan WHEN 'INFORMAL' THEN 1 END) AS total_informal , 
        COUNT(*) as 'total' FROM tb_cpmi JOIN tb_perusahaan ON perusahaan = tb_perusahaan.id 
        JOIN tb_negara ON negara_penempatan = tb_negara.id_negara 
        JOIN kabupaten ON wilayah = kabupaten.id_kabupaten 
        WHERE negara_penempatan = tb_negara.id_negara 
        GROUP BY perusahaan,negara_penempatan";
        //     "SELECT nama_perusahaan,status,negara_penempatan,nama_kabupaten, 
        // COUNT(CASE jenis_kelamin WHEN 'L' THEN 1 END) AS total_lk, 
        // COUNT(CASE jenis_kelamin WHEN 'P' THEN 1 END) AS total_pr, 
        // COUNT(CASE jabatan WHEN 'FORMAL' THEN 1 END) AS total_formal, 
        // COUNT(CASE jabatan WHEN 'INFORMAL' THEN 1 END) AS total_informal 
        // FROM tb_cpmi JOIN tb_perusahaan ON perusahaan = tb_perusahaan.id 
        // JOIN tb_negara ON negara_penempatan = tb_negara.id 
        // JOIN kabupaten ON wilayah = kabupaten.id_kabupaten
        // GROUP BY perusahaan,negara_penempatan,wilayah";
        //     "SELECT perusahaan,negara_penempatan,jenis_kelamin,nama_perusahaan,status,nama_negara,jabatan,wilayah,COUNT(*) AS total 
        // FROM tb_cpmi JOIN tb_perusahaan ON perusahaan=tb_perusahaan.id 
        // JOIN tb_negara ON negara_penempatan=tb_negara.id 
        // GROUP BY perusahaan,negara_penempatan,jenis_kelamin,jabatan,wilayah";
        // bisa bisa
        // SELECT nama_perusahaan,status,negara_penempatan, 
        // COUNT(CASE jenis_kelamin WHEN 'L' THEN 1 END) AS total_lk, 
        // COUNT(CASE jenis_kelamin WHEN 'P' THEN 1 END) AS total_pr, 
        // COUNT(CASE jabatan WHEN 'FORMAL' THEN 1 END) AS total_formal, 
        // COUNT(CASE jabatan WHEN 'INFORMAL' THEN 1 END) AS total_informal 
        // FROM tb_cpmi JOIN tb_perusahaan ON perusahaan = tb_perusahaan.id J
        // OIN tb_negara ON negara_penempatan = tb_negara.id 
        // JOIN kabupaten ON wilayah = kabupaten.id_kabupaten 
        // WHERE negara_penempatan = '254'
        return $this->db->query($query)->result_array();
    }

    public function get_data_hongkong()
    {
        $query = "  SELECT DISTINCT nama_perusahaan,status,negara_penempatan, 
         COUNT(CASE jenis_kelamin WHEN 'L' THEN 1 END) AS total_lk, 
         COUNT(CASE jenis_kelamin WHEN 'P' THEN 1 END) AS total_pr, 
         COUNT(CASE jabatan WHEN 'FORMAL' THEN 1 END) AS total_formal, 
         COUNT(CASE jabatan WHEN 'INFORMAL' THEN 1 END) AS total_informal 
         FROM tb_cpmi JOIN tb_perusahaan ON perusahaan = tb_perusahaan.id 
         JOIN tb_negara ON negara_penempatan = tb_negara.id_negara 
         JOIN kabupaten ON wilayah = kabupaten.id_kabupaten 
         WHERE negara_penempatan = '254'  GROUP BY perusahaan";
        return $this->db->query($query)->result_array();
    }

    public function get_data_sin()
    {
        $query = "  SELECT DISTINCT nama_perusahaan,status,negara_penempatan, 
         COUNT(CASE jenis_kelamin WHEN 'L' THEN 1 END) AS total_lk, 
         COUNT(CASE jenis_kelamin WHEN 'P' THEN 1 END) AS total_pr, 
         COUNT(CASE jabatan WHEN 'FORMAL' THEN 1 END) AS total_formal, 
         COUNT(CASE jabatan WHEN 'INFORMAL' THEN 1 END) AS total_informal 
         FROM tb_cpmi JOIN tb_perusahaan ON perusahaan = tb_perusahaan.id 
         JOIN tb_negara ON negara_penempatan = tb_negara.id_negara 
         JOIN kabupaten ON wilayah = kabupaten.id_kabupaten 
         WHERE negara_penempatan = '249' GROUP BY perusahaan";
        return $this->db->query($query)->result_array();
    }

    public function get_pdf_cpmi($perusahaan, $negara, $date)
    {
        $bln = explode('-', $date);
        $query =
            "SELECT   `tb_cpmi`.*,  `tb_perusahaan`.`nama_perusahaan`, `tb_perusahaan`.`fungsi`,
            `tb_negara`.`nama_negara`, `kabupaten`.`nama_kabupaten`
            FROM `tb_cpmi` 
            JOIN `tb_perusahaan` ON `tb_cpmi`.`perusahaan` = `tb_perusahaan`.`id`
             JOIN `tb_negara` ON `tb_cpmi`.`negara_penempatan` = `tb_negara`.`id_negara`
              JOIN `kabupaten` ON `tb_cpmi`.`wilayah` = `kabupaten`.`id_kabupaten` 

             WHERE `perusahaan`='$perusahaan' AND `negara_penempatan` = '$negara' AND 
             MONTH(tb_cpmi.date_created) = '$bln[1]' ORDER BY `tb_cpmi`.`date_created` DESC 
            ";
        return $this->db->query($query)->result_array();
    }

   

    // public function get_perusahaan()
    // {
    //     $query =
    //         "SELECT `nama_perusahaan`,`status` FROM `tb_perusahaan` WHERE `fungsi`='PMI'";
    //     return $this->db->query($query)->result_array();
    // }

    // public function get_perusahaanPMI()
    // {
    //     $query =
    //         "SELECT * FROM tb_perusahaan WHERE fungsi= 'PMI'
    //     ";
    //     return $this->db->query($query)->result_array();
    // }


    // public function getTotFormalByPenempatan()
    // {
    //     $data = $this->db->query("SELECT COUNT(id) as formal FROM tb_pptkis WHERE  nama_pptkis='1' ");
    //     return $data->result();
    // }


    public function getTotalTKA($wilayah = null)
    {
        $data = $this->db->query("SELECT COUNT(id) as tka FROM tb_tka ");
        return $data->result();
    }

    public function getTotalCPMI($wilayah = null)
    {
        $data = $this->db->query("SELECT COUNT(id) as cpmi FROM tb_cpmi ");
        return $data->result();
    }

    public function getTotalCPMI_byNegara($perusahaan, $negara)
    {

        $data = $this->db->query("SELECT COUNT(id) as cpmi FROM tb_cpmi ");
        return $data->result();
    }

    public function getTotalPMIB($wilayah = null)
    {
        $data = $this->db->query("SELECT COUNT(id) as pmib FROM tb_pmi ");
        return $data->result();
    }

    public function getTotalPHK($wilayah = null)
    {
        $data = $this->db->query("SELECT COUNT(id_phk) as phk FROM tb_phk WHERE status_kerja='phk' ");
        return $data->result();
    }

    public function getjumlahtahunphk($tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->where('status_kerja', 'phk');
        $this->db->where('YEAR(date_created)',$tahun);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getjumlahtahunpmib($tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_pmi');
        $this->db->where('YEAR(date_created)',$tahun);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getjumlahtahuntka($tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_tka');
        $this->db->where('YEAR(date_created)',$tahun);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getjumlahtahuncpmi($tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_cpmi');
        $this->db->where('YEAR(date_created)',$tahun);
        $query = $this->db->get();
        return $query->num_rows();
    }

    // public function getpresentasePHK($wilayah)
    // {
    //     $data = $this->db->query("SELECT COUNT(id_phk) as phk FROM tb_phk WHERE status_kerja='phk' 
    //     AND wilayah='$wilayah' ");
    //     return $data->result();
    // }

    // public function getpresentasePMIB($wilayah = null)
    // {
    //     $data = $this->db->query("SELECT COUNT(id) as pmib FROM tb_pmi 
    //     WHERE kabupaten='$wilayah' ");
    //     return $data->result();
    // }

    // public function getpresentaseCPMI($wilayah = null)
    // {
    //     $data = $this->db->query("SELECT COUNT(id) as cpmi FROM tb_cpmi
    //     WHERE wilayah='$wilayah' ");
    //     return $data->result();
    // }

    // public function getpresentaseTKA($wilayah = null)
    // {
    //     $data = $this->db->query("SELECT COUNT(id) as tka FROM tb_tka
    //     WHERE lokasi_kerja='$wilayah' ");
    //     return $data->result();
    // }

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


    public function get_PPPMIByMonthYear($date)
    {
        $bln = explode('/', $date);
        $query =
            "SELECT tb_cpmi.perusahaan, tb_cpmi.date_created, tb_perusahaan.nama_perusahaan, tb_perusahaan.status, 
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='254' THEN 1 ELSE 0 END) as lt,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='252' THEN 1 ELSE 0 END) as lh,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='249' THEN 1 ELSE 0 END) as ls,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='248' THEN 1 ELSE 0 END) as lm,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='250' THEN 1 ELSE 0 END) as lb,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='254' THEN 1 ELSE 0 END) as pt,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='252' THEN 1 ELSE 0 END) as ph,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='249' THEN 1 ELSE 0 END) as ps,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='248' THEN 1 ELSE 0 END) as pm,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='250' THEN 1 ELSE 0 END) as pb,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan!='254' AND '252' AND '249' AND '248' AND '250' THEN 1 ELSE 0 END) as ll,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan!='254' AND '252' AND '249' AND '248' AND '250' THEN 1 ELSE 0 END) as lp,
                                SUM(CASE WHEN jenis_kelamin='L' AND jabatan='FORMAL' THEN 1 ELSE 0 END) as formal,
                                SUM(CASE WHEN jenis_kelamin='P' AND jabatan='INFORMAL' THEN 1 ELSE 0 END) as informal,
                                SUM(CASE WHEN wilayah!='42385' THEN 1 ELSE 0 END) as ljatim,
                                SUM(CASE WHEN wilayah='42385' THEN 1 ELSE 0 END) as jatim,
                                SUM(CASE WHEN jenis_kelamin='L' THEN 1 ELSE 0 END) as lta,
                                SUM(CASE WHEN jenis_kelamin='P' THEN 1 ELSE 0 END) as pta,
                                COUNT(perusahaan) as total 
                                FROM tb_cpmi 
                                JOIN tb_perusahaan ON tb_cpmi.perusahaan = tb_perusahaan.id 
                                WHERE MONTH(tb_cpmi.date_created) = '$bln[0]' AND YEAR(tb_cpmi.date_created) = '$bln[2]'
                                GROUP BY perusahaan";
        return $this->db->query($query)->result_array();
    }

    public function data_an()
    {
        $data = $this->db->query("SELECT tb_cpmi.perusahaan, tb_perusahaan.nama_perusahaan, tb_perusahaan.status, 
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='254' THEN 1 ELSE 0 END) as lt,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='252' THEN 1 ELSE 0 END) as lh,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='249' THEN 1 ELSE 0 END) as ls,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='248' THEN 1 ELSE 0 END) as lm,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan='250' THEN 1 ELSE 0 END) as lb,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='254' THEN 1 ELSE 0 END) as pt,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='252' THEN 1 ELSE 0 END) as ph,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='249' THEN 1 ELSE 0 END) as ps,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='248' THEN 1 ELSE 0 END) as pm,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan='250' THEN 1 ELSE 0 END) as pb,
                                SUM(CASE WHEN jenis_kelamin='L' AND negara_penempatan!='254' AND '252' AND '249' AND '248' AND '250' THEN 1 ELSE 0 END) as ll,
                                SUM(CASE WHEN jenis_kelamin='P' AND negara_penempatan!='254' AND '252' AND '249' AND '248' AND '250' THEN 1 ELSE 0 END) as lp,
                                SUM(CASE WHEN jenis_kelamin='L' AND jabatan='FORMAL' THEN 1 ELSE 0 END) as formal,
                                SUM(CASE WHEN jenis_kelamin='P' AND jabatan='INFORMAL' THEN 1 ELSE 0 END) as informal,
                                SUM(CASE WHEN wilayah!='42385' THEN 1 ELSE 0 END) as ljatim,
                                SUM(CASE WHEN wilayah='42385' THEN 1 ELSE 0 END) as jatim,
                                SUM(CASE WHEN jenis_kelamin='L' THEN 1 ELSE 0 END) as lta,
                                SUM(CASE WHEN jenis_kelamin='P' THEN 1 ELSE 0 END) as pta,
                                COUNT(perusahaan) as total 
                                FROM tb_cpmi JOIN tb_perusahaan ON tb_cpmi.perusahaan = tb_perusahaan.id 
                                GROUP BY perusahaan");
        return $data->result();
    }
}
