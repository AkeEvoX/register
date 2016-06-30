<?php
header('Content-Type: application/json');
session_start();
include ("../class/connecter.php");

//get current profile
$inputJSON = file_get_contents('php://input');
$item= json_decode( stripslashes($inputJSON),true); //convert JSON into array

/*

inputTitile=1&InputFirstName=tes&InputLastName=test&InputAge=12&InputPhone=31231
&InputPhoneEmer=1231&InputAddress=sdf&InputEmail=s%40f
&InputLocation=Location+A
&InputDisease=wefwe
&inputBlood=A
&selectSize=M

*/
$milliseconds = round(microtime(true) * 1000);

	$title = $item["inputTitile"];
	$fname = $item["InputFirstName"];
	$lname = $item["lname"];
	$age = $item["age"];
	$phone = $item["InputPhone"];
	$emerphone = $item["InputPhoneEmer"];
	$address  = $item["InputAddress"];
	$email =  $item["InputEmail"];
	$location = $item["InputLocation"];
	$disease = $item["InputDisease"];
	$blood = $item["inputBlood"];
	$size = $item["selectSize"];
	$token = "token=".$milliseconds ;
	
	$result  =  $item;
	

/* check duplicate */

//print_r($item);

/* check concurent forregister */

	try{	
	/*
		$call = $consqli->prepare("call registeruser(?,?,?,?,?,?,?,?,?,?,?,?,?) ;");
		$call->bind_param('sssisssssssss',$title,$fname,$lname,$age,$phone,$emerphone,$address,$email,$location,$disease,$blood,$size,$token);
		$call->execute();
		$result  = "Success";
		
		$call->close();
		$consqli->close();
		*/
	}
	catch(Exception $e)
	{
		$result  = "Service crash!! ";
		//die("Insert Fails.");
	}

echo json_encode(array("result"=> $result ,"code"=>"0","param"=>$fname));
//print_r(json_encode($item)); 

?>