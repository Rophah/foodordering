<?php
include_once('functionnavbar.php');
include_once('classes/user.php');
include_once('classes/tablereservation.php');

$sql = new Table;
//$result = $sql->delete($_POST['del_id']);
//var_dump($result);

if (isset($_SESSION['myid'])) {
    $myid=$_SESSION['myid'];
  }

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
	<h3><b>SELECTED ITEMS</b></h3>
	<hr>
	<table class="table table-striped mt-5">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Item</th>
				<th scope="col">Quantity</th>
				<th scope="col">Price</th>
				<th scope="col">Amount</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>

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
	
		<?php
		$counter = 1;
		foreach ($recs as $key => $value) {
		?>		<tr>
				<td><?php echo $counter++;?></td>
				<td>
					<img src="foodimages/<?php echo $value['foodimage']; ?>" class="img-small" style="height:200px; width: 200px">
						<h5 style="color: red;"><?php echo $value['foodtitle']?></h5>
				</td>
				<td>
					<input type="number" name="qty" id="quantity" value="<?php echo $value['quantity'];?>" class="mt-5 qty" readonly >
				</td>
				<td>
					<input type="text" name="price" class="mt-5 price" value="<?php echo $value['foodprice']?>" readonly>
				</td>
				<td class="mt-5" name="totalprice">
					<?php 
					$price= $value['foodprice'];
					$quantity= $value['quantity'];
						$total=$price*$quantity;
						//echo $total;
					 ?>

					 <input type="text" name="price" class="mt-5" value="<?php echo $total ?>" readonly>
				</td>
				<td>
					<input type="button" name="delete" class="mt-5" class="btn" onclick="deleteme(<?php echo $value['cart_id']?>)" value="delete">
				</td>
				
				</tr>
		<?php }?>

	
	</tbody>
	</table>
	<input type="button" name="deleteall" class="btn btn-success" onclick="deleteall(<?php echo $myid?>)" value="Delete all from cart">
</div>

<script type="text/javascript">
	function deleteme(del_id){
		if(confirm("Are you sure you want to delete?")){
			window.location.href = "deleteaddedtocart.php?delid=" + del_id + '';
			return true;
		}
	}

	function deleteall(myid){
		if(confirm("Do you really want to delete all from cart?")){
			window.location.href = "deleteall.php?id=" + myid + '';
			return true;
		}
	}
</script>