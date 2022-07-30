<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Lokal extends CI_Model
{
    public function import_data($data_phk)
    {
        $jumlah =  count($data_phk);
        if ($jumlah > 0) {
            $this->db->replace('tb_phk', $data_phk);
        }
    }
    public function get_namaperusahaan()
    {
        $query = "SELECT * FROM tb_perusahaan ORDER BY nama_perusahaan  ASC";
        return $this->db->query($query)->result_array();
    }
    
}
