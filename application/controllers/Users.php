<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	   $this->load->database();
	   $this->load->model('Users_model', 'usermodel');
	   $this->load->model('Email_model', 'emailmodel');
	   $this->load->model('Vehicle_model', 'vehiclemodel');
	   date_default_timezone_set('Asia/Karachi');
	}
	public function index()
	{
		if($this->input->get("type"))
		{
			$availability = $this->input->get("type");
		}
		else{
			$availability = "available";
		}
		$data['vehicles'] = $this->vehiclemodel->getavailablevehicles($availability);
		$this->load->view('home-page',$data);
	}
	public function profile()
	{
		$data['userdata'] = $this->usermodel->get_user($this->session->userdata('id'));
		$this->load->view('edit-profile',$data);
	}
	public function update()
	{
		//echo "<pre>"; print_r($_FILES); exit; 
		$user = new Users_model(); 
		$user->firstname = $this->input->post('firstname');
		$user->lastname = $this->input->post('lastname');
		//$user->profession = $this->input->post('profession');
		$user->gender = $this->input->post('gender');
		$user->phone1 = $this->input->post('phone1');
		$user->phone2 = $this->input->post('phone2');
		$month = $this->input->post('birthdate');
		$day = $this->input->post('day');
		$year = $this->input->post('birthyear');
		$user->birthdate = $day."-".$month."-".$year;
		$user->cnic = $this->input->post('cnic');
		$user->address = $this->input->post('address');
		$user->licsense_status = $this->input->post('licsense_status');
		//$user->issue_date = $this->input->post('issue_date');
		$user->expire_date = $this->input->post('expire_date');
		$user->licsense_no = $this->input->post('licsense_no');
		$user->full_address = $this->input->post('full_address');
		$user->account_status = 1;
		//session data
		$user->id = $this->session->userdata('id');
		$user->password = $this->session->userdata('password');
		$user->username = $this->session->userdata('username');
		$user->email = $this->session->userdata('email');
		$user->user_role = $this->session->userdata('user_role'); 
		//id to be set
		$id = $user->id; 

		if($_FILES['image'])
		{
			/* IMAGE UPLOADING START */
				$image_type=$_FILES['image']['type'];
				$image_size=$_FILES['image']['size'];
				$image_tmp=$_FILES['image']['tmp_name'];
				$d=date('YmdHis');
				$image_test_name = str_replace(" ", "_", $user->firstname.$user->lastname);
				$image_type = str_replace("image/", ".", $image_type);
				$image_name=$user->id . $image_type;
			    $imgurl= str_replace("/index.php/","/",base_url())."media/images/users/".$image_name;   
			 //    echo $imgurl;
			 //    echo "<br>";
			 //    echo $image_tmp;
				// exit; 
				if($image_type==".jpeg" || $image_type==".png" || $image_type==".gif" )
				{	
					$this->usermodel->upload_user_image($image_name);
					$this->usermodel->update_image($user->id, $image_name);
					$user->image = $image_name; 
				}
				else
				{
					$user->image = $this->input->post('oldimage');
				}
			
			/* IMAGE UPLOADING END */
		}else{
			$user->image = $this->input->post('oldimage');
		}
		$res = $this->db->update('users', $user, array('id' => $id));
		$URL = base_url() . "users/profile/";
		redirect($URL, "refresh"); 
	}
	
}
