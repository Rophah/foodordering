<?php

include_once ("adminnavbar.php");
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
				<a href="admineditreserve2.php" class="list-group-item ">Edit reserved table</a>
				<a href="insertcategory.php" class="list-group-item ">Insert new food category</a>
       
				<a href="" class="list-group-item ">Delivery</a>
				<a href="logoutfood.php" class="list-group-item ">Log out</a>
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
				<div class="card text-white bg-warning h-100">
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
				<div class="card text-white bg-info h-100">
					<div class="card-header text-center fs-5 mt-3">REPORTS</div>
					<div class="card-body">
						<p class="card-text text-center mt-5"></p>
						<a href="#" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>
			<div class="col mb-2">
				<div class="card text-white bg-success h-100">
					<div class="card-header text-center fs-5 mt-3">REPORTS</div>
					<div class="card-body">
						<p class="card-text text-center mt-5"></p>
						<a href="#" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>	
		<!-- start here -->

		   <!-- Icon Cards-->
        <!-- <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-users" style='font-size:24px'></i>
                </div>
                <div class="mr-5">26 Members</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="admin.html">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-list"></i>
                </div>
                <div class="mr-5">N5,000,000 Payment</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="report.html">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-comment"></i>
                </div>
                <div class="mr-5">12 Announcements</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa  fa-ban"></i>
                </div>
                <div class="mr-5">13 Failed Transactions!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
		
 -->
		<!-- end here -->
	</div>
</div>