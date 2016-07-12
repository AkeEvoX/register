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

	function insert($datas){

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
		$datas->token = round(microtime(true) * 1000);

		
		$this->mysql->procedure($sql,$types,$datas);
		
		$this->mysql->disconnect();

		return $datas;

		}catch(Exception $e){
			echo "Cannot insert register".$e->getMessage();
		}

	}
	// result 1 = true , 0 = false
	function isMax()
	{
		try{

			$result = false;

			$this->mysql->connect();

			$sql = "call maxregister(@result);";
			$types = "";
			$datas = new stdClass();//empty object
			$datas->empty = "1";

			$this->mysql->procedure($sql,$types,$datas);

			$items = $this->mysql->execute("select @result as result;");

			$result = $items->fetch_object();

			$this->mysql->disconnect();

			return $result;

		}catch(Exception $e)
		{
			echo "can't get max register : ".$e->getMessage();
		}
	}

	function update(){

	}

	function delete(){

	}


}


?>