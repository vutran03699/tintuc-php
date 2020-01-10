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
include("../inc/dbConfig.php");
include("../inc/getDataFromDB.php");

 $thumb_id = "";	
 $thumb_path = "";

if ($_GET["post_id"]) {
	$post_id = $_GET["post_id"];

	/*GET IMAGE ID FROM POST*/
	$thumb_id = getImgIdFromPost($post_id,$conn);

	/*GET IMAGE PATH FROM POST*/
	$thumb_path = getImgPathFromImgId($thumb_id,$conn);

	/*DELETE POST*/
	$sql_deletePost = "DELETE FROM posts WHERE post_id = '$post_id' ";
	mysqli_query($conn,$sql_deletePost);

	/*DELETE THUMB*/
	$sql_deleteThumb = "DELETE FROM images WHERE img_id = '$thumb_id' ";
	$query_deleteThumb = mysqli_query($conn,$sql_deleteThumb);

	unlink('../../'.$thumb_path);

	header('Location:post-management.php');
}
