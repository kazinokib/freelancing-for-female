<?php
ini_set('error_log', 'error.log');
include("../connection.php");
extract($_POST);


if(isset($_POST['accept_bid']))
{
    
    $bid_id = $_POST['bid_id'];
    $job_id = $_POST['job_id'];
// file_put_contents("test.txt","hello");
    $sql = "UPDATE job set accepted_bid_id = $bid_id where id = $job_id";
    mysqli_query($conn,$sql);
      
    $sql2 ="UPDATE bid_details set status = 1,bid_accepted = 1 where bid_id = $bid_id";
    mysqli_query($conn,$sql2);
    
    
    
}

if(isset($_POST['accept_gig']))
{
    
    $gig_apply_id = $_POST['gig_apply_id'];
    $gig_id = $_POST['gig_id'];

    $sql = "UPDATE gig set accepted_gig_apply_id = $gig_apply_id  where id = $gig_id";
    mysqli_query($conn,$sql);

    $sql2 ="UPDATE gig_apply set status = 1,gig_accepted=1 where gig_id = $gig_id";
    mysqli_query($conn,$sql2);
    
    
    
}

if(isset($_POST["remove_notification"]))
{
    
   $bid_id = $_POST['bid_id'];

  $sql = "UPDATE bid_details set show_notification=1 where bid_id = $bid_id";
  mysqli_query($conn,$sql);
    
    
    
}

if(isset($_POST['remove_bid']))
{
    
    $bid_id = $_POST['bid_id'];
   
    
    $sql2 ="UPDATE bid_details set status = 1 where bid_id = $bid_id";
    mysqli_query($conn,$sql2);
    
    
    
}

if(isset($_POST['remove_gig']))
{
    
    $bid_id = $_POST['gig_apply_id'];
   
    
    $sql2 ="UPDATE gig_apply set status = 1 where id = $gig_apply_id";
    mysqli_query($conn,$sql2);
    
    
    
}

if(isset($_POST['review_freelancer']))
{
    
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $client_id = $_POST['client_id'];
    $freelancer_id = $_POST['freelancer_id'];
    $gig_id = $_POST['gig_id'];
     date_default_timezone_set('Asia/Dhaka');
           $date = date('d-m-Y');

   //file_put_contents("test.txt", $rating." ".$comment." ".$client_id." ".$freelancer_id." ".$job_id);

    // $sql = "INSERT INTO rating()";

    $sql = "INSERT INTO rating(rating_from,rating_to,gig_id,given_rating,given_review,date) VALUES($client_id,$freelancer_id,$gig_id,$rating,'$comment','$date')";
    mysqli_query($conn,$sql);
    
    
   
    
    
    
    
    

    // $sql2 = "UPDATE bid_details set job_done_client=1 where job_id=$job_id";
    // mysqli_query($conn,$sql2);
    
    // $sql3 = "UPDATE job set job_status=1 where id = $job_id";
    // mysqlI_query($conn,$sql3);
    
}

if(isset($_POST['review_client']))
{
    
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $client_id = $_POST['client_id'];
    $freelancer_id = $_POST['freelancer_id'];
    $gig_id = $_POST['gig_id'];
     date_default_timezone_set('Asia/Dhaka');
           $date = date('d-m-Y');

   //file_put_contents("test.txt", $rating." ".$comment." ".$client_id." ".$freelancer_id." ".$job_id);

    // $sql = "INSERT INTO rating()";

    $sql = "INSERT INTO rating(rating_from,rating_to,gig_id,given_rating,given_review,date) VALUES($freelancer_id,$client_id,$gig_id,$rating,'$comment','$date')";
    mysqli_query($conn,$sql);

    // $sql2 = "UPDATE bid_details set job_done_freelancer=1 where job_id=$job_id";
    // mysqli_query($conn,$sql2);
    
    
    
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



    $job_description = $_POST['job_description'];
    $job_duration = $_POST['job_duration'];
    $city  = $_POST["city"];
     $name    = $_FILES['file']['name'];

    
     
     
    $dst="image/".$name;
    $dst2="../image/".$name;

     copy($_FILES["file"]["tmp_name"],$dst2);
    
    
    //file_put_contents("test.txt",$gig_title." ".$gig_category." ".$base_price." ".$gig_description." ".$dst);
    
     $sql = "Insert into job(user_id,job_title,job_category,base_price_min,base_price_max,job_description,city,job_file,job_date,job_duration) Values ($user_id,'$job_title','$job_category',$base_price_min,$base_price_max,'$job_description','$city','$dst','$date',$job_duration)";
     mysqli_query($conn,$sql);
    
    
    
}












?>














