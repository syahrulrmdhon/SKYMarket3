<?php
  defined('BASEPATH') or exit('No direct script access allowed');

class M_alamat extends CI_Model
{

    function alamat($data)
    {
          $this->db->insert('alamat', $data);
    }
}
