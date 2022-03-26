<?php
	include_once("frontheader.php");

?>

<div class="container" style='min-height:500px'>
	<h1 class="mt-4 mb-3">List of all available food  </h1>
	<small></small>
    <div class="row">
 
      <!-- Content Column -->
      <div class="col-lg-12 mb-4">
      <!-- <div style='text-align:right'>
	  <a class='btn btn-info mb-4' href="addproduct.php">Add another food</a>
	  
	</div> -->
	<table class="table table-striped mt-5">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Food name</th>
				<th scope="col">Food description</th>
				<th scope="col">Food price</th>
				<th scope="col">Food image</th>
				<th scope="col">Food category</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include_once('classes/fooduser.php');
			$sql = new Food;
			$result = $sql->getFood();
			//var_dump($result);
			$counter = 1;
			?>
			<?php
				foreach ($result as $key => $value) {
				$id=$value['idfood'];	
				?>
			<tr>
				
				<th scope="col"><?php echo $counter++; ?></th>
				<td scope="col"><?php echo $value['foodtitle']; ?></td>
				<td scope="col"><?php echo $value['fooddescription']; ?></td>
				<td scope="col"><?php echo $value['foodprice']; ?></td>
				<td scope="col"><img src="foodimages/<?php echo $value['foodimage']?>" style='width:120px'></td>
				<td scope="col"><?php echo $value['category_type']; ?></td>
				<td scope="col">
					<a href="admineditfood.php?id=<?php echo $id; ?>" class='btn-primary btn-sm mb-2'>Order</a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>


</div>