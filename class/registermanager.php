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



	function insert($data){

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

		
		$sql = "call registeruser(?,?,?,?,?,?,?,?,?,?,?,?,?);";
		$types="sssisssssssss";
		// $params = array();
		// $params[]=& $data->title;
		// $params[]=& $data->firstname;
		// $params[]=& $data->lastname;
		// $params[]=& $data->age;
		// $params[]=& $data->phone;
		// $params[]=& $data->emerphone;
		// $params[]=& $data->address;
		// $params[]=& $data->email;
		// $params[]=& $data->location;
		// $params[]=& $data->disease;
		// $params[]=& $data->blood;
		// $params[]=& $data->size;
		// $params[] =& round(microtime(true) * 1000);//token

		$data->token = round(microtime(true) * 1000);
		//$test = (array)get_object_vars($data);//cast object to array
		/*simulate data*/
		$param = array();
		$param[] =& $types;
		
		foreach($data as $key => $val)
		{
			$param[] =& $key;
		}
		
		$this->mysql->procedure($sql,$types,$param);
		
		$this->mysql->disconnect();

		return $param;

		}catch(Exception $e){
			echo "Cannot insert register".$e->getMessage();
		}

	}

	function update(){

	}

	function delete(){

	}
}


?>