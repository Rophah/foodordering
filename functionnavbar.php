<?php
include_once('classes/user.php');

session_start();
if (isset($_SESSION['mylogchecker']) && ($_SESSION['mylogchecker'] = "Rt_0_0_rab") && $_SESSION['email']){

}else{
  header("Location: index.php");
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta name="keywords" content="order food, reserve table, local food, snacks, amala">
  <meta name="description" content="An restaurant online website to order local and intercontinental dishes and reserve a table">
  <meta name="author" content="Adebanjo Rofah">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=width-device,initial-scale=1, shrink-to-fit=no">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="main.css" rel="stylesheet" type="text/css">
  <link href="css/all.css" rel="stylesheet" type="text/css">
  <link href="font.css" rel="stylesheet" type="text/css">
  <title>Food Palace: Order your food</title>
</head>

<div class="container-fluid">
  <div class="row">
    <div class="col 12">
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><i class="fa-duotone fa-bowl-hot"></i>f<span style="color:red">OO</span>D pALACE</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house" style='color:red'></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categoryindex.php">CATEGORY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menudata.php">MENU</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tablepreserve.php">TABLE RESERVATION</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php"><i class="fa-solid fa-user" style='color:red'></i>SIGN UP</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-to-bracket" style='color:red'></i>LOG OUT</a>
        </li>
      </ul>
      <form class="d-flex">
        <!-- <a href=""><i class="fa-solid fa-cart-shopping" width=""></i></a>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-radius: 40px; border-color: red; " >
        <button class="btn btn-outline-danger" type="submit" style="background-color: red; color:#fff; border-radius: 40px; margin-left: -50px;">Search</button> -->

        <i class="fa-solid fa-cart-shopping" style="color:red; margin-right:20px; margin-top: 10px;"></i>
        <span>Welcome <?php echo $_SESSION['lastname']?></span>
      </form>
    </div>
  </div>
</nav>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>