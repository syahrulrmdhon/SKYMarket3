<?php
  defined('BASEPATH') or exit('No direct script access allowed');

class M_contact extends CI_Model
{

    function keluh($data)
    {
          $this->db->insert('feedback', $data);
    }
}
