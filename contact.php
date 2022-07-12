<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>


    <h1>Contact</h1>
    <form method="Post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
<br>
<br>
        <label for="phonenumber">Phone Number</label>
        <input type="number" name="phonenumber" id="phonenumber">
<br>
<br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
<br>
<br>
        <label for="detail">Write here</label>
        <textarea name="details" id="details" cols="30" rows="10">Write here</textarea> 
<br>
<br>        
        <button type="reset">Clear</button><button type="submit">Send</button>
    </form>


</body>
</html>
<?php
include "phpfiles/_contact.php";
?>