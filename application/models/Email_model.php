<?php
class Email_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public $sent_to="";
    public $sent_from="";
    public $cc_to="";
    public $subject="";
    public $body="";
    
	//SENT EMAIL  
    function send($email){
		require_once APPPATH.'third_party/email/index.php';
		$mail = array(
				"FromName" => "From Admin (Car Rental)",
				"addAddress" => $email->sent_to,
				"Subject" => $email->subject,
				"Body" => $email->body,
				"AltBody" => $email->body
			);
		$respond = sendemail($mail); 
		return $respond; 
    }
	//template for forget password
	function template_forgetpassword($new_password){
		$html = '
			<html>
				<head>
					<title>Forget Password</title>
				</head>
				<body>
					<p>Congratulations! Your password reset to '.$new_password.'.</p>
				</body>
			</html>
		';
		return $html; 
	}
	//template for signup
	function template_signup($user,$id){
		$html = '
			<html>
				<head>
					<title>New Signup</title>
				</head>
				<body>
					<p>Congratulations! You have successfully signed up. Here is your activation link:</p>
					<table>
						<tr style=""> 
							<th style="float: left; text-align: left;  ">Username</th>
							<th style="float: left; text-align: left; width: 400px; padding-left: 40px;  ">'.$user->username.'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;   ">Email</th>
							<th style="float: left; text-align: left;    width: 400px; padding-left: 60px;   ">'.$user->email.'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Password</th>
							<th style="float: left; text-align: left;    width: 400px; padding-left: 40px;  ">'.$user->password.'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Account Role</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$user->user_role.'</th>
						</tr>
						<tr>
							<td colspan="2"><a href="'.base_url().'login?account_id='.$id.'&account=activated"><button class="btn btn-primary" style="height: 40px; width: 200px; background-color: #46b8da; border: 1px solid #46b8da; color: #fff; cursor: pointer; font-weight: bold; font-size: 18px;"  ><strong>Activate Acount</strong></button></a></td>
							
						</tr>
					</table>
				</body>
			</html>
		';
		return $html; 
	}
	function booking_mail_template($book,$id)
	{
		$sql = 'SELECT  bv.*, v.brand as company, v.price_day , v.price_hr, v.picture, u.username, u.phone1 as userphone1, u.phone2 as userphone2, u.user_role as useruserrole, vender.username as vendername, vender.phone1 as venderphone1, vender.phone2 as venderphone2, vender.user_role as venderrole  FROM `book_vehicle` as bv
				inner join vehicle as v on v.id = bv.vehicle 
				inner join users as u on u.id = bv.user 
                inner join users as vender on vender.id = v.users_id
				where bv.id='.$id;
		$bookingdata = $this->db->query($sql)->result_array();
		
		$html = '
			<html>
				<head>
					<title>Booking Details</title>
				</head>
				<body>
					<p>Your booking details regarding car rental are listed below:</p>
					<table>
						<tr style=""> 
							<th style="float: left; text-align: left;  ">Company</th>
							<th style="float: left; text-align: left; width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["company"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;   ">Price /Day</th>
							<th style="float: left; text-align: left;    width: 400px; padding-left: 60px;   ">'.$bookingdata[0]["price_day"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Price /Hr</th>
							<th style="float: left; text-align: left;    width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["price_hr"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Booked By:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["useruserrole"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">User Name:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["vendername"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">User Cotact# 1:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["userphone1"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">User Cotact# 2:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["userphone2"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Pickup Address</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["address_pickup"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Pickup Date:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["date_pickup"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Pickup Booking Time:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["time_pickup_from"].' to '.$bookingdata[0]["time_pickup_to"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Return Address:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["address_drop"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Return Date:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["date_drop"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Return Time:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["time_drop_from"].' to '.$bookingdata[0]["time_drop_to"].'</th>
						</tr>
						<tr>
							<th style="float: left; text-align: left;  ">Booking Status:</th>
							<th style="float: left; text-align: left;     width: 400px; padding-left: 40px;  ">'.$bookingdata[0]["booking_status"].'</th>
						</tr>
						
					</table><br/><br/>
					<p style="">Thank You.</p>
					<p style="">Regards</p>
					<p style="">Admin Car Rental</p>
				</body>
			</html>
		';
		return $html; 
	}
}