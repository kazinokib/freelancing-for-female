<?php

$servername ="173.249.5.89";
$username ="pinkishb_fff";
$password ="nokib01556499623evon";
$db = "pinkishb_fff";
$con = mysqli_connect($servername, $username, $password,$db);

mysqli_query($con,'SET CHARACTER SET utf8');
mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");


?>