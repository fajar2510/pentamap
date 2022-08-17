<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamaster extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master');
        $this->load->model('Penempatan');
        $this->load->model('Perusahaan');
        $this->load->model('Sektor');
        $this->load->model('Disabilitas');
    }

    // FUNCTION USER START
    public function user()
    {
        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['user'] = $this->db->get()->row_array();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // Load Model User Role
        $data['user_role'] = $this->Master->getRole();


        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Pengguna';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Congratulation! user account has been created. </div>');
            redirect('datamaster/user');
        }
    }

    public function user_edit($id)
    {
        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        // Load model user edit
        $data['userid'] = $this->Master->getUserById($id);
        $data['user_role'] = $this->Master->getRole();


        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        // ]);
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Pengguna';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/user', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                // 'password' => password_hash(
                //     $this->input->post('password1'),
                //     PASSWORD_DEFAULT
                // ),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
            ];


            $this->db->where('id', $id);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> User data has been updated! </div>');
            redirect('datamaster/user');
        }
    }


    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected user has succesfully deleted, be carefull for manage data. </div>');
        redirect('datamaster/user');
    }
    // FUNCTION USER END


  // FUNCTION USER START
  public function sektor()
  {
      // mengambil data user login
      $this->db->select('user.*,user_role.role');
      $this->db->from('user');
      $this->db->join('user_role', 'user.role_id = user_role.id');
      $this->db->where('email', $this->session->userdata('email'));

      // load data count cpmi pmi tka pengangguran
      $data['tka'] = $this->Penempatan->getTotalTKA();
      $data['pmib'] = $this->Penempatan->getTotalPMIB();
      $data['cpmi'] = $this->Penempatan->getTotalCPMI();
      $data['phk'] = $this->Penempatan->getTotalPHK();

      $data['user'] = $this->db->get()->row_array();

      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      $data['role'] = $this->db->get('user_role')->result_array();

    //   Load Model Sektor
      $data['data_sektor'] = $this->Master->getSektor();


      $this->form_validation->set_rules('nama_sektor', 'Nama Sektor', 'required|trim');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');


      if ($this->form_validation->run() == false) {
          $data['title'] = 'Jenis Sektor Usaha';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('datamaster/sektor', $data);
          $this->load->view('templates/footer');
      } else {
          $data = [
              'nama_sektor' => htmlspecialchars($this->input->post('nama_sektor', true)),
              'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
              'date_created' => date('Y-m-d'),
          ];
          $this->db->insert('jenis_sektor_usaha', $data);

          $this->session->set_flashdata('message', '<div class="alert 
          alert-success" role="alert"> Congratulation! Sektor Usaha has been created. </div>');
          redirect('datamaster/sektor');
      }
  }

  public function sektor_edit($id)
  {
      // mengambil data user login
      $this->db->select('user.*,user_role.role');
      $this->db->from('user');
      $this->db->join('user_role', 'user.role_id = user_role.id');
      $this->db->where('email', $this->session->userdata('email'));
      $data['user'] = $this->db->get()->row_array();

      // load data count cpmi pmi tka pengangguran
      $data['tka'] = $this->Penempatan->getTotalTKA();
      $data['pmib'] = $this->Penempatan->getTotalPMIB();
      $data['cpmi'] = $this->Penempatan->getTotalCPMI();
      $data['phk'] = $this->Penempatan->getTotalPHK();

      // Load model sektor
      $data['data_sektor'] = $this->Master->getSektor();
    //   $data['edit_sektor'] = $this->Master->getSektorById($id);
    //   $data['user_role'] = $this->Master->getRole();


      $this->form_validation->set_rules('nama_sektor', 'Nama Sektor', 'required|trim');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');


      if ($this->form_validation->run() == false) {
          $data['title'] = 'Jenis Sektor Usaha';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('datamaster/sektor', $data);
          $this->load->view('templates/footer', $data);
      } else {
          $data = [
              'nama_sektor' => htmlspecialchars($this->input->post('nama_sektor', true)),
              'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
          ];


          $this->db->where('id_sektor', $id);
          $this->db->update('jenis_sektor_usaha', $data);

          $this->session->set_flashdata('message', '<div class="alert 
          alert-success" role="alert"> Sektor Usaha has been updated! </div>');
          redirect('datamaster/sektor');
      }
  }


  public function delete_sektor($id)
  {
      $this->db->where('id_sektor', $id);
      $this->db->delete('jenis_sektor_usaha');

      $this->session->set_flashdata('message', '<div class="alert 
          alert-success" role="alert"> Your selected sektor has succesfully deleted, be carefull for manage data. </div>');
      redirect('datamaster/sektor');
  }
  // FUNCTION Sektor END

    // FUNCTION Disabilitas START
    public function disabilitas()
    {
        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));
  
        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
  
        $data['user'] = $this->db->get()->row_array();
  
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
  
      //   Load Model Sektor
        $data['data_disabilitas'] = $this->Disabilitas->get_disabilitas();
  
  
        $this->form_validation->set_rules('ragam_disabilitas', 'Ragam Disabilitas', 'required|trim');
        $this->form_validation->set_rules('jenis_disabilitas', 'Jenis Disabilitas', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
  
  
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Disabilitas';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/disabilitas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'ragam_disabilitas' => htmlspecialchars($this->input->post('ragam_disabilitas', true)),
                'jenis_disabilitas' => htmlspecialchars($this->input->post('jenis_disabilitas', true)),
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            ];
            $this->db->insert('tb_disabilitas', $data);
  
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Success ! Data has been created. </div>');
            redirect('datamaster/disabilitas');
        }
    }
  
    public function disabilitas_edit($id)
    {
        // mengambil data user login
        $this->db->select('user.*,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();
  
        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
  
        // Load model disabilitas
        $data['data_disabilitas'] = $this->Disabilitas->get_disabilitas();
        // $data['edit_disabilitas'] = $this->Disabilitas->get_edit_disabilitas($id);
      //   $data['edit_sektor'] = $this->Master->getSektorById($id);
      //   $data['user_role'] = $this->Master->getRole();
  
      $this->form_validation->set_rules('ragam_disabilitas', 'Ragam Disabilitas', 'required|trim');
      $this->form_validation->set_rules('jenis_disabilitas', 'Jenis Disabilitas', 'required|trim');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
  
  
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Disabilitas';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/disabilitas', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'ragam_disabilitas' => htmlspecialchars($this->input->post('ragam_disabilitas', true)),
                'jenis_disabilitas' => htmlspecialchars($this->input->post('jenis_disabilitas', true)),
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            ];
  
            $this->db->where('id_dis', $id);
            $this->db->update('tb_disabilitas', $data);
  
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Data has been updated! </div>');
            redirect('datamaster/disabilitas');
        }
    }
  
  
    public function delete_disabilitas($id)
    {
        $this->db->where('id_dis', $id);
        $this->db->delete('tb_disabilitas');
  
        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Your selected data has succesfully deleted, be carefull for manage data. </div>');
        redirect('datamaster/disabilitas');
    }
    // FUNCTION Disabilitas END


    // FUNCTION Perusahaan START
    public function perusahaan()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['tb_perusahaan'] =   $this->Perusahaan->get_perusahaan_jatim();
        // $data['kabupaten'] = $this->Perusahaan->get_perusahaan_jatim();

        $data['title'] = 'Data Perusahaan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('datamaster/perusahaan', $data);
        $this->load->view('templates/footer');
    }



    public function perusahaan_add()
    {
        //load data sesi user
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        //load data combo box
        // $data['tb_perusahaan'] = $this->db->get('tb_perusahaan')->result_array();
        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        $data['jenis_sektor_usaha'] = $this->Sektor->get_sektor_usaha();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();
        
        //form validation
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('kode_kantor', 'Kode Kantor', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kontak', 'Kontak 1', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('fungsi', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('nama_pimpinan', 'Pimpinan Perusahaan', 'required|trim');
        $this->form_validation->set_rules('nama_kontak_person', 'Nama Kontak Person', 'required|trim');
        $this->form_validation->set_rules('no_kontak_person', 'Kontak 2', 'required|trim');
        $this->form_validation->set_rules('email_perusahaan', 'Alamat E-mail', 'trim|required');
        $this->form_validation->set_rules('sektor_perusahaan', 'Sektor Perusahaan', 'required|trim');
        $this->form_validation->set_rules('jenis_perusahaan', 'Jenis Perusahaan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Perusahaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/perusahaan_add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                'kode_kantor' => $this->input->post('kode_kantor', true),
                'alamat' => $this->input->post('alamat', true),
                'kontak' => $this->input->post('kontak', true),
                'status' => $this->input->post('status', true),
                'fungsi' => $this->input->post('fungsi', true),
                'nama_pimpinan' => $this->input->post('nama_pimpinan', true),
                'nama_kontak_person' => $this->input->post('nama_kontak_person', true),
                'no_kontak_person' => $this->input->post('no_kontak_person', true),
                'email_perusahaan' => $this->input->post('email_perusahaan', true),
                'sektor_perusahaan' => $this->input->post('sektor_perusahaan', true),
                'jenis_perusahaan' => $this->input->post('jenis_perusahaan', true),
                'date_created' => date('Y-m-d'),
            ];
            var_dump ($data);
            die;

            $this->db->insert('tb_perusahaan', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Berhasil ! Data Perusahaan telah ditambahkan. </div>');
            redirect('datamaster/perusahaan');
        }
    }
    // FUNCTION  add END

    public function perusahaan_edit($id)
    {
        // load data user login
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        // Load model perusahaan
        // $data['perusahaan'] = $this->Perusahaan->get_perusahaan_jatim();
        $data['edit_perusahaan'] = $this->Master->getPerusahaanById($id);
        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        $data['jenis_sektor_usaha'] = $this->Sektor->get_sektor_usaha();

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('kode_kantor', 'Kode Kantor', 'trim');
        $this->form_validation->set_rules('alamat', 'Specialist', 'required|trim');
        $this->form_validation->set_rules('kontak', 'Kontak 1', 'trim');
        $this->form_validation->set_rules('status', 'Status Kantor', 'required|trim');
        $this->form_validation->set_rules('fungsi', 'Kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('nama_pimpinan', 'Pimpinan Perusahaan', 'trim');
        $this->form_validation->set_rules('nama_kontak_person', 'Nama Kontak Person', 'trim');
        $this->form_validation->set_rules('no_kontak_person', 'Kontak 2', 'trim');
        $this->form_validation->set_rules('email_perusahaan', 'Alamat E-mail', 'trim|required');
        $this->form_validation->set_rules('sektor_perusahaan', 'Sektor Perusahaan', 'trim');
        $this->form_validation->set_rules('jenis_perusahaan', 'Jenis Perusahaan', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Perusahaan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/perusahaan_edit', $data);
            $this->load->view('templates/footer', $data);
            
        } else {
            $data = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                'kode_kantor' => $this->input->post('kode_kantor', true),
                'alamat' => $this->input->post('alamat', true),
                'kontak' => $this->input->post('kontak', true),
                'status' => $this->input->post('status', true),
                'fungsi' => $this->input->post('fungsi', true),
                'nama_pimpinan' => $this->input->post('nama_pimpinan', true),
                'nama_kontak_person' => $this->input->post('nama_kontak_person', true),
                'no_kontak_person' => $this->input->post('no_kontak_person', true),
                'email_perusahaan' => $this->input->post('email_perusahaan', true),
                'sektor_perusahaan' => $this->input->post('sektor_perusahaan', true),
                'jenis_perusahaan' => $this->input->post('jenis_perusahaan', true),
                'date_created' => date('Y-m-d'),
            ];


            $this->db->where('id', $id);
            $this->db->update('tb_perusahaan', $data);

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Data Perusahaan telah diperbarui ! </div>');
            redirect('datamaster/perusahaan');
        }
    }


    public function hapusPerusahaan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_perusahaan');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Data yang dipilih telah dihapus. </div>');
        redirect('datamaster/perusahaan');
    }

    
}
