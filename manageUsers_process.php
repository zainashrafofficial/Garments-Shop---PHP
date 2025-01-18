<?php
		session_start();
		if(!isset($_SESSION["admin"])) {
			header("location:login.php");
		}

		require_once 'db_connection.php';



//Show
 		if(isset($_POST["show"])){

 			$myQuery="select * from users";
			$record=mysqli_query($myCon,$myQuery);

			while($row=mysqli_fetch_array($record))
			{	
				$myText='';											
				$myText='<tr>';
                $myText.='<td>'.$row['user_email'].'</td>';
            	$myText.='<td>'.$row['user_nameF'].'</td>';
            	$myText.='<td>'.$row['user_nameL'].'</td>';
            	$myText.='<td>'.$row['user_mobile'].'</td>';
                $myText.='<td>'.$row['user_password'].'</td>';
                $myText.='<td><a class="delete btn btn-danger" href="" title="Delete" data-user="'.$row['user_email'].'"><span class="glyphicon glyphicon-trash"></span></a></td>';
                $myText.='</tr>';
                echo $myText;
			}
?>

<script>
	$(".delete").click(function(e) {
					e.preventDefault();
					var c=confirm("Are you sure?");
					if(c){
						var myvaL= $(this).data("user");
						//console.log({order_id:myvaL});
						$.post("manageUsers_process.php",{user_email:myvaL},function(responseText){
							alert(responseText);
							$.post("manageUsers_process.php",{show:true},function(responseText){
								$("#users").html(responseText);
							});

						});
					}else{
						console.log("Fail");
					}
				});	
</script>

<?php
 		}



//Delete
 		if(isset($_POST["user_email"])){

 			$user_email=$_POST['user_email'];


 			$myQuery="DELETE FROM users where user_email='$user_email'";
			$record=mysqli_query($myCon,$myQuery);

			if($record){
				echo "Deleted Successfully";
			}else{
				echo "Server not Responding or Database Error, Try again Later!";
			}
 		}

?>