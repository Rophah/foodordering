<?php

include_once ("adminheader.php");
include ("classes/fooduser.php");
?>


<div class="container">
	<div class="row mt-3">

		<div class="col-md-3 mt-5">
			<div class="list-group">
				<a href="addproduct.php" class="list-group-item ">Add product</a>
				<a href="listfood.php" class="list-group-item ">List available food</a>
				<a href="admineditfood.php" class="list-group-item ">Edit product</a>
				<a href="listtablepreserve.php" class="list-group-item ">List of reserved table</a>
				<a href="" class="list-group-item ">Delivery</a>
				<a href="adminlogoutfood.php" class="list-group-item ">Log out</a>
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-3">
			<div class="col mb-2">
				<div class="card text-white bg-primary">
					<div class="card-header text-center fs-5 mt-3">REPORTS</div>
					<div class="card-body">
						<p class="card-text text-center mt-5"></p>
						<a href="#" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>
		<div class="col mb-2">
				<div class="card text-white bg-warning">
					<div class="card-header text-center fs-5 mt-3">REPORTS</div>
					<div class="card-body">
						<p class="card-text text-center mt-5"></p>
						<a href="#" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>	
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-3">
		    <div class="col mb-2">
				<div class="card text-white bg-info">
					<div class="card-header text-center fs-5 mt-3">REPORTS</div>
					<div class="card-body">
						<p class="card-text text-center mt-5"></p>
						<a href="#" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>
			<div class="col mb-2">
				<div class="card text-white bg-success">
					<div class="card-header text-center fs-5 mt-3">REPORTS</div>
					<div class="card-body">
						<p class="card-text text-center mt-5"></p>
						<a href="#" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>	
		</div>

	</div>
</div>