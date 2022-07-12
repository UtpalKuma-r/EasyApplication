<?php

    include "partials/_connection.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $name = $_POST["name"];
        $phonenumber = $_POST["phonenumber"];
        $email = $_POST["email"];
        $details = $_POST["details"];

        $query = "INSERT INTO CONTACTREQUEST(Name, PhoneNumber, Email, Details) VALUES($name, $phonenumber, $email, $details)";
        $result = mysqli_query($conn, $query);

        echo "<script>if(confirm('Your Record Sucessfully Inserted.')){document.location.href='contact.php'};</script>";
                                        
    }
?>