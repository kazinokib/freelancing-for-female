<?php
ini_set('error_log', 'error.log');
include("../connection.php");
extract($_POST);


if(isset($_POST['job_details']))
{
    
   $bid_rate = $_POST['bid_rate'];
   $bid_duration = $_POST['bid_duration'];
   $bid_message = $_POST['bid_message'];
   $user_id = $_POST['user_id'];
   $job_id = $_POST['job_id'];
   $job_given_id = $_POST['job_given_id'];
     date_default_timezone_set('Asia/Dhaka');
           $date = date('d-m-Y');

           $sql ="INSERT INTO bid_details(user_id,job_id,job_given_id,bidding_price,work_duration,bidding_message,date) Values($user_id,$job_id,$job_given_id,$bid_rate,$bid_duration,'$bid_message','$date')";
           mysqli_query($conn,$sql);
    
    
}

if(isset($_POST['apply_gig']))
{
    
   $proposed_rate = $_POST['proposed_rate'];
   $proposed_duration = $_POST['proposed_duration'];
   $message = $_POST['bid_message'];
   $user_id = $_POST['user_id'];
   $gig_id = $_POST['gig_id'];
   $gig_given_id = $_POST['gig_given_id'];
     date_default_timezone_set('Asia/Dhaka');
           $date = date('d-m-Y');

           $sql = "INSERT INTO gig_apply(gig_id,user_id,employee_id,message,proposed_duration,proposed_rate,date) VALUES ($gig_id,$gig_given_id,$user_id,'$message',$proposed_duration,$proposed_rate,'$date')  ";
           mysqli_query($conn,$sql);
    
    
}















?>














