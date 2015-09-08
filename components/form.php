<!doctype html>
<html>
    <head>
        
    </head>
    <body>
<?php
include_once "dbconnection.php";

if(isset($_POST["name"])){
	$name=$_POST["name"];} else {$name="";}
	
if(isset($_POST["email"])){
	$email=$_POST["email"];} else {$email="";}
        
if(isset($_POST["companyname"])){
	$companyname=$_POST["companyname"];} else {$companyname="";}
	
if(isset($_POST["descr"])){
	$descr=$_POST["descr"];} else {$descr="";}
        

$sql="INSERT INTO  form (name, email, companyname, descr)
        VALUES ('$name', '$email', '$companyname', '$descr')";


$to = "abdullaniyasm@gmail.com";
$subject = "Contact mail through website from ".$name;
$from = "website";
$message =
"
Name: ".$name.
"
Email : ". $email.
"
Company: ".$companyname.
"
Message: ".$descr;
$headers = "From:" ."web - " . $from;
mail($to,$subject,$message,$headers);

?>
<?php


if (!mysqli_query($con, $sql))
  {
	  //console.log('failed');
  //die('Error: ' . mysql_error($con));
  echo " Sorry for the inconvenience, please insert again.";
  } else {
      echo "Thank you for contacting, Will get back to you soon. ";
  }
  
//  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.html">';    
exit;
?>
    </body>
</html>