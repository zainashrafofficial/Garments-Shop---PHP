<?php
		session_start();
		require_once 'db_connection.php';


 		$fName1=$_POST['fName'];
 		$lName1=$_POST['lName'];
 		$email1=$_POST['email'];
 		$mobile1=$_POST['mobile'];
 		$password1=$_POST['password'];

 		$fName=addslashes($fName1);
 		$lName=addslashes($lName1);
 		$email=$email1;
 		$mobile=addslashes($mobile1);
 		$password=$password1;


 		$myQuery="INSERT INTO users(user_email,user_nameF,user_nameL,user_mobile,user_password) VALUES('$email','$fName','$lName','$mobile','$password')";
		$record=mysqli_query($myCon,$myQuery);


		$name=$fName1.' '.$lName1;
		if($record){
			$_SESSION["user"]=$name;
			$_SESSION["user_email"]=$email;
			$_SESSION["success"]="registerUser";
			header('location:index.php');
		}else{
			header('location:userRegister.php');
		}

		echo "Something Went wrong , Try again Later!";

?>