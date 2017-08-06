<?php 
$assets = str_replace("/index.php/", "/", base_url()) . "assets/";
?>
<!DOCTYPE html>

<html lang="en-MY">

<head>    

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Rent a car in Kota Kinabalu">
	<meta name="keywords" content="cheap,rental,cars,kota kinabalu,yiyalo,UMS">
	<meta name="author" content="Leong Qi Yang">
	<meta property="og:url"	content="http://www.yiyalo.com" />
	<meta property="og:title"   content="When Great Minds Don’t Think Alike" />
	<meta property="og:description"  content="Rent a car from locals or earn money renting your car" />
	<meta property="og:image"    content="" />
	<link rel="shortcut icon" href="http://www.yiyalo.com/media/images/wheelsing.png"  type="image/x-icon" >


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />	
	<link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">
	<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo $assets ?>car_list_vender/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $assets ?>combined.css">
	
	<link rel="stylesheet" href="<?php echo $assets ?>/update_profile/css/bootstrap-theme.min.css">	
	
	<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" async></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" async></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" async></script>
	<script src="https://use.fontawesome.com/0d83f3667e.js" async></script>
	<script src="<?php echo $assets ?>js/timepicki.min.js" async></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" async></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js" async></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" async></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" async></script>
	<!-- <script src="//code.jquery.com/jquery-1.12.3.min.js" async></script> -->
	
	<title>Yiyalo-Rent a Car</title>
	
	<style>
		.chide{
			display: none; 
		}
		.footer ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}

		.footer li {
			display: inline;
			font-size: 20px;
			/*font-weight: bold;*/
			margin-left: 50px;

		}

		.footer li a {
			color: white;
		}

		@media only screen and (max-width:767px){
			.navbar-header>a>img {
				width: auto !important;
				margin-top: 1% !important;
				margin-left: 2%;
			}
			.footer li {
				display: inline;
				font-size: 15px;
				margin-left: 10px;
			}
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-inverse" style="border-radius: 0px;">
		<div class="container-fluid" style="background-color: #000; ">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="" href="<?php echo base_url();  ?>" style="padding: 20px; ">
					<img src="<?php echo $assets ?>images/fbdrivelogo.jpg" style="width: 70%; margin-top: 5%; float: left;">
				</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo base_url();  ?>home" style="background-color: transparent;">Home</a></li>


					<?php 
					if($this->session->userdata('user_role') == "vender" or $this->session->userdata('user_role') == "user")
					{
						?>
						<li><a href="<?php echo base_url(); ?>booking/user_booking_list">Booking</a></li>
						<?php
					}
					?>
					<?php 
					if($this->session->userdata('user_role') == "vender")
					{
						?>
						<li class="dropdown">
							<a class="dropdown-toggle nav-menu" data-toggle="dropdown" style="color:#9d9d9d !important" href="#">My Cars<span class="caret"></span></a>
							<ul class="dropdown-menu drop-down-list">
								<li><a href="<?php echo base_url(); ?>venders/add_cars/" class="drop-down-list-item font">Add Car</a></li>
								<li><a href="<?php echo base_url(); ?>venders/all_cars/?status=approved" class="drop-down-list-item font">View cars</a></li>
								<li><a href="<?php echo base_url(); ?>venders/all_cars?status=pending" class="font">Pending Approvals</a></li>
							</ul>
						</li>
						<?php
					}
					?>
					<li class="active" style="display:none;"><a href="<?php echo base_url();  ?>about/" style="background-color: transparent;">About</a></li>
					<li class="active"><a href="<?php echo base_url();  ?>contact/" style="background-color: transparent;">Feedback</a></li>	
					<li class="active"><a href="<?php echo base_url();  ?>terms/" style="background-color: transparent;">Terms Of Use</a></li>	
					<li class="active"><a href="<?php echo base_url();  ?>privacy/" style="background-color: transparent;">Privacy Policy</a></li>	
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php 
					if(!$this->session->userdata('user_role'))
					{
						?>
						<li><a href="<?php echo base_url();  ?>signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="<?php echo base_url();  ?>login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<?php
					}else{

						?>
						<li><a href="<?php echo base_url();  ?>home">Welcome <?php echo ucfirst($this->session->userdata('username')); ?></a></li>
						<?php 

					}
					?>   
					<?php 
					if($this->session->userdata('user_role') == "vender" || $this->session->userdata('user_role') == "user")
					{
						?>
						<li class="dropdown">
							<a class="dropdown-toggle nav-menu" data-toggle="dropdown" style="color:#9d9d9d !important" href="#">My Account<span class="caret"></span></a>
							<ul class="dropdown-menu drop-down-list">
								<li style="display:none;"><a href="<?php echo base_url(); ?>users/profile/" class="drop-down-list-item font">Profile</a></li>
								<li><a href="<?php echo base_url(); ?>logout/" class="font">Logout</a></li>
							</ul>
						</li>
						<?php
					}
					?>                
				</ul>
			</div>
		</div>
	</nav>


	<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

