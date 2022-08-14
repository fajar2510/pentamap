<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autofill extends CI_Model
{
    public function search_perusahaan($title){
        $this->db->like('nama_perusahaan', $title);
        $this->db->order_by('nama_perusahaan','ASC');
        $this->db->limit(10);
        return $this->db->get('tb_perusahaan')->result();
    }

    function get_disabilitas_by_ragam(){
		$id_dis=$this->input->post('id_dis');
    	$data=$this->RewardModel->get_disabilitas_by_ragam($id_dis)->result();
    	foreach ($data as $result) {
    		$value[] = (float) $result->id_dis;
    	}
    	echo json_encode($value);
	}

}
