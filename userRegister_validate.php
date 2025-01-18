<?php
		session_start();
		require_once 'db_connection.php';

 		$email=$_GET['email'];


 		$myQuery="select * from users where user_email='$email'";
		$record=mysqli_query($myCon,$myQuery);
		$row=mysqli_num_rows($record);

		$myQuery2="select * from admin where admin_email='$email'";
		$record2=mysqli_query($myCon,$myQuery2);
		$row2=mysqli_num_rows($record2);

		if($row==0 && $row2==0){
			echo "Email Available";
		}else{
			echo "Email Already Used,Try Another!";
		}



?>