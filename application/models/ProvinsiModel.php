<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class ProvinsiModel extends CI_Model
{

    public function view()
    {
        return $this->db->get('wilayah_provinsi')->result(); // Tampilkan semua data yang ada di tabel provinsi
    }
}
