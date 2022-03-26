<?php
include_once("constants.php");

class Admin {

	public $dbcon;

	public function __construct(){
		$this->dbcon = new Mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		if($this->dbcon->connect_error){
			die('Connection error');
		}
	}

	
		//begin add club
		public function signup($fname,$lname,$email,$dateofbirth,$phonenumber,$password){

			$emblem = $this->uploadFile();
			if ($emblem != false){

				// $sql = "INSERT INTO admin(fname,lname,email,dateofbirth,phonenumber,adminpicture,password) VALUES ('$fname','$lname','$email','$dateofbirth','$phonenumber','$adminpicture','$password')";
				$sql= "INSERT INTO admin SET fname='$fname',lname='$lname',email='$email',dateofbirth= '$dateofbirth',phonenumber = '$phonenumber',adminpicture='$emblem',password='$password'";


				//run the query
				$result = $this->dbcon->query($sql);

				if($this->dbcon->affected_rows == 1){
					session_start();
					$_SESSION['email']=$email;
					$_SESSION['orptiyek'] = "onlineordering";
					return true;
				}else{
					return false;
				}

			}
		}

	//end add club

		//check email
		public function ckeckEmailAddress($email){
		$sql = "SELECT * FROM admin WHERE email = '$email'";

		$result = $this->dbcon->query($sql);
		if($this->dbcon->affected_rows == 1){
			return true;
		}else{
			return false;
		}
	}

	//begin upload file
		public function uploadFile(){
			//create variables to access the uploaded file data

	$filename = $_FILES['emblem']['name']; //original file name

	$filesize = $_FILES['emblem']['size'];//size

	$tmp_name = $_FILES['emblem']['tmp_name']; //temporary file

	$filetype = $_FILES['emblem']['type']; //mime type

	$error = $_FILES['emblem']['error'];

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

	$folder = "uploads/";
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

	//login admin
	public function login($email,$password){
		$sql = "SELECT * FROM admin WHERE emailaddress = '$email' && password = '$password' ";

		$result = $this->dbcon->query($sql);

		// var_dump($result);
		// exit;
		if($this->dbcon->error){
			return "Oops there is a connection error";
		}

		$rows= $result->fetch_assoc();

		if($result->num_rows == 1){
			return $rows;
		} else{
			return $rows;
		}		
	}

	
}



?>