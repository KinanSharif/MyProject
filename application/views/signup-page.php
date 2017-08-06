<?php


include('header.php');


?>



<?php include_once("analyticstracking.php") ?>





        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12" style="

                     background-image: url(<?php echo $assets ?>images/bg1.jpg); 

                     background-size: cover;

                     margin-top: -20px;

                     border-radius: 0px;

                     width:100%;

                     height:100%;

                     ">

                    <div class="col-md-4" ></div>

                    <div class="col-md-4" style="background-color:  rgba(255, 255, 255, 0.7); margin-top: 3%;margin-bottom: 10%;">

                        <div class="row">

                            <div class="col-md-12" style="background-color: #0086b3;"> </div>

                            <div class="headBlackDiv"><h2>Sign up now</h2>

                                <span>Fill the form below to get instant access</span>

                            </div>

                        </div> 

                        <form action="<?php echo base_url();  ?>signup/" method="post" >

                            <div class="form-group form-group-lg">

                                <input type="name" class="form-control" name="username" id="name" aria-describedby="name" placeholder="Enter your name">

                            </div>  

							 <div class="form-group form-group-lg">

                                <input type="text" class="form-control" name="phone1" id="phone1"  placeholder="Enter your phone no." maxlength="11" />

                            </div>  



                            <div class="form-group form-group-lg">

                                <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                            </div>



                            <div class="form-group form-group-lg">

                                <input type="password" class="form-control" name="password"  id="npassword" placeholder="Type your password"   maxlength="11"  />

                            </div>



                            <div class="form-group form-group-lg">

                                <input type="password" class="form-control" name="cpassword"  id="cpassword"  maxlength="11"   placeholder="Retype your password">

                            </div>                



                            <fieldset class="form-group form-group-lg">

                                <div class="form-check">

                                    <label class="form-check-label">

                                        <input type="radio" class="form-check-input" name="user_role" id="optionsRadios1" value="vender" checked>

                                        Vendor

                                        &nbsp; &nbsp; &nbsp; &nbsp; 

                                        <input type="radio" class="form-check-input" name="user_role" id="optionsRadios1" value="user">


                                        User

                                    </label>

                                </div>    

                            </fieldset>



                            <div class="form-group form-group-lg" style="display: none; ">

                                <textarea class="form-control" name="description" id="exampleTextarea" placeholder="About yourself" rows="3"></textarea>

                            </div>  



                            <div class="form-group form-group-lg">

                                <label class="checkbox-inline"></label>

                                <input type="checkbox" id="aggreement_" value=""> I have read the<a target="_blank" href="<?php echo base_url(); ?>terms/" >   <u style="color:blue;">agreement</u></a>

                            </div>



                            <div class="row">

                              <div class="form-group form-group-lg col-md-1"></div>

                                <div class="col-md-10">

								<input type="hidden" name="newuser" value="1" />

                                    <button id="reg_btn" disabled="disabled" type="submit" style='width: 95%; margin-bottom: 20px !important; background-color: black; color: white; border: 1px solid black;' class="btn btn-responsive btn-primary btn-lg center-block">Register</button><p>An activation link will send to you after registration</p>

                                </div>

                              <div class="col-md-1"></div>

                            </div>

                    </div>

                    </form>

                    </div>

                   

                </div>

            </div>

        </div>



<?php

        include('footer.php');

?>

    </body>



</html>

<script>

	$("#aggreement_").click(function(){

		 var click = $(this).prop('checked');

		 if(click == true)

		 {

			 var pass = $("#npassword").val();

			 var cpass = $("#cpassword").val();

			 if(pass == "" || cpass=="")

			 {

				alert("ERROR: Password or Confirm Password shouldn't contain empty values."); 

			 }else{

				if(pass != cpass)

				{

					alert("ERROR: Password and Confirm Password doesnt match."); 

				}else{

					$("#reg_btn").prop("disabled", false); 

				}

			 }

			

		 }else{

			$("#reg_btn").attr("disabled", "disabled"); 

		 }

		

		 

		 

	}); 

</script>