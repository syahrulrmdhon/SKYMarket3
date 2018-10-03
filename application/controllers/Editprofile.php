<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editprofile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->model('M_editprofile'); //call model
        $this->load->model('M_home', 'c');
    }

    public function index()
    {
        $id=$this->session->userdata('id_user');
        $data['data']=$this->M_editprofile->per_id($id);
        $this->load->view('editprofile_v');
    }
    public function update($id_user)
    {
        $where = array('id_user' => $id_user);
        $data['ups'] = $this->M_editprofile->selectX('user', $where);
        $this->load->view('editprofile_v', $data);
    }
    function aksi_update()
    {
        $nama_lengkap = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $profil = ($_FILES['profile_picture']['name']);
        if (isset($profil)) {
            $new_name = time().$_FILES['profile_picture']['name'];
            $configs['upload_path'] = './fotouser/';
            $configs['log_threshold'] = 1;
            $configs['allowed_types'] = 'jpg';
            $configs['max_size'] = '0'; // 0 = no file size limit
            $configs['file_name'] = $new_name;
            $configs['overwrite'] = false;
            $this->load->library('upload', $configs);
            $this->upload->initialize($configs);
            $this->upload->do_upload('profile_picture');
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
        }

        $data = array(
        'nama_lengkap' => $nama_lengkap,
        'email' => $email,
        'profile_picture' => $gambar
        );
        $where = array('id_user' => $this->input->post('id_user') );
        $this->M_editprofile->edit('user', $data, $where);
        redirect('home');
    }
}
