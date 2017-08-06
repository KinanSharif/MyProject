<?php 
	include('header.php'); 
?>
<style type="text/css">

.editbtn {
    background-color: #333333;
    border-color: #333333;
    border-style: none;
    color: lightgray;
    height: 22px;
    margin-bottom: 3px;
    margin-right: 12px;
    margin-top: 16px;
    padding-left: 9px;
    padding-top: 1px;
    width: 90%;
}

.delbtn {
    background-color: lightgrey;
    border: 1px none;
    height: 25px;
    padding: 3px 1px 1px;
    width: 95%;
}
</style>
			<div class="container-fluid"  style="background-image: url('<?php echo $assets ?>images/bg1.jpg');background-size: cover;background-repeat: no-repeat; margin-top: -30px; ">
				<div class="container" style="background-color: rgba(218, 223, 229, 0.5);margin-top: 10%;margin-bottom: 5%;">
				<?php

					foreach ($vehicle as $row) {
						$row = (array) $row;
						echo "<div style='margin-top:5%;'><div class='col-md-3 col-sm-6 col-xs-12 a2'>
							<div style='width: 100%;border: 1px solid;border-color: #9fa39c;'>
								<img src='" . str_replace('/index.php/','/',base_url())."media/images/cars/".$row['car_image']."' style='width:250px; height: 140px; ' >
								<div  style='float: left; margin-left: 15px;margin-right: 0;margin-top: 10px;'>
								<span style='font-size: 22px;margin-top:15px;'>".$row['brand']."</span>
								<br>
	                                   <span style='font-size: 12px;'>".$row['type']."</span>
	                                   <br>
	                                   <span>".$row['milage']."</span>
	                                  <br>
	                                   <span>".ucfirst($row['status'])."</span>
	                                    <br>
	                                   <span >".$row['company']."</span>
	                                    
	                                    
	                                   </div>

	                               
	                                   <div style='float: right;'>
	                                   <span> <a  href='".base_url()."venders/edit_cars?id=".$row['id']."'class='editbtn btn' id='editcar_".$row['id']."'>EDIT</a></span><br>
								 <button type='button' style='margin-bottom:12px;' class='delbtn' id='deletecar_".$row['id']."'>DELETE</button><br>

	                                   <span style='margin-bottom:12px;'>".$row['max_luggage']."</span>
	                                   <br>
	                                   <span >".$row['model']."</span>
						
									   </div>
								
								
							</div> 
						</div></div>";
						?>
							<script>
								$("#deletecar_<?php echo $row['id'];  ?>").click(function(){
									var deletevehicle = "<?php echo $row['id'];  ?>";
									var url = "<?php echo base_url();  ?>venders/deletevehicle/";
									var data = { deletevehicle: deletevehicle }; 
									$.post(url, data, function(response){
										location.reload();
									});
								}); 
							</script>
						<?php 
					}
			?>
				
				</div>
			</div>

</body>
</html>