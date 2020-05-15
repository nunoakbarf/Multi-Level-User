<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Register extends CI_Controller {

    function __construct(){ 
        parent::__construct(); 
        $this->load->library(array('form_validation')); 
        $this->load->helper(array('url','form')); 
        $this->load->model('m_account_user'); //call model 
    }
	public function index() {
        $this->form_validation->set_rules('name', 'NAME','required'); 
        $this->form_validation->set_rules('phone', 'PHONE','required'); 
        $this->form_validation->set_rules('uname', 'UNAME','required');
        $this->form_validation->set_rules('email','EMAIL','required|valid_email');
        $this->form_validation->set_rules('address', 'ADDRESS');
        $this->form_validation->set_rules('gender', 'GENDER');
        $this->form_validation->set_rules('pw','PW','required'); 
        $this->form_validation->set_rules('pw_conf','PW','required|matches[pw]'); 
        
        if($this->form_validation->run() == FALSE) { 
            if($this->session->userdata('uname') == '') {
                $data['judul'] = "User Registration";
                $this->load->model('cart/M_Cart');
                $data['cart']= $this->M_Cart->get_data();
                $data['sum_jumlah']= $this->M_Cart->jumlah_cart();
                $this->load->view('beranda/template/user_header', $data);
                $this->load->view('account/userregisterv');
                $this->load->view('beranda/template/user_footer', $data);
            } else {
                redirect(site_url('user_dashboard'));
            }
        }else{ 
            $data['nama'] = $this->input->post('name');
            $data['nohp'] = $this->input->post('phone');
            $data['uname'] = $this->input->post('uname'); 
            $data['email'] = $this->input->post('email'); 
            $data['alamat'] = $this->input->post('address'); 
            $data['j_kel'] = $this->input->post('gender');
            $data['pw'] = md5($this->input->post('pw')); 
            $this->m_account_user->daftar($data);
            $pesan['message'] = "Pendaftaran berhasil"; 
            $this->load->view('account/successv',$pesan);
        } 
    }
}
