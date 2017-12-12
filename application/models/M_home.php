<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_Home extends CI_Model{

      function __construct()
      {
        parent :: __construct();
      }
      public function cariBarang($cari)
	     {
		     $data = $this->db->query("SELECT * from barang where nama_barang like '%$cari%' ");
		     return $data->result();
	     }
       function getcart($id_user)
       {
         $this->db->where('id_user',$id_user);
         $query = $this->db->get('cart');
         return $query->result();
       }
       function getwishlist($id_user)
       {
         $this->db->where('id_user',$id_user);
         $query = $this->db->get('wishlist');
         return $query->result();
       }
      function getslider()
      {
        $query = $this->db->get('slider');
        return $query->result();
      }
      function getbarang($id_barang)
      {
        $query = $this->db->get_where('barang', array('id_barang' => $id_barang ));
        return $query->result();
      }
      function getkategori()
      {
        $query = $this->db->get('kategori');
        return $query->result();
      }
      function getsubkategori($id)
      {
        $this->db->where('id_kategori',$id);
        $query = $this->db->get('subkategori');
        return $query->result();
      }

       function Tampilkan1()
       {
            $this->db->order_by('tanggal','desc');
            $this->db->limit('3');
            $query = $this->db->get('barang');
            return $query->result();
       }
       function hotlist()
       {
            $this->db->order_by('jumlah_penjualan','desc');
            $this->db->limit('3');
            $query = $this->db->get('barang');
            return $query->result();
       }
       function addwish($data)
       {
        $array = array('id_user' => $data['id_user'], 'id_barang' => $data['id_barang'] );
        $this->db->where($array);
        $q = $this->db->get('wishlist');
        if($q->num_rows($array)>0){

        }
        else {
          $this->db->insert('wishlist',$data);
        }

       }
       function kecart($data2)
       {
         $array = array('id_user' => $data2['id_user'], 'id_barang' => $data2['id_barang'] );
         $this->db->where($array);
         $q = $this->db->get('cart');
         if($q->num_rows($array)>0){

         }
         else {
           $this->db->insert('cart',$data2);
         }
       }

       function wishlist($id_wishlist)
       {
         $this->db->where('id_user',$id_user);
         $query = $this->db->get('wishlist');
         return $query->result();
       }
       function getrating($id)
       {
         $this->db->where('id_barang',$id);
         $this->db->select('id_rating , id_barang , AVG(rating) as avg_r');
         $query = $this->db->get('rating');
          return $query->result();
        }

  }
