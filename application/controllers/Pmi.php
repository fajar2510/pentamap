<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pmi extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master');
        $this->load->model('Wilayah');
        $this->load->model('Chain_model');
    }


    // FUNCTION Tambah START
    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data wilayah
        $data['wilayah_provinsi'] = $this->Wilayah->provinsi();
        $data['negara'] = $this->db->get('tb_negara')->result_array();

        // Load Model User Role
        $data['pmi'] = $this->Master->getPmi();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('prov', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('desa', 'Desa', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('berangkat', 'Berangkat', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
        $this->form_validation->set_rules('lama', 'Lama', 'required|trim');



        if ($this->form_validation->run() == false) {

            $data['title'] = 'Data Pemulangan PMI-B Non-Prosedural';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmi/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'gender' => $this->input->post('gender', true),
                'provinsi' => $this->input->post('prov', true),
                'kabupaten' => $this->input->post('kab', true),
                'kecamatan' => $this->input->post('kec', true),
                'desa' => $this->input->post('desa', true),
                'negara_bekerja' => $this->input->post('negara', true),
                'jenis_pekerjaan' => $this->input->post('jenis', true),
                'berangkat_melalui' => $this->input->post('berangkat', true),
                'pengirim' => $this->input->post('pengirim', true),
                'lama_bekerja' => $this->input->post('lama', true),
                'date_created' => date('Y-m-d'),

            ];
            // cek jika ada gambar yang akan di upload
            // masih salah dan belum bisa upload gambar
            // cek jika ada gambar yang akan di upload

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '5000';
                $config['upload_path']   = './assets/img/pmi';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pmi/index');
                }
            }

            $this->db->insert('tb_pmi', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! PMI data has been added succesfully. </div>');
            redirect('pmi/index');
        }
    }

    // function kabupaten()
    // {
    //     if ($this->input->post('provinsi_id')) {
    //         echo $this->wilayah->kabupaten($this->input->post('provinsi_id'));
    //     }
    // }

    // function kecamatan()
    // {
    //     if ($this->input->post('kabupaten_id')) {
    //         echo $this->wilayah->kecamatan($this->input->post('kabupaten_id'));
    //     }
    // }

    // dijalankan saat provinsi di klik
    public function pilih_kabupaten()
    {
        //var_dump($this->uri->segment(3));
        $data['kabupaten'] = $this->Wilayah->ambil_kabupaten($this->uri->segment(3));
        //return $data['kabupaten'];
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('pmi/v_drop_down_kabupaten', $data);
        // $this->load->view('templates/footer', $data);
    }

    // dijalankan saat kabupaten di klik
    public function pilih_kecamatan()
    {
        $data['kecamatan'] = $this->Wilayah->ambil_kecamatan($this->uri->segment(3));
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('pmi/v_drop_down_kecamatan', $data);
        // $this->load->view('templates/footer', $data);
    }

    // dijalankan saat kecamatan di klik
    public function pilih_kelurahan()
    {
        $data['kelurahan'] = $this->Wilayah->ambil_kelurahan($this->uri->segment(3));
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('pmi/v_drop_down_kelurahan', $data);
        // $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // $data['wilayah_provinsi'] = $this->Wilayah->provinsi();
        $data['negara'] = $this->db->get('tb_negara')->result_array();

        // Load Model User Role
        $data['pmi'] = $this->Master->getPmi();

        $data['provinsi'] = $this->Wilayah->ambil_provinsi();


        // $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        // $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        // $this->form_validation->set_rules('prov', 'Provinsi', 'required|trim');
        // $this->form_validation->set_rules('kab', 'Kabupaten', 'required|trim');
        // $this->form_validation->set_rules('kec', 'Kecamatan', 'required|trim');
        // $this->form_validation->set_rules('desa', 'Desa', 'required|trim');
        // $this->form_validation->set_rules('negara', 'Negara', 'required|trim');
        // $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        // $this->form_validation->set_rules('berangkat', 'Berangkat', 'required|trim');
        // $this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
        // $this->form_validation->set_rules('lama', 'Lama', 'required|trim');

        // $chain = array(
        //     'provinsi' => $this->Chain_model->get_provinsi(),
        //     'kabupaten' => $this->Chain_model->get_kabupaten(),
        //     'kecamatan' => $this->Chain_model->get_kecamatan(),
        //     'provinsi_selected' => '',
        //     'kabupaten_selected' => '',
        //     'kecamatan_selected' => '',
        // );

        // if ($this->form_validation->run() == false) {
        $data['title'] = 'Form Pemulangan Pekerja Migran Indonesia (PMI-B) Non-Prosedural ';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pmi/tambah', $data);
        $this->load->view('templates/footer', $data);



        // } else {

        // $data = [
        //     'nama' => $this->input->post('nama', true),
        //     'tgl_lahir' => $this->input->post('tgl_lahir', true),
        //     'gender' => $this->input->post('gender', true),
        //     'provinsi' => $this->input->post('prov', true),
        //     'kabupaten' => $this->input->post('kab', true),
        //     'kecamatan' => $this->input->post('kec', true),
        //     'desa' => $this->input->post('desa', true),
        //     'negara_bekerja' => $this->input->post('negara', true),
        //     'jenis_pekerjaan' => $this->input->post('jenis', true),
        //     'berangkat_melalui' => $this->input->post('berangkat', true),
        //     'pengirim' => $this->input->post('pengirim', true),
        //     'lama_bekerja' => $this->input->post('lama', true),
        //     'date_created' => date('Y-m-d'),
        // ];

        // // cek gambar upload
        // $upload_image = $_FILES['image']['name'];
        // if ($upload_image) {
        //     $config['allowed_types'] = 'gif|jgp|png';
        //     $config['max_size']      = '3000';
        //     $config['upload_path']   = '.assets/img/pmi/';

        //     $this->load->library('upload', $config);

        //     if ($this->upload->do_upload('image')) {
        //         $new_image = $this->upload->data('file_name');
        //         $this->db->set('image', $new_image);
        //     } else {
        //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        //         redirect('pmi/index');
        //     }
        // }
        // $this->db->insert('tb_pmi', $data);
        // $this->session->set_flashdata('message', '<div class="alert 
        //     alert-success" role="alert"> Congratulation! PMI data has been added succesfully. </div>');
        // redirect('pmi/index');
        // }
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['wilayah_provinsi'] = $this->Wilayah->provinsi();
        $data['negara'] = $this->db->get('tb_negara')->result_array();

        // Load Model User Role
        $data['pmi'] = $this->Master->getPmiById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('prov', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('desa', 'Desa', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('berangkat', 'Berangkat', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
        $this->form_validation->set_rules('lama', 'Lama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Pemulangan Pekerja Migran Indonesia (PMI-B) Non-Prosedural ';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmi/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'gender' => $this->input->post('gender', true),
                'provinsi' => $this->input->post('prov', true),
                'kabupaten' => $this->input->post('kab', true),
                'kecamatan' => $this->input->post('kec', true),
                'desa' => $this->input->post('desa', true),
                'negara_bekerja' => $this->input->post('negara', true),
                'jenis_pekerjaan' => $this->input->post('jenis', true),
                'berangkat_melalui' => $this->input->post('berangkat', true),
                'pengirim' => $this->input->post('pengirim', true),
                'lama_bekerja' => $this->input->post('lama', true),
                'date_created' => date('Y-m-d'),
            ];
            // cek gambar upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jgp|png';
                $config['max_size']      = '3000';
                $config['upload_path']   = '.assets/img/pmi/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pmi/index');
                }
            }
            $this->db->insert('tb_pmi', $data);
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! PMI data has been added succesfully. </div>');
            redirect('pmi/index');
        }
    }


    public function deletePmi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pmi');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected PMI has succesfully deleted, be carefull for manage data. </div>');
        redirect('pmi/');
    }

    public function editPmi($id)
    {
        $data['title'] = 'Edit PMI';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('bio', 'Bio', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/edit_user', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name', $id);
            $email = $this->input->post('email', $id);
            $bio = $this->input->post('bio', $id);

            // cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2500';
                $config['upload_path']   = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }

            $this->db->set('name', $name);
            $this->db->set('bio', $bio);

            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected PMI has been updated! </div>');
            redirect('pmi/index');
        }
    }
}
