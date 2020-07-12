<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class KotaModel extends CI_Model
{

    public function viewByProvinsi($id_provinsi)
    {
        $this->db->where('provinsi_id', $id_provinsi);
        $result = $this->db->get('wilayah_kabupaten')->result(); // Tampilkan semua data kota berdasarkan id provinsi

        return $result;
    }
}
