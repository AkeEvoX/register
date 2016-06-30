<?php 
require_once("../class/connecter.php");
header('Content-Type: application/json');
session_start();


//get current profile
$data = json_decode(json_encode($_POST));
//$data = $data->selectSize;

/*
inputTitle=1
&InputFirstName=test
&InputLastName=test
&InputAge=12
&InputPhone=31231
&InputPhoneEmer=1231
&InputAddress=sdf
&InputEmail=s%40f
&InputLocation=A
&InputDisease=wefwe
&inputBlood=A
&selectSize=M

*/

	$milliseconds = round(microtime(true) * 1000);

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
	$token = $milliseconds ;
	
	$result  =  "Failed";
	

/* check duplicate */

/* check concurent forregister */

	try{	
	
		$call = $consqli->prepare("call registeruser(?,?,?,?,?,?,?,?,?,?,?,?,?) ;");
		$call->bind_param('sssisssssssss',$title,$fname,$lname,$age,$phone,$emerphone,$address,$email,$location,$disease,$blood,$size,$token);
		$call->execute();
		$result  = "Success";
		
		$call->close();
		$consqli->close();
		
	}
	catch(Exception $e)
	{
		$result  = "Service crash!! ";
		die("Service Unvailable");
	}

echo json_encode(array("result"=> $result ,"code"=>"0","param"=>$data));
//print_r(json_encode($item)); 

?>