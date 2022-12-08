<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class KantorUPT extends CI_Model
{
public function get_upt()

    {
        $query = "SELECT  kantor_upt.*, kabupaten.*
                    FROM kantor_upt 
                    JOIN kabupaten
                    ON kantor_upt.kabupaten_id = kabupaten.id_kabupaten
                    WHERE kabupaten.id_provinsi =  '42385'
                ";
        return $this->db->query($query)->result_array();
    }

    // mengambil data sebaran upt
    public function get_sebaran_upt()
    {
        $this->db->select('*');
        $this->db->from('kantor_upt');
        return $this->db->get()->result();
    }

    // mengambil data detail berdasarkan id lokasi UPT
    public function edit_upt($id)
    {
        $this->db->select('*');
        $this->db->from('kantor_upt');
        $this->db->join('kabupaten','kantor_upt.kabupaten_id = kabupaten.id_kabupaten');
        $this->db->where('kantor_upt.id_upt', $id);
        return $this->db->get()->row();
    }
}