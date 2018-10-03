<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    function __construct()
    {
            parent :: __construct();
            $this->load->model('M_cart', 'h');
            $this->load->model('M_home', 'c');
            $this->load->library('rajaongkir');
            $this->load->helper('text');
    }
    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['data']=$this->h->tampilcart($id_user);
        $this->load->view('cart_v', $data);
    }
    public function bayar()
    {

        $data['id_user'] = $this->input->post('user_id');
        $data['id_payment'] = $this->input->post('id_payment');
        $data['order_id'] = $this->input->post('order_id');
        $data['id_alamat'] = $this->input->post('alam');
        $data['status'] = $this->input->post('status');
        $data['kurir'] = $this->input->post('kurir');
        $data['ongkir'] = $this->input->post('ongkir');
        $data['total_tagihan'] = $this->input->post('total_tagihan');
        $data['id_bank'] = $this->input->post('bank');
        $data['tanggal'] = $this->input->post('tanggal');

        $id_user = $this->input->post('user_id');
        $id_bank = $this->input->post('bank');
        $email = $this->input->post('email');
        $this->h->kepayment($data);
        $order_id = $this->input->post('order_id');
        $q = $this->h->pindahin1($id_user);
        foreach ($q as $key) {
            $key->order_id = $order_id;
            $this->h->pindahin2($key);
        }
        $this->h->pindahin3($id_user);
        if ($id_bank == "Bank Mandiri") {
            $rek = "1560009861578 an PT.Said Krama Yudha";
        } elseif ($id_bank == "Bank BNI") {
            $rek = "0178305704 an PT.Said Krama Yudha";
        } else {
            $rek = "5220304312 an PT.Said Krama Yudha";
        }
        $jcart = $this->input->post('jcart');
        for ($i=0; $i < $jcart; $i++) {
            $ku['nama_barang'][$i] = $this->input->post('nb'.$i.'');
            $ku['jumlah'][$i] = $this->input->post('jm'.$i.'');
            $ku['sub_total'][$i] = $this->input->post('su'.$i.'');
        }

        $u['ongkir'] = $this->input->post('ongkir');
        $u['total_tagihan'] = $this->input->post('total_tagihan');
        $this->h->kirimEmail($email, $rek, $ku, $u, $jcart);
        redirect(base_url('Checkout'));
    }
    function deletea()
    {
        $id_cart= $this->input->post("id_cart");
        $result=$this->h->delete($id_cart);
        redirect(base_url('Cart'));
    }
    function deleteal()
    {
        $id_alamat= $this->input->post("id_alamat");
        $this->h->deletealamat($id_alamat);
        redirect(base_url('Cart'));
    }
    function updatej()
    {
        $id_cart = $this->input->post('id_cart');
        $harga = $this->input->post('harga');
        $jum = $this->input->post('jumlah');
        $berat = $this->input->post('berat_total');
        $berat_total = $berat * $jum;
        $sub = $harga * $jum;
        $data['sub_total'] = $sub;
        $data['berat_total'] = $berat_total;
        $data['jumlah'] = $this->input->post('jumlah');
        $this->h->updatej($id_cart, $data);
        redirect(base_url('Cart'));
    }
    function getCity()
    {
        $province = $this->input->get('id_province');
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 37975cf3eb34758b467ba447b7980692"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
          //echo $response;
            $data = json_decode($response, true);
          //echo json_encode($k['rajaongkir']['results']);


            for ($j=0; $j < count($data['rajaongkir']['results']); $j++) {
                echo "<option name='city' value='".$data['rajaongkir']['results'][$j]['city_id']."'
		    valuelain='".$data['rajaongkir']['results'][$j]['city_id']."'
		    valuelagi='".$data['rajaongkir']['results'][$j]['city_name']."'>".$data['rajaongkir']['results'][$j]['city_name']."</option>";
            }
        }
    }

    function getCost()
    {
        $origin = $this->input->get('origin');
        $destination = $this->input->get('destination');
        $berat = $this->input->get('berat');
        $courier = $this->input->get('courier');

        $data = array('origin' => $origin,
                        'destination' => $destination,
                        'berat' => $berat,
                        'courier' => $courier

        );

        $this->load->view('rajaongkir/getCost', $data);
    }
    function tambahalamat()
    {
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'required');
        $this->form_validation->set_rules('kodepos', 'KODEPOS', 'required');
    //s $this->form_validation->set_rules('kota','KOTA','required');
        //$this->form_validation->set_rules('provinsi','PROVINSI','required');
        $this->form_validation->set_rules('telp_penerima', 'telp_penerima', 'required');
        $this->form_validation->set_rules('nama_penerima', 'nama_penerima', 'required');
        $this->form_validation->set_rules('nama_alamat', 'nama_alamat', 'required');

        if ($this->form_validation->run() == false) {
                redirect(base_url('Cart'));
        } else {
                $data['id_user'] = $this->input->post('id_user');
                $data['id_provinsi'] = $this->input->post('id_province');
                $data['id_city'] = $this->input->post('id_city');
                $data['nama_alamat']   =    $this->input->post('nama_alamat');
                $data['nama_penerima']   =    $this->input->post('nama_penerima');
                $data['alamat']   =    $this->input->post('alamat');
                $data['kode_pos']   =    $this->input->post('kodepos');
                $data['kota']  =    $this->input->post('nama_city');
                $data['provinsi'] =    $this->input->post('nama_province');
                $data['id_alamat'] = $this->input->post('id_alamat');
                $data['telp_penerima'] = $this->input->post('telp_penerima');

                $this->h->alamat($data);

                redirect(base_url('Cart'));
        }
    }
}
