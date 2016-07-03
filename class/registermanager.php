<?php
require_once("database.php");

class registermanager {

	public $title;
	public $firstname;
	public $lastname;
	public $age;
	public $phone;
	public $phoneemer;
	public $address;
	public $email;
	public $location;
	public $disease;
	public $blood;
	public $size;

	protected $mysql;

	function __construct(){

		try{

			$this->mysql = new database();
			//echo "initial registermanager.";

		}
		catch(Exception $e)
		{
			die("initial registermanager error : ". $e->getMessage());
		}
	}

	function __destruct(){

	}



	function insert($firstname){

		try{

		$this->mysql->connect();

		/*
		$title = $data->inputTitle;
		$fname = $data->InputFirstName;
		$lname = $data->InputLastName;
		$age = $data->InputAge;
		$phone = $data->InputPhone;
		$emerphone = $data->InputPhoneEmer;
		$address  = $data->InputAddress;
		$email =  $data->InputEmail;
		$location = $data->InputLocation;
		$disease = $data->InputDisease;
		$blood = $data->inputBlood;
		$size = $data->selectSize;
		*/

		/*
		$sql = "call registerdata(?,?,?,?,?,?,?,?,?,?,?,?,?);";
		$types="sssisssssssss";
		$params = array();
		$params[]=$this->title;
		$params[]=$this->firstname;
		$params[]=$this->lastname;
		$params[]=$this->age;
		$params[]=$this->phone;
		$params[]=$this->phoneemer;
		$params[]=$this->address;
		$params[]=$this->email;
		$params[]=$this->location;
		$params[]=$this->disesase;
		$params[]=$this->blood;
		$params[]=$this->size;

		$this->mysql->procedure($sql,$types,$params);
		*/

		$this->mysql->disconnect();

		}catch(Exception $e){
			echo "Cannot insert register".$e->getMessage();
		}
		

		//

	}

	function update(){

	}

	function delete(){

	}
}


?>