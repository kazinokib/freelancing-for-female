<?php
@ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
ini_set('error_log', 'error.log');
include("../connection.php");
extract($_POST);


if(isset($_POST['login']))
{
    
    $mobile= $_POST['mobile'];
    $password = $_POST['password'];


    $sql = "SELECT * from user where mobile_number = '$mobile' and password = '$password' ";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    $id = $row['id'];
    $verification = $row['account_verified'];
    

    $num_rows = mysqli_num_rows($res);

    if($num_rows == 0)
    {

      echo "not_ok";
    }
    else{
        if($verification == 1)
        {
        echo "ok";
        $_SESSION['user_id'] = $id;
        }
        else
        {
            echo "otp";
             $_SESSION['mobile_number'] = $mobile;
        }
    }
    
    
    
    
    
}














?>














