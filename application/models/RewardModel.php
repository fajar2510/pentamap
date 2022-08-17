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
            tb_perusahaan.kode_kantor,
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
              JOIN jenis_sektor_usaha ON tb_perusahaan.id = jenis_sektor_usaha.id_sektor 
              JOIN kabupaten ON tb_perusahaan.fungsi = kabupaten.id_kabupaten 
              JOIN tb_reward ON tb_reward.perusahaan_id = tb_perusahaan.id
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_tb_reward()
    {
        $query =
            "SELECT * FROM tb_reward 
            ORDER BY tb_reward.id_reward  ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_rewardById($id)
    {
        $query = "SELECT * FROM tb_reward WHERE tb_reward.id_reward = '$id'
                ";
        return $this->db->query($query)->row();
    }

    public function max_id_perusahaan()
    {
        $data = $this->db->query("SELECT MAX(id)+1 FROM tb_perusahaan ");
        return $data->result();
       
        
        // $this->db->select_max('id');
        // $this->db->from('tb_perusahaan');
        // $query = $this->db->get()->row(); 
        // $id_baru = 1;
        // $hasil = $query + $id_baru;
        // return $hasil;
       
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
