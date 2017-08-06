<?php

include ("header.php");

?>

<?php include_once("analyticstracking.php") ?>

<!-- forgot password  -->
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12" style="

        background-image: url(<?php echo $assets ?>images/bg1.jpg); 

        background-size: cover;

        height: 100vh;

        margin-top: -20px;

        border-radius: 0px;

        width:100%;

        height:100%;
        ">

        <div class="col-md-4" ></div>



        <div id="forget_screen" class="col-md-4" style="display: none; background-color:  rgba(255, 255, 255, 0.7); margin-top: 5%;">

          <div class="row">

            <div class="col-md-12" style="background-color: #0086b3;"> </div>

            <div class="headBlackDiv"><h2>Forget Password<small id="msg_new" style="display: none; ">New Password Sent to your email</small></h2></div>

        </div>



        <div class="form-group form-group-lg">

            <input type="text" class="form-control" id="forget_email" name="email" aria-describedby="email" placeholder="Email">

        </div>                



        <div class="row">

          <div class="form-group form-group-lg col-md-1"></div>

          <div class="col-md-10">

            <button type="button" style='width: 95%; margin-bottom: 20px !important; background-color: black; color: white; border: 1px solid black;' class="btn btn-responsive btn-md center-block" id="send_mail">Send new password to my email</button>

        </div>

        <div class="col-md-1"></div>

    </div>
    <!-- forgt password end -->


    <!-- Login screen start -->

</div>

<div id="login_screen" class="col-md-4" style="background-color:  rgba(255, 255, 255, 0.7); margin-top: 5%;">



    <div class="row">

        <div class="col-md-12" style="background-color: #0086b3;"> </div>

        <div class="headBlackDiv"><h2>Sign in</h2><?php if(@$_GET['add'] != ""){ echo '<p class="alert alert-success" style="padding: 5px; float: left;  "><br> An activation link will send to your inbox after registeration</p>'; } ?></div>

    </div>



    <p style="text-align: center;">Log into Yiyalo to find best car rental deals in the city.</p>



    <?php if(@$_GET['login'] == 'failed') { ?>						

    <div class="alert alert-danger" style="">

       <strong>Sorry! </strong> Username or password incorrect.

   </div>

   <?php } ?>

   <form action="<?php echo base_url();  ?>login/" method="post">

    <div class="form-group form-group-lg">

        <input type="text" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email">

    </div>                



    <div class="form-group form-group-lg">

        <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Password">

    </div>



    <fieldset class="form-group form-group-lg ">

        <div class="form-check" style="text-align: center;">

            <label class="form-check-label">

                <input type="radio" class="form-check-input" name="user_role"  value="vender" checked>

                Vendor

                &nbsp; &nbsp; &nbsp; &nbsp; 

                <input type="radio" class="form-check-input" name="user_role"  value="user">



                User

            </label>

        </div>    

    </fieldset>



    <div class="row">

      <div class="form-group form-group-lg col-md-1"></div>

      <div class="col-md-10">

       <input type="hidden" name="login" value="1" />

       <button type="submit" style='width: 95%; margin-bottom: 20px !important; background-color: black; color: white; border: 1px solid black;' class="btn btn-responsive  btn-md center-block">Sign In</button>

       <button type="button" style='width: 95%; margin-bottom: 20px !important; background-color: black; color: white; border: 1px solid black;' class="btn btn-responsive btn-md center-block" id="btn_forgetpassword">Forgot password?</button>

   </div>

   <div class="col-md-1"></div>

</div>



<p style="text-align: center;">Don't have any Account?</p>

<a href='<?php echo base_url();  ?>signup/' target="_self" style='text-decoration: none; color: black;'>

    <p style='text-align: center; font-size: 17px; font-weight: bold; text-decoration: underline;'>

        Create Account Now

    </p>

</a>



</div>

</form>

</div>



</div>

</div>

</div>

<script>

 $("#btn_forgetpassword").click(function(){

    $("#forget_screen").show(); 

    $("#login_screen").hide();

    $("#send_mail").click(function(){

       var email = $("#forget_email").val();

       var url = "<?php echo base_url(); ?>signup/forgetpassword";

       var data = {email: email}; 

       $.post(url, data, function(){

          $("#msg_new").show(); 

          location.reload(); 

      }); 

   }); 



}); 

</script>

<?php

include('footer.php');

?>

</body>



</html>



