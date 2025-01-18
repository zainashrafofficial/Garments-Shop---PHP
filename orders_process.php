<?php
		session_start();
		if(!isset($_SESSION["admin"])) {
			header("location:login.php");
		}

		require_once 'db_connection.php';



//Show
 		if(isset($_POST["show"])){

 			$myQuery="select * from orders";
			$record=mysqli_query($myCon,$myQuery);

			while($row=mysqli_fetch_array($record))
			{	
				$myText='';											
				$myText='<tr>';
            	$myText.='<td>'.$row['order_id'].'</td>';
                $myText.='<td>'.$row['user_email'].'</td>';
                $myText.='<td>'.$row['product_id'].'</td>';
                $myText.='<td>'.$row['req_quantity'].'</td>';
                $myText.='<td><a class="delete btn btn-danger wow bounce" href="" title="Delete" data-order="'.$row['order_id'].'" ><span class="glyphicon glyphicon-saved" ></span></a></td>';
                $myText.='</tr>';
                echo $myText;
			}
 		}



//Delete
 		if(isset($_POST["order_id"])){

 			$order_id=$_POST['order_id'];


 			$myQuery="DELETE FROM orders where order_id=$order_id";
			$record=mysqli_query($myCon,$myQuery);


			if($record){
				echo "Deleted Successfully";
			}else{
				echo "Server not Responding or Database Error, Try again Later!";
			}
 		}

?>