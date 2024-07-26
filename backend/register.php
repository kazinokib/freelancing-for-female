<?php
@ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
ini_set('error_log', 'error.log');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/PHPMailer/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/PHPMailer/src/SMTP.php';

include("../connection.php");
include("../nexmo/NexmoMessage.php");
include("../sms/libs/bdapps_cass_sdk.php");
$logger = new Logger();
$server = 'https://developer.bdapps.com/sms/send';
$appid = "APP_013013";
$password = "1f23798889d01733008728e264d82a5d";


extract($_POST);
$sms = new NexmoMessage('3cb5ae8a', 'FiIIqiDlnj2KuSQ7');
if (isset($_POST['registration'])) {
    file_put_contents('hello.txt','test');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $password = $_POST['password'];
    $r_password = $_POST['r_password'];
    $city = $_POST['city'];

    $otp = mt_rand(1000, 9999);
    $msg = "Your verification code is " . $otp;

    // Send OTP via Email
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nokibevon7@gmail.com';
        $mail->Password = 'labjsfgdlparthca'; // Use an app-specific password if 2FA is enabled
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Enable this line to bypass SSL verification (not recommended for production)
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom('nokibevon7@gmail.com', 'FFF');
        $mail->addAddress($email, $name); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body = $msg;

        $mail->send();
    } catch (Exception $e) {
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }


    $sql = "INSERT INTO user (name, email, mobile_number, password, city, otp) VALUES ('$name', '$email', '$mobile_number', '$password', '$city', '$otp')";
    if (mysqli_query($conn, $sql)) {
        $sql2 = "SELECT * FROM user WHERE mobile_number = '$mobile_number' AND password = '$password'";
        $res2 = mysqli_query($conn, $sql2);
        if ($row2 = mysqli_fetch_array($res2)) {
            $id = $row2['id'];
            $_SESSION['user_id'] = $id;
            $_SESSION['mobile_number'] = $mobile_number;
            echo "Registration successful. OTP sent to your email.";
        } else {
            error_log("Error retrieving user data after registration: " . mysqli_error($conn));
        }
    } else {
        error_log("Error inserting user data: " . mysqli_error($conn));
    }
}

if(isset($_POST['update_gig']))
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

     $gig_id = $_POST['gig_id'];

        $user_id = $_POST['user_id'];
     // file_put_contents("test.txt",$duration." ".$user_id);

    $dst="image/".$name;
    $dst2="../image/".$name;

     copy($_FILES["file"]["tmp_name"],$dst2);




    $sql = "Update gig set gig_tilte ='$gig_title',gig_category='$gig_category',base_price_min = $base_price_min, base_price_max=$base_price_max,gig_description = '$gig_description' city = '$city' gig_file = '$dst',gig_date='$date',gig_duration = $duration where id = $gig_id ";

    mysqli_query($conn,$sql);





    //  $sql = "INSERT into gig(user_id,gig_title,gig_category,base_price_min,base_price_max,gig_description,city,gig_file,gig_date,gig_duration) VALUES ($user_id,'$gig_title','$gig_category',$base_price_min,$base_price_max,'$gig_description','$city','$dst','$date',$duration)";
    //  mysqli_query($conn,$sql);

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
    file_put_contents("test.txt", $duration." ".$user_id);

    $dst = "image/".$name;
    $dst2 = "../image/".$name;

    // Check for file upload errors
    if ($_FILES["file"]["error"] != UPLOAD_ERR_OK) {
        error_log("File upload error: " . $_FILES["file"]["error"]);
        die("File upload error.");
    }

    if (!copy($_FILES["file"]["tmp_name"], $dst2)) {
        error_log("Failed to copy uploaded file to destination: $dst2");
        die("Failed to upload file.");
    }

    // Assuming $conn is your database connection
    if (!$conn) {
        error_log("Database connection error: " . mysqli_connect_error());
        die("Database connection error.");
    }

    // Use prepared statements to prevent SQL syntax errors and SQL injection
    $stmt = $conn->prepare("INSERT INTO gig (user_id, gig_title, gig_category, base_price_min, base_price_max, gig_description, city, gig_file, gig_date, gig_duration)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        error_log("Prepare statement error: " . $conn->error);
        die("Prepare statement error.");
    }

    $stmt->bind_param("issddsssds", $user_id, $gig_title, $gig_category, $base_price_min, $base_price_max, $gig_description, $city, $dst, $date, $duration);
    if (!$stmt->execute()) {
        error_log("Execute statement error: " . $stmt->error);
        die("Execute statement error.");
    }

    // Log success message
    error_log("Gig post successfully inserted for user ID: $user_id");

    $stmt->close();
}




if(isset($_POST['job_update']))
{
    date_default_timezone_set('Asia/Dhaka');
           $date = date('d-m-Y');

    $job_title = $_POST['job_title'];
    $job_category = $_POST['job_category'];
    $base_price_min = $_POST['base_price_min'];
    $base_price_max = $_POST['base_price_max'];

    $user_id = $_POST['user_id'];
    $job_id = $_POST['job_id'];

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

     $sql = "Update job set user_id = $user_id,job_title='$job_title',job_category='$job_category',base_price_min=$base_price_min,base_price_max=$base_price_max,job_description='$job_description',city='$city',job_file='$dst',job_date='$date',job_duration=$job_duration";
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
	'Maximum price: '.$base_price_max.'tk'.
	'Duration: '.$job_duration.'days'.
	'Contact No: '.$contact_no;
	$sender->sms($msg,$mask);







}









?>













