<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$tag = $_GET['tag'];
$servername = "localhost:8889";
$username = "root";
$password="root";
$dbname = "packtrack";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$lost = $conn->query("SELECT `Lost` FROM `tags` WHERE `QR` = '".$tag."'");
$bool = mysqli_fetch_row($lost);
$val = strval($bool[0]);
$UIDret = $conn->query("SELECT `UID` FROM `tags` WHERE `QR` = '".$tag."'");
$UID = strval((mysqli_fetch_row($UIDret))[0]);


$return = $conn->query("SELECT * FROM `users` WHERE `UID` = '".$UID."'");
$data = mysqli_fetch_row($return);
$nameVar = strval($data[1]);
$to = strval($data[5]);
if($val == "1"){
  echo "This item is lost. Please contact " . $nameVar . " with the information below <br>";
  echo "Phone number: " . strval($data[4]) . "<br>";
  echo "Email: ".$to . "<br>";
  echo "Address: ".strval($data[6]);
} else {
  echo "This item is not lost, however the owner has been notified.";
}
$ip = getRealIpAddr();
//$ip = "47.19.130.149";


$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$date = date("m/d/Y");

date_default_timezone_set("America/New_York");
$time = date("h:i:sa");
$city = $details->city;
$subject = "QR Code Scanned from ".$city;



$DESCret = $conn->query("SELECT `Description` FROM `tags` WHERE `QR` = '".$tag."'");
$DESC = mysqli_fetch_row($DESCret);
if($val == "1"){
  //echo "yes it's lost";
  $content = "Your " .strval($DESC[0]). "was scanned in " .$city ." at " .$time ." EST, and your contact information has been relayed.";
} else {
  //echo "no it's not";
  $content = "Your " .strval($DESC[0]). " has been scanned in " .$city. " at " .$time ." EST. If this item is lost, declare the item as lost to share your contact information.";
}



$cmd = "curl -i --request POST \  --url https://api.sendgrid.com/v3/mail/send \   --header 'Authorization: Bearer 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' \  --header 'Content-Type: application/json' \  --data '{\"personalizations\": [{\"to\": [{\"email\": \"".$to."\"}]}],\"from\": {\"email\": \"avidlaud@gmail.com\"},\"subject\": \"".$subject."\",\"content\": [{\"type\": \"text/plain\", \"value\": \"".$content."\"}]}'";


$commandRun = shell_exec ( $cmd );

?>
