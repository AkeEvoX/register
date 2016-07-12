<?php 
require_once("../class/utility.php");
require_once("../class/registermanager.php");
header('Content-Type: application/json');
session_start();

//get current profile
$data = json_decode(json_encode($_POST));

$milliseconds = round(microtime(true) * 1000);
$result  =  "Failed";
	
try{	
	
	$register = new registermanager();
	
	$checkmax = $register->isMax();
	$info = "null";
	if($checkmax=="0")//avaliable register
	{
		$info = $register->insert($data);
		$result  = "Success";
	
	}
	else{
		$result = "ขออภัยมีผู้สมัครครบ 10000 คน(fully register).";
	}
	
}
catch(Exception $e)
{
	$result  = "Service crash!! ";
	die("Service Unvailable");
}

echo json_encode(array("result"=> $result ,"code"=>"0","param"=>$data));
//print_r(json_encode($item)); 

?>