<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Tka extends CI_Model
{
    public function import_data($data_tka)
    {
        $jumlah =  count($data_tka);
        if ($jumlah > 0) {
            $this->db->replace('tb_tka', $data_tka);
        }
    }

    
}
