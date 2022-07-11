<!DOCTYPE html>
<html>
<body bgcolor="lightyellow">
<form method = "Post">
    <fieldset>
        <legend><ALIGN="CENTER">LOGIN</ALIGN="CENTER"></legend>

		<TABLE ALIGN="CENTER">
			<TR>
				<TD WIDTH="200">User Name:</TD>
				<TD WIDTH="600"><INPUT TYPE="TEXT" NAME="uname" required></TD>
				<TD WIDTH="100"></TD>
			</tr>

			<TR>
				<TD>Password</TD>
				<TD><INPUT TYPE="password" NAME="password" required></TD>
				<TD></TD>
			</tr>

            <TR>
				<TD ><button type="submit">Login</button></TD>
				<TD><INPUT TYPE="RESET"  VALUE="reset">&nbsp;&nbsp;&nbsp;</TD>
			</tr>
                        
</form>
</body>
<?php
    include "phpfiles/_login.php"
?>
