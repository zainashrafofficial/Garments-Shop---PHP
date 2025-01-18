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
	<title> Subcribers | Garments Shop </title>
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
						<h1 class="text-center" style="margin-bottom:10px;"><small>Subscribers</small></h1>

							
							<table class="table table-bordered table-hover table-responsive cart">
                    			<thead style="background-color:crimson; color:white;">
                        			<tr>
                            			<th>Subscriber ID</th>
                           				<th>Subscriber Email</th>
                           				<th>Action</th>
                        			</tr>
                    			</thead>
                    			<tbody>

                    				<?php

										$myQuery="select * from subcribers";
										$record=mysqli_query($myCon,$myQuery);

										while($row=mysqli_fetch_array($record))
											{	
												$myText='';											
												$myText='<tr>';
                           				 		$myText.='<td>'.$row['subcriber_id'].'</td>';
                            					$myText.='<td>'.$row['subcriber_email'].'</td>';
                            					$myText.='<td><a class="RemoveCM btn btn-danger wow jello" title="Delete" href="subcribe_process.php?subcriber_id='.$row['subcriber_id'].'"><span class="glyphicon glyphicon-trash"></span></a></td>';
                        						$myText.='</tr>';
                        						echo $myText;
											}
											
										?>             
                        			
                   				</tbody>
                			</table>
					</div>
</div>


<!-- Modal Update -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal Content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Category</h4>
      </div>
      <div class="modal-body">
			<div style="" align="center">
				<div class="form-group">
					<label for="cat_id2" style="float: left">Choose Section</label>
					<select id="cat_id2" class="form-control input-lg">
					</select>
				</div>
				<div class="form-group">
					<label for="subCat_name2" style="float: left">Category Name</label>
					<input type="text" class="form-control input-lg" placeholder="Enter Category Name" id="subCat_name2" value="">
				</div>
			</div>
        
      </div>
      <div class="modal-footer">
      		<button id="update" class="btn btn-default">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

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
			$("#add").click(function() {
				//alert("okay");
				var my_data = {};
      			my_data["cat_id"] = $("#cat_id").children('option:selected').val();
      			my_data["subCat_name"]=$("#subCat_name").val();
      			my_data["insert"]="yes";
      			console.log(my_data);
      			$.post('categoryManage_process.php',my_data);
				$("#myModal").modal("toggle");
				window.location.replace("categoryManage.php");

				return false;
			});




			$("#update").click(function() {
				//alert("okay");

				var my_data = {};
      			my_data["subCat_id"] = $("#cat_id2").children('option:selected').val();
      			my_data["subCat_name"]=$("#subCat_name2").val();
      			my_data["update"]="yes";
      			console.log(my_data);
      			$.post('categoryManage_process.php',my_data);
				$("#myModal2").modal("toggle");
				window.location.replace("categoryManage.php");

				return false;
			});

			$(".RemoveCM").click(function() {
				return confirm("Are you sure?"); 
			});

			$(".EditCM").click(function() {

				var subC=this.id;
				$("#cat_id2").html('<option value="'+subC+'">Men\'s Stuff</option>');
				$("#subCat_name2").val(this.name);

			});
		});
	</script>
	  <script>
        new WOW().init();
  </script>

</body>
</html>