<?php
    include "_connection.php";

    session_start();
    $loggedIN = FALSE;
    if (isset($_SESSION["username"])){
        $loggedIN = TRUE;
    }

    if ($loggedIN){

        if($_SESSION["role"] == "staff"){
    
            $query = "SELECT * FROM USERDATA WHERE USERNAME = '$_SESSION[username]'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
    
            $username = $_SESSION["username"];
            $name = $row["FirstName"]." ".$row["LastName"];
            $phonenumber = $row["PhoneNumber"];
            $email = $row["Email"];
            $image = $row["Image"];
    
            // mysqli_select_db($conn, "usertables");
            mysqli_select_db($conn, "aadhar");
            $query = "SELECT FileID FROM filestaffrel WHERE UserName = '$username'";
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
?>