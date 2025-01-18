<?php
		session_start();
		require_once 'db_connection.php';


 		$email=$_POST['email'];
 		$password=$_POST['password'];

 		//User Data
 		$myQuery="select * from users where user_email='$email'";
		$record=mysqli_query($myCon,$myQuery);
		$row=mysqli_fetch_array($record);
		$name=stripslashes($row['user_nameF']).' '.stripslashes($row['user_nameL']);
		$cpassword=stripslashes($row['user_password']);


		//admin Data
		$myQuery2="select * from admin where admin_email='$email'";
		$record2=mysqli_query($myCon,$myQuery2);
		$row2=mysqli_fetch_array($record2);
		$name2=stripslashes($row2['admin_nameF']).' '.stripslashes($row2['admin_nameL']);
		$cpassword2=stripslashes($row2['admin_password']);

		if($row){
				if($password==$cpassword){
					$_SESSION["user"]=$name;
					$_SESSION["user_email"]=$email;
					$_SESSION["success"]="loginUser";
					header('location:index.php');
				}else{
					$_SESSION["error"]="wrongPassword";
					header('location:login.php');
				}
		}else if($row2){
				if($password==$cpassword2){
					$_SESSION["admin"]=$name2;
					$_SESSION["admin_email"]=$email;
					$_SESSION["success"]="loginAdmin";
					header('location:index.php');
				}else{
					$_SESSION["error"]="wrongPassword";
					header('location:login.php');
				}
		}else{
			$_SESSION["error"]="UserNotFound";
			header('location:login.php');
		}


?>