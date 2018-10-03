<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_home', 'c');
        $this->load->library('session');
        $this->load->helper('text'); // memanggil helper text
    }

    public function index()
    {
        $data['data']=$this->c->Tampilkan1();
        foreach ($this->c->getkategori() as $key) {
            $id = ($key->id_kategori);
        }
        $data['data']=$this->c->getsubkategori($id);
        $data['data']=$this->c->getkategori();
        $this->load->view('home_v');
    }
    public function cari()
    {
        $cari = $this->input->post('cari');
        $data['data']=$this->c->cariBarang($cari);
        $this->load->view('cari_v', $data);
    }

    public function addwishlist()
    {
        $this->form_validation->set_rules('id_wishlist', 'id_wishlist', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('id_barang', 'id_barang', 'required');

        if ($this->form_validation->run() == false) {
                $this->load->view('home_v');
        } else {
                $data2['id_wishlist'] = $this->input->post('id_wishlist');
                $data2['id_user'] = $this->input->post('id_user');
                $data2['id_barang'] = $this->input->post('id_barang');

                $this->c->addwish($data2);

                redirect(base_url('Wishlist'));
        }
    }
    public function cart()
    {
                $data3['id_cart'] = $this->input->post('id_cart');
                $data3['id_user'] = $this->input->post('id_user');
                $data3['id_barang'] = $this->input->post('id_barang');
                $data3['sub_total']   =    $this->input->post('sub_total');
                $data3['jumlah'] = $this->input->post('jumlah');
                $data3['berat_total'] = $this->input->post('berat_total');

                $this->c->kecart($data3);

                redirect(base_url('Cart'));
    }
}
