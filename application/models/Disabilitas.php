<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disabilitas extends CI_Model
{
    //READ
    function get_ragam_jenis()
    {
        $query = "SELECT dis_jenis.*, dis_ragam.disabilitas_ragam 
        FROM dis_jenis 
        JOIN dis_ragam ON dis_jenis.ragam_id = dis_ragam.id_ragam
        ORDER BY id_jenis  ASC";
        return $this->db->query($query)->result_array();
    }
    
        //EDIT
     function get_ragam_jenis_Byid($id)
    {
        $query = "SELECT dis_jenis.*, dis_ragam.disabilitas_ragam 
        FROM dis_jenis 
        JOIN dis_ragam ON dis_jenis.ragam_id = dis_ragam.id_ragam
        WHERE dis_jenis.id_jenis = '$id'
        ORDER BY dis_jenis.id_jenis  ASC";
        return $this->db->query($query)->result_array();
    }

    //get ragam 
    function get_ragam()
    {
        $query = "SELECT * FROM dis_ragam ORDER BY id_ragam  ASC";
        return $this->db->query($query)->result_array();
    }

}
