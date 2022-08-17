<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RewardModel extends CI_Model
{
    public function get_reward_perusahaan()
    {
        // query index reward perusahaaan 
        $query =
            "SELECT 
            tb_perusahaan.nama_perusahaan,
            tb_perusahaan.nama_pimpinan,
            tb_perusahaan.nama_kontak_person,
            tb_perusahaan.no_kontak_person,
            tb_perusahaan.email_perusahaan,
            tb_perusahaan.sektor_perusahaan,
            tb_perusahaan.jenis_perusahaan,
            tb_perusahaan.status,
            tb_perusahaan.alamat,
            tb_perusahaan.kontak,
            tb_perusahaan.fungsi,
             kabupaten.nama_kabupaten, 
             tb_reward.*,
             jenis_sektor_usaha.nama_sektor
              FROM tb_perusahaan 
              JOIN jenis_sektor_usaha ON tb_perusahaan.sektor_perusahaan = jenis_sektor_usaha.id_sektor 
              JOIN kabupaten ON tb_perusahaan.fungsi = kabupaten.id_kabupaten 
              JOIN tb_reward ON tb_reward.perusahaan_id = tb_perusahaan.id
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_tb_reward() // untuk hapus id berdasarkan tb_reward
    {
        $query =
            "SELECT tb_reward.* , tb_perusahaan.nama_perusahaan
             FROM tb_reward 
            JOIN        tb_perusahaan ON tb_reward.perusahaan_id = tb_perusahaan.id
            ORDER BY tb_reward.id_reward  ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_rewardById($id) // untuk edit reward 
    {
        $query = "SELECT 
                    tb_perusahaan.id,
                    tb_perusahaan.nama_perusahaan,
                    tb_perusahaan.nama_pimpinan,
                    tb_perusahaan.nama_kontak_person,
                    tb_perusahaan.no_kontak_person,
                    tb_perusahaan.email_perusahaan,
                    tb_perusahaan.sektor_perusahaan,
                    tb_perusahaan.jenis_perusahaan,
                    tb_perusahaan.status,
                    tb_perusahaan.alamat,
                    tb_perusahaan.kontak,
                    tb_perusahaan.fungsi,
                    tb_perusahaan.date_created,
                    kabupaten.nama_kabupaten, 
                    tb_reward.*,
                    jenis_sektor_usaha.nama_sektor
                    FROM tb_perusahaan 
                    JOIN jenis_sektor_usaha ON tb_perusahaan.sektor_perusahaan = jenis_sektor_usaha.id_sektor 
                    JOIN kabupaten ON tb_perusahaan.fungsi = kabupaten.id_kabupaten 
                    JOIN tb_reward ON tb_reward.perusahaan_id = tb_perusahaan.id
                ";
        return $this->db->query($query)->row();
    }

    public function max_id_perusahaan()
    {
         $data = $this->db->query("SELECT MAX(id)+1 as max_id FROM tb_perusahaan ");
         return $data->result();
       
    }

    //GET PRODUCT BY reward ID
	function get_reward_by_ragam($id_dis){
		$this->db->select('*');
		$this->db->from('tb_reward');
		// $this->db->join('detail', 'detail_product_id=product_id');
		// $this->db->join('package', 'id_dis=detail_id_dis');
		$this->db->where('id_dis',$id_dis);
		$query = $this->db->get();
		return $query;
	}

}
