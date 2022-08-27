<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Masuk | Admin';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validation success
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $this->db->select('user.id,user.email,user_role.role,user.role_id,user.is_active,user.password,user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where('email', $email);
        $user = $this->db->get()->row_array();
        // usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role' => $user['role'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    
                    if ($user['role_id'] == 1) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> Login Berhasil !</strong> kamu telah berhasil login.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>   </div>');
                        redirect('beranda');
                        
                        
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> Login Berhasil !</strong> kamu telah berhasil login.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>   </div>');
                        redirect('user');
                       
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> Pengguna tidak ditemukan !</strong> E-mail atau password salah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>   </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="warning alert-danger alert-dismissible fade show" role="alert">
                <strong> E-mail ini belum di aktivasi !</strong> silakan cek e-mail kamu.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>   </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message','<div class="warning alert-danger alert-dismissible fade show" role="alert">
            <strong> E-mail tidak terdaftar !</strong> Masukkan email yang benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Logout !</strong> kamu telah berhasil logout.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>   </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }



   

    public function registration() 
    { 
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]',[
            'is_unique' => 'Alamat E-mail sudah digunakan']);
        $this->form_validation->set_rules('password1', 'Password', 'min_length[4]|matches[password2]|trim|required', [
            'matches' => 'Password tidak sama,  ulangi lagi',
            'min_lenght' => 'Password telalu pendek, min 4 huruf/angka'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]|trim|required');

        if ($this->form_validation->run()== false) {
            $data['title'] = 'Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Silahkan cek E-mail !</strong> kami mengirim sebuah tautan kepada '. $email .' untuk aktivasi akun kamu.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('auth');
        } 
    }
    
    private function _sendEmail($token, $type) 
    {
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'savhiraindah@gmail.com',
                'smtp_pass' => 'oyjocfiavzdqwlrb',
                'smtp_port' => 465,
                'smtp_crypto' => 'ssl',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE,
                'newline' => "\r\n"
            ];
        
            $this->load->library('email', $config);

            $this->email->from('savhiraindah@gmail.com', 'SiPENTA DISNAKER' );
            $this->email->to($this->input->post('email'));

            if ($type == 'verify') {

                $this->email->subject('Account Verification');
                $this->email->message('Click this link to veriy your account :
                <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&
                token=' . urlencode($token) . '">Activate</a>');  
            } else if($type == 'forgot') {

                $this->email->subject('Reset Password');
                $this->email->message('Click this link to Reset your password :
                <a href="'. base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&
                token=' . urlencode($token) . '">Reset Password</a>');  
            }
            
            if ($this->email->send()) {
                return true;
            } else {
                echo $this->email->print_debugger();
                die;
            }

    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user',['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])
            ->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60*60*24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> Aktivasi Berhasil!</strong> akun ' . $email . ' sudah aktif, silahkan LOGIN.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>   </div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> Aktivasi Akun Gagal !</strong> Token Expired (Kadaluarsa).
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>   </div>');
                    redirect('auth');
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Aktivasi Akun Gagal !</strong> Invalid Token.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>   </div>');
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Aktivasi Akun Gagal !</strong> E-mail salah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('auth');
        }
        
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');

        if ($this->form_validation->run() == false) {

        $data['title'] = 'Lupa Password';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/forgot-password');
        $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email,
            'is_active' => 1])->row_array();

            if ($user) { 
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Silahkan cek E-mail!</strong> sebuah email telah dikirim ke '. $email .' untuk reset password.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>   </div>');
                redirect('auth/forgotpassword');
        


            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Email tidak terdaftar/belum diaktivasi !</strong> silahkan masukan email yang benar.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>   </div>');
                redirect('auth/forgotpassword');
        
            }
        }

    }

    public function resetPassword()
    {
         $email = $this->input->get('email');
         $token = $this->input->get('token');

         $user = $this->db->get_where('user', ['email' => $email])->row_array();

         if ($user) { 
            $user_token = $this->db->get_where('user_token',['token' => $token])->row_array();

            if ($user_token) { 
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();

            } else { 
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Reset Password Gagal !</strong> Invalid Token.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>   </div>');
                redirect('auth');
            }
            
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Reset Password Gagal !</strong> E-email salah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>   </div>');
                redirect('auth');
         }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Sukses Password telah  berhasil diubah !</strong> Silahkan login ulang.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>   </div>');
            redirect('auth');
        }
    }
    
}
