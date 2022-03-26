<?php
include_once('classes/fooduser.php');
include_once('frontheader.php');

$sql = new Food;
$res = $sql->intercontinental();
// var_dump( $res);
// exit;

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>



<div class="container">
	<h2 class="mt-4 mb-3">Available deliciously made intercontinental dishes </h2>
	
	<div class="row">
		<?php
			if(empty($res)){
				echo "<span class='alert alert-primary'>No local food available</span>";
			}else{
				foreach ($res as $key => $value) {
			?>
			<div class="col">
				
				<img class= "imgsmall" src ="foodimages/<?php echo $value['foodimage']?>" style="width:250px; height:250px;"/>
				<div style="float: left;">		
					<br>
					<?php echo "<strong>Food: </strong>".$value['foodtitle']; ?>
					<br>
					<?php echo "<strong>Food description: </strong>".$value['fooddescription']; ?>
					<br>
					<?php echo "<strong>Price: </strong>".$value['foodprice']; ?>
					<br>
					<?php echo "<button type='button' class='btn btn-success mt-3' data-bs-toggle='modal' data-bs-target='#news$value[idfood]'>Order Now!</button>" ?>
				</div>
			</div>	
			
			<div class="modal fade" id="news<?php echo $value['idfood'];?>" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Food details</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<!-- Your code goes here-->
				<div class="container">
					<div class="row">
						<div class="col-md-5">
						<?php echo $value['foodtitle']; ?>	
						</div>
					
						<div class="col-md-7">
					 	<?php echo $value['foodprice']; ?>
						</div>
					</div>
				</div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>

			<?php
				}

			}
			?>
	</div>	
	
		<form action="order.php" method="post">	
		<input type="hidden" name="name" value="<?php echo $value['idfood']; ?>">
		<input type="hidden" name="name" value="<?php echo $value['foodtitle']; ?>">
		<input type="hidden" name= "price" value="<?php echo $value['foodprice']; ?>">

	</form>

	</div>
</div>
<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/popper.min.js" type="text/javascript"></script>

</body>
</html>