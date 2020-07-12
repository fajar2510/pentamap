<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Model
{
    public function getRole()
    {
        $query = "SELECT `user`.*, `user_role`. `role`
                    FROM `user` JOIN `user_role`
                    ON `user`. `role_id` = `user_role`. `id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getTranfusion()
    {
        $query = "SELECT `tranfusion`.*, 
                        `doctor`. `name`,
                        `blood_group`. `group_name`,
                        `blood_type`. `category_name`,
                        `region`. `region_name`,
                        `blood_pressure`. `level`,
                        `blood_pressure`. `details`
                    FROM `tranfusion` 
                    JOIN `doctor`
                    ON `tranfusion`. `doctor_name` = `doctor`. `id`
                    JOIN `blood_group`
                    ON `tranfusion`. `blood_group` = `blood_group`. `id`
                    JOIN `blood_type`
                    ON `tranfusion`. `blood_type` = `blood_type`. `id`
                    JOIN `region`
                    ON `tranfusion`. `region` = `region`. `id`
                    JOIN `blood_pressure`
                    ON `tranfusion`. `blood_pressure` = `blood_pressure`. `id`
                    ORDER BY `tranfusion`.`id` ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getReception()
    {
        $query = "SELECT `blood_reception`.*, 
                        `blood_group`. *,
                        `blood_type`. `category_name`
                    FROM `blood_reception` 
                    JOIN `blood_group`
                    ON `blood_reception`. `blood_group` = `blood_group`. `id`
                    JOIN `blood_type`
                    ON `blood_reception`. `blood_type` = `blood_type`. `id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getOrder()
    {
        $query = "SELECT `blood_order`.*, 
                        `doctor`. `name`,
                        `blood_group`. `group_name`,
                        `blood_group`. `information`,
                        `blood_type`. `category_name`,
                        `specific_room`. `room_name`,
                        `status_order`. `status`
                    FROM `blood_order` 
                    JOIN `doctor`
                    ON `blood_order`. `doctor` = `doctor`. `id`
                    JOIN `blood_group`
                    ON `blood_order`. `blood_group` = `blood_group`. `id`
                    JOIN `blood_type`
                    ON `blood_order`. `blood_type` = `blood_type`. `id`
                    JOIN `specific_room`
                    ON `blood_order`. `room` = `specific_room`. `id`
                    JOIN `status_order`
                    ON `blood_order`. `status` = `status_order`. `id`
                    ORDER BY `blood_order`.`status` ASC ,  `blood_order`.`id` DESC
                ";
        return $this->db->query($query)->result_array();
    }


    public function getCanceled()
    {
        $query = "SELECT `blood_canceled`.*, 
                        `doctor`. `name`,
                        `blood_group`. *,
                        `blood_type`. `category_name`,
                        `specific_room`. `room_name`
                    FROM `blood_canceled` 
                    JOIN `doctor`
                    ON `blood_canceled`. `doctor` = `doctor`. `id`
                    JOIN `blood_group`
                    ON `blood_canceled`. `blood_group` = `blood_group`. `id`
                    JOIN `blood_type`
                    ON `blood_canceled`. `blood_type` = `blood_type`. `id`
                    JOIN `specific_room`
                    ON `blood_canceled`. `room` = `specific_room`. `id`
                   
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPmi()
    {
        $query = "SELECT * FROM tb_pmi
                ";
        return $this->db->query($query)->result_array();
    }

    public function getW_Prov()
    {
        $query = "SELECT * FROM wilayah_provinsi
                ";
        return $this->db->query($query)->result_array();
    }

    public function getW_Kab()
    {
        $query = "SELECT * FROM wilayah_kabupaten
                ";
        return $this->db->query($query)->result_array();
    }

    public function getW_Kec()
    {
        $query = "SELECT * FROM wilayah_kecamatan
                ";
        return $this->db->query($query)->result_array();
    }

    public function getW_Desa()
    {
        $query = "SELECT * FROM wilayah_desa
                ";
        return $this->db->query($query)->result_array();
    }


    public function get_Negara()
    {
        $query = "SELECT * FROM tb_negara
                ";
        return $this->db->query($query)->result_array();
    }
}
