 <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Chain_model extends CI_Model
    {
        public function get_provinsi()
        {
            $this->db->order_by('nama_provinsi', 'asc');
            return $this->db->get('wilayah_provinsi')->result();
        }
        public function get_kabupaten()
        {
            // kita joinkan tabel kota dengan provinsi
            $this->db->order_by('nama_kabupaten', 'asc');
            $this->db->join('wilayah_provinsi', 'wilayah_kabupaten.provinsi_id = wilayah_provinsi.id');
            return $this->db->get('wilayah_kabupaten')->result();
        }
        public function get_kecamatan()
        {
            // kita joinkan tabel kecamatan dengan kota
            $this->db->order_by('nama_kecamatan', 'asc');
            $this->db->join('wilayah_kabupaten', 'wilayah_kecamatan.kabupaten_id = wilayah_kabupaten.id');
            return $this->db->get('wilayah_kecamatan')->result();
        }
        // untuk edit ambil dari id level paling bawah
        public function get_selected_by_id_kecamatan($id_kecamatan)
        {
            $this->db->where('id', $id_kecamatan);
            $this->db->join('wilayah_kabupaten', 'wilayah_kecamatan.kabupaten_id = wilayah_kabupaten.id');
            $this->db->join('wilayah_provinsi', 'wilayah_kabupaten.provinsi_id = wilayah_provinsi.id');
            return $this->db->get('wilayah_kecamatan')->row();
        }
    }
