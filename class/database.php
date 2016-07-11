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

	function __destruct(){
/*
		try{

			$this->result->free();
		
			if($this->conn!="")
				$this->conn->close();

			echo "<br/>terminate and disconnect class database ";

		}catch(Exception $e)
		{
			echo "Disconnect Error : " . $e->getMessage();
		}*/
	}

	function connect(){

		try{

			$this->conn = new mysqli();
			$this->conn->connect($this->host,$this->user,$this->pass,$this->base,$this->port);
			$this->conn->set_charset("utf8");

			//echo "connect to mysql successfuly";

		}catch(Exception $e)
		{

			echo "Connection error : " . $e->getMessage() . "<br/>result=";
		}
		//throw new Exception("Value must be 1 or below");
	}

	function disconnect(){

		try{

			if($this->result!=null)
				$this->result->free();
		
			if($this->conn!=null)
				$this->conn->close();

			//echo "disconnect success.";

		}catch(Exception $e)
		{
			echo "disconnect error : " . $e->getMessage();
		}
		
	}

	function execute($sql){
		try{

			$this->result = $this->conn->query($sql);

			return $this->result;

		}catch(Exception $e)
		{
			echo "call execute error : " . $e->getMessage();
		}

	}

	function procedure($sql,$types,$data)
	{
		try{

			$stmt = $this->conn->prepare($sql);
			//Types: s = string, i = integer, d = double, b = blob)


			$param = array();
			$lenght = count($data);

			$param[] =& $types;

			/*
			for($i=0;$i<$lenght;$i++)
			{
				$param[] = $data[$i];
			}
			*/
			call_user_func_array(array($stmt, "bind_param") ,$data);
			$stmt->execute();

			$result = $stmt->get_result();
			return $result;

		}catch(Exception $e)
		{
			echo "call procedure error : " . $e->getMessage();
		}
	}


	function newid(){
		try{

			$result = $this->conn->insert_id;
			return $result;
		}catch(Exception $e)
		{
			echo "call newid error : " . $e->getMessage();
		}

	}

}
?>