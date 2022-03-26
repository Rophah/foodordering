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

}
?>