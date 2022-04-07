<?php

include_once("classes/fooduser.php");

$sql = new Food;

$result = $sql->searchforfood($_POST['food']);

echo "<pre>";
print_r($sql);
echo "</pre>";

if(empty($result)){
	echo "This food is no available";
}else{

}

?>