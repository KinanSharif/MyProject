<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller {

	public function __construct() {
	parent::__construct();
	   $this->load->database();
	   $this->load->model('Users_model', 'usermodel');
	   $this->load->model('Email_model', 'emailmodel');
	   date_default_timezone_set('Asia/Karachi');
	}
	public function index()
	{
		$this->load->view("privacy");
	}
}
