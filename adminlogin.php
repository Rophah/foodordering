<?php
	include_once("frontheader.php");
	include_once("classes/adminuser.php");

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
          include_once("classes/user.php");
           //create user object -->

          $obj = new Admin;

           //to access login method -->
          $message = $obj->login($_POST['email'], $_POST['password']);

          if($message){
            //redirect to dashboard.php
            header("Location: admindashboard.php");
            exit;}
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
    	<div class="col-md-5" >
    		<div class="upperoutline">
    			<img src="images/signup.jpg" class="imgoutline" >
    			<div class="imgborder"></div>
    		</div>
    		
    	</div>
    	<div class="col-md-5 offset-2 justify-align-center">
    		<h1 class="mt-4 mb-3">Administrator page
      			<small>Login</small>
    		</h1>
			<form name="registerform" id="registerform" action='' method="post">
	          <div class="control-group form-group">
	            <div class="controls">
	              <label>Email address</label>
	              <input type="text" class="form-control mb-3" id="email" name='email'>
	              
	            </div>
	          </div>
	          <div class="control-group form-group">
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
	          <div class="small">***New admin, Please <a href="signup.php" class="text-danger">sign up!!!</a></div>
	    </div>
	    <div class="col-lg-2 "></div>
    </div>
</div>