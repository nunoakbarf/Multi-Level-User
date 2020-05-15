<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Login extends CI_Controller {

	public function index() { 
		// Fungsi Login 
		$valid = $this->form_validation; 
		$username = $this->input->post('username'); 
		$pw = $this->input->post('pw'); 
		$valid->set_rules('username','username','required'); 
		$valid->set_rules('pw','pw','required'); 
		
		if($valid->run()) { 
			$this->simple_login_user->user_login($username,$pw, base_url('user_dashboard'), base_url('user_login')); 
		} // End fungsi login 
		if($this->session->userdata('username') == '') {
			$data['judul'] = "K⍜PIKU | Log In User";
			$this->load->model('cart/M_Cart');
			$data['cart']= $this->M_Cart->get_data();
			$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
			$this->load->view('beranda/template/user_header', $data);
            $this->load->view('account/userloginv');
			$this->db->empty_table('cart');
			$this->load->view('beranda/template/user_footer', $data);
        } else {
            redirect(site_url('user_dashboard'));
        }
	} 
	public function register() {
        $valid = $this->form_validation;
        $valid->set_rules('nama','Name','required|trim');
        $valid->set_rules('nohp','Phone Number','required|trim');
        $valid->set_rules('alamat','Your Address','required|trim');
        $valid->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
        $valid->set_rules('username','Username','required|trim|is_unique[users.username]');
        $valid->set_rules('password','Password','required|trim|min_length[5]|matches[password_conf]',[
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $valid->set_rules('password_conf','Repeat Password','required|trim|matches[password]');
        if($valid->run() == false){
            $data['judul'] = "User Registration";
            $this->load->model('cart/M_Cart');
            $data['cart']= $this->M_Cart->get_data();
            $data['sum_jumlah']= $this->M_Cart->jumlah_cart();
            $this->load->view('beranda/template/user_header', $data);
            $this->load->view('account/userregisterv');
            $this->load->view('beranda/template/user_footer', $data);
        }else{
            $data = [
                'nama'      => htmlspecialchars($this->input->post('nama'), true),
                'nohp'      => $this->input->post('nohp'),
                'alamat'    => $this->input->post('alamat'),
                'j_kel'     => $this->input->post('j_kel'),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'username'  => htmlspecialchars($this->input->post('username', true)),
                'password'  => md5($this->input->post('password')),
            ];
            $this->db->insert('users', $data);
            $this->load->view('account/successv'); 
        }

        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('account/userregisterv', $data);
        }
        else{
            //get user inputs
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            //generate simple random code
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($set), 0, 12);

            //insert user to users table and get id
            $user['email'] = $email;
            $user['password'] = $password;
            $user['code'] = $code;
            $user['active'] = false;
            $id = $this->users_model->insert($user);

            //set up email
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com', //Ubah sesuai dengan host anda
                'smtp_port' => 465,
                'smtp_user' => 'sempakloer12@gmail.com', // Ubah sesuai dengan email yang dipakai untuk mengirim konfirmasi
                'smtp_pass' => 'sempakloer123', // ubah dengan password host anda
                'smtp_username' => 'USERNAME SMTP', // Masukkan username SMTP anda
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );

            $message =  "
            <html>
            <head>
            <title>Verification Code</title>
            </head>
            <body>
            <h2>Thank you for Registering.</h2>
            <p>Your Account:</p>
            <p>Email: ".$email."</p>
            <p>Password: ".$password."</p>
            <p>Please click the link below to activate your account.</p>
            <h4><a href='".base_url()."user/activate/".$id."/".$code."'>Activate My Account</a></h4>
            </body>
            </html>
            ";
            
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject('Signup Verification Email');
            $this->email->message($message);
    }
}

    public function activate(){
        $id =  $this->uri->segment(3);
        $code = $this->uri->segment(4);

        //fetch user details
        $user = $this->users_model->getUser($id);

        //if code matches
        if($user['code'] == $code){
            //update user active status
            $data['active'] = true;
            $query = $this->users_model->activate($data, $id);

            if($query){
            $this->session->set_flashdata('message', 'User activated successfully');
            }
            else{
            $this->session->set_flashdata('message', 'Something went wrong in activating account');
            }
        }
        else{
            $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
        }

        redirect('account/userregisterv');

    }

	public function logout(){
		$this->load->model('cart/M_Cart');
		$this->M_Cart->hapus_all_cart();
		$this->simple_login_user->logout();
	}
}
