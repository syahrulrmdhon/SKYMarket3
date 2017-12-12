<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');
class Simple_login {
 // SET SUPER GLOBAL
    var $CI = NULL;
    public function __construct() {
      $this->CI =& get_instance();
      $this->CI->load->helper('url');
    }
 // Fungsi login
  public function login($email, $password) {
    $query = $this->CI->db->get_where('user',array('email'=>$email,'password' => $password, 'status' => '1'));
    if($query->num_rows() == 1) {
      $row = $this->CI->db->query('SELECT id_user FROM user where email = "'.$email.'"');
      $admin = $row->row();
      $id_user = $admin->id_user;
      $row2 = $this->CI->db->query('SELECT password FROM user where email = "'.$email.'"');
      $admin2 = $row2->row();
      $password = $admin2->password;
      $row4 = $this->CI->db->query('SELECT nama_lengkap FROM user where email = "'.$email.'"');
      $admin4 = $row4->row();
      $nama_lengkap = $admin4->nama_lengkap;
      $row5 = $this->CI->db->query('SELECT profile_picture FROM user where email = "'.$email.'"');
      $admin5 = $row5->row();
      $row6 = $this->CI->db->query('SELECT level FROM user where email = "'.$email.'"');
      $admin6 = $row6->row();
      $level = $admin5->level;
      $this->CI->session->set_userdata('email', $email);
      $this->CI->session->set_userdata('id_login', uniqid(rand()));
      $this->CI->session->set_userdata('id_user', $id_user);
      $this->CI->session->set_userdata('password', $password);
      $this->CI->session->set_userdata('nama_lengkap', $nama_lengkap);
      $this->CI->session->set_userdata('profile_picture', $profile_picture);
      $this->CI->session->set_userdata('level', $level);
        redirect(base_url('home'));
    }
    else{
      $this->CI->session->set_flashdata('sukses','Oops... Email/password salah');
      redirect(base_url('login'));
    }
    return false;
  }
 // Proteksi halaman
  public function cek_login() {
    if($this->CI->session->userdata('email') == '') {
      $this->CI->session->set_flashdata('sukses','Mohon Login');
      redirect(base_url('login'));
    }
 }

/* public function cek_role() {
   if($this->CI->session->userdata('level') == 'Admin') {
     redirect(base_url('skymarket'));
   }
}*/

 // Fungsi logout
  public function logout() {
    $this->CI->session->unset_userdata('id_login');
    $this->CI->session->unset_userdata('id_user');
    $this->CI->session->unset_userdata('nama_lengkap');
    $this->CI->session->unset_userdata('level');
    $this->CI->session->unset_userdata('email');
    $this->CI->session->set_flashdata('sukses');
    redirect(base_url('login'));
  }
}
