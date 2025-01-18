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
	<title> Admin Panel | Garments Shop </title>
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
					<h1 style="color:crimson;width:40%; border-bottom: 1px solid #ddd ">Admin Panel</h1>
					<a href="categoryManage.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-briefcase"></span> Manage Categories</a>
					<a href="productsManage.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-list-alt"></span> Manage Products</a>
					<a href="orders.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-list-alt"></span>  Orders List</a>					
					<a href="manageAdmins.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-list-alt"></span>  Add/Remove Admin</a>
					<a href="manageUsers.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-list-alt"></span>  Manage Users</a>
					<a href="subcribers.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-list-alt"></span>  Subcribers List</a>
					<a href="feedbacks.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-list-alt"></span>  Feedbacks</a><br>
					<a href="OutOfStock.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-list-alt"></span>  Out of Stock Products</a>
					<br>
					<a href="manageTheme.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-list-alt"></span>  Manage Theme</a>

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

</body>
</html>