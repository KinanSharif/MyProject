<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Contact extends CI_Controller {



	public function __construct() {

	parent::__construct();

	   $this->load->database();

	   $this->load->model('Users_model', 'usermodel');

	   $this->load->model('Email_model', 'emailmodel');

	   date_default_timezone_set('Asia/Karachi');

	}

	public function index()

	{

		$this->load->view("contact-us");

	}

	public function contact()

	{

		$to = "qy_leong13@hotmail.com, qy_leong13@hotmail.com";

			

		$subject = "Feedback";



		$message = "

		<html>

			<head>

				<title>Yiyalo</title>

			</head>

			<body>

				<p>Hi Admin,<br/>

					".$_POST['message']."

				</p>

				<p>Regards:<br/>".$_POST['name']."</p>

			</body>

		</html>

		";



		// Always set content-type when sending HTML email

		$headers = "MIME-Version: 1.0" . "\r\n";

		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



		// More headers

		$headers .= 'From: <'.$_POST['email'].'>' . "\r\n";

		$headers .= 'Cc: '.$_POST['email'] . "\r\n";

		mail($to,$subject,$message,$headers); 

		$url = base_url(); 

		redirect($url, "refresh"); 

	}

}

