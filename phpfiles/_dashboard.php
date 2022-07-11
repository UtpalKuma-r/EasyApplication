<?php

include "partials/_connection.php";

session_start();

if (isset($_SESSION["username"])){
    $query = "SELECT * FROM USERDATA WHERE USERNAME = '$_SESSION[username]'";
    $result = mysqli_query($conn, $query);

    $username = $_SESSION["username"];
    $phonenumber = $result["phonenumber"];
    $email = $result["email"];
    
    echo $username." ".$phonenumber." ".$email;

}

else{
    echo "<script>if(confirm('You are not logged in. Login to continue.')){document.location.href='login.php'};</script>";
}


?>