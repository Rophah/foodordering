<?php
include('constants.php');
class Food{

	public $firstname;
	public $lastname;
	public $email;
	public $phone;
	public $dbconnect;

	public function __construct(){
		$this->dbconnect=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		if ($this->dbconnect->connect_error){
			die("Connection error: ".$this->dbconnect->connect_error);
		}
	}
	//end of db connect

	public function insertCategory($category_type){

		$category_image = $this->categoryuploadFile();

		if($category_image != false){
			$sql = "INSERT INTO category SET category_type='$category_type' , category_image= '$category_image' ";

			// var_dump($sql);
			// exit;
			$result = $this->dbconnect->query($sql);

			if($this->dbconnect->affected_rows == 1){
				return true;
			}else{
				return false;
			}
		}
	}

	//begin upload file
		public function categoryuploadFile(){
			//create variables to access the uploaded file data

	$filename = $_FILES['category_image']['name']; //original file name

	$filesize = $_FILES['category_image']['size'];//size

	$tmp_name = $_FILES['category_image']['tmp_name']; //temporary file

	$filetype = $_FILES['category_image']['type']; //mime type

	$error = $_FILES['category_image']['error'];

	//check if file uploaded
	//var_dump($filename);
	//var_dump($tmp_name);
	//exit;

	if($error > 0){
		die("No file uploaded!");
	}

	//check file size
	if ($filesize > 2097152){
		die("File should not be more than 2mb");
	}

	$extension = array('jpg','png','jpeg','gif','svg');

	//get the uploaded file extension

	$file_ext = explode("." , $filename);
	
	$the_file_ext = end($file_ext);
	//var_dump($the_file_ext);

	//check if the file extension is allowed

	if(!in_array(strtolower($the_file_ext), $extension)){
		die("File type not allowed!");
	}

	//destination folder  

	$folder = "foodimages/";
	$new_filename = rand().time().".".$the_file_ext;
	$destination = $folder.$new_filename;

	//move the file from temporary to destination

	if(move_uploaded_file(($tmp_name), $destination)){
		return $new_filename;
	}else{
		return false;
	}


		}
	//end upload file

	public function category(){
		$sql = "SELECT * FROM category";
		$result= $this->dbconnect->query($sql);
		// var_dump($sql);
		// exit;
			$record = [];
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}

	}

	//display on index page food in each category
	public function categoryindexpage(){
		$sql = "SELECT * FROM category join food where category.idcategory = food.idfood";
		$result= $this->dbconnect->query($sql);
		// var_dump($sql);
		// exit;
			$record = [];
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}
	}
	//end display on index page food in each category

	public function addproduct($foodtitle,$fooddescription,$foodprice,$idcategory){

		$emblem= $this->uploadfile();

		if ($emblem != false){

			$sql = "INSERT INTO food SET foodtitle = '$foodtitle',fooddescription = '$fooddescription',foodprice ='$foodprice', foodimage='$emblem' , idcategory ='$idcategory'";		
			
			$result = $this->dbconnect->query($sql);

			//var_dump($result);
			if($this->dbconnect->error){
				die("Error in connection: ".$this->dbconnect->error);
			}

			if($this->dbconnect->affected_rows == 1){
				//return true;
				//return "<span class='alert alert-success mt-3 mb-3'>Product was successfully added to the database</span>";
			}else{
				return "Oops! something happened try again later!";
			}
		}
	}


	//begin upload file
		public function uploadFile(){
			//create variables to access the uploaded file data

	$filename = $_FILES['foodimage']['name']; //original file name

	$filesize = $_FILES['foodimage']['size'];//size

	$tmp_name = $_FILES['foodimage']['tmp_name']; //temporary file

	$filetype = $_FILES['foodimage']['type']; //mime type

	$error = $_FILES['foodimage']['error'];

	//check if file uploaded
	//var_dump($filename);
	//var_dump($tmp_name);
	//exit;

	if($error > 0){
		die("No file uploaded!");
	}

	//check file size
	if ($filesize > 2097152){
		die("File should not be more than 2mb");
	}

	$extension = array('jpg','png','jpeg','gif','svg');

	//get the uploaded file extension

	$file_ext = explode("." , $filename);
	
	$the_file_ext = end($file_ext);
	//var_dump($the_file_ext);

	//check if the file extension is allowed

	if(!in_array(strtolower($the_file_ext), $extension)){
		die("File type not allowed!");
	}

	//destination folder  

	$folder = "foodimages/";
	$new_filename = rand().time().".".$the_file_ext;
	$destination = $folder.$new_filename;

	//move the file from temporary to destination

	if(move_uploaded_file(($tmp_name), $destination)){
		return $new_filename;
	}else{
		return false;
	}


		}
	//end upload file

	//function to list food on the table
	function getFood(){
		$sql = "SELECT * FROM food JOIN category WHERE food.idcategory = category.idcategory";

		
		$result = $this->dbconnect->query($sql);
		
		$records = [];

		if($result->num_rows >0){
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}return $records;
		}else{
			return $records;
		}
	}	
	//end function to list food on the table	

	//
	public function findFood($idfood){
		$sql= "SELECT * FROM food WHERE idfood = $idfood";

		$result = $this->dbconnect->query($sql);
		//var_dump($result);
		if($this->dbconnect->affected_rows == 1){
			$row =$result->fetch_assoc();
			return $row;
		}else{
			return false;
		}

	}
	//end of food
	//edit product
	public function updateFood($foodtitle,$fooddescription,$foodprice,$foodimage,$idcategory){

			//call upload file function
			if(isset($_FILES['error']) && $_FILES['error'] == 0){
				$emblem = $this->uploadFile();
			}else{
				$emblem = $foodimage;
			}
			
			$emblem = $this->uploadFile(); 
			if ($emblem != false){

				$sql = "UPDATE food SET  foodtitle= '$foodtitle', fooddescription='$fooddescription',
				foodprice = '$foodprice' , foodimage='$emblem', idcategory='$idcategory' WHERE idfood ='$idcategory'";

				//run the query
				//var_dump($sql);

				$result = $this->dbconnect->query($sql);

				//var_dump($result);
				if($this->dbconnect->affected_rows == 1 || $this->dbconnect->affected_rows == 0){
					return true;
				}else{
					return false;
				}
			}
		}
	//end edit product 
	public function adminlogout(){
		session_start();

		session_destroy();

		header('Location: index.php');
	}

	public function localdish(){
		$sql = "SELECT * FROM food WHERE idcategory = 1";

		$result = $this->dbconnect->query($sql);
		
		$record = [];

		if($this->dbconnect->affected_rows > 0){

			while( $row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}
	}

	public function intercontinental(){
		$sql = "SELECT * FROM food WHERE idcategory = 2";

		$result = $this->dbconnect->query($sql);
		
		$record = [];

		if($this->dbconnect->affected_rows > 0){

			while( $row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}
	}

	public function snacks(){
		$sql = "SELECT * FROM food WHERE idcategory = 3";

		$result = $this->dbconnect->query($sql);
		
		$record = [];

		if($this->dbconnect->affected_rows > 0){

			while( $row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}
	}
	//end of get snacks
	


}
?>
