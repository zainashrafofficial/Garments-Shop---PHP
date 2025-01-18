<?php
		session_start();
		require_once 'db_connection.php';



 		if(isset($_POST['email'])){


 			$email=$_POST['email'];


 			$myQuery="INSERT INTO subcribers(subcriber_id,subcriber_email) VALUES('','$email')";
			$record=mysqli_query($myCon,$myQuery);

			if($record){
				//echo "Thank You For Subcribing....!!! \n You will be redirected to Homepage within 5 Seconds";
				$_SESSION["success"]="subcribe";
				header('location:index.php');
			}else{
				$_SESSION["error"]="subcribe";
				header('location:index.php');
			}

 		}


 		if(isset($_GET["subcriber_id"])){
 			$subcriber_id=$_GET["subcriber_id"];
 			$myQuery="DELETE from subcribers where subcriber_id='$subcriber_id'";
			$record=mysqli_query($myCon,$myQuery);
			if($record){
				header('location:subcribers.php');
			}else{
				echo "Error.....Please Try Again Later!";
				
			}
 		}

 		


?>