<?php
    include "_connection.php";
    // mysqli_select_db($conn, "EASYAPPLICATION");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function checkduplicate($username, $phonenumber, $email){
        
        include "_connection.php";

        $query = "SELECT * FROM USERDATA WHERE USERNAME = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) != 0){
            return [FALSE, "USERNAME already in use"];
        }

        else{
            $query = "SELECT * FROM USERDATA WHERE PHONENUMBER = '$phonenumber'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) != 0){
                return [FALSE, "Phone Number already in use"];
            }

            else{
                $query = "SELECT * FROM USERDATA WHERE EMAIL = '$email'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) != 0){
                return [FALSE, "Email already in use"];
                }

                else{
                return [TRUE];
                }
        }
    }
}

    function extentioncheck($Image){
    $someData = explode('.', $Image["name"]);
    $imageExtention = strtolower(end($someData));
    $allowedExtention = array('png', 'jpg', 'jpeg');

    return in_array($imageExtention, $allowedExtention);
}
    session_start();
    if (isset($_SESSION['username']) and $_SESSION['role'] == 'admin'){

    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        if ($_POST["password"] == $_POST["cpassword"]){
            $username = $_POST["uname"];
            $firstname = $_POST["fname"];
            $lastname = $_POST["lname"];
            $dob = $_POST["dob"];
            $phonenumber = $_POST["phonenumber"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $image = $_FILES["image"];
            $salt = generateRandomString();
            $role = $_POST["role"];

            $passwordhash = password_hash($password.$salt, PASSWORD_DEFAULT);

            $duplicate = checkduplicate($username, $phonenumber, $email);

            if (!$duplicate[0]){
                echo "<script>alert('$duplicate[1]')</script>";
            }

            else{

                if (extentioncheck($image)){

                    if ($image["size"] > 90000 && $signature["size"] > 90000){
                        echo "<script>alert('File size must be less then 5mb.')</script>";
                    }

                    else{

                        $imagedestination = "UserImage/".$username.$image["name"];

                            if(move_uploaded_file($image["tmp_name"], $imagedestination)){                                
                                    // mysqli_select_db($conn, "easyapplication");
                                $query = "INSERT INTO USERDATA VALUES('$username', '$firstname', '$lastname', '$dob', '$phonenumber', '$email', '$imagedestination')";
                                $result = mysqli_query($conn, $query);   
                                
                                if ($result){
                                        // mysqli_select_db($conn, "easyapplication");
                                    $query = "INSERT INTO LOGINDATA VALUES('$username', '$salt', '$passwordhash', '$role')";
                                    $result = mysqli_query($conn, $query);

                                    if ($result){
                                        mysqli_select_db($conn, "aadhar");
                                        $query = "INSERT INTO STAFFDATA VALUES ('$username', '$role', 0, 0, 0)";
                                        $result = mysqli_query($conn, $query);
                                        echo "<script>if(confirm('Your Record Sucessfully Inserted')){document.location.href='Admin.php'};</script>";
                                    }
                                }
                            }
                    }
                }

                else{
                    echo "<script>alert('File extention must be png/jpg/jpeg. Others are not supported')</script>";
                }
            }   			
        }

    }
}
    else{
        session_unset();
        session_destroy();
        echo "<script>if(confirm('You are not autherised to access this page.')){document.location.href='LoginPage.php'};</script>";
    }
?>