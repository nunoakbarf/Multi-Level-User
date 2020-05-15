<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('M_Order');
		$this->load->helper('url');
        $this->simple_login->cek_admin(); 
	}
	
	function index(){
		$data['judul'] = "Dashboard | User Order";
		$data['Order'] = $this->M_Order->tampil_data();
		$this->load->model('cart_beli/M_Cart_Beli');
		$data['sum_jumlah']= $this->M_Cart_Beli->jumlah_cart();
		$this->load->view('dashboard/template/admin_header', $data);
		$this->load->view('dashboard/template/admin_sidebar');
		$this->load->view('index',$data);
		$this->load->view('dashboard/template/admin_footer');
	}
	public function delete($order_num){
        $this->db->where('order_num', $order_num);
        $this->db->delete('orders');
        redirect('order');
	}
	public function deleteitems($order_num){
        $this->db->where('order_num', $order_num);
        $this->db->delete('orderitems');
        redirect('order');
	}
	
	public function detail($num){
		$data['judul'] = "Dashboard | Order Detail";
        $data['Order'] = $this->M_Order->getOrderItems($num);
        $data['username'] = $this->session->userdata('username');
		$this->load->model('cart_beli/M_Cart_Beli');
		$data['sum_jumlah']= $this->M_Cart_Beli->jumlah_cart();
		$this->load->view('dashboard/template/admin_header', $data);
		$this->load->view('dashboard/template/admin_sidebar');
		$this->load->view('order_detail',$data);
		$this->load->view('dashboard/template/admin_footer');
	}
	public function detailuser($id){
		$data['judul'] = "Dashboard | Detail User";
        $data['Cust'] = $this->M_Order->getDetailUser($id);
        $data['username'] = $this->session->userdata('username');
		$this->load->model('cart_beli/M_Cart_Beli');
		$data['sum_jumlah']= $this->M_Cart_Beli->jumlah_cart();
		$this->load->view('dashboard/template/admin_header', $data);
		$this->load->view('dashboard/template/admin_sidebar');
		$this->load->view('customer/index',$data);
		$this->load->view('dashboard/template/admin_footer');
	}
}
