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
                    RIGHT JOIN tb_reward ON tb_reward.perusahaan_id = tb_perusahaan.id 
                    ORDER BY tb_reward.id_reward DESC
                    -- JOIN dis_jenis ON tb_reward.jenis_disabilitas = dis_jenis.id
              ";

        return $this->db->query($query)->result_array();
    }

    public function get_reward_perusahaan_date($date)
    {
        // query index reward perusahaaan 
        $bln = explode('-', $date);
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
                    WHERE  MONTH(tb_reward.date_created) = '$bln[1]' ORDER BY tb_perusahaan.fungsi DESC
                    -- JOIN dis_jenis ON tb_reward.jenis_disabilitas = dis_jenis.id
              ";

        return $this->db->query($query)->result_array();
    }

    public function get_detail_reward_perusahaan($id)
    {
        // query index reward perusahaaan 
        $query ="SELECT 
            tb_perusahaan.nama_perusahaan,tb_perusahaan.nama_pimpinan,tb_perusahaan.nama_kontak_person,tb_perusahaan.no_kontak_person,
            tb_perusahaan.email_perusahaan,tb_perusahaan.sektor_perusahaan,tb_perusahaan.jenis_perusahaan,tb_perusahaan.status,
            tb_perusahaan.alamat,tb_perusahaan.kontak,tb_perusahaan.fungsi,kabupaten.nama_kabupaten, jenis_sektor_usaha.nama_sektor,
            tb_reward.id_reward, tb_reward.disabilitas_L, tb_reward.disabilitas_P, tb_reward.disabilitas_total, 
            tb_reward.tenaga_kerja_L, tb_reward.tenaga_kerja_P, tb_reward.tenaga_kerja_total, tb_reward.presentase, 
            tb_reward.jenis_disabilitas, tb_reward.date_created as tanggal_usul
            FROM tb_perusahaan 
            JOIN jenis_sektor_usaha ON tb_perusahaan.sektor_perusahaan = jenis_sektor_usaha.id_sektor 
            JOIN kabupaten ON tb_perusahaan.fungsi = kabupaten.id_kabupaten 
            LEFT JOIN tb_reward ON tb_reward.perusahaan_id = tb_perusahaan.id
            WHERE id= $id 
                    -- JOIN dis_jenis ON tb_reward.jenis_disabilitas = dis_jenis.id
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
                    JOIN dis_jenis ON tb_reward.jenis_disabilitas = dis_jenis.id_jenis
                    JOIN dis_ragam ON dis_jenis.ragam_id = dis_ragam.id_ragam

                    WHERE tb_reward.id_reward = '$id';
                ";

        // $this->db->select('tb_perusahaan.id,tb_perusahaan.nama_perusahaan,tb_perusahaan.nama_pimpinan,tb_perusahaan.nama_kontak_person,
        // tb_perusahaan.no_kontak_person,tb_perusahaan.email_perusahaan,tb_perusahaan.sektor_perusahaan,
        // tb_perusahaan.jenis_perusahaan,tb_perusahaan.status,tb_perusahaan.alamat,tb_perusahaan.kontak,
        // tb_perusahaan.fungsi,tb_perusahaan.date_created,
        // kabupaten.nama_kabupaten, tb_reward.*, jenis_sektor_usaha.nama_sektor');
        // $this->db->from('tb_reward');
        // $this->db->join('jenis_sektor_usaha', 'sektor_perusahaan=id_sektor');
        // $this->db->join('kabupaten', 'fungsi=id_kabupaten');
        // $this->db->join('tb_reward', 'perusahaan_id=id');
        // $this->db->join('dis_jenis', 'jenis_disabilitas=id_jenis');
        // $this->db->join('dis_ragam', 'ragam_id=id_ragam');
        // $this->db-where('id_reward', $id);
        // $query = $this->db->get();
        // return $query;
        
        // var_dump($query);
        // echo"<pre>";
        // die;
        // $jenis = explode(",", $data);
        return $this->db->query($query)->result_array();
    }

    // UPDATE
	function update_jenis($id_reward,$id_jenis){
		$this->db->trans_start();

			$this->db->delete('dis_jenis', array('ragam_id' => $id_reward));

			$result = array();
			    foreach($id_jenis AS $key => $val){
				     $result[] = array(
				      'ragam_id'  	=> $id_reward,
				      'jenis_disabilitas'  	=> $_POST['jenis_edit)'][$key]
				     );
			    }      
			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('dis_jenis', $result);
		$this->db->trans_complete();
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
