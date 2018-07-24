<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller{
	Public function __construct(){
		parent::__construct();
		$this->load->model('Auth_Model');
	}

	Public function index(){
		$this->load->view('index');
	}

	// login
	Public function signIn(){
		$this->form_validation->set_rules('username', 'Username','trim|required|max_length[20]');
		$this->form_validation->set_rules('password', 'Password','trim|required|max_length[20]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('index');
		}
		else{
			$username = $this->input->post('username');
			$db = $this->Auth_Model->proccessLogin($username)->row();
			if(hash_verified($this->input->post('password'), $db->password)){
				//buat session 
			}
			else{
				$this->session->set_flashdata('authFalse', 'Username atau password salah');	
				redirect('Authentication/index');
			}
		}
	}


	// register
	Public function register(){
		//validasi form register
		$this->form_validation->set_rules('username', 'Username','trim|required|max_length[30]|callback_username_check');
		$this->form_validation->set_rules('password', 'Password','trim|required|max_length[20]');

		if($this->form_validation->run() == FALSE){
			$this->load->view('index');
		}
		else{
			$data = array(
				'username' => $this->input->post('username'),
				'role'     => 2,
				'password' => get_hash($this->input->post('password'))
			);
			$this->Auth_Model->proccessRegister($data);
			$this->session->set_flashdata('authTrue', 'Success Register');
			redirect('Authentication/index');
		}
	}

	//check username dari callback validasi
	public function username_check($username){
		$check = $this->Auth_Model->usernameCheck($username)->num_rows();
		if($check > 0){
			$this->form_validation->set_message('username_check', 'Username has already been taken');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
}


