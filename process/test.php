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


//$sql = "call execute";

$textarr = "abcdefgh";
$valarr = "1,2,3,4,5,6,7,8";
$data_text = array();
$data_val = array("0");

$data_text[] = & $textarr;
$data_text[] = & $data_val[0];
// $data_text[] = & "2";
// $data_text[] = & "3";
// $data_text[] = & "4";
// $data_text[] = & "5";
// $data_text[] = & "6";
// $data_text[] = & "7";
// $data_text[] = & "8";

var_dump($data_text);
//var_dump(array_merge(array($textarr),array($valarr));
echo "ok";
//$mysql->disconnect();
?>



 
 