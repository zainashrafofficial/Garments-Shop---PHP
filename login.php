<?php
		session_start();
		require_once 'db_connection.php';
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Sign In / Up | Garments Shop </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="description" name="Final Term Project (Online Garments Shop Project) by Zain Ashraf submitted to Rana Saleem Sb :)">
	<link rel="icon" type="image/png/gif" href="images/logo.png">
	<link href="css/animate.css" rel="stylesheet" />
		<!--All CSS-->	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link href="css/style.css" rel="stylesheet" />

</head>

<body>


<?php
	include "header.php";
?>


	<div align="center">
			<div class="row" style="margin:20px">
          		<div class="col-md-5 col-md-offset-3 wow rubberBand">

            			<form action="login_process.php" method="POST" role="form" class="register-form">
							<h2>Sign in <small>manage your account</small></h2>
							<hr>
								<div class="form-group">
									<input type="email" name="email" id="email" required maxlength="35" class="form-control input-lg" placeholder="Email Address">
								</div>
								<div class="form-group">
									<input type="password" name="password" required minlength="4" maxlength="25" class="form-control input-lg" id="password" placeholder="Password">
								</div>
								<div class="row" align="left" >
										<span class="input-group" style="padding-left: 3%">							
                        					<input type="checkbox"  name="remember_me" id="remember_me" value="1">
                        					<label>Remeber Me </label>
										</span>
								</div>
									<hr>
								<div class="row">
									<div class="col-xs-12 col-md-6"><input type="submit" value="Sign in" class="btn btn-primary btn-block btn-lg"></div>
									<div class="col-xs-12 col-md-6">Don't have an account? <a href="userRegister.php">Register</a></div>
								</div>
						</form>
            					<hr>
          		</div>
       		 </div>
	</div>

<span style="display: none" id="errorMessage1"><?php
	if(isset($_SESSION['error'])){
		if($_SESSION['error']=='wrongPassword'){
			echo "Wrong Password, Try Again!";
		}
		if($_SESSION['error']=='UserNotFound'){			
			echo "Please Sign Up First, this email is not Registered";
		}
		unset($_SESSION['error']);
	}
?></span>

<?php
	include "footer.php";
?>
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close2" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Warning</h4>
      </div>
      <div class="modal-body" align="center">
      		<h2><small><span id="messageDisplay" style="color:crimson"></span></small></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" class="close" id="close1" data-dismiss="modal"">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Scripts-->

	<script src="Scripts/jquery.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
	<script src="Scripts/wow.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
			//debugger;
			var message2=$("#errorMessage1").text();
			//console.log("Message:"+message+".");
			if(message2!=''){
				$("#messageDisplay").text(message2);
				$("#myModal3").modal("show");
			}

			$("#close1").click(function(){
				//alert("clear");
				$("#messageDisplay").empty();
			});
			$("#close2").click(function(){
				//alert("clear");
				$("#messageDisplay").empty();
			});
		});
	</script>
	  <script>
        new WOW().init();
  	</script>

</body>
</html>