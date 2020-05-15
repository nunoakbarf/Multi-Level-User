<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Register extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct(){ 
        parent::__construct(); 
        $this->load->library(array('form_validation')); 
        $this->load->helper(array('url','form')); 
        $this->load->model('m_account'); //call model 
    }
	public function index() { 
        $this->form_validation->set_rules('name', 'NAME','required'); 
        $this->form_validation->set_rules('username', 'USERNAME','required'); 
        $this->form_validation->set_rules('email','EMAIL','required|valid_email'); 
        $this->form_validation->set_rules('password','PASSWORD','required'); 
        $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]'); 
        
        if($this->form_validation->run() == FALSE) { 
            $this->load->view('account/adminregisterv'); 
        }else{ 
            $data['nama'] = $this->input->post('name');
            $data['username'] = $this->input->post('username'); 
            $data['email'] = $this->input->post('email'); 
            $data['password'] = md5($this->input->post('password')); 
            $this->m_account->daftar($data); 
            $pesan['message'] = "Pendaftaran berhasil"; 
            $this->load->view('account/successv',$pesan); 
        } 
    }
}
