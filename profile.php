<?php
		session_start();
		if((!isset($_SESSION["user"])) && (!isset($_SESSION["admin"]))) {
			header("location:login.php");
		}


		require_once 'db_connection.php';
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Profile | Garments Shop </title>
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
			<?php
 				

				if(isset($_SESSION["admin"])){
					$email=$_SESSION['admin_email'];

 					$myQuery2="select * from admin where admin_email='$email'";
					$record2=mysqli_query($myCon,$myQuery2);
					$row2=mysqli_fetch_array($record2);

				}
				if(isset($_SESSION["user"])){
					$email=$_SESSION['user_email'];

 					$myQuery="select * from users where user_email='$email'";
					$record=mysqli_query($myCon,$myQuery);
					$row=mysqli_fetch_array($record);
				}


			?>
<div align="center" style="margin-bottom: 20px">
				<div class="row">
					<div class="container-fluid col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 wow rubberBand">
						<!--================Form============================-->
						<form action="userUpdate_process.php" method="POST">
							<h2>Manage Profile</h2>
							<hr>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label style="float: left">First Name</label>
										<input type="text" name="fName" id="fName" required readonly class="form-control input-lg" value="<?php
											if($row){
													echo stripslashes($row["user_nameF"]);
											}else{
												echo stripslashes($row2["admin_nameF"]);
											}
										?>">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label style="float: left">Last Name</label>
										<input type="text" name="lName" id="lName" required readonly class="form-control input-lg" value="<?php
											if($row){
													echo stripslashes($row["user_nameL"]);
											}else{
												echo stripslashes($row2["admin_nameL"]);
											}
										?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<span id="error_email" style="float: right;"></span>
								<label style="float: left">Email</label>
								<input type="email" name="email" id="email" class="form-control input-lg" required readonly value="<?php
											if($row){
													echo $row["user_email"];
											}else{
												echo $row2["admin_email"];
											}
										?>">

							</div>
							<div class="form-group">
								<label style="float: left">Mobile No</label>
								<input type="text" name="mobile" id="mobile" required readonly class="form-control input-lg" value="<?php
											if($row){
													echo stripslashes($row["user_mobile"]);
											}else{
												echo stripslashes($row2["admin_mobile"]);
											}
										?>">
								<span id="cpass" style="float: right;"></span>
							</div>
													
							<div class="row" id="passDiv" style="display: none">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group" >
										<input type="password" name="password" required id="password" class="form-control input-lg" value="<?php
											if($row){
													echo $row["user_password"];
											}else{
												echo $row2["admin_password"];
											}
										?>">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="cPassword" required id="cPassword" class="form-control input-lg" placeholder="Confirm Password">
									</div>
								</div>
							</div>
							<hr>
							<div>
								<div class="col-xs-6 col-md-6 col-xs-offset-2 col-sm-offset-3 col-md-offset-3 col-lg-offset-3"><input value="Edit" id="edit" class="btn btn-block btn-lg"></div>
								<div class="col-xs-6 col-md-6 col-xs-offset-2 col-sm-offset-3 col-md-offset-3 col-lg-offset-3" id="save" style="display: none"><input type="submit" id="save" value="Save" class="btn btn-block btn-lg"></div>
							</div>
						</form>
					</div>
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
	<script>

		$("#edit").click(function() {
			 	$("#fName").removeAttr("readonly");
			 	$("#lName").removeAttr("readonly");
			 	$("#mobile").removeAttr("readonly");
			 	$(this).hide();
			 	$("#passDiv").show();
			 	$("#save").show();

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

		$("#save").click(function() {
			var span_val2=$('#cpass').text();
				if(span_val2=="Not Matched,Retype Password"){
					$("#cPassword").focus();
					//alert("Not Matched,Retype Password");
					return false;
				}
		});
	</script>
	  <script>
        new WOW().init();
  </script>

</body>
</html>