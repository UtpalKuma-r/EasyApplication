<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "easyapplication";

$conn = mysqli_connect($host, $user, $passwd, $database);

if($conn){
    echo "Connection Successful";
}

else{
    echo "Connection failed".mysqli_connect_error();
}
?>