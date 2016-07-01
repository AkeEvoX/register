<?php
require_once("../class/database.php");

$mysql = new database();

$mysql->connect();

echo "<br/> show example data</br>";
$query = "select * from registerdata";
$result = $mysql->execute($query);

while($data = $result->fetch_assoc())
{
	echo "Firstname = " . $data["firstname"]."</br>";
}


$mysql->disconnect();

?>
