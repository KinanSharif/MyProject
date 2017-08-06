<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
	parent::__construct();
	   $this->load->database();
	   $this->load->model('Users_model', 'usermodel');
	   $this->load->model('Email_model', 'emailmodel');
	   date_default_timezone_set('Asia/Karachi');
	}
	public function index()
	{
		if($this->input->post('login') == 1)
		{
			$user = new Users_model();
			$user->email = $this->input->post('email');
			$user->password = $this->input->post('password');
			$user->user_role = $this->input->post('user_role');
			$results = $this->usermodel->login($user);
			if(count($results) > 0)
			{
				foreach($results as $row)
				{
					$session_array = array(
						"id" => $row['id'],
						"username" => $row['username'],
						"email" => $row['email'],
						"password" => $row['password'],
						"image" => $row['image'],
						"description" => $row['description'],
						"account_status" => $row['account_status'],
						"user_role" => $row['user_role']
					);
					$this->session->set_userdata($session_array);
					$url = base_url() . "home?login=success"; 
					redirect($url, "refresh"); 
				}
			}else{
				$url = base_url() . "login?login=failed"; 
				redirect($url, "refresh"); 
			}
		}else{
			$this->load->view('login-page');
		}
	}
	public function forget_password()
	{
		if($this->input->post('login') == 1)
		{
			$user = new Users_model();
			$email = new Email_model();
			$user->email = $this->input->post('email');
			$user->password = $this->input->post('password');
			$user->user_role = $this->input->post('user_role');
			
			$results = $this->usermodel->login($user);
			if(count($results) > 0)
			{
				$generate_rand = uniqid(); 
				$user->password = $generate_rand; 
				$this->usermodel->update_password($user);
				
				$email->sent_to = $user->email;
				$email->cc_to = $user->email;
				$email->subject = "Congratulations! Password Reset.";
				$email->body = $this->emailmodel->template_forgetpassword($user->password);
				$this->emailmodel->send($email);
				echo 1; 
			}else{
				
			}
		}
	}
}
