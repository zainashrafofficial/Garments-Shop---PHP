<?php
		session_start();
		if(!isset($_SESSION["admin"])) {
			header("location:login.php");
		}

		require_once 'db_connection.php';
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Feedbacks | Garments Shop </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="description" name="Final Term Project (Online Garments Shop Project) by Zain Ashraf submitted to Rana Saleem Sb :)">
	<link rel="icon" type="image/png/gif" href="images/logo.png">
	<link href="css/animate.css" rel="stylesheet" />
		<!--All CSS-->	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link href="css/style.css" rel="stylesheet" />

</head>

<body>
		<!-- start header -->
		<?php
			include "header.php";
		?>
		<!-- end header -->


		<div class="container">
					
					<div id="cart_div" >
						<h1 class="text-center" style="margin-bottom:10px;"><small>Feedbacks from Users</small></h1>

							
							<table class="table table-bordered table-hover table-responsive cart wow bounceIn">
                    			<thead style="background-color:crimson; color:white;">
                        			<tr>
                            			<th class="hidden-xs">ID</th>
                            			<th>Name</th>
                           				<th>Email</th>
                           				<th class="hidden-xs">Subject</th>
                           				<th>Message</th>
                           				<th>Action</th>
                        			</tr>
                    			</thead>
                    			<tbody>

                    				<?php

										$myQuery="select * from feedback";
										$record=mysqli_query($myCon,$myQuery);

										while($row=mysqli_fetch_array($record))
											{	
												$myText='';											
												$myText='<tr>';
                           				 		$myText.='<td class="hidden-xs">'.$row['f_id'].'</td>';
                            					$myText.='<td>'.$row['f_name'].'</td>';
                            					$myText.='<td>'.$row['f_email'].'</td>';
                            					$myText.='<td class="hidden-xs">'.$row['f_subject'].'</td>';
                            					$myText.='<td>'.$row['f_message'].'</td>';
                            					$myText.='<td><a class="RemoveCM btn btn-danger" title="Delete" href="feedbacks_process.php?f_id='.$row['f_id'].'"><span class="glyphicon glyphicon-trash"></span></a></td>';
                        						$myText.='</tr>';
                        						echo $myText;
											}
											
										?>             
                        			
                   				</tbody>
                			</table>
					</div>
</div>


<!-- 
	==========================================================
								Footer Start
	==========================================================
-->
<?php
		include "footer.php"	
?>


<!--Scripts-->

	<script src="Scripts/jquery.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
	<script src="Scripts/wow.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			//alert("okay");


			$(".RemoveCM").click(function() {
				return confirm("Are you sure?"); 
			});

		});
	</script>
	  <script>
        new WOW().init();
  </script>

</body>
</html>