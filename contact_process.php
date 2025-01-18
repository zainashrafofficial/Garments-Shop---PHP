<?php
		session_start();
		require_once 'db_connection.php';


 		$name=$_POST["name"];
 		$email=$_POST['email'];
 		$subject=$_POST['subject'];
 		$message=$_POST['message'];

 		$myQuery1="INSERT INTO feedback (f_id,f_name,f_email,f_subject,f_message) VALUES('','$name','$email','$subject','$message')";
 		$record1=mysqli_query($myCon,$myQuery1);



?>