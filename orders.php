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
	<title> Orders List | Garments Shop </title>
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
						<h1 class="text-center" style="margin-bottom:10px;"><small>Manage Orders</small></h1>

							
							<table class="table table-bordered cart">
                    			<thead style="background-color:crimson; color:white;">
                        			<tr>
                            			<th>Order ID</th>
                           				<th>User Email</th>
                            			<th>Product ID</th>
                            			<th>Requested Quantity</th>
                            			<th>Process</th>
                        			</tr>
                    			</thead>
                    			<tbody id="orders">
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
			$.post("orders_process.php",{show:true},function(responseText){
				$("#orders").html(responseText);

				$(".delete").click(function(e) {
					e.preventDefault();
					var c=confirm("Are you sure?");
					if(c){
						var myvaL= $(this).data("order");
						$.post("orders_process.php",{order_id:myvaL},function(responseText){
							alert(responseText);
							$.post("orders_process.php",{show:true},function(responseText){
								$("#orders").html(responseText);
							});

						});
					}else{
						console.log("Fail");
					}
				});

			});

	</script>
	  <script>
        new WOW().init();
  </script>

</body>
</html>