<?php
  defined('BASEPATH') or exit('No direct script access allowed');

class M_wishlist extends CI_Model
{

    function __construct()
    {
        parent :: __construct();
    }

    function Tampilkan2($id_user)
    {
          $this->db->select('barang.*,wishlist.*')
               ->from('barang')
               ->join('wishlist', 'barang.id_barang=wishlist.id_barang', 'inner')
               ->where('wishlist.id_user', $id_user);
               $query  = $this->db->get();

          return $query->result();
    }

    function per_id($id)
    {
        $this->db->where('id_pekerjaan', $id);
        $query = $this->db->get('pekerjaan');
        return $query->result();
    }
    function delete($id)
    {
        $this->db->where("id_wishlist", $id);
        $this->db->delete("wishlist");
    }
}
