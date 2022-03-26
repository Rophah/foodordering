<!DOCTYPE html>
<html>
<head>
	<title>Confirm payment</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	
	<?php

	include_once("shared/marketplace.php");
	$obj = new MarketPlace; 
	$transref = "CH".rand().time();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			//create

			//insert transaction details
			if($_POST['trans_action'] == 'insert'){
				
				$output = $obj->insertTransDetails($_POST['price'],$_POST['productid'], $_POST['userid'], $transref);
			}
		}

	?>
	<div class="alert alert-success">
		<h2>Confirm payment</h2>
		<p>Total amount: <?php echo $_POST['price'] ?></p>
	</div>

	<form action="paystacktrans.php" method="post">
		<input type="hidden" name="price" value="<?php echo $_POST['price']; ?>">
		<input type="hidden" name="productid" value="<?php echo $_POST['productid']; ?>">
		<input type="hidden" name="userid" value="1">
		<input type="hidden" name="transref" value="<?php echo $transref; ?>">
		<input type="hidden" name="email" value="aderafat@gmail.com">
		<button type="submit" name="submit">Pay with PayStack</button>
	</form>
</body>
</html>