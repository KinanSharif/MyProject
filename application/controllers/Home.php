<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
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
	public function car_details()
	{
		$tempdata = array(); 
		$tempdata['loc_pick'] = $this->input->get("loc_pick");
		$tempdata['date_pick'] = $this->input->get("date_pick");
		$tempdata['time_pick'] = $this->input->get("time_pick");

		$tempdata['loc_drop'] = $this->input->get("loc_drop");
		$tempdata['date_drop'] = $this->input->get("date_drop");
		$tempdata['time_drop'] = $this->input->get("time_drop");

		// echo "<pre>";
		// print_r($tempdata);
		// die;

		$ids = $this->input->get("cid"); 
		$data['vehicle_details'] = $this->vehiclemodel->getall_vehicle_data($ids);
		if(count($data['vehicle_details']) <= 0)
		{
			echo "Please Wait..."; exit; 
		}			
		$name= "";
		$img = "";
		if($data['vehicle_details'][0]["firstname"] != "")
		{
			$name = $data['vehicle_details'][0]["firstname"]. ' ' . $data['vehicle_details'][0]["lastname"]; //$data['vehicle_details'][0][''];
		}else{
			$name = $data['vehicle_details'][0]['username'];
		}
		if($data['vehicle_details'][0]["image"] != "")
		{
			$img = str_replace("/index.php/","/",base_url())."media/images/users/".$data['vehicle_details'][0]["image"]; 
		}else{
			$img = "http://vignette1.wikia.nocookie.net/sote-rp/images/c/c4/User-placeholder.png/revision/latest?cb=20150624004222";
		}
		
		$html = '
			<div class="modal-body"  style=" padding:0px !important">
			
					<div class="col-xs-12 col-md-7">
					<img style="width: 100%;" src="'.str_replace("/index.php/","/",base_url()).'media/images/cars/'.$data['vehicle_details'][0]['car_image'].'" class="image-car"/></div>
					</div>';
				


		$html	.=	'<div class="col-xs-12 col-md-5">
						<h2><b>'.$data['vehicle_details'][0]['model'].'</b></h2><br>
						<div class="col-xs-6 col-md-4"><span class="glyphicon glyphicon-user"></span>Owner:</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['username'].'</div><br><br>
						<div class="col-xs-12"><b> Vehicle details </b></div><br><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon glyphicon-flag"></span> Brand:</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['brand'].'</div><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon glyphicon-bookmark"></span> Model:</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['model'].'</div><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon glyphicon-text-size"></span> Type:</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['type'].'</div><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon glyphicon-wrench"></span> Gear Box:</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['gear_box'].'</div><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon  glyphicon-road"></span> Mileage(km):</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['milage'].'</div><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon glyphicon-star"></span> Condition:</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['conditions'].'</div><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon  glyphicon-usd"></span> Price/day(RM):</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['price_day'].'</div><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon  glyphicon-usd"></span> Price/hr(RM):</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['price_hr'].'</div><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon  glyphicon-map-marker"></span> Location:</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['location'].'</div><br>

						<div class="col-xs-6 col-md-5"><span class="glyphicon glyphicon-menu-right"></span> Sub Location:</div>
						<div class="col-xs-6 col-md-7">'.$data['vehicle_details'][0]['sub_loc'].'</div><br>

						
					</div>


		 <div class="col-xs-12" style="padding-top:25px;">';




		$btn = '';
		if($this->session->userdata('id'))
		{
			

			$btn ='<form action="'.base_url().'booking/booknow/" method="post" enctype="multipart/form-data" >

			<input type ="hidden" name="vehicle" value="'.$data['vehicle_details'][0]['vid'].'">
			<input type ="hidden" name="date_pickup" value="'.$tempdata['date_pick'].'">
			<input type ="hidden" name="date_drop" value="'.$tempdata['date_drop'].'">
			<input type ="hidden" name="time_pickup_from" value="'.$tempdata['time_pick'].'">
			<input type ="hidden" name="time_pickup_to" value="">
			<input type ="hidden" name="time_drop_from" value="">
			<input type ="hidden" name="time_drop_to" value="'.$tempdata['time_drop'].'">
			<input type ="hidden" name="vender" value="'.$data['vehicle_details'][0]['users_id'].'">
			<input type ="hidden" name="address_pickup" value="'.$tempdata['loc_pick'].'">
			<input type ="hidden" name="address_drop" value="'.$tempdata['loc_pick'].'">
			<input type="submit" value="Book Now" class="btn" style="display:block; background-color:#59d389; width:100%;">
				
			</form>';

		}else{
			$btn = '<a href="'.base_url().'login/"><button class="btn" type="button" style="display:block; background-color:#59d389; width:100%;" >Login</button></a>';
				
		}
		
		
		$html .= $btn . '</div>
		
        </div>
		';
		echo $html;
	}
}
