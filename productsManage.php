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
	<title> Manage Products | Garments Shop </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="description" name="Final Term Project (Online Garments Shop Project) by Zain Ashraf submitted to Rana Saleem Sb :)">
	<link rel="icon" type="image/png/gif" href="images/logo.png">
	<link href="css/animate.css" rel="stylesheet" />
		<!--All CSS-->	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link href="css/style.css" rel="stylesheet" />

	<style>
		table.cart tr td{
			vertical-align:middle;
		}
		.myProduct{
			background: #d78700;
			border-color:#d78700;
		}
		.myProduct:hover{
			background: #d75f00;
			border-color:#d75f00;
		}
	</style>



</head>

<body>
		<!-- start header -->
		<?php
			include "header.php";
		?>
		<!-- end header -->


		<div class="container">
					
					<div id="cart_div" >
						<h1 class="text-center" style="margin-bottom:10px;"><small>Manage Products<a href="#" style="font-size:70%" data-toggle="modal" data-target="#myModal"> [ Add New ]</a></small></h1>

						<div id="Men's Stuff">
							<div class="form-group">
								<select id="cat" class="form-control input-lg cat">
									<option value="NULL">Select a Section</option>
									<option value="1">Men's Stuff</option>
									<option value="2">Women's Stuff</option>
									<option value="3">Kids Stuff</option>
								</select>								
							</div>
							<div class="form-group">
								<select id="subCat" class="form-control input-lg subCat">
									<option value="NULL">Select a Category</option>
								</select>
							</div>

							<div class="row" style="padding: 20px 0 20px 0;">
								<table class="table table-bordered cart">
									<thead style="background-color:crimson; color:white;">
										<tr>
											<th class="col-lg-1 col-md-1 col-sm-1 hidden-xs">Product ID</th>
											<th class="col-lg-1 col-md-1 col-sm-1">Product Name</th>
											<th class="col-lg-3 col-md-3 col-sm-1 hidden-xs">Image</th>
											<th class="col-lg-3 col-md-3 col-sm-1">Discription</th>
											<th class="col-lg-1 col-md-1 col-sm-1">Price</th>
											<th class="col-lg-1 col-md-1 col-sm-1">Quantity</th>
											<th class="col-lg-2 col-md-2 col-sm-1">Action</th>
										</tr>
									</thead>
									<tbody id="myTable">
									</tbody>
								</table>
							</div>
						</div>
				</div>
		</div>

<!-- Modal Add-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal Content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <div class="modal-body">
      	<form action="#" id="addProduct" method="post" enctype="multipart/form-data">
			<div align="center">
				<div class="form-group">
								<select id="cat2" name="pCat" class="form-control input-lg">
									<option value="NULL">Select a Section</option>
									<option value="1">Men's Stuff</option>
									<option value="2">Women's Stuff</option>
									<option value="3">Kids Stuff</option>
								</select>
				</div>
				<div class="form-group">
					<select id="subCat2" name="pSubCat" class="form-control input-lg">
						<option value="NULL">Select a Category</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" name="pName" id="pName" required minlength="1" maxlength="50" class="form-control input-lg" placeholder="Product Name">
				</div>
				<div class="form-group">
                	<textarea class="form-control input-lg" rows="4" id="pDiscription" minlength="1" maxlength="250" name="pDiscription" placeholder="Discription"></textarea>
              	</div>
              	<div class="form-group">
					<input type="number" id="pPrice" name="pPrice" required min="0" minlength="1" maxlength="11" class="form-control input-lg" placeholder="Price">
				</div>
				<div class="form-group">
					<input type="number" id="pQnty" name="pQnty" min="0" maxlength="11" required class="form-control input-lg" placeholder="Qunatity">
				</div>
				<div class="form-group">
					<span id="imageError" style="color:red"></span>
					<input type="file" id="pImage" name="pImage" required class="form-control input-lg" placeholder="Image">
				</div>

			</div>
        
      </div>
      <div class="modal-footer">
      		<input type="submit" id="add" name="add" value="Add" class="btn btn-default">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Modal Update -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal Content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Record</h4>
      </div>
     	<div class="modal-body">
      		<form action="#" id="updateProduct" method="post" enctype="multipart/form-data">
				<div align="center">
				<input type="text" name="uID" id="uID" value="" hidden>		
				<div class="form-group">
					<label style="float: left">Product Name</label>
					<input type="text" name="uName" id="uName" required class="form-control input-lg" placeholder="Product Name">
				</div>
				<div class="form-group">
					<label style="float: left">Discription</label>
                	<textarea class="form-control input-lg" rows="4" name="uDiscription" id="uDiscription" placeholder="Discription"></textarea>
              	</div>
              	<div class="form-group">
              		<label style="float: left">Price</label>
					<input type="text" name="uPrice" id="uPrice" required class="form-control input-lg" placeholder="Price">
				</div>
				<div class="form-group">
					<label style="float: left">Quantity</label>
					<input type="number" id="uQnty" name="uQnty" min="0" maxlength="11" required class="form-control input-lg" placeholder="Qunatity">
				</div>
				<div class="form-group">
					<span id="imageError2" style="color:red; float: right;"></span>
					<label style="float: left">Choose Image</label>
					<input type="file" id="pImage" name="uImage" id="uImage" class="form-control input-lg">
				</div>

			</div>
		</div>
      <div class="modal-footer">
      			<input type="submit" id="update" name="update" value="Update" class="btn btn-default">
      		</form>
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

			$("#cat").on('change',function(){
				//console.log(this.value);
					var my_data={};
					my_data['cat_id']=this.value;
				$.ajax('productsManage_process.php',{
					type:"post",
					data:my_data,
					success:function(responseText){
						$("#subCat").html(responseText);
						//console.log(responseText);
					}
				});
			});

			$("#subCat").on('change',function(){
				//console.log(this.value);

				var my_data={};
					my_data['c_id']=$("#cat").val();
					my_data['subCat_id']=this.value;
				$.ajax('productsManage_process.php',{
					type:"post",
					data:my_data,
					success:function(responseText){
						$("#myTable").html(responseText);						
					}
				});
			});
			//Model_Add
			$("#cat2").on('change',function(){
				//console.log(this.value);
					var my_data={};
					my_data['cat_id']=this.value;
				$.ajax('productsManage_process.php',{
					type:"post",
					data:my_data,
					success:function(responseText){
						$("#subCat2").html(responseText);
						console.log(responseText);
					}
				});
			});




		$("#addProduct").submit(function(e){
			e.preventDefault();
			$.ajax({
				url:"productsManage_process.php",
				type:'POST',
				data: new FormData(this),
				success: function(data){	
					$("#imageError").text(data);
						if(data=="Success"){
							 $('#myModal').delay(1000).fadeOut(450);

  								setTimeout(function(){
  									$('#myModal').modal("hide");
  								}, 1500);

							//$("#addProduct").trigger('reset');
						}
				},
				cache:false,
				contentType:false,
				processData:false

			});
		});



		$("#updateProduct").submit(function(e){
			e.preventDefault();
			$.ajax({
				url:"productsManage_process.php",
				type:'POST',
				data: new FormData(this),
				success: function(data){	
					$("#imageError2").text(data);
						if(data=="Success"){
							 $('#myModal2').delay(1000).fadeOut(450);

  								setTimeout(function(){
  									$('#myModal2').modal("hide");
  								}, 1500);
  								location.reload();

							//$("#addProduct").trigger('reset');
								var my_data={};
								my_data['c_id']=$("#cat").val();
								my_data['subCat_id']=this.value;
								//console.log(my_data);
						}
				},
				cache:false,
				contentType:false,
				processData:false

			});
		});




});


</script>
  <script>
        new WOW().init();
  </script>


</body>
</html>