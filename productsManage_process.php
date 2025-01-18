<?php

		session_start();
		if(!isset($_SESSION["admin"])) {
			header("location:login.php");
		}

		require_once 'db_connection.php';

//Return Categories
 		if(isset($_POST["cat_id"])){
 			$cat_id=$_POST["cat_id"];

 			$myQuery="SELECT * FROM subcategory where cat_id='".$cat_id."'";
			$record=mysqli_query($myCon,$myQuery);
				$myText="<option value='NULL'>Select a Category</option>";
			while($row=mysqli_fetch_array($record))
				{
					$myText.="<option value='".$row["subCat_id"]."'>".$row["subCat_name"]."</option>";
				}
			echo $myText;
 		}

//Return Products
 		if(isset($_POST["subCat_id"])){

 							$subCat_id=$_POST["subCat_id"];
 							$cat_id=$_POST["c_id"];

 							$myQuery="select * from products where cat_id=$cat_id and subCat_id=$subCat_id";
							$record=mysqli_query($myCon,$myQuery);

							while($row=mysqli_fetch_array($record))
							{
								if($row["quantity"]>0){
										$myText='<tr>';
										$myText.='<td class="hidden-xs">'.$row['product_id'].'</td>';
										$myText.='<td>'.$row['product_name'].'</td>';
										$myText.='<td class="hidden-xs"><img class="img-thumbnail" src="'.$row['img_url'].'" alt="'.$row['product_name'].'"></td>';
										$myText.='<td>'.$row['discription'].'</td>';
										$myText.='<td>'.$row['price'].' Rs.</td>';
										$myText.='<td>'.$row['quantity'].'</td>';								

                            			$myText.='<td><b><a class="EditCM btn btn-danger myProduct" title="Edit" name="'.$row['product_name'].'" id="'.$row['product_id'].'" href="#"><span class="glyphicon glyphicon-pencil" ></span></a>&nbsp;';
                            			$myText.='<a class="delete btn btn-danger" title="Delete" id="'.$row['product_id'].'" href="#"><span class="glyphicon glyphicon-trash"></span></a>';
                            			$myText.='<b></td>';
                        				$myText.='</tr>';
								 echo $myText;
								}
							}
							$script='<script>$(".delete").click(function(e){';
							$script.='e.preventDefault();';
							$script.='var check=confirm("Are you sure?????");';
							$script.='if(check){';
							$script.=	'var pID=$(this).attr("id");';
							$script.=		'$.post("productsManage_process.php",{product_id:pID},function(){';
							$script.=			'var my_data2={};';
							$script.=			'my_data2["c_id"]=$("#cat").val();';
							$script.=			'my_data2["subCat_id"]=$("#subCat").val();';
							$script.=			'$.ajax("productsManage_process.php",{';
							$script.=				'type:"post",';
							$script.=				'data:my_data2,success:function(responseText){';
							$script.=					'$("#myTable").html(responseText);';
							$script.=			'}});';
							$script.=		'});';
							$script.=	'}';
							$script.='});';
							$script.='</script>';
						echo $script;


?>
				<script>
						$(".EditCM").click(function(e) {
							e.preventDefault();
							var pID=$(this).attr('id');
							var myData5={};
							myData5["productid"]=pID;
							myData5["get_product"]=true;
								$.ajax('productsManage_process.php',{
									type:"post",
									data:myData5,
									success:function(responseText){
										var record=$.parseJSON(responseText);
										$("#uID").val(pID);
										$("#uName").val(record.pName);
										$("#uDiscription").val(record.discription);
										$("#uPrice").val(record.price);
										$("#uQnty").val(record.quantity);

										$('#myModal2').modal("show");
									}
								});
							
							
						});
						$(document).ready(function(){
							var alterClass = function() {
    						var ww = document.body.clientWidth;
    						//alert(ww);
    						if (ww < 1000) {
    							$('.EditCM').addClass('btn-xs');
    							$('.delete').addClass('btn-xs');

    						} else if (ww >= 1000) {
    							$('.EditCM').removeClass('btn-xs');
    							$('.delete').removeClass('btn-xs');

    						};
  							};

  							$(window).resize(function(){
    							alterClass();
 							 });
  							//Fire it when the page first loads:
  								alterClass();
						});
				</script>

<?php

 		}


//Delete Product		
		if(isset($_POST['product_id'])){

 			$product_id=$_POST['product_id'];

 			$myQuery1="select * from products where product_id=$product_id";
			$record1=mysqli_query($myCon,$myQuery1);
			$row=mysqli_fetch_array($record1);
				unlink($row["img_url"]);


 			$myQuery="DELETE FROM products where product_id='".$product_id."'";
			$record=mysqli_query($myCon,$myQuery);
			header("location:productsManage.php");

			
		}

//Add Record
		if(isset($_FILES["pImage"]["name"])){
			//echo "Cat:".$_POST['pCat']."&subCat:".$_POST["pSubCat"];
			$cat_id=$_POST["pCat"];
			$subCat_id=$_POST["pSubCat"];
			$product_name=$_POST["pName"];
			$discription=$_POST["pDiscription"];
			$price=$_POST["pPrice"];
			$Qnty=$_POST["pQnty"];
				if($cat_id==1){
					$img_url="images/men/";
				}else if($cat_id==2){
					$img_url="images/women/";
				}else if($cat_id==3){
					$img_url="images/kids/";
				}else{
					$img_url="images/";
				}

					$file_name=$_FILES["pImage"]["name"];
					$file_type=$_FILES["pImage"]["type"];
					$file_ext=strtolower(end(explode('.',$file_name)));
					$validExtensions=array("jpg","jpeg","png","gif");
					$img_url.=$file_name;
						if(file_exists($img_url)){
							echo "**Image already exists**";
							return;
						}else if(($file_type!="image/png" || $file_type!="image/jpg" || $file_type!="image/jpeg" || $file_type!="image/gif") && 
								!(in_array($file_ext,$validExtensions)) ){
							echo "Invalid File Type or Extension. Allowed: gif,jpeg,jpg,png";
							return;
						}else if($_FILES["pImage"]["size"] > 1000000 || $_SERVER["CONTENT_LENGTH"] > 1000000 ){ //1mb
							echo "Invalid Image Size, Max Allowed Size: 1mb";
							return;
						}

			$myQuery="INSERT into products(cat_id,subCat_id,product_id,product_name,discription,img_url,price,quantity) VALUES('$cat_id','$subCat_id','','$product_name','$discription','$img_url','$price','$Qnty')";
			$record=mysqli_query($myCon,$myQuery);
			if($record){
				move_uploaded_file($_FILES["pImage"]["tmp_name"],$img_url);
				echo "Success";

			}else{
				echo "Query Not Run/Database error.";
			}
		}


//Get Product for Update
		if(isset($_POST["get_product"])){
			$pID=$_POST["productid"];

			$myQuery9="select * from products where product_id=$pID";
			$record9=mysqli_query($myCon,$myQuery9);
			$row9=mysqli_fetch_array($record9);

			$name=$row9['product_name'];
			$disc=$row9['discription'];
			$price=$row9['price'];
			$quantity=$row9['quantity'];


			echo '{"pName":"'.$name.'","discription":"'.$disc.'","price":"'.$price.'","quantity":"'.$quantity.'"}';
		}
//Update
		if(isset($_POST["uName"])){
			$id=$_POST["uID"];
			$name=$_POST["uName"];
			$disc=$_POST["uDiscription"];
			$price=$_POST["uPrice"];
			$quantity=$_POST["uQnty"];
			$img=$_FILES['uImage']['name'];
			if($img){
					$myQuery9="select * from products where product_id=$id";
					$record9=mysqli_query($myCon,$myQuery9);
					$row9=mysqli_fetch_array($record9);

					$cat_id=$row9['cat_id'];
					$subCat_id=$row9['subCat_id'];
					$old_img=$row9['img_url'];

					if($cat_id==1){
						$img_url="images/men/";
					}else if($cat_id==2){
						$img_url="images/women/";
					}else if($cat_id==3){
						$img_url="images/kids/";
					}else{
						$img_url="images/";
					}
					$file_name=$_FILES["uImage"]["name"];
					$file_type=$_FILES["uImage"]["type"];
					$file_ext=strtolower(end(explode('.',$file_name)));
					$validExtensions=array("jpg","jpeg","png","gif");
					$img_url.=$file_name;
						if(file_exists($img_url)){
							echo "**Image already exists**";
							return;
						}else if(($file_type!="image/png" || $file_type!="image/jpg" || $file_type!="image/jpeg" || $file_type!="image/gif") && 
								!(in_array($file_ext,$validExtensions)) ){
							echo "Invalid File Type or Extension. Allowed: gif,jpeg,jpg,png";
							return;
						}else if($_FILES["uImage"]["size"] > 1000000 || $_SERVER["CONTENT_LENGTH"] > 1000000 ){ //1mb
							echo "Invalid Image Size, Max Allowed Size: 1mb";
							return;
						}

					$myQuery="UPDATE products set product_name='$name',discription='$disc',price='$price',quantity='$quantity',img_url='$img_url' where product_id=$id";
					$record=mysqli_query($myCon,$myQuery);
					if($record){
						unlink($old_img);
						move_uploaded_file($_FILES["uImage"]["tmp_name"],$img_url);
						echo "Success";

					}else{
						echo "Query Not Run/Database error.";
					}
			}else{
				$myQuery="UPDATE products set product_name='$name',discription='$disc',price='$price',quantity='$quantity' where product_id=$id";
				$record=mysqli_query($myCon,$myQuery);
				if($record){
					echo "Success";
				}else{
					echo "Query Not Run/Database error.";
				}
			}
		}


		if(isset($_POST["update"])){

			

		}




	mysqli_close($myCon);

?>