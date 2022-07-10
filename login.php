<!DOCTYPE html>
<html>
<body bgcolor="lightyellow">
<FORM><fieldset><legend><ALIGN="CENTER">LOGIN</ALIGN="CENTER"></legend>
		<TABLE ALIGN="CENTER">
			<TR>
				<TD WIDTH="200">User Name:</TD>
				<TD WIDTH="600"><INPUT TYPE="TEXT" NAME="UserName" required></TD>
				<TD WIDTH="100"></TD>
			</tr>
			<TR>
				<TD>Password</TD>
				<TD><INPUT TYPE="password" INPUT="password" required></TD>
				<TD></TD>
			</tr>
                        <TR>
			
				<TD ><button type="submit">Login</button></TD>
				<TD><INPUT TYPE="RESET"  VALUE="RESET">&nbsp;&nbsp;&nbsp;</TD>
			</tr>
                        


</form>

</body>
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
            echo "<script>if(confirm('Login Successfull!!')){document.location.href='dashboard.php'};</script>";
        }

        else{
            echo "<script>alert('Wrong cridentials!!')</script>";
        }
    }

?>
