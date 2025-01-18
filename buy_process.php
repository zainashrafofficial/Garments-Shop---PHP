<?php
		session_start();
		if((!isset($_SESSION["user"])) && (!isset($_SESSION["admin"]))) {
			header("location:login.php");
		}


		require_once 'db_connection.php';


 		$email=$_POST['email'];

 		$myQuery1="INSERT INTO orders (product_id,user_email,req_quantity) SELECT product_id,user_email,req_quantity FROM cart WHERE user_email='$email'";
 		$record1=mysqli_query($myCon,$myQuery1);


 		if($record1){

			$myQuery2="select * from cart where user_email='".$email."'";
			$record2=mysqli_query($myCon,$myQuery2);

			while($row2=mysqli_fetch_array($record2))
			{	
				$product_id=$row2["product_id"];
				$req_quantity=$row2["req_quantity"];

				$myQuery3="SELECT * from products where product_id=$product_id";
				$record3=mysqli_query($myCon,$myQuery3);
				$row3=mysqli_fetch_array($record3);

				$qnty=$row3["quantity"];

				if($qnty<$req_quantity){
					echo "low";
					return false;
				}

				$qntyNow=$qnty-$req_quantity;

				$myQuery4="UPDATE products SET quantity='$qntyNow' where product_id=$product_id";
				$record4=mysqli_query($myCon,$myQuery4);
			}


			$myQuery="DELETE FROM cart where user_email='".$email."'";
			$record=mysqli_query($myCon,$myQuery);
 		}



?>