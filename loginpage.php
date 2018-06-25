<!DOCTYPE html>
<html>
<head>
	<title>Hackathon Project</title>

	<meta name="Author" content="Aviva Kern">
	<link rel="icon" type="image/png" href="hackathonlogo.png">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<script></script>
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

		label{
			font-family:Calibri;
		}

		span{
			font-family:Calibri;
		}
	</style>
</head>

<body>
	<h1>Pack Track</h1>

	<form action="PackTrackAPI.php/log_in_auth/" method="post" enctype="multipart/form-data">
		<div>
			<label for="username"><b class="login">Username</b></label>
			<input type="text" placeholder="Enter Username" name="Username" required>
			<br>

			<label for="password"><b class="login">Password</b></label>
			<input type="password" placeholder="Enter Password" name="Password" required>
			<br>

			<button type="submit">Login</button>
			<br>

			<label>
				<br> Remember Me <input type="checkbox" checked="checked">
			</label>

			<br>
			<span class="psw">Forgot <a href="#">Password</a>?</span>
			<br>
			<br>
			<span class="">Don't have an account?  Make one <a href="caccount.php">here</a>.</span>
			<br>

		</div>

	</form>
</body>
</html>
