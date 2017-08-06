<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//this is an email template, I guess.

class Booking extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	   $this->load->database();
	   $this->load->model('Users_model', 'usermodel');
	   $this->load->model('Email_model', 'emailmodel');
	   $this->load->model('Vehicle_model', 'vehiclemodel');
	   $this->load->model('Booking_model', 'bookingmodel');
	   date_default_timezone_set('Asia/Karachi');
	}
	public function book()
	{
		$this->load->view('book-car'); 
	}
	public function booknow()
	{
		$book = new Booking_model(); 
		$book->vehicle = $this->input->post('vehicle');
		$book->date_pickup = $this->input->post('date_pickup');
		$book->date_drop = $this->input->post('date_drop');
		$book->time_pickup_from = $this->input->post('time_pickup_from');
		$book->time_pickup_to = $this->input->post('time_pickup_to');
		$book->time_drop_from = $this->input->post('time_drop_from');
		$book->time_drop_to = $this->input->post('time_drop_to');
		$book->user = $this->session->userdata('id');
		$book->vender = $this->input->post('vender');
		$book->address_pickup = $this->input->post('address_pickup');
		$book->address_drop = $this->input->post('address_drop'); 
		$res = $this->bookingmodel->insert($book); 
		if($res > 0)
		{
			$admin = "support@yiyalo.com";
			$sql = "select * from users where id=".$book->vender;
			$venderdata = $this->db->query($sql)->result_array(); 
			
			$sql = "select * from users where id=".$book->user;
			$userdata = $this->db->query($sql)->result_array();  
			
			$sql = "select * from vehicle where id=".$book->vehicle;
			$vehicledata = $this->db->query($sql)->result_array(); 
			
			$subject = "Booking Successful! A new car reserved!";
			$status = "Inactive";
			if($userdata[0]['account_status'] == 1)
			{
				$status = "Active";
			}
			$message = '
			<html>
				<head>
					<title>Yiyalo</title>
				</head>
				<body>
					<p>Hi ,<br/>
						A new booking has been reserved for these details.
						<div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title">Booking Details</h4>
							</div>
							<div class="modal-body">
								<div id="popup_body">
									<div class="row">
										<div class="col-md-12" style="text-align: center; background-color: rgb(204, 204, 204); height: 30px; padding-top: 8px;"><strong>User Information</strong></div>
									</div>
									<div class="row">
										<div class="col-md-6">User Name: '. $userdata[0]['username'].'</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row">
										<div class="col-md-6">Contacts: '. $userdata[0]['phone1'].'</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row">
										<div class="col-md-6">Status: '. $status.'</div>
										<div class="col-md-6"></div>
									</div>
									
									<div class="row">
										<div class="col-md-12" style="text-align: center; background-color: rgb(204, 204, 204); height: 30px; padding-top: 8px;"><strong>Vender Information</strong></div>
									</div>
									<div class="row">
										<div class="col-md-6">Vender Name: '. $venderdata[0]['username'].'</div>
										<div class="col-md-6"></div>
										</div>
									<div class="row">
										<div class="col-md-6">Contacts: '. $venderdata[0]['phone1'].' / '. $venderdata[0]['phone2'].'</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row">
										<div class="col-md-12" style="text-align: center; background-color: rgb(204, 204, 204); height: 30px; padding-top: 8px;"><strong>Vehicle Information</strong></div>
									</div>
									
									<div class="row">
										<div class="col-md-6">Brand: '. $vehicledata[0]['brand'].'</div>
										<div class="col-md-6"></div>
									</div>
									
									<div class="row">
										<div class="col-md-6">Model: '. $vehicledata[0]['model'].'</div>
										<div class="col-md-6"></div>
									</div>
									
									<div class="row">
										<div class="col-md-6">Price: '. $vehicledata[0]['price_hr'].' /Hr(RM), '. $vehicledata[0]['price_day'].' /Day(RM)</div>
										<div class="col-md-6"></div>
									</div>
									
									<div class="row">
										<div class="col-md-12" style="text-align: center; background-color: rgb(204, 204, 204); height: 30px; padding-top: 8px;"><strong>Booking Information</strong></div>
									</div>
									
									<div class="row">
										<div class="col-md-6">Pickup & Drop Off Location: '. $book->address_pickup.'</div>
										<div class="col-md-6"></div>
									</div>
									
									<div class="row">
										<div class="col-md-6">Pickup Date: '. $book->date_pickup.'</div>
										<div class="col-md-6"></div>
									</div>
									
									<div class="row">
										<div class="col-md-6">Drop Off Date: '.$book->date_drop .'</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row">
										<div class="col-md-6">Time From: '.$book->time_pickup_from .'</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row">
										<div class="col-md-6">Time To: '.$book->time_drop_to .'</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row" style="text-align:center;">
										<div class="col-md-1"></div>
										<div class="col-md-10"></div>
										<div class="col-md-1"></div>
									</div>
								</div>
							</div>
						  </div>
					</p>
					<p>Thanks for your booking.</p>
					<p>Regards</p>
					<p>Yiyalo.com</p>
				</body>
			</html>
			';

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <'.$admin.'>' . "\r\n";
			$headers .= 'Cc: '.$userdata[0]['email']. "\r\n";
			mail($userdata[0]['email'],$subject,$message,$headers); 
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <'.$admin.'>' . "\r\n";
			$headers .= 'Cc: '.$venderdata[0]['email']. "\r\n";
			mail($venderdata[0]['email'],$subject,$message,$headers); 
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <'.$admin.'>' . "\r\n";
			$headers .= 'Cc: '.$admin. "\r\n";
			mail($admin,$subject,$message,$headers); 
////////////////////////////////////////////////////////
			
			redirect(base_url()."booking/user_booking_list/"); 
		}
	}
	public function changeBookingStatus()
	{
		$booking_status = $this->input->post("booking_status");
		$id = $this->input->post("recid");
		$data = array( "booking_status" => $booking_status); 
		$res = $this->db->update('book_vehicle', $data, "id = ".$id);
		echo "Updated.";
	}
	public function user_booking_list()
	{
		$data['booklist'] = $this->bookingmodel->bookinglist($this->session->userdata('id')); 
		//echo "<pre>"; print_r($data['booklist']); exit; 
		$this->load->view('user-booking-list',$data); 
	}
	public function searchCar()
	{
		$data = array(); 
		$data['loc_pick'] = $this->input->post("loc_pick");
		$data['date_pick'] = $this->input->post("date_pick");
		$data['time_pick'] = $this->input->post("time_pick");

		//$data['loc_drop'] = $this->input->post("loc_drop");
		$data['date_drop'] = $this->input->post("date_drop");
		$data['time_drop'] = $this->input->post("time_drop");
		$data['limits'] = $this->input->post("limits");
		//echo "<pre>"; print_r($_POST); exit; 
		$searchResult = $this->bookingmodel->searchcar($data);
		//echo "<pre>"; print_r($searchResult); exit; 
		$html = '
			<div class="row">
			';
		$count = 0; 
		//echo $this->db->last_query(); exit; 
		//echo "<pre>". count($searchResult); print_r($searchResult); exit; 
		//print_r($abc); exit; 
		$loc_pick = $this->input->post("loc_pick");
		$date_pick = $this->input->post("date_pick");
		$time_pick = $this->input->post("time_pick");

		$loc_drop= $this->input->post("loc_drop");
		$date_drop = $this->input->post("date_drop");
		$time_drop = $this->input->post("time_drop");
 
		foreach($searchResult as $v)
		{
				//$v = json_decode(json_encode($ab), true);
				if($count == 4)
				{
					$html .=  '</div><div class="row">';
				}
				$image = "";
				if($v['car_image'] != "")
				{
					$image = str_replace("/index.php/","/",base_url()).'media/images/cars/'.$v['car_image'];
				}else{
					$image = "https://heuft.com/upload/image/400x267/no_image_placeholder.png";
				}
				$html .= '<div class="col-md-3 col-sm-6 col-xs-12 a2">
							
							<div style="  height: 250px; width: 100%; border: 1px solid; border-color: #cfd1cc;">
							<a id="viewdetail_'.$v['id'].'" data-toggle="modal" data-target="#myModal">
								<img src="'.$image.'" style="width:100%; height: 170px;" />
								<h4 class="a1">
									<div style="float: left; width: 76%;">
										'.$v['brand'].'  '.   $v['model'].' <br><br>
										<span style="font-size: 12px; line-height: 1;">Type '.$v['type'].'<br></span>
										<span style="font-size: 12px; margin-top: 5px;">'.$v['price_day'].'/day , '.$v['price_hr'].' / hr</span>
									</div>
									<div style="float: right; font-size: 12px; position: absolute; width: 75%; padding-top: 20px;">
										<button type="button" class="hired" style="float: right; ">Available</button></a>
										<script>
											$("#viewdetail_'.$v['id'].'").click(function(){
												var url = "'.base_url().'home/car_details";
												var data = {cid: "'.$v['id'].'", loc_pick: "'.$loc_pick.'", date_pick: "'.$date_pick.'", time_pick: "'.$time_pick.'", loc_drop: "'.$loc_drop.'", date_drop: "'.$date_drop.'", time_drop: "'.$time_drop.'"};
												$.get(url, data, function(response){
													$("#popup_body").html(response);
												});
											});
										</script>
									</div>
								</h4>
							</div> 
						</div>
					'; 
		}
		
		////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////
        $html .= '</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2 a2">
						
					</div>
					<div class="col-md-8 col-sm-8 col-xs-8 a2">
						<button type="button" class="btn btn-primary paginations" style="width: 100%; ">Load More</button>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2 a2">
						
					</div>
				</div>
		';
		echo  $html; 
	}
	public function bookdetails()
	{
		$recId = $this->input->post('recid');
		$results = $this->bookingmodel->bookdetails($recId);
		//echo "<pre>"; print_r($results); exit; 
		$userHtml = '
				<div class="row">
					<div class="col-md-12"  style="text-align: center; background-color: #59d389; height: 40px; padding-top: 8px;"><strong>User Information</strong></div>
				</div>
				<div class="row">
					<div class="col-md-3 col-xs-6">User Name</div>
					<div class="col-md-3 col-xs-6">'.$results[0]["username"].'</div>
					<div class="col-md-3 col-xs-6">Contacts</div>
					<div class="col-md-3 col-xs-6">'.$results[0]["userphone1"].' / '.$results[0]["userphone2"].'</div>
				</div>
				
				<div class="row">
					<div class="col-md-12"  style="text-align: center; background-color: #59d389; height: 40px; padding-top: 8px;"><strong>Vender Information</strong></div>
				</div>
				<div class="row">
					<div class="col-md-3 col-xs-6">Vender Name</div>
					<div class="col-md-3 col-xs-6">'.$results[0]["vendername"].'</div>
					<div class="col-md-3 col-xs-6">Contacts</div>
					<div class="col-md-3 col-xs-6">'.$results[0]["venderphone1"].' / '.$results[0]["venderphone2"].'</div>
				</div>
				<div class="row">
					<div class="col-md-12"  style="text-align: center; background-color: #59d389; height: 40px; padding-top: 8px;"><strong>Vehicle Information</strong></div>
				</div>
				<div class="row">
					<div class="col-md-3 col-xs-6">Brand</div>
					<div class="col-md-3 col-xs-6">'.$results[0]["company"].'</div>
					<div class="col-md-3 col-xs-6">Price</div>
					<div class="col-md-3 col-xs-6">'.$results[0]["price_day"].' Per Day / '.$results[0]["price_hr"].' Per Hrs.</div>
				</div>
				<div class="row">
				<div class="col-md-3 col-xs-6">Model</div>
					<div class="col-md-3 col-xs-6">'.$results[0]["model"].'</div>
					<br><br>
				</div>
				<div class="row" style="text-align:center;">
					<div class="col-md-1"></div>
					<div class="col-md-10"><img src="'.str_replace("/index.php/","/",base_url()).'media/images/cars/'.$results[0]['car_image'].'" style="width:80%;" /></div>
					<div class="col-md-1"></div>
				</div>
			';
		echo $userHtml; 
		//echo "<pre>"; print_r($results); 
	}
}