<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sektor extends CI_Model
{
    public function get_sektor_usaha()
    {
        $query = "SELECT * FROM jenis_sektor_usaha ORDER BY nama_sektor  ASC";
        return $this->db->query($query)->result_array();
    }

}
