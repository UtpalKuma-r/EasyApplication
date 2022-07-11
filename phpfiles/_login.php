<?php
    

    function authentication($username, $password){

        include "partials/_connection.php";
        
        $query = "SELECT * FROM LOGINDATA WHERE USERNAME = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0){
            return FALSE;
        }

        else{
            $row = mysqli_fetch_array($result);

            $salt = $row["Salt"];
            $correcthash = $row["Hash"];            

            if (password_verify($password.$salt, $correcthash)){
                return TRUE;
            }

            else{
                return FALSE;
                }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["uname"];
        $password = $_POST["password"];

        $loginpass = authentication($username, $password);

        if ($loginpass){
            session_start();
            $_SESSION["username"] = $username;

            echo "<script>if(confirm('Login Successfull!!')){document.location.href='dashboard.php'};</script>";
        }

        else{
            echo "<script>alert('Wrong cridentials!!')</script>";
        }
    }

?>