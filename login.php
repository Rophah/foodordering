<?php
include_once('classes/user.php');

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$sql = new User;
$result = $sql->login($_POST['email'],$_POST['password']);


 if($result==true){

  header("Location: userdashboard.php");
  exit;
 }

}
?>

<form method="post" action="">
  <input type="text" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="password">
  <input type="submit" name="submit">
</form>

