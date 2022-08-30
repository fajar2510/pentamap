<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Sebaran_Jatim extends CI_Model
{
    public function get_sebaran_lokal()
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->join('kabupaten','tb_phk.wilayah = kabupaten.id_kabupaten');
        return $this->db->get()->result();
    }

    public function get_sebaran_cpmi()
    {
        $this->db->select('*');
        $this->db->from('tb_cpmi');
        $this->db->join('kabupaten','tb_cpmi.wilayah = kabupaten.id_kabupaten');
        return $this->db->get()->result();
    }

    public function get_sebaran_pmib()
    {
        $this->db->select('*');
        $this->db->from('tb_pmi');
        $this->db->join('kabupaten','tb_pmi.kabupaten = kabupaten.id_kabupaten');
        return $this->db->get()->result();
    }

    public function get_sebaran_tka()
    {
        $this->db->select('*');
        $this->db->from('tb_tka');
        $this->db->join('kabupaten','tb_tka.lokasi_kerja = kabupaten.id_kabupaten');
        $this->db->join('tb_negara','tb_tka.kewarganegaraan = tb_negara.id');
        return $this->db->get()->result();
    }

    public function get_sebaran_phk()
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->join('kabupaten','tb_phk.wilayah = kabupaten.id_kabupaten');
        $this->db->where('status_kerja','phk');
        return $this->db->get()->result();
    }
      
    public function get_sebaran_disabilitas()
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->where('disabilitas','Y');
        return $this->db->get()->result();
    }
    
}
