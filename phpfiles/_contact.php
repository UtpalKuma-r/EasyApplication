<?php

    include "_connection.php";

    session_start();
    $loggedIN = FALSE;
    if (isset($_SESSION["username"])){
        $loggedIN = TRUE;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $name = $_POST["name"];
        $phonenumber = $_POST["phonenumber"];
        $email = $_POST["email"];
        $summary = $_POST["summary"];
        $details = $_POST["details"];

        $query = "INSERT INTO CONTACTREQUESTS(Name, PhoneNumber, Email, Summary,  Details) VALUES('$name', $phonenumber, '$email', '$summary', '$details')";
        $result = mysqli_query($conn, $query);

        echo "<script>if(confirm('Your Record Sucessfully Inserted.')){document.location.href='contact.php'};</script>";
                                        
    }
?>

