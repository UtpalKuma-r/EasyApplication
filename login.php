<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


    <h1>Login below</h1>
    <form action="" method="Post">

        <label for="uname">User Name:</label>
        <input type="text" name="uname" id="uname">
<br>
<br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">   

<br>
<br>        
        <button type="reset">Clear</button><button type="submit">Login</button>
    </form>


</body>
</html>


<?php
    

    function authentication($username, $password){

        include "partials/_connection.php";
        
        $query = "SELECT * FROM LOGINDATA WHERE USERNAME = '$username'";

        $result = mysqli_query($conn, $query);

        //echo $result;

        if (! $result){
            return FALSE;
        }

        else{
            $row = mysqli_fetch_array($result);

            //echo $row;

            $salt = $row["Salt"];
            echo '<br>'.$salt.'<br>';
            echo $password.'<br>';
            echo $password.$salt.'<br>';
            $correcthash = $row["Hash"];
            echo $correcthash.'<br>';

            $givenhash = password_hash($password.$salt, PASSWORD_DEFAULT);
            echo $givenhash.'<br>';
            

            if ($correcthash != $givenhash){
                return FALSE;
            }

            else{
                return True;
            }
        }
        


    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["uname"];
        $password = $_POST["password"];

        $loginpass = authentication($username, $password);

        if ($loginpass){
            echo "<script>if(confirm('Login Successfull!!')){document.location.href='dashboard.php'};</script>";
        }

        else{
            echo "<script>alert('Wrong cridentials!!')</script>";
        }
        

        }
?>