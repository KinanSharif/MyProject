<?php include("header.php"); ?>



<div class="container-fluid back-img" style="background-image: url(<?php echo $assets ?>images/bg1.jpg); margin-top: -20px;">

	<div class="container">


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


					<h2 class="profile-heading"><strong>Booking Details</strong></h2>

					<div class="col-xs-12 ">
					<div class="row">
					<p><span class="glyphicon glyphicon-envelope"> Please check your mailbox(and junk) after a booking is made. Kindly contact the vendor if you wish to cancel the booking.</span></p><br>
					<p><span class="glyphicon glyphicon-user"> For further enquiries, please call 012-5867635.</span></p>
					</div>
					</div>
				</div>

			</div>

			<div class="container">

				

				<div class="modal fade" id="myModal" role="dialog">

					<div class="modal-dialog">

						

						<!-- Modal content-->

						<div class="modal-content">

							<div class="modal-header">

								<button type="button" class="close" data-dismiss="modal">&times;</button>

								<h4 class="modal-title">Booking Details</h4>

							</div>

							<div class="modal-body">

								<div id="popup_body"></div>

							</div>

							<div class="modal-footer">

								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							</div>

						</div>

						

					</div>

				</div>        

				<div class="row">

					<div class="col-md-11 table-responsive">

						

						<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">

							<thead>

								<tr>

									<th>Details</th>

									<th>Pickup & Drop</th>

									<th>From</th>

									<th>Time</th>

									<th>To</th>

									<th>Time</th>

									<th>Status</th>

									
								</tr>

							</thead>

							

							<tbody>

								<?php 

								foreach($booklist as $book)

									{ ?>

								<tr>

									<td><a href="#" data-toggle="modal" data-target="#myModal"><button id="btn_detail_<?php echo $book['id']; ?>" class="btn btn-success" type="button" >Details</button></a></td>

									<td><?php echo $book['address_pickup']; ?></td>

									<td><?php echo $book['date_pickup']; ?></td>

									<td><?php echo $book['time_pickup_from']; ?></td>

									<td><?php echo $book['date_drop']; ?></td>

									<td><?php echo $book['time_drop_to']; ?></td>

									<td>

										<?php

										if($this->session->userdata('user_role') == "user")

										{

											echo $book['booking_status'];

										}else{

											?>

											<select class="form-control" name="status" id="booking_status_<?php echo $book['id']; ?>" style="width: 65%;" >

											<?php //echo $book['booking_status']; 

											if($book['booking_status'] == "pending")

											{

												echo '

												<option value="completed">Completed</option>

												<option value="pending" selected="selected">Pending</option>

												<option value="canceled">Canceled</option>

												';

											}else if($book['booking_status'] == "completed"){

												echo '

												<option value="completed" selected="selected">Completed</option>

												<option value="pending">Pending</option>

												<option value="canceled">Canceled</option>

												';

											}else if($book['booking_status'] == "canceled")

											{

												echo '

												<option value="completed">Completed</option>

												<option value="pending" >Pending</option>

												<option value="canceled" selected="selected">Canceled</option>

												';

											}

											?>

											<option value="" ></option>

										</select>

										<?php 

									}

									?>

									

								</td>

								
								

							</tr>

							<script>

								$("#booking_status_<?php echo $book['id']; ?>").change(function(){

									var booking_status = $("#booking_status_<?php echo $book['id']; ?>").val();

									var recid = "<?php echo $book['id']; ?>"; 

									var url = "<?php echo base_url();  ?>booking/changeBookingStatus"; 

									var data = {booking_status: booking_status, recid:recid};

									$.post(url, data, function(response){

										console.log(response); 

										location.reload(); 

									}); 

								});

									//details popup

									$("#btn_detail_<?php echo $book['id']; ?>").click(function(){

										var recid = "<?php echo $book['id']; ?>";

										var url = "<?php echo base_url();  ?>booking/bookdetails"; 

										var data = { recid:recid};

										$.post(url, data, function(response){

											console.log(response); 

											$("#popup_body").html(response);

											//location.reload(); 

										}); 

									});

								</script>

								<?php 

							}

							?>

							<tbody>

							</table>

						</div>

					</div>

				</div>

			</div>

		</div> 

	</div>

	



	<script>

		$(document).ready(function() {

		//$('#example').DataTable();

	} );

</script>