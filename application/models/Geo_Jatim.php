<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Geo_Jatim extends CI_Model
{
    public function get_GeoJatim()
    {
        $query = "SELECT * FROM `kabupaten` WHERE id_provinsi = '42385' 
        ORDER BY `nama_kabupaten` ASC ";
            return $this->db->query($query)->result_array();
    }
}