<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Model
{
    public function get_perusahaan_jatim()
    {
        $query =
            "SELECT * FROM tb_perusahaan 
            JOIN kabupaten ON tb_perusahaan.fungsi = kabupaten.id_kabupaten 
            JOIN jenis_sektor_usaha ON tb_perusahaan.sektor_perusahaan = jenis_sektor_usaha.id_sektor 
            ORDER BY tb_perusahaan.id  DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_perusahaan()
    {
        $query = "SELECT * FROM tb_perusahaan ORDER BY nama_perusahaan ASC";
        return $this->db->query($query)->result_array();
    }

    public function get_perusahaanIndex()
    {
        $query = "SELECT * FROM tb_perusahaan ORDER BY date_created  DESC";
        return $this->db->query($query)->result_array();
    }

    public function get_Jatim()
    {
        $query = "SELECT * FROM `kabupaten` WHERE id_provinsi = '42385' 
                   ORDER BY `nama_kabupaten` ASC ";
        return $this->db->query($query)->result_array();
    }

    public function getTkaById($id)
    {
        $query = "SELECT * FROM tb_tka WHERE id='$id'
                ";
        return $this->db->query($query)->row();
    }


    public function get_TkaPerusahaan($where = "")
    {
        // $query =
        //     "SELECT `tb_tka`.*, `tb_perusahaan`.`nama_perusahaan`, `tb_perusahaan`.`status`, `tb_perusahaan`.`alamat`,
        //      `kabupaten`.`nama_kabupaten`, `tb_negara`. `nama_negara`, `tb_negara`.`flag`
        //             FROM `tb_tka` 
        //             JOIN `tb_perusahaan` ON `tb_tka`.`id_perusahaan` = `tb_perusahaan`.`id`
        //             JOIN `kabupaten` ON `tb_tka`.`lokasi_kerja` = `kabupaten`.`id_kabupaten`
        //             JOIN `tb_negara` ON `tb_tka`.`kewarganegaraan` = `tb_negara`.`id_negara`
        //               ORDER BY `date_created` DESC
        //         ";
        // return $this->db->query($query)->result_array();

        $CI = &get_instance();
        $this->CI = $CI;
        $this->db = $CI->db;

        $this->db->select('tb_tka.*, tb_perusahaan.nama_perusahaan, tb_perusahaan.status, tb_perusahaan.alamat,
        kabupaten.nama_kabupaten, tb_negara.nama_negara, tb_negara.flag');
        $this->db->from('tb_tka');
        $this->db->join('tb_perusahaan', 'tb_tka.id_perusahaan = tb_perusahaan.id');
        $this->db->join('kabupaten', 'tb_tka.lokasi_kerja = kabupaten.id_kabupaten');
        $this->db->join('tb_negara', 'tb_tka.kewarganegaraan = tb_negara.id_negara');
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->order_by('date_created', 'DESC');
        return $query = $this->db->get()->result_array();
    }

    public function get_TkaPerusahaanByMonthYear($date)
    {
        $bln = explode('/', $date);
        $query =
            "SELECT `tb_tka`.*, `tb_perusahaan`.`nama_perusahaan`, `tb_perusahaan`.`status`, `tb_perusahaan`.`alamat`,
                  `kabupaten`.`nama_kabupaten`
                    FROM `tb_tka` 
                    JOIN `tb_perusahaan` ON `tb_tka`.`id_perusahaan` = `tb_perusahaan`.`id`
                    JOIN `kabupaten` ON `tb_tka`.`lokasi_kerja` = `kabupaten`.`id_kabupaten`
                    WHERE MONTH(tb_tka.date_created) = '$bln[0]' AND YEAR(tb_tka.date_created) = '$bln[2]'
                      ORDER BY `id_perusahaan` ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_TkaPerusahaanById($id)
    {
        $query =
            "SELECT `tb_tka`.*, `tb_perusahaan`.`nama_perusahaan`, `tb_perusahaan`.`status`, `tb_perusahaan`.`alamat`,
                    `kabupaten`.`nama_kabupaten`, `tb_negara`. `nama_negara`
                    FROM `tb_tka` 
                    JOIN `tb_perusahaan` ON `tb_tka`.`id_perusahaan` = `tb_perusahaan`.`id`
                    JOIN `kabupaten` ON `tb_tka`.`lokasi_kerja` = `kabupaten`.`id_kabupaten`
                    JOIN `tb_negara` ON `tb_tka`.`kewarganegaraan` = `tb_negara`.`id_negara`
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

    public function getTotal_perusahaanByKabupaten()
    {

        $data = $this->db->query("SELECT COUNT(id) as total_perusahaan FROM tb_perusahaan 
        WHERE fungsi='42385' 
         ");
        return $data->result();
    }
}
