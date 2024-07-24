<?php

$servername ="173.249.6.42";
$username ="pinkishb_fff";
$password ="nokib01556499623evon";
$db = "pinkishb_fff";
$conn = mysqli_connect($servername, $username, $password,$db);

mysqli_query($conn,'SET CHARACTER SET utf8');
mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");


?>