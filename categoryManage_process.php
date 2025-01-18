<?php

		session_start();
		if(!isset($_SESSION["admin"])) {
			header("location:login.php");
		}

		require_once 'db_connection.php';

		
		if(isset($_GET['subCat_id'])){

 			$subCat_id=$_GET['subCat_id'];


 			$myQuery="DELETE FROM subcategory where subCat_id='".$subCat_id."'";
			$record=mysqli_query($myCon,$myQuery);

			
		}


		if(isset($_POST["insert"])){
			$cat_id=$_POST["cat_id"];
			$subCat_name=$_POST["subCat_name"];

			$myQuery="INSERT into subcategory(cat_id,subCat_id,subCat_name) VALUES('$cat_id','','$subCat_name')";
			$record=mysqli_query($myCon,$myQuery);

		}

		if(isset($_POST["update"])){
			$subCat_id=$_POST["subCat_id"];
			$subCat_name=$_POST["subCat_name"];

			$myQuery="UPDATE subcategory set subCat_name='$subCat_name' where subCat_id=$subCat_id";
			$record=mysqli_query($myCon,$myQuery);

		}



header("location:categoryManage.php");
?>