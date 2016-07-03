<?php

require_once("../class/database.php");

$mysql = new database();

//$mysql->connect();


/*

echo "<br/> show example data</br>";
$query = "select * from registerdata";
$result = $mysql->execute($query);

//get 1 row
$result->fetch_object()->product_name;

//get data to object
while($row = $result->fetch_object())

//get data to array sorting top to botton
while($data = $result->fetch_assoc())
{
	echo "Firstname = " . $data["firstname"]."</br>";
}

*/


$sql = "call execute";


//$mysql->disconnect();

?>
