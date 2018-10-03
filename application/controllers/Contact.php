<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library(array('form_validation'));
        $this->load->model('M_contact'); //call model
        $this->load->model('M_home', 'c');
    }
    public function index()
    {
        $this->form_validation->set_rules('nama_lengkap', 'NAME', 'required');
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'SUBJECT', 'required');
        $this->form_validation->set_rules('isi_feedback', 'isi_feedback', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('contact_v');
        } else {
            $data['id_feedback'] = $this->input->post('id_feedback');
            $data['nama_lengkap']   =    $this->input->post('nama_lengkap');
            $data['email']  =    $this->input->post('email');
            $data['subject'] =    $this->input->post('subject');
            $data['isi_feedback'] = $this->input->post('isi_feedback');
            $data['tanggal_feedback'] = $this->input->post('tanggal_feedback');
            $this->M_contact->keluh($data);
            $this->session->set_flashdata('ppp', '<div class="alert alert-warning"> Terimakasih </div>');
            $this->load->view('contact_v');
        }
    }
}
