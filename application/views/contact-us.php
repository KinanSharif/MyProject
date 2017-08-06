<!DOCTYPE html>

<html lang="en">

    <head>

        <title>Yiyalo-Feedback</title>

    </head>

    <body>

        <?php include ('header.php'); ?>

		<?php include_once("analyticstracking.php") ?>

    

        <div class= "container-fluid" style= "background-image: url(<?php echo $assets;  ?>images/bg1.jpg); background-size: 100% 100%; margin-top: -20px;">

            <div class= "row" style= "padding-top: 70px;">

                <div class= "container">

                    <div class= "row center row1">

                        <h1 class= "f-44 white" > <b>Contact us</b> </h1>

                    </div>



                        <div class= "row" style="margin-top: 30px;">

                            

                            <div class = "col-xs-12 col-md-12 col-lg-8">

                                <div class="form-group">

                                    <form role="form" action="<?php echo base_url(); ?>contact/contact/" method="post"> 

                                        <div class = "col-xs-12 col-md-12 col-lg-6">

                                            <div class="form-group has-feedback has-feedback-left">

                                                <label class="control-label">Name</label>

                                                <input type="text" class="form-control" name="name" placeholder="Your name" />

                                            </div>

                                        </div>



                                        <div class = "col-xs-12 col-md-12 col-lg-6">

                                            <div class="form-group has-feedback has-feedback-left">

                                                <label class="control-label">Email</label>

                                                <input type="text" class="form-control" name="email"  placeholder="Your email" />

                                            </div>

                                        </div>

                                    

                                        

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">

                                            <label class="control-label">Message</label>

                                            <textarea style="width: 100%;" rows="6"  name="message" placeholder="Type your message here"></textarea>

                                        </div>

                                        

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">

                                            <br>

                                            <button type="submit" style='width: 100%; margin-bottom: 20px !important; background-color: black; color: white; border: 1px solid black;' class="btn btn-responsive  btn-md center-block">Submit</button>

                                        </div>

                                        

                                    </form>

                                </div>

 

                            </div>                            



                                <div class = "col-xs-12 col-md-4 col-lg-4">

                                    

                                    <div class="contactInformation" style="font-family:'Coming Soon',cursive; color:black;">

                                        <br>

								This site is a beta version, we are trying our best to improve the site quality and serve you better.

								Feel free to leave us a message if you have any enquiries.<br><br>


                                Contact No :<br> 012-5867635 (Leong) <br>
                                             016-4719228 (Chong)

                            


                                    </div>                                   



                            </div>                                    

                    </div>

                    

                    <div class="row">

 

                            <div id="map" style="width: 100%; margin-left: auto; margin-right: auto;" class="mapDivHeight">

                            <script>

                                function myMap() {

                                  var mapCanvas = document.getElementById("map");

								  var mycenter = new google.maps.LatLng(6.034335, 116.119394); 

                                  var mapOptions = {

                                    center: mycenter,

                                    zoom: 15

                                  };

                                  var map = new google.maps.Map(mapCanvas, mapOptions);

								  var marker = new google.maps.Marker({position: mycenter});

								  marker.setMap(map);

                                }

                            </script>

                            </div>

                    </div>   

                    

                </div>

                

                 

                

                

            </div>

            

           

            

        </div>



                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvc3ZzcLlnQBVbvL7Dwikvi8rUnppTDIk&callback=myMap" async defer ></script>

                    <?php include('footer.php'); ?>





                    </body>

                    </html>           

            

