<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RewardModel extends CI_Model
{
    public function get_reward_perusahaan()
    {
        // query index reward perusahaaan 
        $query ="SELECT 
                    tb_perusahaan.nama_perusahaan,tb_perusahaan.nama_pimpinan,tb_perusahaan.nama_kontak_person,tb_perusahaan.no_kontak_person,
                    tb_perusahaan.email_perusahaan,tb_perusahaan.sektor_perusahaan,tb_perusahaan.jenis_perusahaan,tb_perusahaan.status,
                    tb_perusahaan.alamat,tb_perusahaan.kontak,tb_perusahaan.fungsi,
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
             JOIN tb_perusahaan ON tb_reward.perusahaan_id = tb_perusahaan.id
             ORDER BY tb_reward.id_reward  ASC ";

        return $this->db->query($query)->result_array();
    }

    public function get_rewardById($id) // untuk edit reward 
    {
        $query = "SELECT 
                    tb_perusahaan.id,tb_perusahaan.nama_perusahaan,tb_perusahaan.nama_pimpinan,tb_perusahaan.nama_kontak_person,
                    tb_perusahaan.no_kontak_person,tb_perusahaan.email_perusahaan,tb_perusahaan.sektor_perusahaan,
                    tb_perusahaan.jenis_perusahaan,tb_perusahaan.status,tb_perusahaan.alamat,tb_perusahaan.kontak,
                    tb_perusahaan.fungsi,tb_perusahaan.date_created,
                    kabupaten.nama_kabupaten, tb_reward.*, jenis_sektor_usaha.nama_sektor
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

    // get all jenis disabilitas
	function get_jenis(){
		// $query = $this->db->get('dis_jenis');
        $this->db->select('*');
		$this->db->from('dis_jenis');
		$this->db->join('dis_ragam', 'ragam_id=id_ragam');
		$this->db->order_by('id_jenis','ASC');
		$query = $this->db->get();
		return $query;
	}

    //GET ragam BY jenis ID
	function get_jenis_disabilitas($id_jenis){
		$this->db->select('*');
		$this->db->from('dis_jenis');
		$this->db->join('dis_ragam', 'ragam_id=id_ragam');
		$this->db->where('id_jenis',$id_jenis);
		$query = $this->db->get();
		return $query;
	}

}
