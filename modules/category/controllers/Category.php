<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('M_Cat');
		$this->load->helper('url');
        $this->simple_login->cek_admin(); 
	}
	
	function index(){
		$data['judul'] = "Dashboard | Kategori Produk";
		$data['products'] = $this->M_Cat->tampil_data();
		$this->load->model('cart_beli/M_Cart_Beli');
		$data['sum_jumlah']= $this->M_Cart_Beli->jumlah_cart();
		$this->load->view('dashboard/template/admin_header', $data);
		$this->load->view('dashboard/template/admin_sidebar');
		$this->load->view('index',$data);
		$this->load->view('dashboard/template/admin_footer');
	}

	function tambah(){
		$this->load->view('category');
	}
 
	function tambah_aksi(){
		$cat_id = $this->input->post('cat_id');
		$cat_name = $this->input->post('cat_name');
 
		$data = array(
			'cat_id' => $cat_id,
			'cat_name' => $cat_name
			);
		$this->M_Cat->input_data($data,'category');
		redirect('category');
	}

	function update(){
		$cat_id = $this->input->post('cat_id');
		$cat_name = $this->input->post('cat_name');
	 
		$data = array(
			'cat_name' => $cat_name
		);
		$this->M_Cat->update_data($data,$cat_id);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('category');
	 
		$where = array(
			'cat_id' => $cat_id
		);
	 
		$this->M_Cat->update_data($where,$data,'category');
		redirect('category');
	}

    public function delete($cat_id){
        $this->db->where('cat_id', $cat_id);
        $this->db->delete('category');
        redirect('category');
	}
	
	public function produk(){
		$data['judul'] = "Dashboard | Produk Kategori";
		$data['category'] = $this->M_Cat->tampil_data();
		$data['username'] = $this->session->userdata('username');
		$this->load->model('cart_beli/M_Cart_Beli');
		$data['sum_jumlah']= $this->M_Cart_Beli->jumlah_cart();
		$this->load->view('dashboard/template/admin_header', $data);
		$this->load->view('dashboard/template/admin_sidebar');
		$this->load->view('produk', $data);
		$this->load->view('dashboard/template/admin_footer');
	}

	public function daftar($id){
		$data['judul'] = "Dashboard | Produk Kategori";
		$this->load->model('cart_beli/M_Cart_Beli');
		$data['sum_jumlah']= $this->M_Cart_Beli->jumlah_cart();

		$this->db->select('*');
        $this->db->where('category.cat_id', $id);
        $this->db->from('products');
        $this->db->join('category', 'products.cat_id = category.cat_id');
		$config['total_rows']	= $this->db->count_all_results();
		$data['total_rows'] 	= $config['total_rows'];
		$data['start'] = $this->uri->segment(3);
        $data['products'] = $this->M_Cat->getBarangKategori($id);
		$this->load->view('dashboard/template/admin_header', $data);
		$this->load->view('dashboard/template/admin_sidebar');
		$this->load->view('dataproduk/dataprodukv', $data);
		$this->load->view('dashboard/template/admin_footer');
	}

}