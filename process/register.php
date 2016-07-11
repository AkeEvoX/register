<?php 
require_once("../class/utility.php");
require_once("../class/registermanager.php");
header('Content-Type: application/json');
session_start();


//get current profile
$data = json_decode(json_encode($_POST));
//$data = $data->selectSize;


$milliseconds = round(microtime(true) * 1000);
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
$token = $milliseconds;
*/
$result  =  "Failed";
	

/* check duplicate */

/* check concurent forregister */

try{	
	
	$register = new registermanager();
	
	/*
	$register->title = $data->inputTitle;
	$register->firstname = $data->InputFirstName;
	$register->lastname = $data->InputLastName;
	$register->age = $data->InputAge;
	*/

	$info = $register->insert($data);
	$result  = "Success";
	

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
	die("Service Unvailable");
}

echo json_encode(array("result"=> $result ,"code"=>"0","param"=>$info));
//print_r(json_encode($item)); 

?>