<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Beranda');
		$this->load->helper('url');
	}
	public function index(){
		$data['judul'] = "K⍜PIKU OFFICIAL";
		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		$data['products'] = $this->M_Beranda->tampil_data_limit(3,1);
		$data['category'] = $this->M_Beranda->kategori();
		
		$this->load->model('category/M_Cat');
		$data['category'] = $this->M_Cat->tampil_data();
		$this->load->view('template/user_header', $data);
		$this->load->view('account/beranda',$data);
		$this->load->view('template/user_footer', $data);
	}
	function about(){
		$data['judul'] = "K⍜PIKU | About Us";
		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		$this->load->view('template/user_header', $data);
		$this->load->view('account/about',$data);
		$this->load->view('template/user_footer', $data);
	}
	function contact(){
		$data['judul'] = "K⍜PIKU | Contact Us";
		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		$this->load->view('template/user_header', $data);
		$this->load->view('account/contactv',$data);
		$this->load->view('template/user_footer', $data);
	}
	function addKomentar(){
		$data = array(
			'nama'=> $this->input->post('nama'),
			'email'=> $this->input->post('email'),
			'telp'=> $this->input->post('telp'),
			'komen'=> $this->input->post('komen')
			);
		$query = $this->db->insert('contacts',$data);
		redirect('beranda/contact');
	}
	function pemesanan(){
		$data['judul'] = "K⍜PIKU | Pemesanan";
		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		$this->load->view('template/user_header', $data);
		$this->load->view('account/pemesananv',$data);
		$this->load->view('template/user_footer', $data);
	}
	function detail($prod_id){
		$data['judul'] = "K⍜PIKU | Detail Produk";
		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		$where = array('prod_id' => $prod_id);
		$data['products'] = $this->M_Beranda->detail_data($where,'products')->result();
		$this->load->view('template/user_header', $data);
		$this->load->view('account/detailv',$data);
		$this->load->view('template/user_footer', $data);
	}
}
