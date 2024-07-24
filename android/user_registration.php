<?php
@ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
include("connection.php");
	mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	
    
    $user_mobile = $_POST['user_mobile'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
  
  $sql= "select * from user where mobile_number ='$user_mobile'";
  $result= mysqli_query($con,$sql);
  
  if(mysqli_num_rows($result)>0){
      $status= "exist";
  }
   else {
      
       $sql = "insert into user(mobile_number,name,password) values('$user_mobile','$user_name','$password');";
       
       if(mysqli_query($con,$sql)){
           $status= "ok";
           
            $sql2 = "SELECT * from user where mobile_number = '$user_mobile' and password = '$password' ";
    $res2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_array($res2);
    $id = $row2['id'];
    $_SESSION['user_id'] = $id;
  
       }
       else{
           $status= "error";
       }
      
  }

    echo json_encode(array('response'=>$status));
    mysqli_close($con); 
 

?>