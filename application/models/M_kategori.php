<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_kategori extends CI_Model{
      function semua()
      {
        return $this->db->get('barang');
      }

       function selectX($tbl,$where)
       {
         return $this->db->get_where($tbl,$where);
       }

       function edit($tbl,$data,$where)
       {
         $this->db->where($where);
         $this->db->update($tbl, $data);
       }
       function hitungbarang($id_kategori)
        {
          $this->db->where('id_kategori',$id_kategori);
          $query = $this->db->count_all('barang');
           return $query->result();
        }
       function per_kategori($id_kategori,$limit,$offset)
       {
         $this->db->where('id_kategori',$id_kategori);
         $this->db->limit($limit);
         $query = $this->db->get('barang',$offset);
         return $query->result();
        }

        function per_subkategori($id_sub_kategori,$limit,$offset)
        {
          $this->db->where('id_sub_kategori',$id_sub_kategori);
          $this->db->limit($limit);
          $query = $this->db->get('barang',$offset);
          return $query->result();
         }
  }
