<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class PelatihanModel extends CI_Model
{
    public function get_pelatihan()
    {
        $query = "SELECT  kabupaten.id_kabupaten, kabupaten.id_provinsi, kabupaten.nama_kabupaten, kabupaten.upt_id, kantor_upt.*
                    FROM kantor_upt 
                    JOIN kabupaten
                    ON kantor_upt.kabupaten_id = kabupaten.id_kabupaten
                    WHERE kabupaten.id_provinsi =  '42385'
                    ORDER BY kantor_upt.id_upt ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_latih()
    {
        $this->db->select('*');
        $this->db->from('kabupaten');
        $this->db->join('kantor_upt','kabupaten.upt_id = kantor_upt.id_upt');
        $this->db->where('kabupaten.id_provinsi', '42385');
        return $this->db->get()->row();
    }
}