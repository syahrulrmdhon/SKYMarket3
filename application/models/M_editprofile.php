<?php
  defined('BASEPATH') or exit('No direct script access allowed');

class M_editprofile extends CI_Model
{
    function semua()
    {
        return $this->db->get('user');
    }

    function selectX($tbl, $where)
    {
        return $this->db->get_where($tbl, $where);
    }

    function edit($tbl, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($tbl, $data);
    }
    function per_id($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('user');
        return $query->result();
    }
}
