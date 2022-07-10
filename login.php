<!DOCTYPE html>
<html>
<body bgcolor="lightyellow">
<form><fieldset><legend><ALIGN="CENTER">LOGIN</ALIGN="CENTER"></legend>
		<TABLE ALIGN="CENTER">
			<TR>
				<TD WIDTH="200">User Name:</TD>
				<TD WIDTH="600"><INPUT TYPE="TEXT" NAME="uname" required></TD>
				<TD WIDTH="100"></TD>
			</tr>
			<TR>
				<TD>Password</TD>
				<TD><INPUT TYPE="password" INPUT="password" required></TD>
				<TD></TD>
			</tr>
                        <TR>
			
				<TD ><button type="submit">Login</button></TD>
				<TD><INPUT TYPE="RESET"  VALUE="reset">&nbsp;&nbsp;&nbsp;</TD>
			</tr>
                        
</form>
</body>
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
