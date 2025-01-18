<?php
		session_start();
		if((!isset($_SESSION["user"])) && (!isset($_SESSION["admin"]))) {
			header("location:login.php");
		}


		require_once 'db_connection.php';


 		$cart_id=$_GET['cart_id'];


 		$myQuery="DELETE FROM cart where cart_id='".$cart_id."'";
		$record=mysqli_query($myCon,$myQuery);


		header("location:cart.php");

?>