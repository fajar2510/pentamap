<?php
class Wilayah extends CI_Model
{
    function provinsi()
    {
        $this->db->order_by("nama_provinsi", "ASC");
        $query = $this->db->get("wilayah_provinsi");
        return $query->result();
    }

    function kabupaten($provinsi_id)
    {
        $this->db->where('provinsi_id', $provinsi_id);
        $this->db->order_by('nama_kabupaten', 'ASC');
        $query = $this->db->get('wilayah_kabupaten');
        $output = '<option value="">Pilih Kabupaten</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->nama_kabupaten . '</option>';
        }
        return $output;
    }

    function kecamatan($kabupaten_id)
    {
        $this->db->where('kabupaten_id', $kabupaten_id);
        $this->db->order_by('nama_kecamatan', 'ASC');
        $query = $this->db->get('wilayah_kecamatan');
        $output = '<option value="">Pilih Kecamatan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->nama_kecamatan . '</option>';
        }
        return $output;
    }
}
