<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_checkout extends CI_Model{

       function tampilpayment($id_user)
       {
         $this->db->where('id_user',$id_user);
         $query = $this->db->get('payment');
         return $query->result();
       }
       function tampilpay($id_user)
       {
         $this->db->where('id_user',$id_user);
         $bukti = "";
         $this->db->where('bukti_bayar',$bukti);
         $query = $this->db->get('payment');
         return $query->result();
       }
       function ambilpy($id_user)
       {
         $bukti = "";
         $this->db->select('payment.*,payment_buffer.*')
              ->from('payment_buffer')
              ->join('payment','payment.id_user=payment_buffer.id_user','inner')
              ->where('payment_buffer.id_user',$id_user)
              ->where('payment.bukti_bayar !=',$bukti);
              $query  = $this->db->get();
         return $query->result();
       }
       function orderhistory($id_user)
       {
        // $query = $this->db->query("SELECT payment_buffer.* FROM payment INNER JOIN payment_buffer ON payment.id_user = '' WHERE status = 'Sudah'");
         $this->db->select('payment_buffer.*,alamat.*')
              ->from('payment')
              ->join('payment_buffer','payment.id_user="'.$id_user.'"','inner')
              ->join('alamat','payment.id_user=alamat.id_user')
              ->where('status','Sudah');
              $query  = $this->db->get();
         return $query->result();
       }

       function tampilp($id_user)
       {
         $bayar = '';
         $query = $this->db->query("SELECT order_id FROM payment where id_user = '$id_user' and bukti_bayar = '$bayar'");
         if ($query->num_rows() > 0)
        { return $query->row_array();
        }
        else {return NULL;}
       }

       function updateb($id_payment,$data)
       {
         $this->db->where('id_payment',$id_payment);
         $this->db->update('payment',$data);
       }
       function updatestok($id_barang,$dati)
       {
         $this->db->where('id_barang',$id_barang);
         $this->db->update('barang',$dati);
       }
       function getbuffer($order_id)
       {
         $this->db->select('barang.*,payment_buffer.*')
              ->from('barang')
              ->join('payment_buffer','barang.id_barang=payment_buffer.id_barang','inner')
              ->where('payment_buffer.order_id',$order_id);
              $query  = $this->db->get();
         return $query->result();
       }
       function deletepay($id_payment)
       {
         $this->db->where("id_payment",$id_payment);
     		$query = $this->db->delete("payment");
       }
       function deletebuff($order_id)
       {
         $this->db->where("order_id",$order_id);
     		$query = $this->db->delete("payment_buffer");
       }
  }
