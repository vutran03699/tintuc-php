<?php 
session_start();
include_once("inc/permission.php");
if ( checkLogin($_SESSION['user_id']) ) {
	session_destroy();
	header("Location:login.php");
	
}

?>