<?php
@ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
include("connection.php");
	mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	
    
     $user_mobile = $_POST['user_mobile'];
     $password = $_POST['password'];

  
  $sql= "select * from user where mobile_number='$user_mobile' and password= '$password'";
  $result= mysqli_query($con,$sql);
  $row= mysqli_fetch_array($result);
  $id = $row['id'];
  
  if(!mysqli_num_rows($result)>0){
      $status= "failed";
       echo json_encode(array('response'=>$status));
  }
  
  else {
      
         $status= "ok";
             $_SESSION['user_id'] = $id;
    echo json_encode(array('response'=>$status));
      
  }

  
    mysqli_close($con); 
   

    

?>