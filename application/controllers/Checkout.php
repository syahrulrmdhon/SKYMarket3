<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    function __construct()
    {
            parent :: __construct();
            $this->load->helper(array('url','form'));
            $this->load->model('M_cart', 'h');
            $this->load->model('M_home', 'c');
            $this->load->model('M_checkout', 'd');
            $this->load->library('rajaongkir');
            $this->load->helper('text');
    }
    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $order_id['or'] = $this->d->tampilp($id_user);
        $order = $order_id['or']['order_id'];
        $data['data']=$this->d->getbuffer($order);
        $this->load->view('checkout_v', $data);
    }
    function updatebank()
    {
        $nama_rek = $this->input->post('nama_rek');
        $no_rek = $this->input->post('no_rek');
        $bukti = ($_FILES['bukti_bayar']['name']);
        if (isset($bukti)) {
            $nama_baru = time().$_FILES['bukti_bayar']['name'];
            $config['upload_path'] = 'buktibayar/';
            $config['allowed_types'] = 'jpg';
            $config['max_size'] = '0'; // 0 = no file size limit
            $config['file_name']=$nama_baru;
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('bukti_bayar');
            $upload_data2 = $this->upload->data();
            $gambar2 = $upload_data2['file_name'];
        }
        $data = array(
            'nama_rek' => $nama_rek,
            'no_rek' => $no_rek,
            'bukti_bayar' => $gambar2
          );
          $id_payment = $this->input->post('id_payment');
          $this->d->updateb($id_payment, $data);
          $order = $this->input->post('order_id');
          $c = count($this->d->getbuffer($order));
        for ($i=0; $i < $c; $i++) {
            $stok = $this->input->post('jadi'.$i);
            $jp = $this->input->post('jual'.$i);
            $id_barang = $this->input->post('barang_id'.$i);
            $dati = array('stok' => $stok,
            'jumlah_penjualan' => $jp );
            $this->d->updatestok($id_barang, $dati);
        }
          redirect(base_url('Checkout/trims'));
    }
    function trims()
    {
        $this->load->view('checkoutsucces_v');
    }
    function cancelorder()
    {
        $id_payment = $this->input->post('payment');
        $this->d->deletepay($id_payment);
        $order_id = $this->input->post('order');
        $this->d->deletebuff($order_id);
        redirect(base_url('Checkout'));
    }
}
