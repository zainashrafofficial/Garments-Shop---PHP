<?php
		session_start();
		if(!isset($_SESSION["admin"])) {
			header("location:login.php");
		}

		require_once 'db_connection.php';



//Show
 		if(isset($_POST["show"])){

 			$myQuery="select * from admin";
			$record=mysqli_query($myCon,$myQuery);

			while($row=mysqli_fetch_array($record))
			{	
				$myText='';											
				$myText='<tr>';
                $myText.='<td>'.$row['admin_email'].'</td>';
            	$myText.='<td>'.$row['admin_nameF'].'</td>';
            	$myText.='<td>'.$row['admin_nameL'].'</td>';
            	$myText.='<td>'.$row['admin_mobile'].'</td>';
                $myText.='<td>'.$row['admin_password'].'</td>';
                $myText.='<td><a class="delete btn btn-danger" href="" title="Delete" data-admin="'.$row['admin_email'].'"><span class="glyphicon glyphicon-trash"></span></a></td>';
                $myText.='</tr>';
                echo $myText;
			}
?>

<script>
	$(".delete").click(function(e) {
					e.preventDefault();
					var c=confirm("Are you sure?");
					if(c){
						var myvaL= $(this).data("admin");
						//console.log({order_id:myvaL});
						$.post("manageAdmins_process.php",{admin_email:myvaL},function(responseText){
							alert(responseText);
							$.post("manageAdmins_process.php",{show:true},function(responseText){
								$("#admins").html(responseText);
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
 		if(isset($_POST["admin_email"])){

 			$admin_email=$_POST['admin_email'];

 			$myQuery1="select * from admin";
			$result=mysqli_query($myCon,$myQuery1);
			$count=mysqli_num_rows($result);

			if($count>1){
				$myQuery="DELETE FROM admin where admin_email='$admin_email'";
				$record=mysqli_query($myCon,$myQuery);

				if($record){
					echo "Deleted Successfully";
				}else{
					echo "Server not Responding or Database Error, Try again Later!";
				}

			}else{
				echo "Sorry, Atleast one Admin require! You cant delete last Admin.";
			}


 			
 		}

?>