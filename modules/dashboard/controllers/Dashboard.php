<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	
	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->simple_login->cek_admin(); 
	}
 
	function index(){
		$data['judul'] = "Dashboard | Admin";
		$data['username'] = $this->session->userdata('username');
		$this->load->model('cart_beli/M_Cart_Beli');
		$data['sum_jumlah']= $this->M_Cart_Beli->jumlah_cart();
		$this->load->view('template/admin_header', $data);
		$this->load->view('template/admin_sidebar');
		$this->load->view('dashboardv',$data);
		$this->load->view('template/admin_footer');
	}
}
