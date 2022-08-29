<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Sebaran_Jatim extends CI_Model
{
    public function get_sebaran_lokal()
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        return $this->db->get()->result();
    }

    public function get_sebaran_cpmi()
    {
        $this->db->select('*');
        $this->db->from('tb_cpmi');
        return $this->db->get()->result();
    }

    public function get_sebaran_pmib()
    {
        $this->db->select('*');
        $this->db->from('tb_pmi');
        return $this->db->get()->result();
    }

    public function get_sebaran_tka()
    {
        $this->db->select('*');
        $this->db->from('tb_tka');
        return $this->db->get()->result();
    }

    public function get_sebaran_phk()
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
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
