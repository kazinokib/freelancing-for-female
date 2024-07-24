<?php
ini_set('error_log', 'error.log');
include("../connection.php");
extract($_POST);


if(isset($_POST['filter']))
{
    $city = $_POST['city'];
    $category = $_POST['category'];
    if(!$city)
    {
        $city ="all";
    }
    if(!$category)
    {
        $category='all';
    }

    header("location:../main_page_job.php");
    
    //file_put_contents("test.txt", $category." ".$city);
    
    
    
}

if(isset($_POST['gig_post']))
{
    date_default_timezone_set('Asia/Dhaka');
           $date = date('d-m-Y');
   
    $gig_title = $_POST['gig_title'];
    $gig_category = $_POST['gig_category'];
    $base_price_min = $_POST['base_price_min'];
    $base_price_max = $_POST['base_price_max'];

    $gig_description = $_POST['gig_description'];
    $city  = $_POST["city"];
     $name    = $_FILES['file']['name'];

        $user_id = 1;
     
     
    $dst="image/".$name;
    $dst2="../image/".$name;

     copy($_FILES["file"]["tmp_name"],$dst2);
    
    
    //file_put_contents("test.txt",$gig_title." ".$gig_category." ".$base_price." ".$gig_description." ".$dst);
    
     $sql = "Insert into gig(user_id,gig_title,gig_category,base_price_min,base_price_max,gig_description,city,gig_file,gig_date) Values ($user_id,'$gig_title','$gig_category',$base_price_min,$base_price_max,'$gig_description','$city','$dst','$date')";
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

    $job_description = $_POST['job_description'];
    $city  = $_POST["city"];
     $name    = $_FILES['file']['name'];

        $user_id = 1;
     
     
    $dst="image/".$name;
    $dst2="../image/".$name;

     copy($_FILES["file"]["tmp_name"],$dst2);
    
    
    //file_put_contents("test.txt",$gig_title." ".$gig_category." ".$base_price." ".$gig_description." ".$dst);
    
     $sql = "Insert into job(user_id,job_title,job_category,base_price_min,base_price_max,job_description,city,job_file,job_date) Values ($user_id,'$job_title','$job_category',$base_price_min,$base_price_max,'$job_description','$city','$dst','$date')";
     mysqli_query($conn,$sql);
    
    
    
}












?>














