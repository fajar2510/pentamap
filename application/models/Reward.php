<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Model
{
    public function get_reward_perusahaan()
    {
        $query =
            "SELECT * FROM tb_reward 
            JOIN kabupaten ON tb_perusahaan.fungsi = kabupaten.id_kabupaten 
            JOIN tb_perusahaan ON tb_reward.nama_perusahaan = tb_perusahaan.id
            JOIN jenis_sektor_usaha ON tb_reward.sektor_usaha = jenis_sektor_usaha.id_sektor
            ORDER BY date_created  DESC
                ";
        return $this->db->query($query)->result_array();
    }

}
