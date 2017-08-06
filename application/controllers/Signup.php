<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Signup extends CI_Controller {



	public function __construct() {

		parent::__construct();

		$this->load->database();

		$this->load->model('Users_model', 'usermodel');

		$this->load->model('Email_model', 'emailmodel');

		date_default_timezone_set('Asia/Karachi');

	}

	public function index()

	{

		if($this->input->post('newuser') == 1)

		{

			$user = new Users_model();

			$user->username = $this->input->post('username');

			$user->email = $this->input->post('email');

			$user->password = $this->input->post('password');

			$user->phone1= $this->input->post('phone1');

			$user->image = "";

			$user->description = $this->input->post('description');

			$user->account_status = 1;

			$user->user_role = $this->input->post('user_role');

			//echo "<pre>"; print_r($user); exit; 

			$id = $this->usermodel->insert($user);

			

			//$email = new Email_model(); 

			//$email->sent_to = $user->email;

			//$email->cc_to = $user->email;

			//$email->subject = "Congratulations! New Signup";

			//$email->body = $this->emailmodel->template_signup($user,$id);

			

			//$respod = $this->emailmodel->send($email); 

			//echo "<script>alert('".$respod."');</script>"; 

			$to = $user->email .", ". $user->email;

			$subject = "Welcome ". $user->username ." to Yiyalo.com !";



			$message = "

			<html>

			<head>

				<title>Yiyalo</title>

			</head>

			<body>

				<p>Hi ".$user->username .",<br/>

					Username: ".$user->username ."<br/>

					Email:	 ".$user->email ." <br/>

					

				</p>

				<p>Here is your activation link: http://www.yiyalo.com/index.php/login?activated=1&user=". $user->username ."&status=success!</p>

			</body>

			</html>

			";



			// Always set content-type when sending HTML email

			$headers = "MIME-Version: 1.0" . "\r\n";

			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



			// More headers

			$headers .= 'From: <support@yiyalo.com>' . "\r\n";

			$headers .= 'Cc: '.$user->email . "\r\n";



			mail($to,$subject,$message,$headers);

			$url = base_url() . "login?add=An activation link will send to your inbox after registration."; 

			redirect($url, "refresh"); 

		}else{

			$this->load->view('signup-page');

		}

	}

	public function forgetpassword()

	{

		$email = $this->input->post("email"); 

		$sql = "select * from users where email='".$email."'"; 

		$results = $this->db->query($sql)->result_array(); 

		//echo "<pre>"; print_r($results); exit; 

		$to = $email .", ". $email;

		

		$subject = "Forget Password!";



		$message = "

		<html>

		<head>

			<title>Yiyalo</title>

		</head>

		<body>

			<p>Hi ".$results[0]['username'] .",<br/>

				Username: ".$results[0]['username'] ."<br/>

				Email:	 ".$results[0]['email'] ." <br/>

				Password:  ".$results[0]['password'] ." <br/>

			</p>

			<p>Here is your password you can now login through these credentials.</p>

		</body>

		</html>

		";



		// Always set content-type when sending HTML email

		$headers = "MIME-Version: 1.0" . "\r\n";

		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



		// More headers

		$headers .= 'From: <support@yiyalo.com>' . "\r\n";

		$headers .= 'Cc: '.$email . "\r\n";



		if(mail($to,$subject,$message,$headers))

		{

			mail('support@yiyalo.com',$subject,$message,$headers); 

			echo "email sent";

		}else{

			echo "sorry";

		}



		

	}

}