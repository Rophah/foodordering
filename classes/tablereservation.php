<?php

include_once('constants.php');

class Table{

	public $dbcon;

	public function __construct(){
		$this->dbcon = new Mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		if($this->dbcon->connect_error){
			die('Connection error'.$this->dbcon->connect_error);
		}
	}

	public function inserttable($fname,$lname,$phone,$email,$guest,$type,$date,$time,$specialrequest,$idcustomer){
		$sql = "INSERT INTO tablereservation (firstname,lastname,phone,email,guest,types,reservedate,reservetime,specialrequest,idcustomer) VALUES('$fname','$lname','$phone','$email','$guest','$type','$date','$time','$specialrequest',$idcustomer)";

		$result =$this->dbcon->query($sql);
		var_dump($result);
		exit;
		if($this->dbcon->affected_rows >0){
			return true;
		}else{
			return false;
		}
	}


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

	//list table preserved
	public function listreserve(){
		$sql = "SELECT * FROM tablereservation";

		$result = $this->dbcon->query($sql);

		$row=[];
		if($this->dbcon->affected_rows > 0){
			while ( $res = $result->fetch_assoc()) {
				$row[] = $res;
			}return $row;
		}else{
			return $row;
		}
	}

	//find table reserved at $idtablereserve

	public function findtablereserve($id){
		$sql = "SELECT * FROM tablereservation WHERE idtablereservation = $id";

		$result = $this->dbcon->query($sql);

		$row = [];
		if($this->dbcon->affected_rows > 0){
			while($res = $result->fetch_assoc()){
				$row[] = $rec;
			}return $row;
		}else{
			return $row;
		}
	}

	
}
?>