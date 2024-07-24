<?php

ini_set('error_log', 'send_msg_error.log');


include('connection.php');
require 'libs/bdapps_cass_sdk.php';


 date_default_timezone_set('Asia/Dhaka');
  $date = date('d-m-Y');

 $category = "Textile";
  


$logger = new Logger();
$server = 'https://developer.bdapps.com/sms/send';
$appid = "APP_013013";
$password = "1f23798889d01733008728e264d82a5d";
try{
    
    $myfile = fopen("report_fff.txt", "a+") or die("Unable to open file!");
	$sender = new SMSSender($server,$appid,$password);	
	$sql = "SELECT * FROM ussd_user WHERE category = '$category'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);	
	$mask = $row['mask'];
	
	$sender->sms("hello",$mask);
	
	
	
	

}catch(SMSServiceException $e){
		$logger->WriteLog($date." "."Error-Code ".$e->getErrorCode()." Error Meassage ".$e->getErrorMessage()."\r\n");
		fwrite($myfile,$date." Error Code ". $e->getErrorCode() ." , Error Message ".$e->getErrorMessage()."\r\n");
}
echo mysqli_error($conn);

	

?>