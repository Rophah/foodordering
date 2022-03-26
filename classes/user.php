<?php
//include_once("constants.php");

class User{

	public $firstname;
	public $lastname;
	public $email;
	public $phone;
	public $dbconnect;

	public function __construct(){
		//$this->dbconnect=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$this->dbconnect=new mysqli("localhost","root","","foodordering");
		if ($this->dbconnect->connect_error){
			die("Connection error: ".$this->dbconnect->connect_error);
		}
	}


	public function signup($fname,$lname,$email,$dob,$phone,$pass,$confirmpass){

		$pass = md5($pass);
		$confirmpass = md5($confirmpass);
		$sql = "INSERT INTO user(firstname,lastname,emailaddress,dateofbirth,phonenumber,password,confirmpassword) VALUES('$fname','$lname','$email','$dob','$phone','$pass','$confirmpass')";
		
		$result = $this->dbconnect->query($sql);

		//var_dump($result);
		if($this->dbconnect->error){
			die("Error in connection: ".$this->dbconnect->error);
		}

		if($this->dbconnect->affected_rows == 1){

			session_start();

			$_SESSION['email'] = $email;
			$_SESSION['lastname']=$lname;
			$_SESSION['firstnme'] = $fname;
			//$_SESSION['orptiyek'] = "onlineordering";

			//header("Location: http://localhost/onlineordering/ ");
			//exit;
			
		}else{
			return "Oops! something happened try again later!";
		};
	}

	public function ckeckEmailAddress($email){
		$sql = "SELECT * FROM user WHERE emailaddress = '$email'";

		$result = $this->dbconnect->query($sql);
		if($this->dbconnect->affected_rows == 1){
			return true;
		}else{
			return false;
		}
	}

	public function login($email,$password){
		$password = md5($password);
		$sql = "SELECT * FROM user WHERE emailaddress = '$email' && password = '$password' ";

		// var_dump($sql);
		// exit;
		$result = $this->dbconnect->query($sql);

		if($this->dbconnect->error){
			return "Oops there is a connection error";
		}

		$rows= $result->fetch_assoc();
		if($result->affected_rows == 1){
			$_SESSION['id']= $rows['idcustomer'];
			//var_dump($_SESSION['id']);
			exit;
			return $rows;
		} else{
			return $rows;
		}

				
	}


	
}







?>