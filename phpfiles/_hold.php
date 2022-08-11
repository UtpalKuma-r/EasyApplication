<?php

include "_connection.php";

session_start();

if (isset($_SESSION["username"])){

    if($_SESSION["role"] == "staff"){
        $FileID = $_GET['fileid'];
        $staffusername = $_SESSION["username"];
        $query = "SELECT * FROM filedata WHERE FileID = '$FileID'";
        mysqli_select_db($conn, "aadhar");
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
    

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $status = $_POST["status"];
            $remarks = $_POST["remarks"];
            if ($status != "Hold"){
                $delquery = "DELETE FROM filestaffrel WHERE `filestaffrel`.`FileID` = '$FileID'";
                $result = mysqli_query($conn, $delquery);
                $relquery = "UPDATE STAFFDATA SET currentfiles = currentfiles-1 where username = '$staffusername'";
                $result = mysqli_query($conn, $relquery);

            }
            $query = "UPDATE fileprogress set FileStatus = '$status', Remarks = '$remarks' where FileID = '$FileID'";
            mysqli_select_db($conn, "easyapplication");
            $result = mysqli_query($conn, $query);
            echo "<script>if(confirm('File updated successfully.')){document.location.href='StaffDash.php'};</script>";
        }
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