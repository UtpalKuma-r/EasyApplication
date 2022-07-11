<?php
        include "partials/_connection.php";

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

                include "partials/_connection.php";

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

        if ($_SERVER['REQUEST_METHOD'] == "POST"){

			// echo "<script>alert('POST method called')</script>";

			if ($_POST["password"] == $_POST["cpassword"]){
					$username = $_POST["uname"];
					$firstname = $_POST["fname"];
					$middlename = $_POST["mname"];
					$lastname = $_POST["lname"];
					$dob = $_POST["dob"];
					$phonenumber = $_POST["phonenumber"];
					$email = $_POST["email"];
					$password = $_POST["password"];
					$salt = generateRandomString();

					$passwordhash = password_hash($password.$salt, PASSWORD_DEFAULT);

                                        $duplicate = checkduplicate($username, $phonenumber, $email);
                                        if (!$duplicate[0]){
                                                echo "<script>alert('$duplicate[1]')</script>";
                                        }

                                        else{
                                                $query = "INSERT INTO USERDATA VALUES('$username', '$firstname', '$middlename', '$lastname', '$dob', '$phonenumber', '$email')";
					        $result = mysqli_query($conn, $query);   
                                        
					

                                                if ($result){
                                                        $query = "INSERT INTO LOGINDATA VALUES('$username', '$salt', '$passwordhash', 'user')";
                                                        $result = mysqli_query($conn, $query);
                                                }
                                                
                                                if ($result){
                                                        $query = "CREATE TABLE $username(
                                                        FileID int(10) primary key auto_increment,
                                                        Department varchar(24) not null,
                                                        DateOfSubmission Date default curdate() not null,
                                                        DateOfComplition Date,
                                                        FileStatus varchar(26) not null 
                                                        )";
                                                        $result = mysqli_query($conn, $query);
                                                }
                                                
                                                echo "<script>if(confirm('Your Record Sucessfully Inserted. Now Login')){document.location.href='login.php'};</script>";
                                        }


					// echo "<script>alert('You have been register. Now login to continue.')</script>";

                                        
					
                }
        }
?>