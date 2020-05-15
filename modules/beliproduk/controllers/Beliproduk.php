<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beliproduk extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('M_Beliproduk');
		$this->load->helper('url');
        $this->simple_login->cek_admin(); 
	}
	
	function index(){
		$data['judul'] = "Dashboard | Beli Produk";
		$this->load->model('cart_beli/M_Cart_Beli');
		$data['sum_jumlah']= $this->M_Cart_Beli->jumlah_cart();

		//PAGEINATION
		$this->load->library('pagination');
		$config['base_url']		= 'http://localhost/kopiku/beliproduk/index';
		$config['total_rows']	= $this->M_Beliproduk->countAllData();
		$config['per_page'] 	= 5;
		$config['num_link'] 	= 3;

		//STYLE
		$config['full_tag_open'] 	= '<nav class="mt-4"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] 	= '</ul></nav>';
		//first
		$config['first_link']		= 'First';
		$config['first_tag_open']	= '<li class="page-item">';
		$config['first_tag_close']	= '</li">';
		//last
		$config['last_link']		= 'Last';
		$config['last_tag_open']	= '<li class="page-item">';
		$config['last_tag_close']	= '</li">';
		//next
		$config['next_link']		= '&raquo';
		$config['next_tag_open']	= '<li class="page-item">';
		$config['next_tag_close']	= '</li">';
		//prev
		$config['prev_link']		= '&laquo';
		$config['prev_tag_open']	= '<li class="page-item">';
		$config['prev_tag_close']	= '</li">';
		$config['prev_link']		= '&laquo';
		//current page
		$config['cur_tag_open']		= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']	= '</a></li">';
		//current page
		$config['num_tag_open']		= '<li class="page-item">';
		$config['num_tag_close']	= '</li">';
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['products'] = $this->M_Beliproduk->tampil_data_limit($config['per_page'], $data['start']);
		$this->load->view('dashboard/template/admin_header', $data);
		$this->load->view('dashboard/template/admin_sidebar');
		$this->load->view('index',$data);
		$this->load->view('dashboard/template/admin_footer');
	}
}
