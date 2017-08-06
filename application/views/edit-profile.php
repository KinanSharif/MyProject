<?php include("header.php"); //echo "<pre>"; print_r($userdata); die;?>

<?php include_once("analyticstracking.php") ?>

<script type="text/javascript">


	<?php

	if($userdata[0]['gender'] == "Male" || $userdata[0]['gender'] == "male" ){


		?>

		$(function() {

			$(".male").attr("checked", true);

		}); 


		<?php

	} else if ($userdata[0]['gender'] == "Female" || $userdata[0]['gender'] == "female"){

		?>

		$(function() {

			$(".female").attr("checked", true);

		});


		<?php

	}

	?>

	$(document).ready(function(){

	//alert('<?php echo $userdata[0]['licsense_status'];?>');

//$('select[name^="licsense_status"] option[value="<?php echo $userdata[0]['licsense_status'];?>"]').attr("selected","selected");
$(function() {

	$(".status").val('<?php echo $userdata[0]['licsense_status'];?>');


});

});


</script>

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

				<div class="col-md-8 col-lg-8 col-sm-12 col-xl-8" style="height:250px;">

					<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:80px;"></div>

					<h2 class="profile-heading"><strong>Complete Your profile</strong></h2>

				</div>

				<form action="<?php echo base_url();  ?>users/update/" method="post" enctype="multipart/form-data" >

					<div class="col-md-2 col-lg-2 col-sm-12 col-xl-2" style="height:250px; text-align:center; padding:0px !important">

						<div class="picture"><img id="blah" width='170px' height='193px' <?php

							if($userdata[0]['image'] == "")

							{

								echo "src='http://style.anu.edu.au/_anu/4/images/placeholders/person.png'";

							}else{

								echo "src='" . str_replace('/index.php/','/',base_url())."media/images/users/".$userdata[0]['image']."'";

							}

							?> ></div>


							<b>Upload Image</b><input name="image"  class="upload"  type="file">



							<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:20px;">

							</div>



						</div>

					</div>

					<div class="container">

						<div class="row">

							<div class="col-md-1 col-sm-12- col-lg-1 col-xl-1"></div>

							<div class="col-md-3">

								<label class="label">First Name</label></br>

								<input type="text" name="firstname" value="<?php echo $userdata[0]['firstname']; ?>" id="fname" class="input-field" />

							</div>

							<div class="col-md-3 field-div">

								<label class="label">Last Name</label></br>

								<input type="text" name="lastname" value="<?php echo $userdata[0]['lastname']; ?>"  id="llame" class="input-field">

							</div>

							<div class="col-md-3 field-div ">

								<label class="label">Gender</label><br>

								<span style="margin-left:10px;">

									Male

									<input name="gender" value="male" id="Profession" class="male" type="radio"> 		

								</span>



								<span style="margin-left:15px;">

									Female					<input name="gender" value="female" id="Profession" class="female" type="radio">

								</span>

							
							</div>

						</div>


						<div class="row">

							<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:30px;"></div>

						</div>

						<div class="row">

							<div class="col-md-1 col-sm-12- col-lg-1 col-xl-1"></div>

							<div class="col-md-3">

								<label class="label">Date of birth</label></br>

								<select name="month" id="month" class="input-field">

									<option value="" >Month</option>



									<option value="01">January</option>

									<option value="02">February</option>

									<option value="03">March</option>

									<option value="04">April</option>

									<option value="05">May</option>

									<option value="06">June</option>

									<option value="07">July</option>

									<option value="08">August</option>

									<option value="09">September</option>

									<option value="10">October</option>

									<option value="11">November</option>

									<option value="12">December</option>

								</select>

							</div>

							<div class="col-md-3 field-div">

								<label class="label"></label></br>

								<select name="day" id="day" class="input-field" >

									<option Selected >Day</option>

									<option value="01">01</option>

									<option value="02">02</option>

									<option value="03">03</option>

									<option value="04">04</option>

									<option value="05">05</option>

									<option value="06">06</option>

									<option value="07">07</option>

									<option value="08">08</option>

									<option value="09">09</option>

									<option value="10">10</option>

									<option value="11">11</option>

									<option value="12">12</option>

									<option value="13">13</option>

									<option value="14">14</option>

									<option value="15">15</option>

									<option value="16">16</option>

									<option value="17">17</option>

									<option value="18">18</option>

									<option value="19">19</option>

									<option value="20">20</option>

									<option value="21">21</option>

									<option value="22">22</option>

									<option value="23">23</option>

									<option value="24">24</option>

									<option value="25">25</option>

									<option value="26">26</option>

									<option value="27">27</option>

									<option value="28">28</option>

									<option value="29">29</option>

									<option value="30">30</option>

									<option value="31">31</option>

								</select>

							</div>

							<div class="col-md-3 field-div">

								<label class="label"></label></br>

								<select id="birthyear" name="birthyear" class="input-field">

									<option Selected >Year</option>

									<option value="2007">2007</option>

									<option value="2006">2006</option>

									<option value="2005">2005</option>

									<option value="2004">2004</option>

									<option value="2003">2003</option>

									<option value="2002">2002</option>

									<option value="2001">2001</option>

									<option value="2000">2000</option>

									<option value="1999">1999</option>

									<option value="1998">1998</option>

									<option value="1997">1997</option>

									<option value="1996">1996</option>

									<option value="1995">1995</option>

									<option value="1994">1994</option>

									<option value="1993">1993</option>

									<option value="1992">1992</option>

									<option value="1991">1991</option>

									<option value="1990">1990</option>

									<option value="1989">1989</option>

									<option value="1988">1988</option>

									<option value="1987">1987</option>

									<option value="1986">1986</option>

									<option value="1985">1985</option>

									<option value="1984">1984</option>

									<option value="1983">1983</option>

									<option value="1982">1982</option>

									<option value="1981">1981</option>

									<option value="1980">1980</option>

									<option value="1979">1979</option>

									<option value="1978">1978</option>

									<option value="1977">1977</option>

									<option value="1976">1976</option>

									<option value="1975">1975</option>

									<option value="1974">1974</option>

									<option value="1973">1973</option>

									<option value="1972">1972</option>

									<option value="1971">1971</option>

									<option value="1970">1970</option>

									<option value="1969">1969</option>

									<option value="1968">1968</option>

									<option value="1967">1967</option>

									<option value="1966">1966</option>

									<option value="1965">1965</option>

									<option value="1964">1964</option>

									<option value="1963">1963</option>

									<option value="1962">1962</option>

									<option value="1961">1961</option>

									<option value="1960">1960</option>

									<option value="1959">1959</option>

									<option value="1958">1958</option>

									<option value="1957">1957</option>

									<option value="1956">1956</option>

									<option value="1955">1955</option>

									<option value="1954">1954</option>

									<option value="1953">1953</option>

									<option value="1952">1952</option>

									<option value="1951">1951</option>

									<option value="1950">1950</option>

									<option value="1949">1949</option>

									<option value="1948">1948</option>

									<option value="1947">1947</option>

									<option value="1946">1946</option>

									<option value="1945">1945</option>

									<option value="1944">1944</option>

									<option value="1943">1943</option>

									<option value="1942">1942</option>

									<option value="1941">1941</option>

									<option value="1940">1940</option>

									<option value="1939">1939</option>

									<option value="1938">1938</option>

									<option value="1937">1937</option>

									<option value="1936">1936</option>

									<option value="1935">1935</option>

									<option value="1934">1934</option>

									<option value="1933">1933</option>

									<option value="1932">1932</option>

									<option value="1931">1931</option>

									<option value="1930">1930</option>



								</select>



							</div>





						</div>

						<div class="row">

							<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:30px;"></div>

						</div>

						<div class="row">

							<div class="col-md-1 col-sm-12- col-lg-1 col-xl-1"></div>

							<div class="col-md-5" >

								<label class="label">IC</label></br>

								<input type="text" name="cnic" value="<?php echo $userdata[0]['cnic']; ?>"  id="CNIC" class="input-field1">

							</div>

							<div class="col-md-5">

								<label class="label">Address</label></br>

								<input type="text" name="address" value="<?php echo $userdata[0]['address']; ?>"  id="Address" class="input-field2">

							</div>

						</div>

						<div class="row">

							<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:30px;"></div>

						</div>

						<div class="row">

							<div class="col-md-1 col-sm-12- col-lg-1 col-xl-1"></div>

							<div class="col-md-3">

								<label class="label">Licence Status</label></br>

								<select name="licsense_status" id="month" class="input-field status">

									<option Selected ></option>

									<option value="B2(motorcycle)">B2(motorcycle)</option>

									<option value="D(car)">D(car)</option>

									<option value="E(lorry)">E(lorry)</option>

									<option value="B2 & D">B2 &amp; D</option>

									<option value="B2 & D & E">B2 &amp; D &amp; E</option>

									<option value="D & E">D &amp; E</option>

								</select>

							</div>



							<div class="col-md-3 field-div">

								<label class="label">Expiration Date</label></br>

								<input type="text" name="expire_date" value="<?php echo $userdata[0]['expire_date']; ?>"  id="Expiration-Date" class="input-field">

							</div>

							<div class="col-md-3 field-div">

								<label class="label">Phone No.</label></br>

								<input type="text" name="phone1" value="<?php echo $userdata[0]['phone1']; ?>"  id="phone1" class="input-field" maxlength="11">

							</div>

						</div>



						<div class="row">

							<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:30px;"></div>

						</div>





						<div class="row">

							<div class="col-md-1 col-sm-12- col-lg-1 col-xl-1"></div>

							<div class="col-md-3">

								<label class="label">About </label><small>Max 120 charatcers</small></br>

								<textarea  name="full_address" id="phone1" class="input-field" maxlength="120" style="height: 70px; "><?php echo $userdata[0]['full_address']; ?></textarea>

							</div>

						</div>

						<div class="row">

							<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:30px;"></div>

						</div>



						<div class="row">

							<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12" style="height:30px;"></div>

						</div>

						<div class="row">

							<div class="col-md-1 col-sm-12- col-lg-1 col-xl-1"></div>

							<div class="col-md-10" >

								<span class="btn  btn-file1 donebtn" style="color:#FFFFFF; background-color:#373737 ">

									<input type="submit" />Done</span>




									<input type="hidden"   value="<?php echo $userdata[0]['id']; ?>"  name="id" />

									<input type="hidden"   value="<?php echo $userdata[0]['account_status']; ?>"  name="id" />

									<input type="hidden"   value="<?php echo $userdata[0]['image']; ?>"  name="oldimage"/>

								</div>

							</div>

						</div>

					</form>

				</div>

			</div> 

			<script type="text/javascript">

				$(document).on('change','.upload',function(){

					files = this.files;

					size = files[0].size;

      //max size 50kb => 50*1000



      if( size > 1000000){

      	alert('Please upload an image less than 1mb');

      	return false;

      }

      readURL(this);

      return true;

  });

</script> 

<script>

	function readURL(input) {

		if (input.files && input.files[0]) {

			var reader = new FileReader();



			reader.onload = function (e) {

				$('#blah')

				.attr('src', e.target.result)

				.width(174)

				.height(195);

			};



			reader.readAsDataURL(input.files[0]);

		}

	}

</script>  

</div>