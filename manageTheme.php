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
	<title> Manage Theme | Garments Shop </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="description" name="Final Term Project (Online Garments Shop Project) by Zain Ashraf submitted to Rana Saleem Sb :)">
		<!--All CSS-->	
	<link rel="icon" type="image/png/gif" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/animate.css" rel="stylesheet" />

</head>

<body>
		<!-- start header -->
		<?php
			include "header.php";
		?>
		<!-- end header -->


<div class="col-lg-12" style="margin-bottom: 100px">

		<div align="center" id="adminPanel" class="row col-lg-offset-2 col-lg-8 wow rubberBand">
				<h1 style="color:crimson;width:40%; border-bottom: 1px solid #ddd ">Manage Theme</h1>
				<form action="phoneUpdate_process.php" method="POST">
					<div class="form-group col-lg-10">
						<div class="col-lg-6">
								<label style="float: left">Mobile No</label>
								<input type="text" name="mobile" id="mobile" required readonly class="form-control input-lg" value="<?php
										$myQuery="select * from theme_view where id=1";
										$record=mysqli_query($myCon,$myQuery);
										$row=mysqli_fetch_array($record);
										echo $row["phone_number"];
								?>">
						</div>
						<div class="col-lg-4" style="margin-top: 3.5%;display: none;" id="Save">
							<input type="submit" style="float: left" id="save" value="Save" class="btn btn-lg btn-block">				
							<!--col-xs-6 col-md-6 col-xs-offset-2 col-sm-offset-3 col-md-offset-3 col-lg-offset-3-->
						</div>
						<div class="col-lg-4" style="margin-top: 3.5%;" id="Edit">
							<input style="float: left;" value="Edit" id="edit" class="btn btn-lg btn-block">							
							<!--col-xs-6 col-md-6 col-xs-offset-2 col-sm-offset-3 col-md-offset-3 col-lg-offset-3-->
						</div>
					</div>
				</form>
		</div>

</div>

<!-- 
	==========================================================
								Footer Start
	==========================================================
-->
<?php
		include "footer.php"	
?>


<!--Scripts-->

	<script src="Scripts/jquery.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
	<script src="Scripts/wow.min.js" type="text/javascript"></script>
	  <script>
        new WOW().init();
  </script>
  <script type="text/javascript">
  	$("#edit").click(function() {
			 	$("#mobile").removeAttr("readonly");
			 	$("#Edit").hide();
			 	$("#Save").show();

			});
  </script>

</body>
</html>