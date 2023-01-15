<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamaster extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        
        $this->load->model('Master');
        $this->load->model('Penempatan');
        $this->load->model('Perusahaan');
        $this->load->model('Sektor');
        $this->load->model('Disabilitas');
        $this->load->model('Geo_Jatim');
        $this->load->model('Sebaran_Jatim');
        $this->load->model('KantorUPT');
    }

    // FUNCTION USER START
    public function user()
    {
        is_logged_in();
       
        // mengambil data user login
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // mengambil data user login
        // echo "<pre>", var_dump($data), "</pre>";

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
            'is_unique' => 'E-mail sudah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak cocok, ulangi!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'NIK', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('NIK', 'NIK', 'trim');
        $this->form_validation->set_rules('NIP', 'NIP', 'trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim');
        $this->form_validation->set_rules('kontak', 'Nomor Handphone', 'trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim');
        $this->form_validation->set_rules('bio', 'Bio/tentang kamu', 'trim');

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
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'NIK' => htmlspecialchars($this->input->post('NIK', true)),
                'NIP' => htmlspecialchars($this->input->post('NIP', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'bio' => htmlspecialchars($this->input->post('bio', true)),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Ditambahkan !</strong> data telah berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('datamaster/user');
        }
    }

    public function user_edit($id)
    {
        is_logged_in();
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
        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        //     'is_unique' => 'E-mail ini sudah digunakan!'
        // ]);
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        // ]);user_role
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('NIK', 'NIK', 'trim');
        $this->form_validation->set_rules('NIP', 'NIP', 'trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim');
        $this->form_validation->set_rules('kontak', 'Nomor Handphone', 'trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim');
        


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
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'NIK' => htmlspecialchars($this->input->post('NIK', true)),
                'NIP' => htmlspecialchars($this->input->post('NIP', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'bio' => htmlspecialchars($this->input->post('bio', true)),
                'is_active' => $this->input->post('is_active')
            ];


            $this->db->where('id', $id);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('datamaster/user');
        }
    }


    public function deleteUser($id)
    {
        is_logged_in();
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> Dihapus !</strong> data telah berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
        redirect('datamaster/user');
    }
    // FUNCTION USER END


  // FUNCTION USER START
  public function sektor()
  {
        is_logged_in();
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
      $this->form_validation->set_rules('keterangan', 'Sub Sektor', 'trim');


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

          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong> Ditambahkan !</strong> data telah berhasil ditambahkan.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>   </div>');
          redirect('datamaster/sektor');
      }
  }

  public function sektor_edit($id)
  {
    is_logged_in();
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
      $this->form_validation->set_rules('keterangan', 'Sub Sektor', 'trim');


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

          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong> Disunting !</strong> data telah berhasil di update.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>   </div>');
          redirect('datamaster/sektor');
      }
  }


  public function delete_sektor($id)
  {
    is_logged_in();
      $this->db->where('id_sektor', $id);
      $this->db->delete('jenis_sektor_usaha');

      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong> Dihapus !</strong> data telah berhasil dihapus.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>   </div>');
      redirect('datamaster/sektor');
  }
  // FUNCTION Sektor END

    // FUNCTION Disabilitas START
    public function disabilitas()
    {
        is_logged_in();
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
        $data['ragam'] = $this->Disabilitas-> get_ragam();
       
  
        //   Load Model Sektor
        $data['data_disabilitas'] = $this->Disabilitas->get_ragam_jenis();
  
  
        $this->form_validation->set_rules('ragam_disabilitas', 'Ragam Disabilitas', 'required|trim');
        $this->form_validation->set_rules('jenis_disabilitas', 'Jenis Disabilitas', 'required|trim');
  
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Disabilitas';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/disabilitas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'ragam_id' => htmlspecialchars($this->input->post('ragam_disabilitas', true)),
                'jenis_disabilitas' => htmlspecialchars($this->input->post('jenis_disabilitas', true)),
            ];
            $this->db->insert('dis_jenis', $data);
  
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert"> Success ! Data has been created. </div>');
            redirect('datamaster/disabilitas');
        }
    }
  
    public function disabilitas_edit($id)
    {
        is_logged_in();
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
        $data['edit_disabilitas'] = $this->Disabilitas->get_ragam_jenis_Byid($id);
        $data['ragam'] = $this->Disabilitas-> get_ragam();

        // $data['edit_disabilitas'] = $this->Disabilitas->get_edit_disabilitas($id);
      //   $data['edit_sektor'] = $this->Master->getSektorById($id);
      //   $data['user_role'] = $this->Master->getRole();
  
      $this->form_validation->set_rules('ragam_disabilitas', 'Ragam Disabilitas', 'required|trim');
      $this->form_validation->set_rules('jenis_disabilitas', 'Jenis Disabilitas', 'required|trim');
  
  
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Disabilitas';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/disabilitas', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'ragam_id' => htmlspecialchars($this->input->post('ragam_disabilitas', true)),
                'jenis_disabilitas' => htmlspecialchars($this->input->post('jenis_disabilitas', true)),
            ];
  
            $this->db->where('id_jenis', $id);
            $this->db->update('dis_jenis', $data);
  
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('datamaster/disabilitas');
        }
    }
  
  
    public function delete_disabilitas($id)
    {
        is_logged_in();
        $this->db->where('id_jenis', $id);
        $this->db->delete('dis_jenis');
  
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Dihapus !</strong> data telah berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
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
            // var_dump ($data);
            // die;

            $this->db->insert('tb_perusahaan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Ditambahkan !</strong> data telah berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
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
        $this->form_validation->set_rules('sektor_perusahaan', 'Sektor Perusahaan', 'required|trim');
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

            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('datamaster/perusahaan');
        }
    }


    public function hapusPerusahaan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_perusahaan');

        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Dihapus !</strong> data telah berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
        redirect('datamaster/perusahaan');
    }

    public function geoJatim()
    {
        is_logged_in();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['geojatim'] = $this->Geo_Jatim->get_GeoJatim();
        $data['detail_kabupaten'] = $this->Sebaran_Jatim->detail_kabupaten_object();

        // $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        

        $data['title'] = 'Geo Jatim';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('datamaster/geo_jatim', $data);
        $this->load->view('templates/footer-geojson');
    }

    public function edit_geoJatim($id)
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
        // $data['edit_geojatim'] = $this->Geo_Jatim->get_GeoJatim($id);
        $data['geojatim'] = $this->Geo_Jatim->get_GeoJatim();
        $data['detail_kabupaten'] = $this->Sebaran_Jatim->detail_kabupaten();

        

        $this->form_validation->set_rules('geojson', 'Nama Geojson', 'trim');
        $this->form_validation->set_rules('warna', 'Kode Warna', 'trim');
        $this->form_validation->set_rules('luas_area', 'Luas Area', 'trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Geo Jatim';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/geo_jatim', $data);
            $this->load->view('templates/footer-geojson', $data);
            
        } else {
            $data = [
                'geojson' => $this->input->post('geojson', true),
                'warna' => $this->input->post('warna', true),
                'luas_area' => $this->input->post('luas_area', true),
            ];


            $this->db->where('id_kabupaten', $id);
            $this->db->update('kabupaten', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('datamaster/geoJatim');
        }
    }


    public function upt()
    {
        is_logged_in();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['kantorUPT'] = $this->KantorUPT->get_upt();
        $data['sebaran_upt'] = $this->KantorUPT->get_sebaran_upt();
        
        // var_dump ($data['kantorUPT']);
        //     die;
        $data['detail_kabupaten'] = $this->Sebaran_Jatim->detail_kabupaten_object();
        $data['kabupaten'] = $this->Perusahaan->get_Jatim();
        

        $data['title'] = 'Kantor UPT';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('datamaster/upt', $data);
        $this->load->view('templates/footer-upt');
    }


    public function upt_add()
    {
        // is_logged_in();
        //load data user login session
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // load data count cpmi pmi tka pengangguran
        $data['tka'] = $this->Penempatan->getTotalTKA();
        $data['pmib'] = $this->Penempatan->getTotalPMIB();
        $data['cpmi'] = $this->Penempatan->getTotalCPMI();
        $data['phk'] = $this->Penempatan->getTotalPHK();

        $data['kabupaten'] = $this->Penempatan->get_Jatim();
        $data['detail_kabupaten'] = $this->Sebaran_Jatim->detail_kabupaten_object();

        $this->form_validation->set_rules('nama_upt', 'Nama UPT', 'trim|required');
        $this->form_validation->set_rules('kab', 'Kabupaten/kota', 'trim|required');
        $this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('long', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('ket_upt', 'Keterangan Cakupan', 'trim|required');

        // $this->form_validation->set_rules('tanggal_data', 'Tanggal Data Inputan', 'required');



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kantor UPT';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/upt_add', $data);
            $this->load->view('templates/footer-upt-add', $data);
        } else {
            $data = [
                // 'perusahaan' => $this->input->post('perusahaan'),
                'nama_upt' => $this->input->post('nama_upt'),
                'kabupaten_id' => $this->input->post('kab'),
                'lat_upt' => $this->input->post('lat'),
                'long_upt' => $this->input->post('long'),
                'ket_upt' => $this->input->post('ket_upt'),
            ];


            $this->db->insert('kantor_upt', $data);
            // $this->db->insert('tb_perusahaan_negara', $data_perusahaan_negara);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Ditambahkan !</strong> data telah berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('datamaster/upt');
        }
    }

    public function upt_edit($id)
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
        $data['kabupaten'] = $this->Penempatan->get_Jatim();
        $data['edit_upt'] = $this->KantorUPT->edit_upt($id);
        // menampilkan warna wilayah
        $data['detail_kabupaten'] = $this->Sebaran_Jatim->detail_kabupaten_object();
        // var_dump ($data['edit_upt']);
        //     die;
        

        $this->form_validation->set_rules('nama_upt', 'Nama UPT', 'trim|required');
        $this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('long', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('ket_upt', 'Keterangan Cakupan', 'trim|required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kantor UPT';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datamaster/upt_edit', $data);
            $this->load->view('templates/footer-upt-edit', $data);
            
        } else {
            $data = [
                'nama_upt' => $this->input->post('nama_upt'),
                'lat_upt' => $this->input->post('lat'),
                'long_upt' => $this->input->post('long'),
                'ket_upt' => $this->input->post('ket_upt'),
            ];


            $this->db->where('id_upt', $id);
            $this->db->update('kantor_upt', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Disunting !</strong> data telah berhasil diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('datamaster/upt');
        }
    }
    
    public function upt_delete($id)
    {
        $this->db->where('id_upt', $id);
        $this->db->delete('kantor_upt');

        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Dihapus !</strong> data telah berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
        redirect('datamaster/upt');
    }
    
}
