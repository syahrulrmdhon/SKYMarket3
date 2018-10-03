<?php
  defined('BASEPATH') or exit('No direct script access allowed');

class M_cart extends CI_Model
{


    function tampilcart($id_user)
    {
        $this->db->select('barang.*,cart.*')
           ->from('barang')
           ->join('cart', 'barang.id_barang=cart.id_barang', 'inner')
           ->where('cart.id_user', $id_user);
           $query  = $this->db->get();
        return $query->result();
    }
    function tampilpay($id_user)
    {
        $this->db->where('id_user', $id_user);
        $bukti = "";
        $this->db->where('bukti_bayar', $bukti);
        $query = $this->db->get('payment');
        return $query->result();
    }
    function kepayment($data)
    {
         $this->db->insert('payment', $data);
    }
    function pindahin1($id_user)
    {
        $query = $this->db->query("SELECT id_user,id_barang,jumlah,sub_total,berat_total FROM cart WHERE id_user = '".$id_user."'");
        return $query->result();
    }
    function pindahin2($data)
    {
        $this->db->insert('payment_buffer', $data);
    }
    function pindahin3($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('cart');
    }
    function tampilcart2($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get('cart');
        return $query->result();
    }
    function delete($id_cart)
    {
          $this->db->where("id_cart", $id_cart);
          $query = $this->db->delete("cart");
    }
    function deletealamat($id_alamat)
    {
          $this->db->where("id_alamat", $id_alamat);
          $query = $this->db->delete("alamat");
    }
    function tampilalamat($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('alamat');
        return $query->result();
    }
    function alamat($data)
    {
         $this->db->insert('alamat', $data);
    }
    function updatej($id_cart, $data)
    {
        $this->db->where('id_cart', $id_cart);
        $this->db->update('cart', $data);
    }
    function kirimEmail($to_email, $rek, $ku, $u, $jcart)
    {
        $from_email = 'cobaskymarket@gmail.com'; //change this to yours
        $subject = '[SKYMarket] Detail Pesanan';
        for ($i=0; $i < $jcart; $i++) {
            $a ='Nama Barang: '.$ku['nama_barang'][$i].'
              <br/>Jumlah: '.$ku['jumlah'][$i].
            '<br/>Sub Total: '.$ku['sub_total'][$i].'<br/><br/><br/><br/><br/><br/> Ongkos Kirim: ' .$u['ongkir'].
            '<br /><br />
              Total Tagihan : '.$u['total_tagihan'].'
              <br /><br /><br />
              Mohon Transfer ke rekening berikut <br /><br/>';
        }
        $b = 'Yth User,<br /><br />Berikut adalah daftar barang pesanan anda.<br /><br />';
        $m = $rek.'<br/><br/><br/><br/>
          <br/><br/>
          <br/><br/>
          Trimakasih,
          SKYMarket Team';
        $message = $b .''. $a .''. $m;

        //configure email settings
        $configs['protocol'] = 'smtp';
        $configs['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name
        $configs['smtp_port'] = '465'; //smtp port number
        $configs['smtp_user'] = $from_email;
        $configs['smtp_pass'] = '70420825sr'; //$from_email password
        $configs['mailtype'] = 'html';
        $configs['charset'] = 'iso-8859-1';
        $configs['wordwrap'] = true;
        $configs['newline'] = "\r\n"; //use double quotes
        $this->load->library('email', $configs);
        $this->email->initialize($configs);
        $this->email->from($from_email, 'SKYMarket');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
}
