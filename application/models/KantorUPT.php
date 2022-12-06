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
        // $this->db->select('*');
        // $this->db->select('nama_kabupaten');
        // $this->db->select('upt_id');
        // $this->db->select('nama_upt');
        // $this->db->select('ket_upt');
        // $this->db->from('kabupaten');
        // $this->db->join('kantor_upt','kabupaten.upt_id = kantor_upt.id_upt');
        // $this->db->where('kabupaten.id_provinsi', '42385');
        // return $this->db->get()->row();
    }

    // mengambil data detail berdasarkan id lokasi UPT
    public function edit_upt($id_upt)
    {
        $this->db->select('*');
        $this->db->from('kantor_upt');
        $this->db->join('kabupaten','kantor_upt.kabupaten_id = kabupaten.id_kabupaten');
        $this->db->where('kantor_upt.id_upt', $id_upt);
        return $this->db->get()->row();
    }
}