<?php
include_once "classes/tablereservation.php";

$sql = new Table;
$result= $sql->deletetry($id);

header("Location: cart.php");

?>