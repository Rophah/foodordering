<?php
include_once('tablereservation.php');

$id = $_GET['id'];
$obj = new Table;

$output = $obj-> findtablereserve($id);
?>
<div class="container-fluid mt-3">
 
    <div class="row ">
      <div class="col-md-3 mt-3">
      <div class="list-group">
        <a href="addproduct.php" class="list-group-item ">Add product</a>
        <a href="listfood.php" class="list-group-item ">List available food</a>
        <a href="admineditfood.php" class="list-group-item ">Edit product</a>
        <a href="" class="list-group-item ">Order</a>
        <a href="" class="list-group-item ">Delivery</a>
        <a href="adminlogoutfood.php" class="list-group-item ">Log out</a>
      </div>
      </div>
      <div class="col-md-6 mb-4">
        <h1 class="mt-4 mb-3">Edit food page
      <!-- <small>Edit</small> -->
      	</h1>

      	<?php
      		if($_SERVER['REQUEST_METHOD'] == 'POST'){
      			$fname = $_POST['fname'];
      			$lname = $_POST['lname'];
      			$phone = $_POST['phone'];
      			$email = $_POST['email'];
      			$num	= $_POST['num'];
      			$type = $_POST['type'];
      			$date = $_POST['date'];
      			$time = $_POST['time'];
      			$request = $_POST['request'];
      			$status = $_POST['status'];

      			if (empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($num) || empty($type) || empty ($date) || empty($time) || empty($request) || empty($status)){
      				echo "<span class='text-danger'>Kindly Complete all Fields</span>";
      			}else{
      				$result = $obj->updatereservetable($firstname, $lastname, $phone, $email,$guest,$reservetype, $reservedate, $reservetime,$reservedspecial, $id);
      				if($result == true){
      					echo "<span class='text-success'>Reserve table successfully updated</span>";
      				}else{
      					echo "<span class='text-success'>Could not update table successfully</span>";
      				}
      			}
      		}
      	?>
      </div>	
  </div>
</div>