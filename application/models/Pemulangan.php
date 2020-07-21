<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Pemulangan extends CI_Model
{  
    public function import_data($data_pmi)
    {
        $jumlah =  count($data_pmi);
        if ($jumlah > 0) {     
            $this->db->replace('tb_pmi', $data_pmi);
        }
    }
}