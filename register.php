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
						<TD ><INPUT TYPE="TEXT" NAME="Firstname"  placeholder="Firstname"required> </TD>
						<TD ><INPUT TYPE="TEXT" NAME="Lastname" placeholder="Lastname"> </TD>
					</tr>
					<TR>
						<TD >UserName:</TD>
						<TD ><INPUT TYPE="TEXT" NAME="Username" placeholder="Username" required> </TD>

					</tr>
					<TR>
						<TD >DOB:</TD>
						<TD colspan="2"><INPUT TYPE="date"  NAME="dob" required></TD>
						
					</tr>
					<TR>
						<TD >Mobile No.:</TD>
						<TD colspan="2"><INPUT TYPE="number" NAME="Mob" required></TD>
						
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
	//getting all the inputs
	$f_name = $_POST['Firstname'];
	$l_name = $_POST['Lastname'];
	$dob = $_POST['dob'];
	$mobile_no = $_POST['Mob'];
	$email = $_POST['EmailId'];
	$password = $_POST['password'];
	$conpassword = $_POST['conpassword'];
	$username = $_POST['Username'];


	$Data_validity = TRUE;

	//Query to get existing data
	$query = "SELECT * FROM USER_INFO";
	$data = mysqli_query($conn, $query);

	//Check if any data exists
	if (mysqli_num_rows($data) != 0){
		//Check for Duplicate entries
		while($result = mysqli_fetch_assoc($data)){

			if($result['User_ID'] == $username){
				$Data_validity = FALSE;
				$error_message = 'Username already exists';
				break;
			}
			elseif($result['Mobile_Number'] == $mobile_no){
				$Data_validity = FALSE;
				$error_message = 'Mobile number already exists';
				break;
			}
			elseif($result['Email'] == $email){
				$Data_validity = FALSE;
				$error_message = 'Email already in use';
				break;
			}

		}
	}

	//Procide if no duplicates found
	if ($Data_validity){

		//Check if password matches confirm password
		if($password == $conpassword){

			//Insert into database
			$query = "INSERT INTO USER_INFO VALUES('$username', '$f_name', '$l_name', '$dob', '$mobile_no', '$email')";
			$data = mysqli_query($conn, $query);

			//Check if data stored or not
			if ($data){
				echo '<script>alert("Data stored")</script>';
			}

			else{
				echo 'Connection failed'.mysqli_connect_error();
			}
		}
		else{
			echo '<script>alert("Passeord mismatch")</script>';
		}
	}
	else{
		echo "<script>alert('$error_message')</script>";
	}
}

?>
