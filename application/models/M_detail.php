<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_detail extends CI_Model{

      function __construct()
      {
        parent :: __construct();
      }
      function getbarang($id)
      {
        $this->db->where('id_barang',$id);
        $query = $this->db->get('barang');
        return $query->result();
      }
      function postrating($data)
      {
        $this->db->insert('rating',$data);
      }
      public function getkomenrating($id)
      {
        $this->db->where('id_barang',$id);
        $query = $this->db->get('rating');
        return $query->result();
      }
      public function getavgrating($id)
      {
        $query = $this->db->query("SELECT AVG (rating) AS rata FROM `rating` WHERE id_barang='.$id.'");
        return $query->result();
      }
      public function getuser($id_user)
      {
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('user');
        return $query->result();
      }
      public function hapuskom($id_komen)
      {
        $this->db->where('id_rating',$id_komen);
        $this->db->delete('rating');
      }

}
