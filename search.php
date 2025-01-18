<?php
		session_start();
		require_once 'db_connection.php';
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Search Results | Garments Shop </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="description" name="Final Term Project (Online Garments Shop Project) by Zain Ashraf submitted to Rana Saleem Sb :)">
	<link rel="icon" type="image/png/gif" href="images/logo.png">
	<link href="css/animate.css" rel="stylesheet" />
		<!--All CSS-->	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link href="css/style.css" rel="stylesheet" />

</head>

<body>

<?php
	include "header.php";
?>

<div class="container myBody col-lg-12">

	<section class="col-lg-3 col-md-3 hidden-sm hidden-xs wow flipInY" style="position: sticky; top: 0%">
		<div class="mySidebar">
			<h2>Categories</h1>
			<ul class="category">
				<li>Men's Stuff</li>
					<ul class="subcategory">
						<?php
							$myQuery="select * from subcategory where cat_id=1";
							$record=mysqli_query($myCon,$myQuery);

							while($row=mysqli_fetch_array($record))
							{
			
								 echo '<li><a href="category.php?subCat_name='.$row['subCat_name'].'&cat_name=Men\'s Stuff&subCat_id='.$row['subCat_id'].'">'.$row["subCat_name"].'</a></li>';
							}
						?>
					</ul>
				<li>Women's Stuff</li>
					<ul class="subcategory">
						<?php
							$myQuery="select * from subcategory where cat_id=2";
							$record=mysqli_query($myCon,$myQuery);

							while($row=mysqli_fetch_array($record))
							{
			
								 echo '<li><a href="category.php?subCat_name='.$row['subCat_name'].'&cat_name=Women\'s Stuff&subCat_id='.$row['subCat_id'].'">'.$row["subCat_name"].'</a></li>';
							}
						?>
					</ul>
				<li>Kids Stuff</li>
					<ul class="subcategory">
						<?php
							$myQuery="select * from subcategory where cat_id=3";
							$record=mysqli_query($myCon,$myQuery);

							while($row=mysqli_fetch_array($record))
							{
			
								 echo '<li><a href="category.php?subCat_name='.$row['subCat_name'].'&cat_name=Kids Stuff&subCat_id='.$row['subCat_id'].'">'.$row["subCat_name"].'</a></li>';
							}
						?>
					</ul>
			</ul>
		</div>
	</section>



	<section class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="float: right;">


			<div>

				<?php

					$keyword='';
					if(isset($_POST["search"])){
						$keyword=$_POST["search"];
					}

						if($keyword=='men' || $keyword=='mens' || $keyword=='male'){
										$myQuery2="select * from products where cat_id=1";
										$record2=mysqli_query($myCon,$myQuery2);

									echo '<h1 align="center">Results Matched</h1>';
									echo '<div id="">';
									echo '<div class="row" style="padding: 20px 0 20px 0;">';
									
									echo '<h3 class="subHeading">Items</h3>';

									while($row2=mysqli_fetch_array($record2))
									{
										if($row2["quantity"]>0){
										$myResult='';
										$myResult.='<div>';
										$myResult.='<div class="myItem col-lg-3 col-md-3 col-sm-3 col-xs-6 wow rollIn" style="margin-bottom:10px">';
								$myResult.='<a href="Details.php?pID='.$row2['product_id'].'"><img class="img-thumbnail" src="'.$row2['img_url'].'" alt="'.$row2['product_id'].'"></a>';
										$myResult.='<span>';
										$myResult.='<p>'.$row2['product_name'].'</p>';
										$myResult.='<p style="color:red;background: white">Price: '.$row2['price'].'</p>';
										$myResult.='<a class="btn btn-danger myProduct1" id="'.$row2['product_id'].'" href="login.php">Add to Cart</a>';
										$myResult.='</span>';
										$myResult.='</div>';
										$myResult.='</div>';
										
										echo $myResult;
										}
									}
								 $myResult='';
								 $myResult.='</div>';
								 $myResult.='</div>';
								 echo $myResult;


						}else if($keyword=='women' || $keyword=='womens' || $keyword=='female'){
										$myQuery2="select * from products where cat_id=2";
										$record2=mysqli_query($myCon,$myQuery2);

									echo '<h1 align="center">Results Matched</h1>';
									echo '<div id="">';
									echo '<div class="row" style="padding: 20px 0 20px 0;">';
									
									echo '<h3 class="subHeading">Items</h3>';

									while($row2=mysqli_fetch_array($record2))
									{
										if($row2["quantity"]>0){
										$myResult='';
										$myResult.='<div>';
										$myResult.='<div class="myItem col-lg-3 col-md-3 col-sm-3 col-xs-6 wow rollIn" style="margin-bottom:10px">';
								$myResult.='<a href="Details.php?pID='.$row2['product_id'].'"><img class="img-thumbnail" src="'.$row2['img_url'].'" alt="'.$row2['product_id'].'"></a>';
										$myResult.='<span>';
										$myResult.='<p>'.$row2['product_name'].'</p>';
										$myResult.='<p style="color:red;background: white">Price: '.$row2['price'].'</p>';
										$myResult.='<a class="btn btn-danger myProduct1" id="'.$row2['product_id'].'" href="login.php">Add to Cart</a>';
										$myResult.='</span>';
										$myResult.='</div>';
										$myResult.='</div>';
										
										echo $myResult;
									}
									}
								 $myResult='';
								 $myResult.='</div>';
								 $myResult.='</div>';
								 echo $myResult;



						}else if($keyword=='kids' || $keyword=='kid' || $keyword=='child' || $keyword=='children' ){
										$myQuery2="select * from products where cat_id=3";
										$record2=mysqli_query($myCon,$myQuery2);

									echo '<h1 align="center">Results Matched</h1>';
									echo '<div id="">';
									echo '<div class="row" style="padding: 20px 0 20px 0;">';
									
									echo '<h3 class="subHeading">Items</h3>';

									while($row2=mysqli_fetch_array($record2))
									{
										if($row2["quantity"]>0){
										$myResult='';
										$myResult.='<div>';
										$myResult.='<div class="myItem col-lg-3 col-md-3 col-sm-3 col-xs-6 wow rollIn" style="margin-bottom:10px">';
								$myResult.='<a href="Details.php?pID='.$row2['product_id'].'"><img class="img-thumbnail" src="'.$row2['img_url'].'" alt="'.$row2['product_id'].'"></a>';
										$myResult.='<span>';
										$myResult.='<p>'.$row2['product_name'].'</p>';
										$myResult.='<p style="color:red;background: white">Price: '.$row2['price'].'</p>';
										$myResult.='<a class="btn btn-danger myProduct1" id="'.$row2['product_id'].'" href="login.php">Add to Cart</a>';
										$myResult.='</span>';
										$myResult.='</div>';
										$myResult.='</div>';
										
										echo $myResult;
									}
									}
								 $myResult='';
								 $myResult.='</div>';
								 $myResult.='</div>';
								 echo $myResult;
						}else{
								$id=intval($keyword);
								//$valm=gettype($newv);
								//echo $valm;
										$myQuery2="select * from products where product_id=$id";
										$record2=mysqli_query($myCon,$myQuery2);
										$count=0;
									

									while($row2=mysqli_fetch_array($record2))
									{
										if($row2["quantity"]>0){
											$count=1;
											echo '<h1 align="center">Results Matched</h1>';
											echo '<div id="">';
											echo '<div class="row" style="padding: 20px 0 20px 0;">';
									
											echo '<h3 class="subHeading">Items</h3>';
										$myResult='';
										$myResult.='<div>';
										$myResult.='<div class="myItem col-lg-3 col-md-3 col-sm-3 col-xs-6 wow rollIn" style="margin-bottom:10px;">';
								$myResult.='<a href="Details.php?pID='.$row2['product_id'].'"><img class="img-thumbnail" src="'.$row2['img_url'].'" alt="'.$row2['product_id'].'"></a>';
										$myResult.='<span>';
										$myResult.='<p>'.$row2['product_name'].'</p>';
										$myResult.='<p style="color:red;background: white">Price: '.$row2['price'].'</p>';
										$myResult.='<a class="btn btn-danger myProduct1" id="'.$row2['product_id'].'" href="login.php">Add to Cart</a>';
										$myResult.='</span>';
										$myResult.='</div>';
										$myResult.='</div>';
										
										echo $myResult;
									
								 $myResult='';
								 $myResult.='</div>';
								 $myResult.='</div>';
								 echo $myResult;
								 }
									}


								if($count==0){
									$myResult='<div class="text-center" id="error_message_div">';
									$myResult.='<h1 style="margin-bottom:1px;"><small style="color:crimson">Sorry no record found!!</small></h1><br>';
									$myResult.='<h2 style="margin-bottom:100px "><small>Please try another keyword. Eg: men, women, kids....</small></h2>';
									$myResult.='</div>';
									echo $myResult;
								}
								
						}
				?>

			</div>

	</section>

</div>



<span id="justEmail" style="display: none"><?php if(isset($_SESSION["user_email"])){
								echo $_SESSION["user_email"];
							}
							if(isset($_SESSION["admin_email"])){
								echo $_SESSION["admin_email"];
							}
					?></span>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add To Cart</h4>
      </div>
      <div class="modal-body">
      	<div class="input-group">
      		<input type="text" name="p_ID" id="p_ID" hidden value="">
      		<label>Available Stock</label>
      		<input class="form-control" type="text" name="qnty" id="qnty" readonly value="">
      	</div>
      	<br>
      	<div><label>Quantity</label></div>
      	<div class="input-group col-lg-6">      		
      		<div class="input-group-btn"><button class="btn btn-primary" id="minus"><span class="glyphicon glyphicon-minus"></span></button></div>
			<input style="padding: 10px" class="form-control" type="text" value="1" readonly name="req_quantity" id="req_qnty">
			<div class="input-group-btn"><button class="btn btn-info" id="plus"><span class="glyphicon glyphicon-plus"></span></button></div>	
      	</div>
        
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" id="cnfrm">Add to Cart</button>
        <button type="button" class="btn btn-default" id="later">Later</button>
      </div>
    </div>

  </div>
</div>

<?php
	include "footer.php";
?>

<!--Scripts-->

	<script src="Scripts/jquery.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
	<script src="Scripts/wow.min.js" type="text/javascript"></script>
		<script>
		$(document).ready(function() {
			//alert("okay");
			$(".myProduct1").click(function() {
				
				if($("#justEmail").text()!=''){
					$("#p_ID").val($(this).attr("id"));
					var my_data = {};
      				my_data["product_id"] = $(this).attr("id");
      				my_data["return"]=true;
      				$.post('cartAdd_process.php',my_data,function(responseText){
      					$("#qnty").val(responseText);
      				});      				
					$("#myModal").modal("show");
					return false;
				}
			});
			$("#cnfrm").click(function() {
				var my_data2 = {};
      				my_data2["product_id"] = $("#p_ID").val();
      				my_data2["email"]=$("#justEmail").text();
      				my_data2["qnty"]=$('#req_qnty').val();
      				my_data2["add"]=true;
      				$.post('cartAdd_process.php',my_data2);
      				var countval=$("#count").text();
      				
					$("#count").text(++countval);
					$("#myModal").modal("hide");
					$("#req_qnty").val(1);
			});

		});


		$("#later").click(function(){
			$("#req_qnty").val(1);
			$("#myModal").modal("toggle");
		});

		$('#plus').click(function(){
			var qnty=$('#req_qnty').val();
			var max_qnty=$('#qnty').val();
			debugger;
			var m=parseInt(max_qnty);
			var n=parseInt(qnty);
			if(n<m){
				$('#req_qnty').val(++qnty);
			}
		});
		$('#minus').click(function() {
			var qnty=$('#req_qnty').val();
			if(qnty>1){
				$('#req_qnty').val(--qnty);
			}
		});
	</script>
	  <script>
        new WOW().init();
  </script>

</body>
</html>