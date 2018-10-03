<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
            $this->load->model('M_home', 'c');
        $this->load->model('M_account'); //call model
    }

    public function index()
    {

        $this->form_validation->set_rules('nama_lengkap', 'NAME', 'required');
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'PASSWORD', 'required');
        $this->form_validation->set_rules('password_conf', 'PASSWORD', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('register_v');
        } else {
            $data['id_user'] = $this->input->post('id_user');
            $data['nama_lengkap']   =    $this->input->post('nama_lengkap');
            $data['email']  =    $this->input->post('email');
            $data['password'] =    md5($this->input->post('password'));
            $data['profile_picture'] = $this->input->post('profile_picture');
            $data['level'] = $this->input->post('level');
            $data['tanggal_daftar'] = $this->input->post('tanggal_daftar');
            $this->M_account->daftar($data);
            $this->M_account->sendEmail($this->input->post('email'));
            $pesan['message'] =    "Pendaftaran berhasil";

            $this->load->view('login_v', $pesan);
        }
    }
    function verify($hash = null)
    {
        if ($this->M_account->verifyEmailID($hash)) {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('Login');
        } else {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('Register');
        }
    }

//---------------------------------
// AJAX REQUEST, IF EMAIL EXISTS
//---------------------------------
    public function register_email_exists()
    {
        $isAvailable = false;
        $isAvailable2 = true;
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|is_unique[user.email]');
        if ($this->form_validation->run() == false) {
            echo json_encode(array(
            'valid' => $isAvailable,
            ));
        } else {
            echo json_encode(array(
            'valid' => $isAvailable2,
            ));
        }
    }
}
