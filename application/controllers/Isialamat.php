<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class isialamat extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
    		$this->load->model('M_home','c');
        $this->load->helper(array('url','form'));
        $this->load->model('M_alamat'); //call model
    }

    public function index() {
        $this->form_validation->set_rules('alamat', 'ALAMAT','required');
        $this->form_validation->set_rules('kodepos', 'KODEPOS','required');
        $this->form_validation->set_rules('kecamatan','KECAMATAN','required');
        $this->form_validation->set_rules('kota','KOTA','required');
        $this->form_validation->set_rules('provinsi','PROVINSI','required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('isialamat_v');
        }else{
            $data['id_user'] = $this->input->post('id_user');
            $data['alamat']   =    $this->input->post('alamat');
            $data['kodepos']   =    $this->input->post('kodepos');
            $data['kecamatan'] =    $this->input->post('kecamatan');
            $data['kota']  =    $this->input->post('kota');
            $data['provinsi'] =    $this->input->post('provinsi');
            $data['id_alamat'] = $this->input->post('id_alamat');

            $this->M_alamat->alamat($data);

            $pesan['message'] =    "Pendaftaran berhasil";

            $this->load->view('home_v',$pesan);

        }
    }
}
