<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Produk');
		$this->load->helper('url');
	}
	public function index(){
		$data['judul'] = "K⍜PIKU | Daftar Produk";
		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		//PAGEINATION
		$this->load->library('pagination');
		$config['base_url']		= 'http://localhost/kopiku/produk/index';
		$config['total_rows']	= $this->M_Produk->countAllData();
		$config['per_page'] 	= 3;
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
		$data['products'] = $this->M_Produk->tampil_data_limit($config['per_page'], $data['start']);
		$data['category'] = $this->M_Produk->kategori();

		$this->load->view('beranda/template/user_header', $data);
		$this->load->view('produkv',$data);
		$this->load->view('beranda/template/user_footer', $data);
	}
	public function daftar($id){
		$data['judul'] = "K⍜PIKU | Produk Kategori";
		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		$this->load->model('category/M_Cat');
		$data['products'] = $this->M_Cat->getBarangKategori($id);
		$data['category'] = $this->M_Produk->kategori();
		
		$this->load->view('beranda/template/user_header', $data);
		$this->load->view('produkv', $data);
		$this->load->view('beranda/template/user_footer', $data);
	}
}