<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Sebaran_Jatim extends CI_Model
{
    // public function get_sebaran_lokal()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_phk');
    //     $this->db->join('kabupaten','tb_phk.wilayah = kabupaten.id_kabupaten');
    //     return $this->db->get()->result();
    // }

    public function get_sebaran_cpmi($wilayah = null)
    {
        $this->db->select('*');
        $this->db->from('tb_cpmi');
        $this->db->join('kabupaten','tb_cpmi.wilayah = kabupaten.id_kabupaten');
        $this->db->join('tb_negara','tb_cpmi.negara_penempatan = tb_negara.id_negara');
        if ($wilayah != null) {
            $this->db->where('wilayah',$wilayah);
        }
        return $this->db->get()->result();
    }

    public function get_sebaran_pmib($wilayah = null)
    {
        $this->db->select('*');
        $this->db->from('tb_pmi');
        $this->db->join('kabupaten','tb_pmi.kabupaten = kabupaten.id_kabupaten');
        $this->db->join('tb_negara','tb_pmi.negara_bekerja = tb_negara.id_negara');
        if ($wilayah != null) {
            $this->db->where('kabupaten',$wilayah);
        }
        return $this->db->get()->result();
    }

    public function get_sebaran_tka($wilayah = null)
    {
        $this->db->select(' *');
        $this->db->from('tb_tka');
        $this->db->join('kabupaten','tb_tka.lokasi_kerja = kabupaten.id_kabupaten');
        $this->db->join('tb_negara','tb_tka.kewarganegaraan = tb_negara.id_negara');
        $this->db->join('tb_perusahaan','tb_tka.id_perusahaan = tb_perusahaan.id');
        if ($wilayah != null) {
            $this->db->where('lokasi_kerja',$wilayah);
        }
        return $this->db->get()->result();
    }

    public function get_sebaran_phk($wilayah = null)
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->join('tb_perusahaan','tb_phk.perusahaan = tb_perusahaan.id');
        $this->db->join('kabupaten','tb_phk.wilayah = kabupaten.id_kabupaten');
        if ($wilayah != null) {
            $this->db->where('wilayah',$wilayah);
        }
        $this->db->where('status_kerja','phk');
        return $this->db->get()->result();
    }

    public function get_sebaran_lokal($wilayah = null)
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->join('tb_perusahaan','tb_phk.perusahaan = tb_perusahaan.id');
        $this->db->join('kabupaten','tb_phk.wilayah = kabupaten.id_kabupaten');
        if ($wilayah != null) {
            $this->db->where('wilayah',$wilayah);
        }
        $this->db->where('status_kerja','aktif');
        return $this->db->get()->result();
    }

    public function get_sebaran_disabilitas($wilayah = null)
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->join('tb_perusahaan','tb_phk.perusahaan = tb_perusahaan.id');
        $this->db->join('kabupaten','tb_phk.wilayah = kabupaten.id_kabupaten');
        if ($wilayah != null) {
            $this->db->where('wilayah',$wilayah);
        }
        // $this->db->where('status_kerja','aktif');
        $this->db->where('disabilitas','Y');
        return $this->db->get()->result();
    }
      
    // public function get_sebaran_disabilitas()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_phk');
    //     $this->db->where('disabilitas','Y');
    //     return $this->db->get()->result();
    // }

    // mengambil data detail berdasarkan id lokasi TKA
    public function detail_tka($id_lokasi)
    {
        $this->db->select('tb_tka.*');
        $this->db->select('kabupaten.*');
        $this->db->select('tb_negara.*');
        $this->db->select('tb_perusahaan.nama_perusahaan');
        $this->db->from('tb_tka');
        $this->db->join('kabupaten','tb_tka.lokasi_kerja = kabupaten.id_kabupaten');
        $this->db->join('tb_perusahaan','tb_tka.id_perusahaan = tb_perusahaan.id');
        $this->db->join('tb_negara','tb_tka.kewarganegaraan = tb_negara.id_negara');
        $this->db->where('tb_tka.id', $id_lokasi);
        return $this->db->get()->row();
    }

    // mengambil data detail berdasarkan id lokasi PMIB
    public function detail_pmib($id_lokasi)
    {
        $this->db->select('*');
        $this->db->from('tb_pmi');
        $this->db->join('kabupaten','tb_pmi.kabupaten = kabupaten.id_kabupaten');
        $this->db->join('kecamatan','tb_pmi.kecamatan = kecamatan.id_kecamatan');
        $this->db->join('kelurahan','tb_pmi.desa = kelurahan.id_kelurahan');
        $this->db->join('tb_negara','tb_pmi.negara_bekerja = tb_negara.id_negara');
        $this->db->where('tb_pmi.id', $id_lokasi);
        return $this->db->get()->row();
    }

    // mengambil data detail berdasarkan id lokasi CPMI
    public function detail_cpmi($id_lokasi)
    {
        $this->db->select('*');
        $this->db->from('tb_cpmi');
        $this->db->join('kabupaten','tb_cpmi.wilayah = kabupaten.id_kabupaten');
        $this->db->join('tb_negara','tb_cpmi.negara_penempatan = tb_negara.id_negara');
        $this->db->where('tb_cpmi.id', $id_lokasi);
        return $this->db->get()->row();
    }

    // mengambil data detail berdasarkan id lokasi PHK
    public function detail_phk($id_lokasi)
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->join('kabupaten','tb_phk.wilayah = kabupaten.id_kabupaten');
        $this->db->join('tb_perusahaan','tb_phk.perusahaan = tb_perusahaan.id');
        // $this->db->where('tb_phk.status_kerja', 'phk');
        $this->db->where('tb_phk.id_phk', $id_lokasi);
        return $this->db->get()->row();
    }

    // mengambil data detail berdasarkan id lokasi LOkal
    public function detail_lokal($id_lokasi)
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->join('kabupaten','tb_phk.wilayah = kabupaten.id_kabupaten');
        $this->db->join('tb_perusahaan','tb_phk.perusahaan = tb_perusahaan.id');
        $this->db->where('tb_phk.status_kerja', 'aktif');
        $this->db->where('tb_phk.id_phk', $id_lokasi);
        return $this->db->get()->row();
    }

    // mengambil data detail berdasarkan id lokasi Disabilitas
    public function detail_disabilitas($id_lokasi)
    {
        $this->db->select('*');
        $this->db->from('tb_phk');
        $this->db->join('kabupaten','tb_phk.wilayah = kabupaten.id_kabupaten');
        $this->db->join('tb_perusahaan','tb_phk.perusahaan = tb_perusahaan.id');
        // $this->db->where('tb_phk.status_kerja', 'aktif');
        $this->db->where('tb_phk.disabilitas', 'Y');
        $this->db->where('tb_phk.id_phk', $id_lokasi);
        return $this->db->get()->row();
    }

    //mengabil total cpmi 
    public function detail_kabupaten()
    {

        $data = $this->db->query(
            "SELECT  kabupaten.nama_kabupaten,kabupaten.geojson, kabupaten.warna,  kabupaten.luas_area, 
            kabupaten.kabupaten_lat, kabupaten.kabupaten_long, kabupaten.logo_kab, kabupaten.id_kabupaten, 
            
            COUNT(DISTINCT tb_cpmi.id) AS totalCpmi,
            COUNT(DISTINCT tb_tka.id) AS totalTka , 
            COUNT(DISTINCT tb_pmi.id) AS totalPmib , 
            COUNT(CASE tb_phk.status_kerja WHEN 'phk' THEN 1 END)  AS totalPhk ,
            COUNT(CASE tb_phk.status_kerja WHEN 'aktif' THEN 1 END)  AS totLokal 
            FROM kabupaten 
            LEFT JOIN tb_cpmi ON tb_cpmi.wilayah = kabupaten.id_kabupaten 
            LEFT JOIN tb_tka ON tb_tka.lokasi_kerja = kabupaten.id_kabupaten
            LEFT JOIN tb_pmi ON tb_pmi.kabupaten = kabupaten.id_kabupaten 
            LEFT JOIN tb_phk ON tb_phk.wilayah = kabupaten.id_kabupaten 
            WHERE id_provinsi = '42385' 
            GROUP BY kabupaten.nama_kabupaten;
        ");
        return $data->result_array();
    }

    //mengatasi error pada pengambilan data objek
    public function detail_kabupaten_object()
    {

        $data = $this->db->query(
            "SELECT  kabupaten.nama_kabupaten,kabupaten.geojson, kabupaten.warna,  kabupaten.luas_area, 
            kabupaten.kabupaten_lat, kabupaten.kabupaten_long, kabupaten.logo_kab, kabupaten.id_kabupaten, 
            
            COUNT(DISTINCT tb_cpmi.id) AS totalCpmi,
             COUNT(DISTINCT tb_tka.id) AS totalTka , 
             COUNT(DISTINCT tb_pmi.id) AS totalPmib , 
             COUNT(CASE tb_phk.status_kerja WHEN 'phk' THEN 1 END)  AS totalPhk ,
             COUNT(CASE tb_phk.status_kerja WHEN 'aktif' THEN 1 END)  AS totLokal 
             FROM kabupaten 
             LEFT JOIN tb_cpmi ON tb_cpmi.wilayah = kabupaten.id_kabupaten 
             LEFT JOIN tb_tka ON tb_tka.lokasi_kerja = kabupaten.id_kabupaten
              LEFT JOIN tb_pmi ON tb_pmi.kabupaten = kabupaten.id_kabupaten 
              LEFT JOIN tb_phk ON tb_phk.wilayah = kabupaten.id_kabupaten 
              WHERE id_provinsi = '42385' 
              GROUP BY kabupaten.nama_kabupaten;
         ");
        return $data->result();
    }
    

    
}
