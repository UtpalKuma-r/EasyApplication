<?php
    include "_connection.php";

    session_start();

    function extentioncheck($Image){
        $someData = explode('.', $Image["name"]);
        $imageExtention = strtolower(end($someData));
        $allowedExtention = array('png', 'jpg', 'jpeg');

        return in_array($imageExtention, $allowedExtention);
    }



    if (isset($_SESSION["username"])){

        if ($_SERVER['REQUEST_METHOD'] == "POST"){

            // grab all data from application form
            $username = $_SESSION["username"];
            $firstname = $_POST["fname"];
            $lastname = $_POST["lname"];
            $dob = $_POST["dob"];
            $phonenumber = $_POST["phonenumber"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $fathername = $_POST["fathername"];
            $mothername = $_POST["mothername"];
            $state = $_POST["state"];
            $district = $_POST["district"];
            $subdiv = $_POST["subdiv"];
            $address = $_POST["address"];
            $pincode = $_POST["pincode"];
            $image = $_FILES["image"];
            $signature = $_FILES["signature"];
            $fileID = uniqid();

            // print_r($image);

            if (extentioncheck($image) && extentioncheck($signature)){
                if ($image["size"] > 90000 && $signature["size"] > 90000){
                    echo "<script>alert('File size must be less then 5mb.')</script>";
                }
                else{
                    $imagedestination = "aadharImage/".$username.$image["name"];
                    move_uploaded_file($image["tmp_name"], $imagedestination);

                    $signaturedestination = "aadharSign/".$username.$image["name"];
                    move_uploaded_file($signature["tmp_name"], $signaturedestination);

                    // $query = "INSERT INTO fileuserrelation VALUES('$fileID', '$username')";
                    // $result = mysqli_query($conn, $query);

                    // mysqli_select_db($conn, "usertables");
                    $query = "INSERT INTO fileprogress(FileID, UserName, Department, FileStatus) VALUES('$fileID', '$username', 'Aadhar', 'submitted')";
                    $result = mysqli_query($conn, $query);

                    mysqli_select_db($conn, "aadhar");
                    $query = "INSERT INTO filedata VALUES('$fileID', '$firstname', '$lastname', '$gender', '$dob', '$fathername', '$mothername', '$phonenumber', '$email', '$state', '$district', '$subdiv', '$address', '$pincode', '$imagedestination', '$signaturedestination')";
                    $result = mysqli_query($conn, $query);

                    $query = "SELECT UserName, MIN(CURRENTFILES) FROM STAFFDATA where role = 'staff'";
                    $result = mysqli_query($conn, $query);
                    $staffUsername = mysqli_fetch_assoc($result)["UserName"];

                    $query = "INSERT INTO filestaffrel VALUE('$fileID', '$staffUsername')";
                    $result = mysqli_query($conn, $query);

                    $query = "UPDATE STAFFDATA SET currentfiles = currentfiles+1 and totalfiles = totalfiles+1 where username = '$staffUsername'";
                    $result = mysqli_query($conn, $query);


                    echo "<script>if(confirm('Your application has been submitted.')){document.location.href='UserDash.php'};</script>";

                }
            }

            else{
                echo "<script>alert('File extention must be png/jpg/jpeg. Others are not supported')</script>";
            }
            
        }
    }

    else{
        echo "<script>if(confirm('You are not logged in. Login to continue.')){document.location.href='LoginPage.php'};</script>";
    }
?>