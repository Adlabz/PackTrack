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
	<h1>Create Tag</h1>
	<br>
	<form id="register" action="PackTrackAPI.php/add_new_tag/" method="post">
		<div>
			<p>
			* = required fields
			</p>
			<br>

			<label for="name"><b class="login">UID*:</b></label>
			<input type="text" placeholder="Enter User ID" name="UID" maxlength="50" required>
			<br>

			<label for="username"><b class="login">Description*:</b></label>
			<input type="text" placeholder="Enter a brief description of your item" name="Description" maxlength="50" required>
			<br>

			<button type="submit">Register</button>
			<br>

		</div>

	</form>
</body>
</html>
