<?php
//$servername = "localhost";
//$username = "";
//$password = "";
//$dbname = "test";

$servername = "mysql10.000webhost.com";
$username = "a3902674_n";
$password = "qwerty1234";
$dbname = "a3902674_form";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}   
?>
