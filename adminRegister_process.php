<?php
		session_start();
		if(!isset($_SESSION["admin"])) {
			header("location:login.php");
		}

		require_once 'db_connection.php';


 		echo $fName=$_POST['fName'];
 		echo $lName=$_POST['lName'];
 		echo $email=$_POST['email'];
 		echo $mobile=$_POST['mobile'];
 		echo $password=$_POST['password'];


 		$myQuery="INSERT INTO admin(admin_email,admin_nameF,admin_nameL,admin_mobile,admin_password) VALUES('$email','$fName','$lName','$mobile','$password')";
		$record=mysqli_query($myCon,$myQuery);

		if($record){
			header('location:manageAdmins.php');
		}else{
			header('location:adminRegister.php');
		}



?>