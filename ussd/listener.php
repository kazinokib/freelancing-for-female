<?php

ini_set('error_log', 'ussd-app-error.log');
require 'libs/bdapps_cass_sdk.php';
require 'class/operationsClass.php';

$appid = "APP_013013";
$apppassword = "1f23798889d01733008728e264d82a5d";

//file_put_contents('ussd.txt',$_SERVER['REMOTE_ADDR']);

$production=true;

	if($production==false){
		$ussdserverurl ='http://localhost:7000/ussd/send';
	}
	else{
		$ussdserverurl= 'https://developer.bdapps.com/ussd/send';
	}

try{
$receiver 	= new UssdReceiver();
$operation = new Operations();
$sender = new UssdSender($ussdserverurl,$appid,$apppassword);
$sender2 = new SMSSender("https://developer.bdapps.com/sms/send",$appid,$apppassword);	
// $sub = new Subscription('https://developer.bdapps.com/subscription/send',$apppassword,$appid);
// file_put_contents('text.txt',$receiver->getRequestID());
// $operations = new Operations();

//$receiverSessionId  =   $receiver->getSessionId();
$content 			= 	$receiver->getMessage(); // get the message content
$address 			= 	$receiver->getAddress(); // get the ussdSender's address
$requestId 			= 	$receiver->getRequestID(); // get the request ID
$applicationId 		= 	$receiver->getApplicationId(); // get application ID
$encoding 			=	$receiver->getEncoding(); // get the encoding value
$version 			= 	$receiver->getVersion(); // get the version
$sessionId 			= 	$receiver->getSessionId(); // get the session ID;
$ussdOperation 		= 	$receiver->getUssdOperation(); // get the ussd operation


$registermsg = array(
    "main"=>"
     Welcome to Freelancing For Female
     1. Register.
    
    "
    );

$responseMsgReg = array(
    "main" => " Set your category
1.Textile
2.Food
3.Embroiderer
4.Stich Artist


"
  
);




$responseMsg = array(
    "main" => "     Welcome to Freelancing For Female
1.Set Category
2.Search Job



"
  
);



if ($ussdOperation == "mo-init") {
    
  
      
   
   
        
    $check_register = $operation->check_register($address);
    
    if($check_register == false)
    {
           $sender->ussd($sessionId,$registermsg['main'],$address);
        
    }
        
        else{
        
        $operation->set_step($address,1);
        try{
         
        $sender->ussd($sessionId,$responseMsg['main'],$address);
        }
        
        
        
        
       
    
    catch (Exception $e) {
        $sender->ussd($sessionId, 'Sorry error occured try again', $address);
    }
        }

}
   

else {
    
    
     $check_register = $operation->check_register($address);
     
     
     if($check_register == false)
     {
        if($receiver->getMessage() == '1')
        {
            $msg = "Please Enter Your Mobile Number";
            $sender->ussd($sessionId,$msg,$address);
            
        }
        else{
            $mobile_number = $receiver->getMessage();
             $operation->register_user($address,$mobile_number);
            $msg = "You are successfully register";             
             $sender->ussd($sessionId, $msg, $address,'mt-fin');
        }
         
     }
     
     else{
     
    
     $check_step = $operation->get_step($address);
     
     if($check_step == '1')
     
     {
         switch($receiver->getMessage())
         {
             case "1":
                  $operation->set_step($address,2);
         
                 $sender->ussd($sessionId,$responseMsgReg['main'],$address);
                 break;
                 
              case "2":
                   $operation->set_step($address,2.1);
                   $sender->ussd($sessionId,$responseMsgReg['main'],$address);
                   break;
         }
         
         
     }
     
     else if($check_step =="2")
     {
            switch($receiver->getMessage())
        {
            case "1":
                
                $category = "Textile";
                $operation->set_category($address,$category);
                
               
            $msg = "You are successfully registered";
              $sender->ussd($sessionId, $msg, $address,'mt-fin');
            break;
            case "2":
                 $category = "Food";
                $operation->set_category($address,$category);
                
                
               
            $msg = "You are successfully registered";
              $sender->ussd($sessionId, $msg, $address,'mt-fin');
                break;
                case "3":
                 $category = "Embroiderer";
                $operation->set_category($address,$category);
                
               
            $msg = "You are successfully registered";
              $sender->ussd($sessionId, $msg, $address,'mt-fin');
                break;
                case "4":
                 $category = "Stich Artist";
                $operation->set_category($address,$category);
                
               
            $msg = "You are successfully registered";
              $sender->ussd($sessionId, $msg, $address,'mt-fin');
                break;
          default:
                  
                    break;
        }
        
     }
     
     
      else if($check_step =="2.1")
     {
            switch($receiver->getMessage())
        {
            case "1":
                
                $category = "Textile";
                $operation->set_step($address,3.1);
                $job_news = $operation->get_job_news($category,$address);
                $msg = "Enter the number for job details"."\r\n";
                for ($i=0;$i<sizeof($job_news);$i++)
                {
                    $msg.= $job_news[$i]["number"].": ".$job_news[$i]["job_title"]."\r\n".
                        "price: ".$job_news[$i]["price"]."\r\n"
                        ."duration: ".$job_news[$i]["duration"]."\r\n";
                }
                //file_put_contents("test.txt",$job_news[0]["title"]);
                
               
           
              $sender->ussd($sessionId, $msg, $address);
            break;
            case "2":
                 $category = "Food";
                
                 $operation->set_step($address,3.2);
                $job_news = $operation->get_job_news($category,$address);
                $msg = "Enter the number for job details"."\r\n";
                for ($i=0;$i<sizeof($job_news);$i++)
                {
                    $msg.= $job_news[$i]["number"].": ".$job_news[$i]["job_title"]."\r\n".
                        "price: ".$job_news[$i]["price"]."\r\n"
                        ."duration: ".$job_news[$i]["duration"]."\r\n";
                }
                //file_put_contents("test.txt",$job_news[0]["title"]);
                
               
           
              $sender->ussd($sessionId, $msg, $address);
            break;
           
              
                case "3":
                 $category = "Embroiderer";
                 $operation->set_step($address,3.3);
                $job_news = $operation->get_job_news($category,$address);
                $msg = "Enter the number for job details"."\r\n";
                for ($i=0;$i<sizeof($job_news);$i++)
                {
                    $msg.= $job_news[$i]["number"].": ".$job_news[$i]["job_title"]."\r\n".
                        "price: ".$job_news[$i]["price"]."\r\n"
                        ."duration: ".$job_news[$i]["duration"]."\r\n";
                }
                //file_put_contents("test.txt",$job_news[0]["title"]);
                
               
           
              $sender->ussd($sessionId, $msg, $address);
            break;
              
                case "4":
                $operation->set_step($address,3.4);
                $job_news = $operation->get_job_news($category,$address);
                $msg = "Enter the number for job details"."\r\n";
                for ($i=0;$i<sizeof($job_news);$i++)
                {
                    $msg.= $job_news[$i]["number"].": ".$job_news[$i]["job_title"]."\r\n".
                        "price: ".$job_news[$i]["price"]."\r\n"
                        ."duration: ".$job_news[$i]["duration"]."\r\n";
                }
                //file_put_contents("test.txt",$job_news[0]["title"]);
                
               
           
              $sender->ussd($sessionId, $msg, $address);
            break;
          default:
                  
                    break;
        }
        
     }
     else if($check_step == "3.1")
     {
          $a= $receiver->getMessage();
          $category = "Textile";
          
        $msg = $operation->get_job_msg($a,$category);
        
        
        
          $sender->ussd($sessionId,"You will get sms shortly about job details", $address,'mt-fin');
          
          $sender2->sms($msg,$address);
          
     }
     
     
     
 
     
   
    //  switch($receiver->getMessage())
    //     {
    //         case "1":
                
    //             $category = "Textile";
    //             $operation->set_category($address,$category);
                
               
    //         $msg = "You are successfully registered";
    //           $sender->ussd($sessionId, $msg, $address,'mt-fin');
    //         break;
    //         case "2":
    //              $category = "Food";
    //             $operation->set_category($address,$category);
                
               
    //         $msg = "You are successfully registered";
    //           $sender->ussd($sessionId, $msg, $address,'mt-fin');
              
    //             case "3":
    //              $category = "Embroiderer";
    //             $operation->set_category($address,$category);
                
               
    //         $msg = "You are successfully registered";
    //           $sender->ussd($sessionId, $msg, $address,'mt-fin');
              
    //             case "4":
    //              $category = "Stich Artist";
    //             $operation->set_category($address,$category);
                
               
    //         $msg = "You are successfully registered";
    //           $sender->ussd($sessionId, $msg, $address,'mt-fin');
    //       default:
                  
    //                 break;
    //     }
        
    
    
   
}
    
    
}




}
catch (Exception $e){
 file_put_contents('USSDERROR.txt','Some error occured');   
}



?>



