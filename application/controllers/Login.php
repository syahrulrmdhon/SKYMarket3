<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_home','c');
		$this->load->library('session');
		$this->load->helper('text'); // memanggil helper text
	}

	// Index login
	public function index() {
		$valid = $this->form_validation;
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$valid->set_rules('email','EMAIL','required');
		$valid->set_rules('password','Password','required');
		if($valid->run()) {
			$this->simple_login->login($email,$password, base_url('home'), base_url('login'));
		}
		// End fungsi login
		$this->load->view('login_v');
	}

	// Logout di sini
	public function logout() {
		$this->simple_login->logout();
	}
}
