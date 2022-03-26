<?php

include_once("frontheader.php");
  include_once("classes/fooduser.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(empty($_POST['category_type']) ){
		echo "<span class='ml-5 mt-5 alert alert-danger'>Please fill in category type</span>";
	}

	else{
		$res = new Food;
		$resfood  = $res->insertCategory($_POST['category_type']);
		//echo $resfood; 
		echo "<span class='ml-5 mt-5 alert alert-primary'>Successfully submitted. Hurray!!!</span>";
		exit;
	}
}

?>
<div class="restaurant">
	<div class="container ">
	<form class="" method="post" action="" enctype="multipart/form-data">
		<div class="row ">
			<div class="col-md-4">
				<!-- <img src="images/restaurant.jpg" class="" /> -->	
			</div>
			<div class="col-md-4 mt-4">
				<div class="form-group">
					<label>Category</label>
					<select name="category_type" class="form-control">
						<option name="category_type" value="">Please choose a category</option>
						<option name="category_type" value="Local dish">Local dish</option>
						<option name="category_type" value="Intercontinental dish">Intercontinental dish</option>
						<option name="category_type" value="Snacks">Snacks</option>
					</select>
				</div>
				<div class="form-group">
					<label>Category image</label>
					<input type="file" name="category_image" class="form-control">
				</div>
				<input type="submit" name="submit" class="form-control bg-primary text-light"> 
			</div>
			<div class="col-md-4">	
			</div>
		</div>
	</form>	
	</div>
</div>
