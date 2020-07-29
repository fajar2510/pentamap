<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Phk extends CI_Model
{
    public function import_data($data_phk)
    {
        $jumlah =  count($data_phk);
        if ($jumlah > 0) {
            $this->db->replace('tb_phk', $data_phk);
        }
    }
}
