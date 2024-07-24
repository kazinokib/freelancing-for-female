 <?php
//include("db.php");



class Operations
{
  
  public $session_id='';
  public $session_menu='';
  public $session_pg=0;
  public $session_tel='';
  public $session_others='';


  function connect()
  {
    $this->conn = mysqli_connect("173.249.5.89","pinkishb_fff","nokib01556499623evon","pinkishb_fff");
    mysqli_query($this->conn,'SET CHARACTER SET utf8');
mysqli_query($this->conn,"SET SESSION collation_connection ='utf8_general_ci'");
  }

  

 
  public function set_category($mask,$category)
  {
       $this->connect();
       
    $sql = "Update ussd_user set category = '$category' where mask = '$mask'";
    mysqli_query($this->conn,$sql);
     
  }
 
   
  
  public function set_step($mask,$step)
  {
      $this->connect();
      
      //file_put_contents("test.txt",$mask." ".$step);
      $sql2= "select * from ussd_user where mask = '$mask'";
      $res2 = mysqli_query($this->conn,$sql2);
      $num_rows = mysqli_num_rows($res2);
      if($num_rows == 0){
      $sql = "INSERT INTO ussd_user(mask,step) values('$mask','$step') ";
      }
      else{
          $sql = "UPDATE ussd_user set step = '$step' where mask = '$mask'";
      }
      
      mysqli_query($this->conn,$sql);
      
  }
  
   public function get_step($mask)
  {
      $this->connect();
      
      //file_put_contents("test.txt",$mask." ".$step);
      $sql = "SELECT * from ussd_user where mask = '$mask'";
      
     $res = mysqli_query($this->conn,$sql);
     $row = mysqli_fetch_array($res);
     
     $step = $row['step'];
     
     return $step;
      
  }
  
  public function check_register($mask)
  {
      $this->connect();
      $sql = "SELECT * from ussd_user where mask = '$mask'";
      $res = mysqli_query($this->conn,$sql);
      $num_rows = mysqli_num_rows($res);
      if($num_rows == 0)
      {
          return false;
      }
      else 
      {
          return true;
      }
  }
  
  public function register_user($mask,$mobile_number)
  {
      $this->connect();
      $sql = "Insert into ussd_user(mask,mobile_number) VALUES ('$mask','$mobile_number')";
      $res = mysqli_query($this->conn,$sql);
      
  }
  
  public function get_job_news($category,$mask)
  
  {
    $this->connect();
    $sql = "SELECT * from job where job_category='$category' ";
    $res = mysqli_query($this->conn,$sql);
    $job_news = array();
    $number = 0;
    while($row = mysqli_fetch_array($res))
    {  $number++;
        array_push($job_news,array("job_id"=>$row["id"],"number"=>$number,"job_title"=>$row['job_title'],"price"=>$row['base_price_max'],"duration"=>$row['job_duration']));
    }
   
    return $job_news;
     
  }
  
  public function get_job_msg($serial_number,$category)
  {
       $this->connect();
    $sql = "SELECT * from job where job_category='$category' ";
    $res = mysqli_query($this->conn,$sql);
    $job_news = array();
    $number = 0;
    while($row = mysqli_fetch_array($res))
    {  $number++;
        array_push($job_news,array("job_id"=>$row["id"],"number"=>$number,"job_title"=>$row['job_title'],"price"=>$row['base_price_max'],"duration"=>$row['job_duration']));
    }
    $job_id=0;
   
    for($i=0;$i<sizeof($job_news);$i++)
    {
        if($serial_number == $job_news[$i]["number"])
        {
            $job_id =$job_news[$i]["job_id"];
        }
    }
    
    
   $sql2 = "SELECT * from job where id = $job_id";
   $res2 =mysqli_query($this->conn,$sql2);
   $row2 = mysqli_fetch_array($res2);
   $job_description = $row2["job_description"];
   $user_id = $row2["user_id"];
   
   $sql3 = "SELECT * from user where id = $user_id";
   $res3 = mysqli_query($this->conn,$sql3);
   $row3 = mysqli_fetch_array($res3);
   
   $contact_number = $row3['mobile_number'];
   
   $msg = "Job details: ".$job_description."\r\n".
   "Mobile Number: ".$contact_number; 
   return $msg;
   
    
   
   
  }
  
  

  

  

  

   


}

?>