<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Cart');
		$this->load->helper('url');
	}
	public function detail_cart(){
		$data['judul'] = "K⍜PIKU | Cart Shopping";
		$this->load->model('M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		$this->load->view('beranda/template/user_header', $data);
		$this->load->view('cartv', $data);
		$this->load->view('beranda/template/user_footer', $data);
	}
	public function delete_cart($id){
		$where = array ('prod_id' => $id);
		$this->M_Cart->hapus_cart($where, 'cart');
		redirect('cart/detail_cart');
	}
	public function delete_cart_transaction($id){
		$where = array ('prod_id' => $id);
		$this->M_Cart->hapus_cart_transaction($where, 'cart');
		redirect('user_dashboard');
	}
	public function delete_all_cart(){
		$this->M_Cart->hapus_all_cart();
		redirect('cart/detail_cart');
	}
	public function add_cart($id){
		$this->simple_login_user->cek_login_user();
		$id_user = $this->M_Cart->id_user();

		$rows = $this->db->query('select * from cart where prod_id ="'.$id.'" and id_user = "'.$id_user.'"');
		if ($rows->num_rows() == 1) {
			$prod = $rows->row();
			$qty = $prod->qty + 1;
			$data = array(
					'qty' => $qty
			);
			$this->db->where('prod_id', $id);
			$this->db->update('cart', $data);
		} else {
			$prod = $this->M_Cart->find($id);
			$data = array(
				'prod_id'	=> $prod->prod_id,
				'qty'		=> 1,
				'price'		=> $prod->prod_price,
				'prod_name'	=> $prod->prod_name,
				'id_user'	=> $id_user
			);
			$this->M_Cart->input_data($data,'cart');
		}
		redirect('cart/detail_cart');
	}

	public function min_qty($id){
		$rows = $this->db->query('select * from cart where prod_id ="'.$id.'" ');
		if ($rows->num_rows() == 1) {
            $prod = $rows->row();
            $qty = $prod->qty - 1;
            $data = array(
                    'qty' => $qty
            );
            $this->db->where('prod_id', $id);
            $this->db->update('cart', $data);
        } else {
            $prod = $this->M_Cart->find($id);
			$data = array(
				'prod_id'	=> $prod->prod_id,
				'qty'		=> 1,
				'price'		=> $prod->prod_price,
				'prod_name'	=> $prod->prod_name
			);
			$this->M_Cart->input_data($data,'cart');
        }
		redirect('cart/detail_cart');
	}
	
	public function transaction(){
		$this->simple_login_user->cek_login_user();
		if ($this->simple_login_user->cek_login_user() == TRUE ) {
            $this->load->view('user_login');
		} else {
			redirect('user_dashboard');
		}
		redirect('user_dashboard');
	}
	
	public function order_now(){
		$this->M_Cart->co();
	}
}