<?php
		session_start();
		if(!isset($_SESSION["admin"])) {
			header("location:login.php");
		}

		require_once 'db_connection.php';



 		if(isset($_GET["f_id"])){
 			$f_id=$_GET["f_id"];
 			$myQuery="DELETE from feedback where f_id='$f_id'";
			$record=mysqli_query($myCon,$myQuery);
			if($record){
				header('location:feedbacks.php');
			}else{
				echo "Error.....Please Try Again Later!";
				
			}
 		}

 		


?>