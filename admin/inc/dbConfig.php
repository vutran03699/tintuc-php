<?php
$server_host = "localhost";
$server_username = "root";
$server_password = "";
$database = "website";

$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("Connect: Failed!");
mysqli_query($conn, "SET NAMES 'utf8' ");
?>