<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Model
{
   public function data_stok()
	{
		$data = $this->db->query(" SELECT total, SUM(total) AS totalstokdarah  FROM blood_order");
		return $data->result();
	}

    public function data_order_proses()
	{
		$data = $this->db->query(" SELECT total, SUM(total) AS total_order_proses  FROM blood_order WHERE status='1'");
		return $data->result();
    }
    
     public function data_order_terima()
	{
		$data = $this->db->query(" SELECT total, SUM(total) AS total_order_terima  FROM blood_order WHERE status='2'");
		return $data->result();
    }
    
     public function data_order_batal()
	{
		$data = $this->db->query(" SELECT total, SUM(total) AS total_order_batal  FROM blood_order WHERE status='3'");
		return $data->result();
	}

}
