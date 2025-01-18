<?php
		session_start();
		if((!isset($_SESSION["user"])) && (!isset($_SESSION["admin"]))) {
			header("location:login.php");
		}


		require_once 'db_connection.php';


 		$fName=addslashes($_POST['fName']);
 		$lName=addslashes($_POST['lName']);
 		$email=addslashes($_POST['email']);
 		$mobile=addslashes($_POST['mobile']);
 		$password=addslashes($_POST['password']);

 				session_start();
 				if(isset($_SESSION["admin"])){
 					$table_name="admin";
 					$myQuery="UPDATE $table_name SET admin_nameF='$fName',admin_nameL='$lName',admin_mobile='$mobile',admin_password='$password' WHERE admin_email='$email'";
					$record=mysqli_query($myCon,$myQuery);
 				}else if(isset($_SESSION["user"])){
 					$table_name="users";
 					$myQuery="UPDATE $table_name SET user_nameF='$fName',user_nameL='$lName',user_mobile='$mobile',user_password='$password' WHERE user_email='$email'";
					$record=mysqli_query($myCon,$myQuery);
 				}else{
 					header("location:login.php");
 				}


 		

		if($record){
				if($table_name=="admin"){
					unset($_SESSION["admin"]);
					unset($_SESSION["admin_email"]);
					header('location:login.php');
				}else if($table_name=="users"){
					unset($_SESSION["user"]);
					unset($_SESSION["user_email"]);
					header('location:login.php');
				}else{
					echo "Success";				
				}
				
		}else{
			//header('location:userRegister.php');
			echo "Failed To Connect to Database...";
		}



?>