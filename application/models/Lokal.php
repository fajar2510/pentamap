<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Lokal extends CI_Model
{
    public function get_aktif($where = "")
    {
        $CI = &get_instance();
        $this->CI = $CI;
        $this->db = $CI->db;

        $this->db->select('tb_phk.*,tb_phk.nama_tk , tb_phk.wilayah, tb_phk.status_kerja, tb_phk.disabilitas, tb_phk.date_created, tb_perusahaan.nama_perusahaan, kabupaten.nama_kabupaten');
        $this->db->from('tb_phk');
        $this->db->join('kabupaten', 'tb_phk.wilayah = kabupaten.id_kabupaten');
        $this->db->join('tb_perusahaan', 'tb_phk.perusahaan = tb_perusahaan.id');
        $this->db->where('tb_phk.status_kerja', 'aktif');
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->order_by('date_created', 'DESC');
        return $query = $this->db->get()->result_array();
    }

    public function get_phk($where = "")
    {
        $CI = &get_instance();
        $this->CI = $CI;
        $this->db = $CI->db;

        $this->db->select('tb_phk.*,tb_phk.nama_tk , tb_phk.wilayah, tb_phk.status_kerja, tb_phk.disabilitas, tb_phk.date_created, tb_perusahaan.nama_perusahaan, kabupaten.nama_kabupaten');
        $this->db->from('tb_phk');
        $this->db->join('kabupaten', 'tb_phk.wilayah = kabupaten.id_kabupaten');
        $this->db->join('tb_perusahaan', 'tb_phk.perusahaan = tb_perusahaan.id');
        $this->db->where('tb_phk.status_kerja', 'phk');
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->order_by('date_created', 'DESC');
        return $query = $this->db->get()->result_array();
    }

    public function import_data($data_phk)
    {
        $jumlah =  count($data_phk);
        if ($jumlah > 0) {
            $this->db->replace('tb_phk', $data_phk);
        }
    }
    public function get_namaperusahaan()
    {
        $query = "SELECT * FROM tb_perusahaan ORDER BY nama_perusahaan  ASC";
        return $this->db->query($query)->result_array();
    }
    
}
