<?php
// if(!isset($_SESSION['tyuiojh'])){

// header("Location: index.php?msg=Please sign up to continue ");
// exit;}


	include_once("navbarheader.php");
	include_once("classes/user.php");
  

?>

<div class="container m-3 ">
	

	<?php

	
	

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      //validate
        if (empty($_POST['email'])){
          $errors['email'] = "Email address field cannot be empty";
        }

        if (empty($_POST['password'])){
          $errors['password'] = "Password field cannot be empty";
        }

        if (empty($errors)){

          // <!-- //include your user class -->
          // include_once("classes/user.php");
           //create user object -->

          $obj = new User;
session_start();
          
          if (isset($_SESSION['myid'])) {
    $myid=$_SESSION['myid'];
  }
           //to access login method -->
          $message = $obj->login($_POST['email'], $_POST['password']);
          // var_dump($message);
          // 	exit;
          if($message){
          	
            //redirect to dashboard.php
            //session_start();
            //$id = $_SESSION['id'];
            //header("Location: userdashboard.php?user=$myid");
            header("Location: index.php");
            exit;
        	}

            else{
              echo "<div class='alert alert-danger'>Invalid email address or password</div>";
            }
          
        }else{
          echo "<ul class='alert alert-danger'>";
          foreach ($errors as $key => $value) {
            echo "<li>$value</li>";
          }
          echo "</ul>";
        }
    }
      
	?>
	
	
    <div class="row">
    	<div class="col-md-5 " >
    		<div class="upperoutline">
    			<img src="images/signup.jpg" class="imgoutline" >
    			<div class="imgborder"></div>
    		</div>
    		
    	</div>
    	<div class="col-md-5 offset-2  justify-align-center">
    		<h1 class="mt-4 mb-3">Customer page
      			<small>Login</small>
    		</h1>
			<form name="registerform" id="registerform" action='' method="post">
	          <div class="control-group form-group">
	            <div class="controls">
	              <label>Email address</label>
	              <input type="text" class="form-control" id="email" name='email'>
	              
	            </div>
	          </div>
	          <div class="control-group form-group mb-3">
	            <div class="controls">
	              <label>Password</label>
	              <input type="password" class="form-control" id="password" name='password'>
	             
	            </div>
	          </div>
	          
	          <div class="control-group form-group">
	            <div class="controls">
	              
	              <input type="submit" class="form-control text-light" style="background-color:#ff006f " id="submit" name='submit'>
	             
	            </div>
	          </div>
	          <div class="small">***New user, Please <a href="signup.php" class="text-danger">sign up!!!</a></div>
	    </div>
	    <div class="col-md-2 "></div>
    </div>
</div>