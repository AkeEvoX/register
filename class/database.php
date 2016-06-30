<?php
class database {

	private $host;
	private $port;
	private $user;
	private $pass;
	private $base;
	private $conn;

	function __construct(){

		$config = parse_ini_file("config.ini");
		
		$host = $config["host"];
		$user = $config["user"];
		$pass = $config["pass"];
		$base = $config["base"];
		
	}

	function __deconstruct(){
			@mysql_free_result($this->result);
			mysql_close();
	}

	function connect(){
		
		try{
			$conn = new PDO("mysqli:host=$host;dbname=$base",$user,$pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "connect to mysql successfuly";
		}
		catch(PDOException $e)
		{
			echo "Connection Failed : ". $e->getMessage();
		}
		
	}

	function disconect(){
		$conn->close();
	}

	function execute($query ){

	}

}
?>