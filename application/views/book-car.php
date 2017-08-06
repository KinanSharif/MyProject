<?php include("header.php"); //echo "<pre>"; print_r($userdata); die;?>
 <link rel="stylesheet" type="text/css" href="<?php echo str_replace("/index.php/","/",base_url()); ?>assets/dtpicker/jquery.datepick.css"> 
<div class="container-fluid back-img" style="background-image: url(<?php echo $assets ?>images/bg1.jpg);">
	<div class="container">
	<?php //echo "<pre>"; print_r($userdata); ?>
		<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:40px;"></div>
			</div>
			<div class="back-div">
			<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:40px;"></div>
			</div>
			<div class="row">
					<div class="col-md-1 col-sm-12- col-lg-1 col-xl-1"></div>
					<div class="col-md-8 col-lg-8 col-sm-12 col-xl-8" style="height:150px;">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:80px;"></div>
					<h2 class="profile-heading"><strong>Booking Form</strong></h2>
					</div>
					<form action="<?php echo base_url();  ?>booking/booknow/" method="post" enctype="multipart/form-data" >
				
					
			</div>
		<div class="container">
		<div class="row">
					
						<div class="col-md-3 field-div">
						<label class="label">Pickup Address</label><br>
						<select name="address_pickup" id="loc_pick" class="form-control" required="required">
							<option value="Lahore">Lahore</option>
							<option value="Gujranwala">Gujranwala</option>
							<option value="Jehlum">Jehlum</option>
							<option value="Islamabad">Islamabad</option>
						</select>
						</div>
						<div class="col-md-2 field-div">
						<label class="label">Date</label><br>
						<input name="date_pickup" value="" id="date_pickup" class="form-control datepicker hasDatepicker" type="text"  required="required" />
						</div>
						<div class="col-md-2 field-div">
						<label class="label">Time From</label><br>
						 <select class="form-control" id="time_pickup_from" name="time_pickup_from" style="float: left;"  required="required">
								<?php
									$i = 0; 
									$counter = 0; 
									$mins = 0; 
									$hrs = 0; 
									$hours = '';
									echo '<option value="00:00">00:00</option>';
									for($i; $i<=46; $i++)
									{
										if($counter == 0)
										{
											$mins = "30";
											$counter++;
											//$hrs = "0". $hrs; 
										}else if($counter == 1)
										{
											$mins = "00"; 
											$counter=0;
											$hrs = $hrs + 1; 
										}
										if($hrs < 10)
										{
											$hours = "0".$hrs; 
										}else{
											$hours = $hrs; 
										}
										echo '<option value="'.$hours.':'.$mins.'">'.$hours.':'.$mins.'</option>';
									}
								?>
								
							</select> 
						</div>
						<span id="time1"  style="display: none; ">
						<div class="col-md-2 field-div">
						<label class="label">Time To</label><br>
						 <select class="form-control" id="time_pickup_to" name="time_pickup_to" style="float: left;" >
								<?php
									$i = 0; 
									$counter = 0; 
									$mins = 0; 
									$hrs = 0; 
									$hours = '';
									echo '<option value="00:00">00:00</option>';
									for($i; $i<=46; $i++)
									{
										if($counter == 0)
										{
											$mins = "30";
											$counter++;
											//$hrs = "0". $hrs; 
										}else if($counter == 1)
										{
											$mins = "00"; 
											$counter=0;
											$hrs = $hrs + 1; 
										}
										if($hrs < 10)
										{
											$hours = "0".$hrs; 
										}else{
											$hours = $hrs; 
										}
										echo '<option value="'.$hours.':'.$mins.'">'.$hours.':'.$mins.'</option>';
									}
								?>
								
							</select> 
						</div>
						</span>
		</div>
		<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:30px;"></div>
			</div>
			
	<div class= "row" style="display: none; ">
     <div class= "col-sm-12 col-md-12 col-lg-12 col-xs-12">
      <div class= "col-sm-2 col-md-2 col-lg-2 col-xs-0"></div>
         <div class= "col-sm-10 col-md-10 col-lg-10 col-xs-12"> 
          <div class="checkbox">
			<label style="color: white; ">
				<input type="checkbox" id="return_loc" value="1" class="chek" style= "margin-left: -24px;margin-top: 0px;">
				Return with different location
			</label>
		</div>
      </div>
        </div>
    </div>
	<div class="row" style=" " id="ret">
					
						<div class="col-md-3 field-div">
						<label class="label">Drop Address</label><br>
						<select name="address_drop" id="address_drop" class="form-control">
							<option value="Lahore">Lahore</option>
							<option value="Gujranwala" selected="">Gujranwala</option>
							<option value="Jehlum">Jehlum</option>
							<option value="Islamabad">Islamabad</option>
						</select>
						</div>
						<div class="col-md-2 field-div">
						<label class="label">Date</label><br>
						<input name="date_drop" value="" id="date_drop" class="form-control datepicker hasDatepicker" type="text">
						</div>
						<span id='time2'  style="display: none; ">
						<div class="col-md-2 field-div">
						<label class="label">Time From</label><br>
						 <select class="form-control" id="time_drop_from" name="time_drop_from" style="float: left; ">
								<?php
									$i = 0; 
									$counter = 0; 
									$mins = 0; 
									$hrs = 0; 
									$hours = '';
									echo '<option value="00:00">00:00</option>';
									for($i; $i<=46; $i++)
									{
										if($counter == 0)
										{
											$mins = "30";
											$counter++;
											//$hrs = "0". $hrs; 
										}else if($counter == 1)
										{
											$mins = "00"; 
											$counter=0;
											$hrs = $hrs + 1; 
										}
										if($hrs < 10)
										{
											$hours = "0".$hrs; 
										}else{
											$hours = $hrs; 
										}
										echo '<option value="'.$hours.':'.$mins.'">'.$hours.':'.$mins.'</option>';
									}
								?>
								
							</select> 
						</div>
						</span>
						<div class="col-md-2 field-div">
						<label class="label">Time To</label><br>
						 <select class="form-control" id="time_drop_to" name="time_drop_to" style="float: left;">
								<?php
									$i = 0; 
									$counter = 0; 
									$mins = 0; 
									$hrs = 0; 
									$hours = '';
									echo '<option value="00:00">00:00</option>';
									for($i; $i<=46; $i++)
									{
										if($counter == 0)
										{
											$mins = "30";
											$counter++;
											//$hrs = "0". $hrs; 
										}else if($counter == 1)
										{
											$mins = "00"; 
											$counter=0;
											$hrs = $hrs + 1; 
										}
										if($hrs < 10)
										{
											$hours = "0".$hrs; 
										}else{
											$hours = $hrs; 
										}
										echo '<option value="'.$hours.':'.$mins.'">'.$hours.':'.$mins.'</option>';
									}
								?>
								
							</select> 
						</div>
		</div>	<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:30px;"></div>
			</div>
		<div class="row">
					
						<div class="col-md-10" >
						<span class="btn btn-primary btn-file1 donebtn" style="margin-left: 20px; background-color: #373737!important;">
						<input type="submit" />Book Now</span>
						<input type="hidden"   value="<?php echo $_GET['id']; ?>"  name="vehicle"/>
						<input type="hidden"   value="<?php echo $_GET['vid']; ?>"  name="vender"/>
						</div>
		</div>
		</div>
		</form>
		</div>
</div> 
</div>
<script type="text/javascript">

$(document).ready(function(){
	// return location yes or not
	$("#return_loc").click(function(){
		if($("#return_loc").prop('checked') == true){
			//do something
			$("#time1").hide();
			$("#time2").hide();
			$("#ret").show(); 
		}else{
			$("#ret").hide(); 
			$("#time1").show();
			$("#time2").show();
		}
	}); 
	$("#address_drop").change(function(){
		
		var address_drop = $("#address_drop").val();
		var loc_pick = $("#loc_pick").val();
		
		if(address_drop == loc_pick){
			//$("#time1").hide();
			//$("#time2").hide();
		} else{
			//$("#time1").show();
			//$("#time2").show();

		}
	});
	
	$("#loc_pick").change(function(){
		
		var address_drop = $("#address_drop").val();
		var loc_pick = $("#loc_pick").val();
		
		if(address_drop == loc_pick){
			//$("#time1").hide();
			//$("#time2").hide();

		} else{
			//$("#time1").show();
			//$("#time2").show();

		}
	});
	
});

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo str_replace("/index.php/","/",base_url()); ?>assets/dtpicker/jquery.plugin.js"></script>
<script type="text/javascript" src="<?php echo str_replace("/index.php/","/",base_url()); ?>assets/dtpicker/jquery.datepick.js"></script>
<script>
$("#date_pickup").datepick({dateFormat: 'dd-mm-yyyy'});
$("#date_drop").datepick({dateFormat: 'dd-mm-yyyy'});		
</script>