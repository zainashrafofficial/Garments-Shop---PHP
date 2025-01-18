<?php
		error_reporting(0);
		session_start();
		if((!isset($_SESSION["user"])) && (!isset($_SESSION["admin"]))) {
			header("location:login.php");
		}


		require_once 'db_connection.php';
?>




<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title> Cart | Garments Shop </title>
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




    <div class="container" align="center">

        <div id="cart_div">
            <h1 style="margin-bottom:10px "><small>Items you added to cart</small></h1>
            <table class="table table-bordered cart wow fadeInLeft">
                <thead style="background-color:crimson; color:white;">
                    <tr>
                        <th class="col-lg-1 col-md-1 hidden-xs hidden-sm">Product ID</th>
                        <th class="col-lg-3 col-md-2 col-sm-1 hidden-xs">Item</th>
                        <th class="col-lg-3 col-md-2 hidden-xs hidden-sm">Discription</th>
                        <th class="col-lg-1 col-md-1 col-sm-1">Unit Price</th>
                        <th class="col-lg-1 col-md-1 col-sm-1">Quantity</th>
                        <th class="col-lg-1 col-md-1 col-sm-1">Total Price</th>
                        <th class="col-lg-2 col-md-1 col-sm-1">Action</th>
                    </tr>
                </thead>
                <tbody id="Tbody">
                    <?php
    // Initialize variables
    $userEmail = '';
    $grandTotal = 0;

    // Check session for user/admin email
    if (!empty($_SESSION['user_email'])) {
        $userEmail = $_SESSION['user_email'];
    } elseif (!empty($_SESSION['admin_email'])) {
        $userEmail = $_SESSION['admin_email'];
    }

    // Fetch cart data using a prepared statement
    $query = "
        SELECT 
            c.cart_id, 
            c.product_id, 
            c.req_quantity, 
            p.product_name, 
            p.img_url, 
            p.discription, 
            p.price 
        FROM 
            cart AS c 
        INNER JOIN 
            products AS p 
        ON 
            c.product_id = p.product_id 
        WHERE 
            c.user_email = ?
    ";

    $stmt = $myCon->prepare($query);
    $stmt->bind_param('s', $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if cart items exist
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $totalPrice = $row['req_quantity'] * $row['price'];
            $grandTotal += $totalPrice;
    ?>
                    <tr>
                        <td class="col-lg-1 col-md-1 hidden-xs hidden-sm"><?= htmlspecialchars($row['product_id']) ?>
                        </td>
                        <td class="col-lg-3 col-md-2 col-sm-1 hidden-xs">
                            <div class="myItem">
                                <img src="<?= htmlspecialchars($row['img_url']) ?>"
                                    alt="<?= htmlspecialchars($row['product_name']) ?>"
                                    style="width: 150px; height: 190px; margin-bottom: 30px">
                                <span>
                                    <p><?= htmlspecialchars($row['product_name']) ?></p>
                                </span>
                            </div>
                        </td>
                        <td class="col-lg-3 col-md-2 hidden-xs hidden-sm"><?= htmlspecialchars($row['discription']) ?>
                        </td>
                        <td class="col-lg-1 col-md-1 col-sm-1">Rs. <?= htmlspecialchars($row['price']) ?></td>
                        <td class="col-lg-1 col-md-1 col-sm-1"><?= htmlspecialchars($row['req_quantity']) ?></td>
                        <td class="col-lg-1 col-md-1 col-sm-1">Rs. <?= htmlspecialchars($totalPrice) ?></td>
                        <td class="col-lg-2 col-md-1 col-sm-1">
                            <a class="btn btn-danger myProduct" title="Edit"
                                id="<?= htmlspecialchars($row['product_id']) ?>"
                                data-cart="<?= htmlspecialchars($row['cart_id']) ?>" href="#">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            &nbsp;
                            <a class="btn btn-danger remove" title="Delete"
                                href="cartRemove_process.php?cart_id=<?= htmlspecialchars($row['cart_id']) ?>"
                                onclick="return confirm('Are you sure you want to remove this item?');">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php
        }
    } else {
        echo '<tr><td colspan="7" class="text-center">Your cart is empty!</td></tr>';
    }
    $stmt->close();
    ?>
                </tbody>

            </table>

            <div style="text-align:center;">
                <p>Grand Total:<b> Rs. <?php echo $grandTotal; ?></b>
                <p>
                    <a class="btn btn-danger" href="" id="buy">Buy Now</a>
            </div>
        </div>
        <div id="success_message_div" style="display: none">
            <h1 style="margin-bottom:10px "><small>Thank You for Shopping!!</small></h1><br>
            <h2 style="margin-bottom:100px "><small>Your request is sent successfully. You will be Contacted
                    soon.</small></h2>
        </div>
        <div id="error_message_div" style="display: none">
            <h1 style="margin-bottom:10px "><small>An error occured!!</small></h1><br>
            <h2 style="margin-bottom:100px "><small>Sorry for inconvenience. Please try again later.</small></h2>
        </div>

    </div>

    <span id="justEmail" style="display: none"><?php if(isset($_SESSION["user_email"])){
								echo $_SESSION["user_email"];
							}
							if(isset($_SESSION["admin_email"])){
								echo $_SESSION["admin_email"];
							}
					?></span>



    <?php
	include "footer.php";
?>

    <span id="justEmail" style="display: none"><?php if(isset($_SESSION["user_email"])){
								echo $_SESSION["user_email"];
							}
							if(isset($_SESSION["admin_email"])){
								echo $_SESSION["admin_email"];
							}
					?></span>


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">


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
                        <div class="input-group-btn"><button class="btn btn-primary" id="minus"><span
                                    class="glyphicon glyphicon-minus"></span></button></div>
                        <input style="padding: 10px" class="form-control" type="text" value="1" readonly
                            name="req_quantity" id="req_qnty">
                        <div class="input-group-btn"><button class="btn btn-info" id="plus"><span
                                    class="glyphicon glyphicon-plus"></span></button></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="cnfrm">Update</button>
                    <button type="button" class="btn btn-default" id="later">Cancel</button>
                </div>
            </div>

        </div>
    </div>



    <script src="Scripts/jquery.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="Scripts/wow.min.js" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
        //alert("okay");

        $("#buy").click(function() {
            var el = $("#Tbody").children().length;
            if (el == 0) {
                alert("Cart is Empty! (Please add Products in cart first.)");
                return false;
            }
            var my_data = {};
            my_data["email"] = $("#justEmail").text();
            //console.log(my_data);
            $.post('buy_process.php', my_data, function() {
                $("#success_message_div").show();
                $("#cart_div").hide();
                $("#count").text(0);

            });

            return false;
        });

        $(".remove").click(function() {
            return confirm("Are you sure? Remove!");
        });

        $(".myProduct").click(function() {

            if ($("#justEmail").text() != '') {
                $("#p_ID").val($(this).data('cart'));
                var my_data = {};
                my_data["product_id"] = $(this).attr("id");
                my_data["return"] = true;
                $.post('cartAdd_process.php', my_data, function(responseText) {
                    $("#qnty").val(responseText);
                });
                var my_data3 = {};
                my_data3['cart_id'] = $(this).data('cart');
                $.post('cartAdd_process.php', my_data3, function(responseText) {
                    $("#req_qnty").val(responseText);
                });
                $("#myModal").modal("show");
                return false;
            }
        });
        $("#cnfrm").click(function() {
            var my_data2 = {};
            my_data2["cart_id"] = $("#p_ID").val();
            my_data2["qnty"] = $('#req_qnty').val();
            my_data2["update"] = true;
            $.post('cartAdd_process.php', my_data2);
            $("#myModal").modal("hide");
            location.reload();
        });
        $("#later").click(function() {
            $("#myModal").modal("toggle");
        });
        $('#plus').click(function() {
            var qnty = $('#req_qnty').val();
            var max_qnty = $('#qnty').val();
            debugger;
            var m = parseInt(max_qnty);
            var n = parseInt(qnty);
            if (n < m) {
                $('#req_qnty').val(++qnty);
            }
        });
        $('#minus').click(function() {
            var qnty = $('#req_qnty').val();
            if (qnty > 1) {
                $('#req_qnty').val(--qnty);
            }
        });

    });
    </script>
    <script>
    new WOW().init();
    </script>

</body>

</html>