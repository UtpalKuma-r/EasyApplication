<?php
include ("connection.php")
?>



<HTML>
<HEAD>
<TITLE>Register</TITLE>
<STYLE TYPE="TEXT/CSS">
BODY{BACKGROUND-COLOR:LIGHTYELLOW;}
</STYLE>
</HEAD>
<BODY> 
	<H1> 
		<u> GOVERNMENT OFFICIAL </u> </H1>
		</br></br></br>
		<FORM action='' method='post'>
			<fieldset>
				<legend>
					<H2>Register</H2>
				</legend>
				<TABLE ALIGN="CENTER">
					<TR>
						<TD colspan="3" ><H3>Create Your Account.It Will Take Only Few Minutes..</H3></TD>
						
					</tr>
					<TR>
						<TD >Name:</TD>
						<TD ><INPUT TYPE="TEXT" NAME="FirstName" required> </TD>
						<TD ><INPUT TYPE="TEXT" NAME="LastName"> </TD>
					</tr>
					<TR>
						<TD >DOB:</TD>
						<TD colspan="2"><INPUT TYPE="date"  NAME="dob" required></TD>
						
					</tr>
					<TR>
						<TD >Mobile No.:</TD>
						<TD colspan="2"><INPUT TYPE="tel" NAME="Mob" required></TD>
						
					</tr>
					<TR>
						<TD >Email:</TD>
						<TD ><INPUT TYPE="email" NAME="EmailId"></TD>
						
					</tr>
					<TR>
						<TD>Password:</TD>
						<TD><INPUT TYPE="password" INPUT="password" name="password" required></TD>
						
					</tr>
					<TR>
						<TD>Confirm Password:</TD>
						<TD><INPUT TYPE="password" INPUT="password" name="conpassword" required></TD>
						
					</tr>
				</TABLE>		

				<INPUT TYPE="Submit" VALUE="SUBMIT" name="submit">&nbsp;&nbsp;&nbsp;
				<INPUT TYPE="RESET"  VALUE="RESET">&nbsp;&nbsp;&nbsp;
			</fieldset>
		</FORM>
					</br>
			<A HREF="display.php?$test=[1245,1236]" > OUR WEBSITE TO LOOK </A>
</BODY>
</HTML>


<?php

if(isset($_POST['submit']))
{
$f_name = $_POST['FirstName'];
$l_name = $_POST['LastName'];
$dob = $_POST['dob'];
$mobile_no = $_POST['Mob'];
$email = $_POST['EmailId'];
$password = $_POST['password'];
$conpassword = $_POST['conpassword'];

//$user_id = 'UR124554';

	if ($password == $conpassword){

		$query = "INSERT INTO USER_INFO VALUES('$password', '$f_name', '$l_name', '$dob', '$mobile_no', '$email')";
		$data = mysqli_query($conn, $query);

		if ($data){
			echo 'Data Stored';
		}

		else{
			echo 'Connection failed'.mysqli_connect_error();
		}
	}
	else{
		echo "password missmatch";
	}
}

?>
