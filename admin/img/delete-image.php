<?php
	session_start();
	$user_level = "";
	include_once("../inc/const.php");
	include_once("../inc/permission.php");
	if (checkLogin($_SESSION['username']) && checkLogin($_SESSION['user_id']) && checkLogin($_SESSION['level']) ) {
		$user_level = $_SESSION['level'];
	} else {
		header('Location:_DOMAIN');
	}

?>
<?php 

	include_once("../inc/dbConfig.php");
	include_once("../inc/getDataFromDB.php");

	if (isset($_GET['img_id'])) {
		$img_id = $_GET['img_id'];
		
		$img_path = getImgPathFromImgId($img_id,$conn);

		unlink('../../uploads/image/'.basename($img_path));

		delImageFromId($img_id,$conn);
	
		header("Location:image-management.php");
	}
		

	