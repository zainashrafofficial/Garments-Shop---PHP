<?php
    session_start();
		require_once 'db_connection.php';
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Contact | Garments Shop </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="description" name="Final Term Project (Online Garments Shop Project) by Zain Ashraf submitted to Rana Saleem Sb :)">
  <link rel="icon" type="image/png/gif" href="images/logo.png">
  <link href="css/animate.css" rel="stylesheet" />
		<!--All CSS-->	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link href="css/style.css" rel="stylesheet" />
  <script src="Scripts/wow.min.js" type="text/javascript"></script>

</head>

<body>


<?php
	include "header.php";
?>



	<div align="center">

			<div class="row" id="form_div">
          		<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 wow bounceInUp">
            		<h2>Contact us <small>get in touch with us by filling form below</small></h2>
           				 <hr>
            				<form action="#" method="post">
              					<div class="form-group">
                					<input type="text" name="name" class="form-control" required maxlength="30" id="name" placeholder="Your Name"/>
              					</div>
              					<div class="form-group">
                					<input type="email" class="form-control" required name="email" maxlength="35" id="email" placeholder="Your Email"/>
              					</div>
              					<div class="form-group">
                					<input type="text" class="form-control" required name="subject" maxlength="35" id="subject" placeholder="Subject"/>
              					</div>
              					<div class="form-group">
                					<textarea class="form-control" name="message" rows="5" required maxlength="350" id="message" placeholder="Message"></textarea>
              					</div>

              					<div class="text-center"><button type="submit" class="btn btn-block" id="send">Send Message</button></div>
            				</form>
            			<hr>
          		</div>
        </div>

           <div id="success_message_div wow bounceInUp" style="display: none">
              <h1 style="margin-bottom:10px "><small>Thank you for your feedback!</small></h1><br>
              <h2 style="margin-bottom:100px "><small>Your message has been sent successfull.</small></h2>
          </div>
	</div>



<?php
	include "footer.php";
?>

<!--Scripts-->

	<script src="Scripts/min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
  <script src="Scripts/wow.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      //alert("okay");
      $("#send").click(function() {
        
        var my_data = {};
            my_data["name"]=$("#name").val();
            my_data["email"]=$("#email").val();
            my_data["subject"]=$("#subject").val();
            my_data["message"]=$("#message").val();
            console.log(my_data);

            $.post('contact_process.php',my_data,function(){
                $("#success_message_div").show();
                $("#form_div").hide();

            });

        return false;
      });
    });
  </script>
<!--Wow Animanting-->

  <script>
        new WOW().init();
  </script>
</body>
</html>