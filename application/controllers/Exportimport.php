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
        $this->load->model('Penempatan');
        $this->load->model('Perusahaan');
        $this->load->model('Master');
        $this->load->model('Tka');
        // $this->load->model('Phk');
        $this->load->model('Lokal');
        $this->load->model('RewardModel');
    }
    
    // import excel csv file
    public function import_data_pmi()
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

    // impor excel csv files
    public function import_data_tka()
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
                    if ($numRow > 2) {
                        $data_tka = array(
                            'nama_tka' => $row->getCellAtIndex(1),
                            'jenis_kel' => $row->getCellAtIndex(2),
                            'kewarganegaraan' => $row->getCellAtIndex(3),
                            'nama_perusahaan' => $row->getCellAtIndex(4),
                            'alamat' => $row->getCellAtIndex(5),
                            'status' => $row->getCellAtIndex(6),
                            'jabatan' => $row->getCellAtIndex(7),
                            'sektor' => $row->getCellAtIndex(8),
                            'no_rptka' => $row->getCellAtIndex(9),
                            'masa_rptka' => $row->getCellAtIndex(10),
                            'no_imta' => $row->getCellAtIndex(11),
                            'masa_imta' => $row->getCellAtIndex(12),
                            'lokasi_kerja' => $row->getCellAtIndex(13),

                            // 'image' => $row->getCellAtIndex(12),
                            'date_created' => date('Y-m-d'),
                        );
                        $this->Tka->import_data($data_tka);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('assets/exportimport/import/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! Import Data has been succesfully. </div>');
                redirect('tka');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert"> Error. You dont select any document </div>');
            redirect('tka');

            echo "message :" . $this->upload->display_errors();
        }
    }

    public function import_data_phk()
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
                        $data_phk = array(
                            'wilyah' => $row->getCellAtIndex(1),
                            'kpj' => $row->getCellAtIndex(2),
                            'nama_tk' => $row->getCellAtIndex(3),
                            'alamat' => $row->getCellAtIndex(4),
                            'kontak' => $row->getCellAtIndex(5),
                            'kode_kantor' => $row->getCellAtIndex(6),
                            'nomor_identitas' => $row->getCellAtIndex(7),
                            'kode_segmen' => $row->getCellAtIndex(8),
                            'nama_perusahaan' => $row->getCellAtIndex(9),
                            'date_created' => date('Y-m-d'),
                        );
                        $this->Phk->import_data($data_phk);
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

    public function export_pdf_pmi()
    {
        $mpdf = new \Mpdf\Mpdf();
        $data_pmi = $this->Master->getPmiJoinWilayah();
        $data = $this->load->view('export/pmi_data', ['semua_data_pmi' => $data_pmi], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }


    public function pmi_negara($negara, $date)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data_pmi = $this->Master->getPmi_per_negara($negara, $date);
        // $data_tanggal = $this->Master->getPmiJoinWilayah($negara);

        $data = $this->load->view('export/pmi_data_negara', ['semua_data_pmi' => $data_pmi], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function reward_perusahaan()
    {
        $tahun = $this->input->post('tahun', true);
        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4-L',
                'orientation' => 'L'
            ]
        );

        $data_reward = $this->RewardModel->get_reward_perusahaan_date($tahun);
        // $data_tanggal = $this->Master->getPmiJoinWilayah($negara);

        $data = $this->load->view('export/reward_data', ['semua_data_reward' => $data_reward], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function export_pdf_kwitansi($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data_kwitansi = $this->Master->getPmiById($id);
        $data = $this->load->view('export/kwitansi_data', ['semua_data_kwitansi' => $data_kwitansi], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function export_pdf_tka()
    {
        var_dump($_POST['bulan']);
        die;
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L'
        ]);
        $data_tka['tanggal'] = $_POST['bulan'];
        $data_tka['semua_data_tka'] = $this->Perusahaan->get_TkaPerusahaanByMonthYear($_POST['awal']);
        $data = $this->load->view('export/tka_data',$data_tka, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function export_pdf_cpmi($perusahaan, $negara, $date)
    {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L'
        ]);
        $data_cpmi = $this->Penempatan->get_pdf_cpmi($perusahaan, $negara, $date);
        $total_cpmi_perusahaan_negara = $this->Penempatan->getTotalCPMI_byNegara($perusahaan, $negara,$date);
        $data = $this->load->view('export/cpmi_data', ['semua_data_cpmi' => $data_cpmi, 'data_total_orang' => $total_cpmi_perusahaan_negara], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function export_pdf_pppmi()
    {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L'
        ]);
        $data_cpmi['tanggal'] = $_POST['awal'];
        $data_cpmi['semua_data_cpmi'] = $this->Penempatan->get_PPPMIByMonthYear($_POST['awal']);
        // $data_cpmi = $this->Penempatan->get_cpmi();
        $data = $this->load->view('export/pppmi_data', $data_cpmi, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
}
