<?php
@ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
ini_set('error_log', 'error.log');
include("../connection.php");
include("../nexmo/NexmoMessage.php");
include("../sms/libs/bdapps_cass_sdk.php");
$logger = new Logger();
$server = 'https://developer.bdapps.com/sms/send';
$appid = "APP_013013";
$password = "1f23798889d01733008728e264d82a5d";


extract($_POST);
$sms = new NexmoMessage('3cb5ae8a', 'FiIIqiDlnj2KuSQ7');


if(isset($_POST['resend_otp']))
{
     $mobile_number1 = $_SESSION['mobile_number'];
      $mobile_number = "88".$mobile_number1;
      file_put_contents("mobile_number",$mobile_number);

      $otp = mt_rand(1000,9999);
    $msg = "Your varification code is ".$otp;
 $sms->sendText( $mobile_number, 'FFF', $msg );
 $sql = "Update user set otp = $otp where mobile_number = '$mobile_number1'";
 mysqli_query($conn,$sql);

}

if(isset($_POST['verify']))
{
    $otp = $_POST['otp'];
    $mobile_number = $_SESSION['mobile_number'];

    file_put_contents("test5.txt",$otp." ".$mobile_number);

    $sql = "SELECT * from user where mobile_number = '$mobile_number' and otp = $otp ";
    $res = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($res);
    if($num_rows == 0)
    {
        echo "not_ok";
    }
    else
    {
        $sql = "UPDATE user set account_verified = 1 where mobile_number = '$mobile_number'";
        mysqli_query($conn,$sql);
        echo  "ok";
    }

}

if(isset($_POST['registration']))
{
    $name = $_POST['name'];
    $mobile_number = $_POST['mobile_number'];
    $mobile_number = "88".$mobile_number;
    $password = $_POST['password'];
    $r_password = $_POST['r_password'];
    $city = $_POST['city'];

    $otp = mt_rand(1000,9999);

 $sms->sendText( $mobile_number, 'FFF', $otp );




    file_put_contents("test4.txt",$name." ".$mobile_number." ".$password." ".$r_password." ".$city);

    $sql = "Insert into user(name,mobile_number,password,city,otp) Values('$name','$mobile_number','$password','$city',$otp)";
    mysqli_query($conn,$sql);

    $sql2 = "SELECT * from user where mobile_number = '$mobile_number' and password = '$password' ";
    $res2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($res2);
    $id = $row2['id'];
    $_SESSION['user_id'] = $id;




}

if(isset($_POST['gig_post']))
{
    date_default_timezone_set('Asia/Dhaka');
           $date = date('d-m-Y');

    $gig_title = $_POST['gig_title'];
    $gig_category = $_POST['gig_category'];
    $base_price_min = $_POST['base_price_min'];
    $base_price_max = $_POST['base_price_max'];
    $duration = $_POST['duration'];
    $gig_description = $_POST['gig_description'];
    $city  = $_POST["city"];
     $name    = $_FILES['file']['name'];

        $user_id = $_POST['user_id'];
      file_put_contents("test.txt",$duration." ".$user_id);

    $dst="image/".$name;
    $dst2="../image/".$name;

     copy($_FILES["file"]["tmp_name"],$dst2);




     $sql = "INSERT into gig(user_id,gig_title,gig_category,base_price_min,base_price_max,gig_description,city,gig_file,gig_date,gig_duration) Values ($user_id,'$gig_title','$gig_category',$base_price_min,$base_price_max,'$gig_description','$city','$dst','$date',$duration)";
     mysqli_query($conn,$sql);




}


if(isset($_POST['job_post']))
{
    date_default_timezone_set('Asia/Dhaka');
           $date = date('d-m-Y');

    $job_title = $_POST['job_title'];
    $job_category = $_POST['job_category'];
    $base_price_min = $_POST['base_price_min'];
    $base_price_max = $_POST['base_price_max'];

    $user_id = $_POST['user_id'];

    $sql_user = "SELECT * from user where id = $user_id";
    $res_user = mysqli_query($conn,$sql_user);
    $row_user = mysqli_fetch_array($res_user);

    $client_name = $row_user['name'];
    $contact_no = $row_user['mobile_number'];

    $job_description = $_POST['job_description'];
    $job_duration = $_POST['job_duration'];
    $city  = $_POST["city"];
     $name    = $_FILES['file']['name'];





    $dst="image/".$name;
    $dst2="../image/".$name;

     copy($_FILES["file"]["tmp_name"],$dst2);


    // file_put_contents("test.txt","user_id= ".$user_id."job_title= ".$job_title."  job_category= ".$job_category." base_price_min= ".$base_price_min." base_price_max= ".$base_price_max." image= ".$dst." job_description= ".$job_description." city= ".$city. 'date= '.$date." job_duration= ".$job_duration);

     $sql = "INSERT into job(user_id,job_title,job_category,base_price_min,base_price_max,job_description,city,job_file,job_date,job_duration) Values ($user_id,'$job_title','$job_category',$base_price_min,$base_price_max,'$job_description','$city','$dst','$date',$job_duration)";
     mysqli_query($conn,$sql);



    $myfile = fopen("report_fff.txt", "a+") or die("Unable to open file!");
	$sender = new SMSSender($server,$appid,$password);
	$sql = "SELECT * FROM ussd_user WHERE category = '$job_category'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);
	$mask = $row['mask'];
	$msg ='Client name:'.$client_name.
	'Job description: '.$job_description.
	'Maximum price: '.$base_price_max.'CAD'.
	'Duration: '.$job_duration.'days'.
	'Contact No: '.$contact_no;
	$sender->sms($msg,$mask);







}









?>













