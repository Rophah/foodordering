<?php
include_once("constants.php");

class User{

	public $firstname;
	public $lastname;
	public $email;
	public $phone;
	public $dbconnect;

	public function __construct(){
		$this->dbconnect=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		//$this->dbconnect=new mysqli("localhost","root","","foodordering");
		if ($this->dbconnect->connect_error){
			die("Connection error: ".$this->dbconnect->connect_error);
		}
	}


	public function signup($fname,$lname,$email,$dob,$phone,$pass,$confirmpass){

		$password=password_hash($pass, PASSWORD_DEFAULT);
		$confirmpassword=password_hash($confirmpass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO user(firstname,lastname,emailaddress,dateofbirth,phonenumber,password,confirmpassword) VALUES('$fname','$lname','$email','$dob','$phone','$password','$confirmpass')";
		
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
			$_SESSION['tyuiojh'] = "useronlineordering";

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
		$sql = "SELECT * FROM user WHERE emailaddress = '$email'";

		// var_dump($sql);
		// exit;
		$result = $this->dbconnect->query($sql);
		if($result->num_rows == 1){
			$row=$result->fetch_assoc();
			$confirm=password_verify($password, $row['password']);
			if ($confirm) {
			session_start();
			$_SESSION['myid']= $row['idcustomer'];
			$_SESSION['mylogchecker'] = "Rt_0_0_rab";
			$_SESSION['email'] = $email;
			$_SESSION['lastname']=$row['lastname'];
			
			return true;
			}

		 else{
			return false;
			}
		}

				
	}

}	



?>