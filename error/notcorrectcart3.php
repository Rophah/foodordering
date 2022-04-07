<?php
include_once('functionnavbar.php');
include_once('classes/user.php');
include_once('classes/tablereservation.php');

$sql = new Table;
//$result = $sql->delete($_POST['del_id']);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="fa/css/all.min.css" rel="stylesheet" type="text/css"/>
		<link href="animate.min.css" rel="stylesheet" type="text/css"/>
		<style type="text/css" media="screen">
			div{
				border:0px solid black;
				padding: 5px;
			}
			.images{
				background-image:url("images/background.jpg");
				min-height:400px;
				background-size:cover;
				background-repeat:no-repeat;
				background-attachment:fixed;
			}
			#overlay{
				background-color: rgba(0,0,0,0.5);
				min-height:420px;

			}
			#nav li a{
				color:gold;
				text-align:left;
			}
			button{
				background-color: gold;
			}
			
			#nav{
				background-color:  #243119;
			}
			ul li{
				display: block;
			}
			ul li a{
				text-decoration: none;
				color:white;

			}
			#design{
				background-color: white;
				padding: 25px;
			}
			.contact,#btn{
				color:white;
			}
			#innernav{
				background-color:  #243119;
			}

			#footer{
				background-color: #243119;
			}
		</style>

		
</head>
<body>
<div class="container">
	<h3><b>YOUR CART</b></h3>
	<hr>
	<div class="row">
		<div class="col-md">Items</div>
		<div class="col-md">Quantity</div>
		<div class="col-md">Price</div>
		<div class="col-md">Check</div>
	</div>

<?php

		if (!empty($_SESSION['myid'])){       
       		$userid=$_SESSION['myid'];
       		//var_dump($userid);
     	} 
     	$rec = new User;
		$recs = $rec->selectallfromcart($userid); 
		// echo '<pre>';
		// print_r($recs);
		// echo '</pre>';  	
?>
	<div class="row">
		<?php
		foreach ($recs as $key => $value) {
		?>
				<div class="col-3">
					<img src="foodimages/<?php echo $value['foodimage']; ?>" class="img-small" style="height:200px; width: 200px">
						<h5 style="color: gold;"><?php echo $value['foodtitle']?></h5>

				</div>
				<div class="col-3">
					<input type="number" name="qty" id="quantity" value="<?php echo $value['quantity'];?>" class="mt-5 qty" readonly >
				</div>
				<div class="col-3">
					<input type="text" name="price" class="mt-5 price" value="<?php echo $value['foodprice']?>" readonly>
				</div>
				<div class="col-3 mt-5 value" name="totalprice">
					<?php 
					$price= $value['foodprice'];
					$quantity= $value['quantity'];
						$total=$price*$quantity;
						echo $total;

					 ?>
				</div>
				<!-- <div class="col-2">
					<button type="submit" value="<?php //echo $value['cart_id']; ?>" class="btn btn-success">Delete</button>
				</div> -->
				<hr>
				<form method="GET" action="">
					<input type="hidden" name="del_id" value="<?php echo $value['cart_id']; ?>">
				</form>
		<?php }?>
	</div>
</div>