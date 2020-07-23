<?php
defined('BASEPATH') or exit('No direct script acces allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Exportimport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemulangan');
    }

    public function index()
    {
        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();

        $data['title'] = 'Import Excel';
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('import/index', $data);
        // $this->load->view('templates/footer', $data);
    }

    public function uploaddata()
    {
        $config['upload_path'] = './assets/exportimport/import/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('importexcel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('assets/exportimport/import/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $data_pmi = array(
                            'nama' => $row->getCellAtIndex(1),
                            'umur' => $row->getCellAtIndex(2),
                            'gender' => $row->getCellAtIndex(3),
                            'alamat' => $row->getCellAtIndex(4),
                            'negara_bekerja' => $row->getCellAtIndex(5),
                            'jenis_pekerjaan' => $row->getCellAtIndex(6),
                            'berangkat_melalui' => $row->getCellAtIndex(7),
                            'pengirim' => $row->getCellAtIndex(8),
                            'lama_bekerja' => $row->getCellAtIndex(9),
                            'status' => 'NON-PROSEDURAL',
                            // 'image' => $row->getCellAtIndex(12),
                            'date_created' => date('Y-m-d'),
                        );
                        $this->Pemulangan->import_data($data_pmi);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('assets/exportimport/import/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! Import Data has been succesfully. </div>');
                redirect('pmi');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert"> Error. You dont select any document </div>');
            redirect('pmi');

            echo "message :" . $this->upload->display_errors();
        }
    }
}
