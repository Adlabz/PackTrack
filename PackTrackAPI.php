<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

include('phpqrcode/qrlib.php');
include('config.php');

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->post('/add_new_user/', function (Request $request, Response $response) {
  $servername = "localhost:8889";
  $username = "root";
  $password="root";
  $dbname = "packtrack";
  $data = $request->getParsedBody();
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  $input = "'".$data['Name']."', '".$data['Username']."', '".$data['Password']."', '".$data['Phone']."', '".$data['Email']."', '".$data['Address'] . "'";
  echo $input;
  $insert = $conn->query("INSERT INTO `users` (`Name`, `Username`, `Password`, `Phone`, `Email`, `Address`) VALUES (".$input.")");
  header("Location:http://192.168.1.104:8888/loginpage.php");
  exit;
});
$app->post('/log_in_auth/', function (Request $request, Response $response) {
  $servername = "localhost:8889";
  $username = "root";
  $password="root";
  $dbname = "packtrack";
  $data = $request->getParsedBody();
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  $passret = $conn->query("SELECT `Password` FROM `users` WHERE `username` = '" .$data['Username']. "'");
  $pass = mysqli_fetch_row($passret);
  $uidret = $conn->query("SELECT `UID` FROM `users` WHERE `username` = '" .$data['Username']. "'");
  $uid = mysqli_fetch_row($uidret);
  if($pass[0] == $data['Password']){
    echo "It worked! Redirecting...";
    header("Location:http://192.168.1.104:8888/mainpage.php?uid=".$uid[0]);
    exit;
  } else {
    echo "Who the hell are you?";
  }
});
$app->post('/add_new_tag/', function (Request $request, Response $response) {
  $servername = "localhost:8889";
  $username = "root";
  $password="root";
  $dbname = "packtrack";
  $data = $request->getParsedBody();
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  $UID = $data['UID'];
  $description = $data['Description'];
  $basename = bin2hex(random_bytes(2));
  $newname = strval($basename)."_".strval(time());
  $name = sprintf('%s.%0.8s', $newname, "png");
  // we building raw data
  $codeContents = 'url:http://192.168.1.104:8888/products.php?tag='.$newname;

  // generating
  QRcode::png($codeContents, 'QRCodes/'.$name, QR_ECLEVEL_L, 3);
  $input = "'".$UID."', '".$description."', '".$newname."'";
  $insert = $conn->query("INSERT INTO `tags` (`UID`, `Description`, `QR`) VALUES (".$input.")");
  header("Location:http://192.168.1.104:8888/mainpage.php?uid=".$UID);
  exit;
});
$app->post('/set_lost_unlost/', function (Request $request, Response $response) {
  $servername = "localhost:8889";
  $username = "root";
  $password="root";
  $dbname = "packtrack";
  $data = $request->getParsedBody();
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  $Tag = $data['Tags'];
  $currState = $conn->query("UPDATE `tags` SET `Lost` = NOT Lost");
  $uidret = $conn->query("SELECT `UID` FROM `users` WHERE `username` = '" .$data['Username']. "'");
  $uid = mysqli_fetch_row($uidret);
});
$app->run();
?>
