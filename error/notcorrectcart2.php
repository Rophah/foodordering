<?php 
	 // session_start();
  // //check if user authenticate
  // if (isset($_SESSION['mylogcheker']) && $_SESSION['mylogcheker']=='Rt_0_0_cMeg') {
  //   # code...
  // }else{
  //   header("Location: userlogin.php");
  //   exit;
  // }
 include_once('categories.php');
					include_once('user.php');
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
	<div class='container-fluid'>
		<div class='row sticky' id='nav'>

		<div class="col-md-6" >
</div>

			<div class='col-md-6'>
					<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  					<div class="container-fluid">
    					<a class="navbar-brand" href="#">Navbar</a>
    						<button  id='btn' class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   							   <span class="navbar-toggler-icon"></span>
    						</button>
  						 <div class="collapse navbar-collapse" id="navbarSupportedContent">
      					 <ul class="navbar-nav me-auto mb-2 mb-lg-0"  id='nav'>
     					   <li class="nav-item">
        					  <a class="nav-link active" aria-current="page" href="dbl.html">Home</a>
       					   </li>
     					   <li class="nav-item">
       						   <a class="nav-link" href="#ocntact">Contact</a>
       					   </li>
       					    <li><a class="nav-link" href="aboutus.html">About us</a></li>
       					     <li><a class="nav-link" href="userregister.php">Sign up</a></li>
           					 <li> <a class="nav-link" href="userlogout.php">Log out</a></li>
      </ul>
      
    </div>
  </div>
</nav>
		</div>
	</div>

	<h3><b>YOUR SHOPPING BAG...</b></h3>
					<hr>
					<div class="row">
				<div class=col-md><b>items</b></div>
				<div class=col-md><b>quantity</b></div>
				<div class=col-md><b>price</b></div>
				<div class=col-md><b>check</b></div>
				<hr>
				</div>

	<div class="row wrapper">
			<?php
			session_start();
			if (!empty($_SESSION['myid']))   {       
       							 $userid=$_SESSION['myid'];
     							 }
     							
					$obj= new Category;
					$ord= new User;
					$totalqty=$ord->totalQty($userid);
								$price=$ord->totalPrice($userid);

						if (isset($_POST['order'])) {
								$price=$ord->addOrder($userid,$totalqty, $price);
								if ($price == true) {
										echo "You have successfully ordered";
								}
						}
						
						$orders=$ord->getcart($userid);

								foreach ($orders as $key => $value) {
									 $imgid=$value['product_id'];
   									$image= $obj->getImage($imgid);
    
			?>
				<div class="col-md-3">
					<img src="upload/<?php echo $image[0]['image_url']; ?>" class="img-fluid" style="max-height:200px;">
						<h5 style="color: gold;"><?php echo $value['product_name']?></h5>

				</div>
				<div class="col-md-3">
					<input type="number" name="qty" id="quantity" value="<?php echo $value['quantity'];?>" class="mt-5 qty" readonly >
				</div>
				<div class="col-md-3">
					<input type="text" name="price" class="mt-5 price" value="<?php echo $value['product_Price']?>" readonly>
				</div>
				<div class="col-md-3 mt-5 value" name="totalprice">
					<?php 
					$price= $value['product_Price'];
					$quantity= $value['quantity'];
						$total=$price*$quantity;
						echo $total;

					 ?>
				</div>
				<hr>

		
			<?php
								}
			?>
			<form action="" method="post">
				<?php
								$obj=new User;
				if (isset($_POST['total'])) {
								$price=$obj->totalPrice($userid);
								echo "<h5>Total price = $price</h5>";
						}
						

						?>
				<input type="submit" value="Get total" name="total">
				<input type="submit" value="Order" name="order">

			</form>
				

	</div>
		<div class='row' id='footer'>
			<div class='col-md-3'>
				logo
			</div>
			<div class='col-md-3 contact'>
				<h2>Links</h2>
				<ul>
					<li><a href='userdash.php'>home</a></li>
					<li><a href='about.html'>About us</a></li>
					<li><a href='#contact'>contact</a></li>
					<li><a href='userregister.php'>Sign up</a></li>



				</ul>
			</div>
			<div class='col-md-3 contact' id='contact'>
				<h2>contact</h2>
				08067522171<br>
				09076677273<br>
			</div>
			<div class='col-md-3 contact'>
				<h3>About us</h3>
				<p>Delight Beauty Lounge is a professional beauty distributor dedicated to providing affordable, top-quality make up kits for use by all beauty.  </p>
				<p>Any purchase of equipment from us is always combined lifetime customer support, marketing assistance, flexible financing options, and.....<a href='aboutus.html'>more</a> <!--so much more. Our team aims to help you make the right choice in purchasing equipment best suitable for your budget and preferences. That is why working with us will not only guarantee you an increased clientele and profits, but confidence and comfort in knowing that Delight Beauty Lounge is always standing behind you!-->

</p>
			</div>
			<div class='col'>
			</div>
			
		</div>
	

     
   

    
     
      
     
      

   

  </div>

	<script src="js/jquery.js" type="text/javascript" language="javascript"></script>
	<script type='text/javascript' src='js/bootstrap.bundle.min.js'></script>
	<script type='text/javascript' >

		
		$(document).ready(function(){
			
		});
	</script>

</body>
</html>