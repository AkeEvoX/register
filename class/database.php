<?php
class database {

	private $host;
	private $port;
	private $user;
	private $pass;
	private $base;
	public $conn;
	private $result;

	function __construct(){

		$config = parse_ini_file("config.ini");
		
		$this->host = $config["host"];
		$this->port = $config["port"];
		$this->user = $config["user"];
		$this->pass = $config["pass"];
		$this->base = $config["base"];
		
	}

	function __deconstruct(){

		$result->free();
		$conn->close();

	}

	function connect(){

		try{

			$this->conn = new mysqli;
			$this->conn->connect($this->host,$this->user,$this->pass,$this->base,$this->port);
			$this->conn->set_charset("utf8");

			//echo "connect to mysql successfuly";

		}catch(Exception $e)
		{

			echo "Connection Error : " . $e->getMessage();
		}
		//throw new Exception("Value must be 1 or below");
	}

	function disconnect(){

		$this->result->free();
		
		if($conn!="")
			$conn->close();

		echo "disconnect success.";
		
	}

	function execute($query){
		try{

			$this->result = $this->conn->query($query);

			return $this->result;

		}catch(Exception $e)
		{
			echo "Execute Error : " . $e->getMessage();
		}

	}

	function newid(){
		try{

			$result = "";


			return $result;
		}catch(Exception $e)
		{
			echo "Execute Error : " . $e->getMessage();
		}

	}

}
?>