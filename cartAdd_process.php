<?php
		session_start();
		if((!isset($_SESSION["user"])) && (!isset($_SESSION["admin"]))) {
			header("location:login.php");
		}


		require 'db_connection.php';

//add to Cart
		if(isset($_POST["add"])){

			$product_id=$_POST['product_id'];
 			$email=$_POST['email'];
 			$qnty=$_POST["qnty"];


 			$myQuery="INSERT INTO cart(product_id,user_email,req_quantity) VALUES('$product_id','$email','$qnty')";
			$record=mysqli_query($myCon,$myQuery);
		}

//Return Qnty
		if(isset($_POST["return"])){
			$product_id=$_POST['product_id'];

			$myQuery="SELECT * from products where product_id=$product_id";
			$record=mysqli_query($myCon,$myQuery);
			$row=mysqli_fetch_array($record);

			echo $row["quantity"];

		}
//Return Qnty from Cart
		if(isset($_POST["cart_id"])){
			$cart_id=$_POST['cart_id'];

			$myQuery="SELECT * from cart where cart_id=$cart_id";
			$record=mysqli_query($myCon,$myQuery);
			$row=mysqli_fetch_array($record);

			echo $row["req_quantity"];

		}

//update
		if(isset($_POST["update"])){
			$cart_id=$_POST['cart_id'];
 			$qnty=$_POST["qnty"];

 			$myQuery="UPDATE cart SET req_quantity='$qnty' where cart_id=$cart_id";
			$record=mysqli_query($myCon,$myQuery);
		}


 		



?>