<?php

include_once('constants.php');

Class MarketPlace{

	//member variables
	public $dbcon;	//object handler

	//member methods/functions

	function __construct(){

		//
		$this->dbcon = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

		//check connection
		if ($this->dbcon->connect_error) {
			die("connection failed: ". $this->dbcon->connect_error);
		}else{
			//echo "connection successfully";
		}
	}

	//begin get food
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

	#end get food

	//begin insert transaction details

	//begin insert transaction details
		public function insertTransDetails($amount, $productid, $userid,$orderid, $transref){

				$sql = "INSERT INTO payment SET transactionamount = '$amount', idfood='$productid',
				idcustomer = '$userid' , idorderproduct = '$orderid', trans_status='pending', trans_reference = '$transref'";

				//run the query
				//var_dump($sql);
 
				$result = $this->dbcon->query($sql);

				if($this->dbcon->affected_rows == 1){
					return true;
				}else{
					return false;
				}
			
		}

	//end  transaction details
}
?>