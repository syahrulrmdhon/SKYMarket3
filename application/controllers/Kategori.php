<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this->load->model('M_home','c');
			$this->load->helper(array('url','form'));
			$this->load->library('pagination');
			$this->load->model('M_kategori'); //call model

	}

	public function index()
	{
		$this->load->view('kategori_v');
	}
	public function per_kategori($id_kategori)
	{
		$where = $this->uri->segment(3);
		$jml = $this->db->get_where('barang',array('id_kategori' => $where));
		$config['base_url'] = base_url().'Kategori/per_kategori/'.$where;
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 9;
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		if($this->uri->segment(3)){
				$page = ($this->uri->segment(4)) ;
			}
			else{
				$page = 1;
			}
			$data['result'] = $this->M_kategori->per_kategori($where,$config['per_page'],$page);
			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );
			$this->load->view('kategori_v',$data);
	}
	public function per_subkategori($id_sub_kategori)
	{
		$where = $this->uri->segment(3);
		$jml = $this->db->get_where('barang',array('id_sub_kategori' => $where));
		$config['base_url'] = base_url().'Kategori/per_subkategori/'.$where;
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 6;
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		if($this->uri->segment(3)){
				$page = ($this->uri->segment(4)) ;
			}
			else{
				$page = 1;
			}
			$data['result'] = $this->M_kategori->per_subkategori($where,$config['per_page'],$page);
			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );
			$this->load->view('kategori_v',$data);
	}

}
