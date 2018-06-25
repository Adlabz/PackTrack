<?php
  $servername = "localhost:8889";
  $username = "root";
  $password="root";
  $dbname = "packtrack";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  $Tag = $_GET['Tags'];
  $currState = $conn->query("UPDATE `tags` SET `Lost` = NOT Lost WHERE `Tags`='".$Tag."'");
  $uidret = $conn->query("SELECT `UID` FROM `tags` WHERE `Tags` = '" .$Tag. "'");
  $uid = mysqli_fetch_row($uidret);
  header("Location:http://192.168.1.104:8888/mainpage.php?uid=".$uid[0]);
  exit;
?>
