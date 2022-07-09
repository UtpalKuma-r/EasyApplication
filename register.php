<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>


    <h1>Complete the form below to register yourself</h1>
    <form action="" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" required>
<br>
<br>
        <label for="mname">Middle Name</label>
        <input type="text" name="mname" id="mname">
<br>
<br>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname">
<br>
<br>
        <label for="uname">User Name:</label>
        <input type="text" name="uname" id="uname" required>
<br>
<br>
        <label for="dob">DOB:</label>
        <input type="date" name="dob" id="dob" required>
<br>
<br>
        <label for="phonenumber">Phone Number</label>
        <input type="number" name="phonenumber" id="phonenumber" required>
<br>
<br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
<br>
<br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>   
<br>
<br>
        <label for="cpassword">Confirm Password</label>
        <input type="password" name="cpassword" id="cpassword" required>
<br>
<br>        
        <button type="reset">Clear</button><button type="submit">Register</button>
    </form>


</body>
</html>

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

					$query = "INSERT INTO USERDATA VALUES('$username', '$firstname', '$middlename', '$lastname', '$dob', '$phonenumber', '$email')";

					$result = mysqli_query($conn, $query);

					$query = "INSERT INTO LOGINDATA VALUES('$username', '$salt', '$passwordhash', 'user')";

					$result = mysqli_query($conn, $query);

					// echo "<script>alert('You have been register. Now login to continue.')</script>";

                                        echo "<script>if(confirm('Your Record Sucessfully Inserted. Now Login')){document.location.href='login.php'};</script>";
					
                }
        }
?>