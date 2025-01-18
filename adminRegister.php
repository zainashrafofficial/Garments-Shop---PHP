<?php
		session_start();
		if(!isset($_SESSION["admin"])) {
			header("location:login.php");
		}

		require_once 'db_connection.php';
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> SignUp Admin | Garments Shop </title>
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


	<div class="container-fluid" align="center" style="margin-bottom: 20px">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 wow rubberBand">
						<!--================Form============================-->
						<form action="adminRegister_process.php" method="POST" role="form">
							<h2>Sign Up for Admin <small>Share your Bussiness with your partners.</small></h2>
							<hr>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="fName" id="fName" required minlength="3" maxlength="20" class="form-control input-lg" placeholder="First Name">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="lName" id="lName" required minlength="3" maxlength="20" class="form-control input-lg" placeholder="Last Name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<span id="error_email" style="float: right;"></span>
								<input type="email" name="email" id="email" required minlength="10" maxlength="35" class="form-control input-lg" placeholder="Email Address">

							</div>
							<div class="form-group">
								<input type="text" name="mobile" id="mobile" required minlength="11" maxlength="14" class="form-control input-lg" placeholder="Mobile Number">
								<span id="cpass" style="float: right;"></span>
							</div>
													
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="password" required minlength="4" maxlength="25" id="password" class="form-control input-lg" placeholder="Password">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="cPassword" required minlength="4" maxlength="25" id="cPassword" class="form-control input-lg" placeholder="Confirm Password">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-sm-2 col-md-2" style="margin-right: 7%">
									<span class="button-checkbox">									
                        				<input type="checkbox" required name="agree" id="agree" value="1">
                        				<label>I agree</label>
									</span>
								</div>
								<div class="col-xs-9 col-sm-9 col-md-9">
									By clicking <strong class="label label-primary">Register</strong> you are agree to the <a href="#">Terms and Conditions</a> including our Cookie Use.
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-xs-6 col-md-6"><input type="submit" value="Register" id="register" class="btn btn-block btn-lg"></div>
								<div class="col-xs-6 col-md-6">Already have an account? <a href="login.php">Sign In</a></div>
							</div>
						</form>
					</div>
				</div>
	</div>



<?php
	include "footer.php";
?>

<!--Scripts-->

	<script src="Scripts/jquery.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
	<script src="Scripts/wow.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$("#email").keyup(function(){
			var email=this.value;
			if(email.length==0){
				$('#error_email').text(' ');
				$('#email').css('border-color', '#ddd');
			}else{
				$('#error_email').load('userRegister_validate.php?email='+email,function(responseText){
					if(responseText=='Email Already Used,Try Another!'){
						$('#email').css('border-color', 'red');
						$('#error_email').css('color', 'red');
					}else{
						$('#email').css('border-color', 'green');
						$('#error_email').css('color', 'green');
					}
				});
			}
			
			//alert('userRegister_validate.php?email='+email);
		});
		$("#register").click(function() {
			var span_val=$('#error_email').text();
			var span_val2=$('#cpass').text();
			if(span_val=='Email Already Used,Try Another!'){
				$("#email").focus();
				return false;
			}
			if(span_val2=="Not Matched,Retype Password"){
				$("#cPassword").focus();
				return false;
			}
		});
		$("#cPassword").keyup(function(){

			var c1=$("#password").val();
			var c2=this.value;
						//alert(c1+c2);
			if(c1==c2){
				$("#cpass").text("Password Matched");
				$("#cpass").css('color', 'green');
			}else{
				$("#cpass").text("Not Matched,Retype Password");
				$("#cpass").css('color', 'red');


			}
		});
	</script>
	  <script>
        new WOW().init();
  </script>

</body>
</html>