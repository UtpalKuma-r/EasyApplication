<?php

include "_connection.php";

session_start();

if (isset($_SESSION["username"])){

    if($_SESSION["role"] == "user"){

        $query = "SELECT * FROM USERDATA WHERE USERNAME = '$_SESSION[username]'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        $username = $_SESSION["username"];
        $name = $row["FirstName"]." ".$row["LastName"];
        $phonenumber = $row["PhoneNumber"];
        $email = $row["Email"];
        $image = $row["Image"];

        // mysqli_select_db($conn, "usertables");

        $query = "SELECT * FROM fileprogress WHERE UserName = '$username'";
        $filesAvailable = mysqli_query($conn, $query);

        // echo $username." ".$phonenumber." ".$email;
    }

    else{
        session_unset();
        session_destroy();
        echo "<script>if(confirm('You are not autherised to access this page.')){document.location.href='LoginPage.php'};</script>";
    }

}

else{
    echo "<script>if(confirm('You are not logged in. Login to continue.')){document.location.href='LoginPage.php'};</script>";
    // echo "something";
    // echo $_SESSION["username"];
}

mysqli_close($conn);


?>