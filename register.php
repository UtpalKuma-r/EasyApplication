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
        include "phpfiles/_register.php";
?>