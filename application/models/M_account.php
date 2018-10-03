<?php
  defined('BASEPATH') or exit('No direct script access allowed');

class M_account extends CI_Model
{

    function __construct()
    {
            // Call the Model constructor
            parent::__construct();
    }
    function daftar($data)
    {
          $this->db->insert('user', $data);
    }
    function sendEmail($to_email)
    {
        $from_email = 'cobaskymarket@gmail.com'; //change this to yours
        $subject = '[SKYMarket] Verifikasi Alamat Email';
        $message = 'Yth User,<br /><br />Mohon click link dibawah ini untuk melakukan aktivasi akun.<br /><br /> http://localhost/SKYMarket3/Register/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = '70420825sr'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = true;
        $config['newline'] = "\r\n"; //use double quotes
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from($from_email, 'SKYMarket');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }

   //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('user', $data);
    }
}
