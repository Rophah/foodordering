<?php


include_once("adminnavbar.php");
include_once("classes/fooduser.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(empty($_POST['category_type']) ){
		echo "<span class='ml-5 mt-5 alert alert-danger'>Please fill in category type</span>";
	}

	else{
		$res = new Food;
		$resfood  = $res->insertCategory($_POST['category_type']);
		// var_dump($resfood);
		// 	exit; 
		echo "<span class='ml-5 mt-5 alert alert-primary'>Successfully submitted. </span>";
		
	}
}

?>
<!-- class="restaurant" -->
<div >

	<div class="container-fluid" >
	<form class="" method="post" action="" enctype="multipart/form-data" class="mt-5 mb-5">

		<div class="row text-center text-light mb-5" style="background-color: #e8a392; color:#fff" >
			<h1>Insert new food category</h1>
		</div>	
		<div class="row">
			<div class="col-md-3">
				<!-- <img src="images/restaurant.jpg" class="" /> -->	
				<a href="addproduct.php" class="list-group-item ">Add product</a>
				<a href="listfood.php" class="list-group-item ">List available food</a>
				<a href="admineditfood.php" class="list-group-item ">Edit product</a>
				<a href="listtablepreserve.php" class="list-group-item ">List of reserved table</a>
				<a href="admineditreserve2.php" class="list-group-item ">Edit reserved table</a>
				<a href="insertcategory.php" class="list-group-item ">Insert new food category</a>
       
				<a href="" class="list-group-item ">Delivery</a>
				<a href="logoutfood.php" class="list-group-item ">Log out</a>

			</div>
			<div class="col-md-2"></div>
			<div class="col-md-5 mt-4" >
				<div class="form-group">
					<label>Category</label>

					<input type="text" name="category_type" class="form-control">
				</div>
				<div class="form-group mb-5">
					<label>Category image</label>
					<input type="file" name="category_image" class="form-control">
				</div>
				<input type="submit" name="submit" class="form-control bg-primary text-light"> 
			</div>
			<div class="col-md-2">	
			</div>
		</div>
	</form>	
	</div>
</div>
