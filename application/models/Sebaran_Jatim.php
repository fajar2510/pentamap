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
        $this->db->join('tb_negara','tb_cpmi.negara_penempatan = tb_negara.id_negara');
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
        $this->db->select(' *');
        $this->db->from('tb_tka');
        $this->db->join('kabupaten','tb_tka.lokasi_kerja = kabupaten.id_kabupaten');
        $this->db->join('tb_negara','tb_tka.kewarganegaraan = tb_negara.id_negara');
        return $this->db->get()->result();

        // $query =  $this->db->query
        //         ("SELECT `tb_tka`.*, `tb_perusahaan`.`nama_perusahaan`, `tb_perusahaan`.`status`, `tb_perusahaan`.`alamat`,
        //                 `kabupaten`.*, `tb_negara`. `nama_negara`
        //                     FROM `tb_tka` 
        //                     JOIN `tb_perusahaan` ON `tb_tka`.`id_perusahaan` = `tb_perusahaan`.`id`
        //                     JOIN `kabupaten` ON `tb_tka`.`lokasi_kerja` = `kabupaten`.`id_kabupaten`
        //                     JOIN `tb_negara` ON `tb_tka`.`kewarganegaraan` = `tb_negara`.`id`
        //                 ");
        // return $query->result();
    }

    

    public function get_sebaran_phk()
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->join('tb_perusahaan','tb_phk.nama_perusahaan = tb_perusahaan.id');
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

    // mengambil data detail berdasarkan id lokasi TKA
    public function detail_tka($id_lokasi)
    {
        $this->db->select('*');
        $this->db->from('tb_tka');
        $this->db->join('kabupaten','tb_tka.lokasi_kerja = kabupaten.id_kabupaten');
        $this->db->join('tb_negara','tb_tka.kewarganegaraan = tb_negara.id_negara');
        $this->db->where('tb_tka.id', $id_lokasi);
        return $this->db->get()->row();
    }
    
}
