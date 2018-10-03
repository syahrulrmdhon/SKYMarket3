<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wishlist extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_wishlist', 'd');
        $this->load->model('M_home', 'c');
        $this->load->helper('text'); // memanggil helper text
    }


    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['data']=$this->d->Tampilkan2($id_user);
        $this->load->view('wishlist_v', $data);
    }
    function delete()
    {
        $id= $this->input->post("id_wishlist");
        $this->d->delete($id);
        redirect(base_url('Wishlist'));
    }
}
