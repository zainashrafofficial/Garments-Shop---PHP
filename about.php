<?php
		session_start();
		require_once 'db_connection.php';
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> About | Garments Shop </title>
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
					<h1 style="margin-bottom:20px "><small>Software Engineer & Full Stack Developer</small></h1>
					<div class="myItem wow jackInTheBox">
							<img src="images/zain.jpeg" alt="img 1" style="width: 400px;height: 420px;margin-bottom: 10px">
							<span><p>Zain Ashraf</p><p><b>Email:</b>&nbsp; hello@zainashrafofficial.com</p></span>
					</div>
		</div>
		<div class="col-lg-10 col-lg-offset-1">
			<h2 class="wow fadeInLeft">Objectives</h2>
			<h2 class="wow fadeInLeft"><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To excel in the challenging environment where scientific research can be carried out, knowledge and skills can be enhanced and humanity can be served in best possible way.</small></h2>
			<h2 class="wow fadeInLeft">Personal Summary</h2>
			<h2 class="wow fadeInLeft"><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am Zain Ashraf a Software Engineer and Full Stack Website Developer based in Burewala, Pakistan - currently pursuing a Bachelor of Computer Science degree at University. Beyond Academia, I proudly contribute my expertise as a Software Engineer at Hywiz Technologies, an Industry-Leading Software Company renowned for its Innovative Solutions. With over 2+ years of hands-on experience in the professional arena, I've mastered creating engaging digital experiences and delivering seamless web experiences that captivate audiences.</small></h2>
		</div>

<?php
	include "footer.php";
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