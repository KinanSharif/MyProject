    <?php include ('header.php');  ?>

    	<link rel="stylesheet" type="text/css" href="<?php echo str_replace("/index.php/","/",base_url()); ?>assets/dtpicker/jquery.datepick.css"> 
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    	

    	<style> 

            select#loc_pick{
                background: url(http://yiyalo.com/assets/images/loc.png),#fff;
                background-size: 28px;
                background-repeat: no-repeat;
                background-position: center left 5px;
                padding-left: 43px;

            }
    		input#date_pickup_ {
    			background: url(http://yiyalo.com/assets/images/date.png),#fff;
    			background-size: 32px;
    			background-repeat: no-repeat;
    			background-position: center left 5px;
    			padding-left: 45px;
    		}
    		input#date_drop_ {
    			background: url(http://yiyalo.com/assets/images/date.png),#fff;
    			background-size: 32px;
    			background-repeat: no-repeat;
    			background-position: center left 5px;
    			padding-left: 45px;
    		}
    		select#time_pickup_from {
    			background: url(http://yiyalo.com/assets/images/time.png),#fff;
    			background-size: 30px;
    			background-repeat: no-repeat;
    			background-position: center left 5px;
    			padding-left: 45px;
    		}
    		select#time_drop_to{
    			background: url(http://yiyalo.com/assets/images/time.png),#fff;
    			background-size: 30px;
    			background-repeat: no-repeat;
    			background-position: center left 5px;
    			padding-left: 45px;
    		}	
    		@media only screen and (max-width:768px){
    			ul.dropdown-menu.drop-down-list>li>a {
    				color: #fff !important;
    			}
    			.set-mbl-fld{
    				margin-top:50px;
    			}
    			.the-legend {
    				width: auto;
    				opacity: 1 !important;
    				padding-right: 5px;
    			}
    		}

    	</style>
    </head>

    <body>	
    	<?php include_once("analyticstracking.php") ?>
    	<div class= "container-fluid Bg-image" style= "background-image: url(<?php echo $assets ?>images/bg1.jpg); padding-bottom: 310px;">
    		<div class= "row" style= "padding-top: 70px;">
    			<div class= "container">
    				<div class= "row center" style="padding-top:25px; padding-bottom: 25px; ">
    					<h1> <b style="font-family: ''Merriweather', serif;">Set Yourself Free </b> </h1>
                        <b><small>Start a journey here </small></b>
    				</div>
    				
    				<div class="row">
    					<div class="col-md-3 col-md-offset-1" >
    						<label class="label">Where</label><br>
    						<select name="address_pickup" id="loc_pick" class="form-control">
    							<option value="Kota Kinabalu">Kota Kinabalu</option>
    							<option value="Labuan" style="display:none">Labuan</option>

    						</select>
    					</div>
    				</div>
    				<div class="row">
    					<br>
    					<div class="col-md-3 col-md-offset-1 col-xs-8">
    						<label class="label">From</label><br>
    						<input name="date_pickup_" value="" id="date_pickup_" class="form-control datepicker hasDatepicker pickup_date" type="text">
    					</div>
                        <div class="col-md-2 col-xs-4" style="margin-left:-33px;">
                            <label class="label"></label><br>
                            <select class="form-control ftime" id="time_pickup_from" name="time_pickup_from">
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
    					
    		
                        <div class="col-md-3  col-xs-8">
                            <label class="label">To</label><br>
                            <input name="date_pickup" value="" id="date_drop_" class="form-control datepicker hasDatepicker drop_date" type="text">
                        </div>
    					
    					<div class="col-md-2 col-xs-4" style="margin-left:-33px;">
    						<label class="label"></label><br>
    						<select class="form-control ttime" id="time_drop_to" name="time_pickup_to" style="float: left;">
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


                        <div class="col-md-1"><a style="cursor: pointer; " id="searchCar"><img src="<?php echo str_replace("/index.php/","/",base_url()); ?>media/images/search1.png" /" style="height:70px;"></a>
                        </div>
    					</div>	


    				</div>
                    <br>
                   
    				<div class="row" style="margin:auto">
    					<div class="col-sm-2"></div>
    					<div id="loaderimg" class="col-sm-8" style="display:none; text-align: center; padding-top: 30px;"><img src="<?php echo str_replace("/index.php/","/",base_url()); ?>media/images/animated-car-image-0016.gif" /></div>
    					<div class="col-sm-2"></div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div id="carstopheading" class="container-fluid" style="margin-top: 65px; display: none; "  >
    		<h3>Choose Between Variety</h3><br>
        
		
    
   </div>

   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">


   	<!-- Modal content-->
   	<div class="container" >
   		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
   			<div class="back-div">
   				<div class="modal-header" style="border:none !important; padding:0px !important">
   					<button type="button" class="close" data-dismiss="modal" Style="font-size:25px !important; opacity:1">&times;</button>
   				</div>
   				<div id="popup_body"></div>
   			</div>
   		</div>
   	</div>
   </div>
   <div class="container-fluid" style="">
   	<div id="myrows"></div>
   </div>


   <div class="container-fluid">
   	<div class="row" style="background-image: url(http://yiyalo.com/assets/images/secbg.jpg);
   	background-repeat: no-repeat;
   	background-size: cover;
   	background-position: center center;
   	padding-top: 40px;
   	padding-bottom: 90px;
   	">
   	<div class="col-md-4 col-sm-8 col-xs-12 set-sec-mbl" style="color: white;font-size: 24px;top: 50px;padding-bottom: 150px;float: none;margin: auto;">

   		<b style="color:white;text-align:center;">Rent a car from Locals.</b></br>
   		<b style="color:white;text-align:left;"></br>


   			<a style='color:white;' href='http://yiyalo.com/index.php/signup'>
   				<div class="btn-shakl" style="border:4px solid white;width:140px;padding:4px;margin: auto;margin-top: 10px !important;">Get Started</div>
   			</a>



   		</div>

   		<div class="row" style="background-color:rgba(0, 0, 0, 0.5); padding:10px; display:none">

   			<h1 class="" style="text-align: center;color: #fff;"> <b>About us</b> </h1>

   			<div class="col-xs-12 col-md-12 col-lg-12">
   				<div style="width:75%;margin:auto;">
   					<p style="font-size: 20px;text-align:center;color: #fff;">Text deleted.</p>
   				</div>

   			</div></div>                           

   		</div></div>


<?php
include("footer.php");

?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo str_replace("/index.php/","/",base_url()); ?>assets/dtpicker/jquery.plugin.js" ></script>
<script type="text/javascript" src="<?php echo str_replace("/index.php/","/",base_url()); ?>assets/dtpicker/jquery.datepick.js" ></script>
<script>
	$("#date_pickup_").datepick({dateFormat: 'dd-mm-yyyy'});
	$("#date_drop_").datepick({dateFormat: 'dd-mm-yyyy'});		
</script>	
</script>
<script>
	$(document).ready(function(){

		$(".ttime").change(function(){

			var date_pick = $("#date_pickup_").val(); 
			var date_drop = $("#date_drop_").val(); 

			if(date_pick == date_drop){

				var from_time = $(".ftime").val();
				var from = from_time.split(':');
				if(from[1] == "30"){
					from[0]++;
				}
				var to_time = $(this).val();
				var to = to_time.split(':');
				if(to[1] == "30" && from[1] == "30"){
					to[0]++;
				}


				var final = to[0] - from[0];

				if(final < 3){

					alert("Minimum of 3 hours needed to rent a car");
				}
			}
		});

	});
	


	// click search btn
	$("#searchCar").click(function(){
		searching(); 
	}); 

	function searching(){
		var loc_pick = $("#loc_pick").val(); 
		var date_pick = $("#date_pickup_").val(); 
			//var time_pick = $("#time_pick").val(); 
			var time_pick = $("#time_pickup_from").val();
			
			var loc_drop = $("#loc_drop").val(); 
			var date_drop = $("#date_drop_").val(); 
			//var time_drop = $("#time_drop").val();
			var time_drop = $("#time_drop_to").val();
			var limits = parseInt($("#limits").val()) + 8; 
			$("#limits").val(limits);
			//alert("select limit: " + limits);
			var data = {
				loc_pick: loc_pick, date_pick: date_pick, time_pick: time_pick,
				loc_drop: loc_drop, date_drop: date_drop, time_drop: time_drop,
				limits: limits
			}; 


			if(date_pick == date_drop){



				var from_time = $(".ftime").val();
				var from = from_time.split(':');
				if(from[1] == "30"){
					from[0]++;
				}
				var to_time = $(".ttime").val();
				var to = to_time.split(':');
				if(to[1] == "30" && from[1] == "30"){
					to[0]++;
				}


				var final = to[0] - from[0];

				if(final < 3){

					alert("Minimum of 3 hours needed to rent a car");
					return false;
				}

			}		

			

			$("#loaderimg").delay( 3000 ).show();
			
			$(".loader").show(); 


			if(date_pick == "")
			{
				alert("Select Pickup date"); 
				$("#loaderimg").hide();
			}else if(date_drop == ""){

				alert("Select Drop date");
				$("#loaderimg").hide();

			}else
			if(date_drop == date_pick && time_pick == time_drop)
			{
				alert("select another time for time drop"); 
				$("#loaderimg").hide();
			}

			else if($("#return_loc").prop('checked') == true)
			{
				if(date_drop == "" )
				{
					alert("select another date"); 
					$("#loaderimg").hide();
				}
				var url = "<?php echo base_url();  ?>booking/searchCar";
				
				$.post(url, data, function(response){
					$("#loaderimg").hide(function(){
						$(window).scrollTop(700);
						$("#carstopheading").show(); 
						$("#myrows").html(response); 
						$("#loaderimg").hide();
					}); 
					//alert(response); 
					$("#loaderimg").hide();
				});
				
				
			}else{
				
				var url = "<?php echo base_url();  ?>booking/searchCar";

				$.post(url, data, function(response){
					
					$("#loaderimg").hide(function(){
						$('html, body').animate({ scrollTop: 700 }, 1000);
						$("#carstopheading").show(); 
						$("#myrows").html(response); 
						$("#loaderimg").hide();
						$(".paginations").click(function(){

							searching(); 
						});
					}); 
					//alert(response); 
					$("#loaderimg").hide();
				});

			} 

		}
		$(".navbar-toggle").click(function(){
			$("#myNavbar").toggle();
		});
	</script>

</body>
</html>