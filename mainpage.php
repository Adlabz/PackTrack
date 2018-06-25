<!DOCTYPE html>
<html>
<head>

	<title>Hackathon Project</title>

	<meta name="Author" content="Aviva Kern">
	<link rel="icon" type="image/png" href="hackathonlogo.png">
	<script></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<style>
	table {
		background-color: white;
		font-family:'Merriweather', serif;
		color:black;
		font-size:15px;
		margin:15px;
		border:#87cefa 7px solid;

		-moz-border-radius:3px;
		-webkit-border-radius:3px;
		border-radius:3px;

		-moz-box-shadow: 0 4px 2px #d1d1d1;
		-webkit-box-shadow: 0 4px 2px #d1d1d1;
		box-shadow: 0 1px 2px #d1d1d1;
	}

	table th {
		padding:21px 25px 22px 25px;
		border-top:1px solid #87cefa;
		border-bottom:4px solid #87cefa;
	}
	table th:first-child {
		text-align: left;
		padding-left:20px;
	}
	table tr:first-child th:first-child {
		-moz-border-radius-topleft:3px;
		-webkit-border-top-left-radius:3px;
		border-top-left-radius:3px;
	}
	table tr:first-child th:last-child {
		-moz-border-radius-topright:3px;
		-webkit-border-top-right-radius:3px;
		border-top-right-radius:3px;
	}
	table tr {
		text-align: center;
		padding-left:20px;
	}
	table td:first-child {
		text-align: left;
		padding-left:20px;
		border-left: 0;
	}
	table td {
		padding:18px;
		border-top: 1px solid #87cefa;
		border-bottom:1px solid #87cefa;
		border-left: 1px solid #87cefa;
	}
	table tr:last-child td {
		border-bottom:0;
	}
	table tr:last-child td:first-child {
		-moz-border-radius-bottomleft:3px;
		-webkit-border-bottom-left-radius:3px;
		border-bottom-left-radius:3px;
	}
	table tr:last-child td:last-child {
		-moz-border-radius-bottomright:3px;
		-webkit-border-bottom-right-radius:3px;
		border-bottom-right-radius:3px;
	}
		.objects{
			font-family: 'PT Sans', sans-serif;
			}
		#mp_header{
			position: relative;
			background-color: #87cefa;
			border-radius: 25px;
			buffer-top: 50 px;
			padding: 30px;
			width: 600px;
			height: 200px;
		}
		#mp_header img {
		  float: right;
		  buffer-top: 10 px;
			buffer-left: 20 px;
		  width: 200px;
		  height: 200px;
		}
		#header_text{
			margin-top:10px;
			font-family: 'Righteous', cursive;
			font-size: 70px;
			buffer-top: 30px;
		}
		p{
			font-family: 'Merriweather', serif;
			buffer-left: 50px;
		}
		#lost{
			background-color: #87cefa;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
		#body_text{
			background-color: #b7b7b7;
			border-radius: 25px;
			buffer-top: 50 px;
			padding: 30px;
			width: 800px;
			position: relative;
		}
		#qr_code{
			width: 100px;
			height: 100px;
		}
		.object_format h2{
			position: relative;
		}

		#add_new{
				border-radius: 25px;
				height:30px;
				width:200px;
				margin-left:300px;
				background-color: white;
			}

		#annoying_button{
			font-size: 18px;
			font-family: 'PT Sans', sans-serif;
			text-decoration:none;
		}
		}
	</style>
</head>

<body>
	<div id="mp_header">
	<img src="logo.png">
	<h1 id="header_text">Pack Track Homepage</h1>
	</div>
	<br>

	<div id="body_text">
	<div class="object_format">
<?php
$UID = $_GET['uid'];
$servername = "localhost:8889";
$username = "root";
$password="root";
$dbname = "packtrack";
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query("SELECT * FROM `tags` WHERE `UID` = '".$UID."'");
echo '<button id="add_new"> <a id="annoying_button" href="http://192.168.1.104:8888/ctag.php">Add New Item</a> </button>';
echo '<br>';
echo '<table border=\'1\' id="myTable" class="sortable">
<thead>
<tr>
<th>UID</th>
<th>Tag</th>
<th>Lost?</th>
<th>Description</th>
<th>QR Code</th>
</tr>
<thead>';
echo "<tbody>
<tr>";
$result2 = $conn->query("SELECT * FROM `tags` WHERE `UID`='".$UID."'");
while ($row = mysqli_fetch_array($result2)){
	echo "<tr>";
		echo "<td>" . $row[0] . "</td>";
		if($row[2] == "1"){
			echo "<td><a href=\"http://192.168.1.104:8888/lost_unlost.php?Tags=" . $row[1] . "\">Change to not lost</a></td>";
			echo "<td>Lost</td>";
		} else {
			echo "<td><a href=\"http://192.168.1.104:8888/lost_unlost.php?Tags=" . $row[1] . "\">Change to lost</a></td>";
			echo "<td>Not lost</td>";
		}
		echo "<td>" . $row[3] . "</td>";
		echo "<td><img src=\"http://192.168.1.104:8888/QRCodes/".$row[4].".png\"></td>";
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
</body>
</html>
