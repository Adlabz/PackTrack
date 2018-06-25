<!DOCTYPE html>
<html>
<head>
	<title>Hackathon Project</title>

	<meta name="Author" content="Aviva Kern">
	<link rel="icon" type="image/png" href="hackathonlogo.png">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<script src="gen_validatorv4.js" type="text/javascript"></script>

	<style>
		h1{
			font-family: 'Righteous', cursive;
			text-align: center;
		}

		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type=password], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		button {
			width: 100%;
			background-color: #87cefa;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #76b4db;
		}

		div{
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
		}

		p{
			text-family: Calibri;
		}
	</style>
</head>

<body>
	<h1>Register</h1>
	<br>
	<form id="register" action="PackTrackAPI.php/add_new_user/" method="post">
		<div>
			<p>
			* = required fields
			</p>
			<br>

			<label for="name"><b class="login">Name*:</b></label>
			<input type="text" placeholder="Enter Full Name" name="Name" maxlength="50" required>
			<br>

			<label for="username"><b class="login">Username*:</b></label>
			<input type="text" placeholder="Enter Username" name="Username" maxlength="50" required>
			<br>

			<label for="password"><b class="login">Password*:</b></label>
			<input type="password" placeholder="Enter Password" name="Password" maxlength="50" required>
			<br>

			<label for="email"><b class="login">Email*:</b></label>
			<input type="text" placeholder="Enter Email" name="Email" maxlength="50" required>
			<br>

			<label for="phone_num"><b class="login">Phone Number*:</b></label>
			<input type="text" placeholder="(xxx) xxx-xxxx" name="Phone" maxlength="50" required>
			<br>

			<label for="address"><b class="login">Address*:</b></label>
			<input type="text" placeholder="20 Church Lane, Manalapan, New Jersey 07726" name="Address" maxlength="50" required>
			<br>

			<button type="submit">Register</button>
			<br>

		</div>

	</form>

	<script type="text/javascript">
</body>
</html>
