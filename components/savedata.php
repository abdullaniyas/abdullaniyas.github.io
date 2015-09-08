<!doctype html>
<html>
    <head>
        
    </head>
    <body>
<?php
include_once "dbconnection.php";
if(isset($_POST["fname"])){
	$fname=$_POST["fname"];} else {$fname="";}
	
if(isset($_POST["lname"])){
	$lname=$_POST["lname"];} else {$lname="";}
	
if(isset($_POST["cntctno"])){
	$cntctno=$_POST["cntctno"];} else {$cntctno="";}
        
if(isset($_POST["email"])){
	$email=$_POST["email"];} else {$email="";}
        
if(isset($_POST["location"])){
	$location=$_POST["location"];} else {$location="";}
        
if(isset($_POST["service"])){
        $service=$_POST["service"];} else {$service="";}

if(isset($_POST["message"])){
        $message=$_POST["message"];} else {$message="";}

$sql="INSERT INTO  contact (fname, lname, cntctno, email, location, service, message) VALUES ('$fname', '$lname', '$cntctno', '$email', '$location', '$service', '$message')";

$to = "info@groupl.in";
$subject = "Contact mail through website from ".$fname." ".$lname;
$from = "website@groupl.in";
$message =
"
Name: ".$fname." ".$lname.
"
Email : ". $email.
"
Phone: ".$cntctno.
"
Location: ".$location.
"
Service: ".$service.
"
Message: ".$message;
$headers = "From:" ."groupl - " . $from;
mail($to,$subject,$message,$headers);



if (!mysqli_query($con, $sql))
  {
	  //console.log('failed');
  //die('Error: ' . mysql_error($con));
  echo " Sorry for the inconvenience, please insert again.";
  } else {
      echo "Thank you for your enquiry. A member of our team will contact you shortly. ";
  }
  
//  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.html">';    
exit;
?>
    </body>
</html>