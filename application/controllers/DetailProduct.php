<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailProduct extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->model('M_home', 'c');
        $this->load->model('M_detail', 'd');
    }
    public function index()
    {
        $this->load->view('detailproduct_v');
    }
    public function getbarang($id_barang)
    {
        $where = $this->uri->segment(3);
        $data['data'] = $this->d->getbarang($where);
        $this->load->view('detailproduct_v', $data);
    }
    public function cart()
    {
        $harga = $this->input->post('sub_total');
        $jum = $this->input->post('jumlah');
        $sub = $harga * $jum;
        $data3['id_cart'] = $this->input->post('id_cart');
        $data3['id_user'] = $this->input->post('id_user');
        $data3['id_barang'] = $this->input->post('id_barang');
        $data3['sub_total']   =    $sub;
        $data3['jumlah'] = $this->input->post('jumlah');
        $data3['berat_total'] = $this->input->post('berat_total');

        $this->c->kecart($data3);

        redirect(base_url('Cart'));
    }
    public function hapuskomen($id_komen, $id_barang)
    {
        $this->d->hapuskom($id_komen);
        redirect(base_url('DetailProduct/getbarang/'.$id_barang));
    }
    public function postrate($id_barang)
    {
                $data3['id_rating'] = $this->input->post('id_rating');
                $data3['id_user'] = $this->input->post('id_user');
                $data3['id_barang'] = $this->input->post('id_barang');
                $data3['komentar']   =    $this->input->post('komentar');
                $data3['rating'] =    $this->input->post('rating');
                $data3['tanggal_rating']  =    $this->input->post('tanggal_rating');

                $this->d->postrating($data3);
        redirect(base_url('DetailProduct/getbarang/'.$id_barang));
    }
}
