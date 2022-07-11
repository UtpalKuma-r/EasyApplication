<HTML>

<HEAD>
	<TITLE>DashBoard</TITLE>
	<STYLE TYPE="TEXT/CSS">
		BODY {
			background-color: white;
			color: red;
			font-family: 'Aril Black';
		}

		.main {
			display: flex;
			flex-direction: column;
			height: 100vh;
		}
	</STYLE>

</HEAD>

<?php
    include "phpfiles/_dashboard.php";
?>

<BODY>
	<div class="main">
		<div class="header" style="display: flex; height: 24vh;">
			<h1>EASSY APPLICATION</h1>
		</div>
		<div class="tables" style="display: flex; height: 75vh; width: 100%;">

			<div class="userdata" style="height: 100%; width: 40%;">
				<table border="2PX" style="height: 100%; width: 100%;">
					<tr>
					<td><?php echo $username; ?></td>
					</tr>
					<tr>
						<td>Name</td>
						<td><?php echo $name; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $email; ?></td>
					</tr>
					<tr>
						<td>Phonenumber</td>
						<td><?php echo $phonenumber; ?></td>
					</tr>
				</table>
			</div>

			<div class="filedata" style="height: 100%; width: 60%;">
				<table style="width: 100%; border: 2px;">
					<tr>
					<td>File ID</td>
					<td>Description</td>
					<td>Remark</td>
					<tr>
						<td>File ID</td>
						<td>Description</td>
						<td>Remark</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</BODY>