<?php
 session_start();
//kiểm tra người dùng đăng nhập chưa nếu chưa chuyển về trang login
 include_once("../inc/const.php");
include_once("../inc/permission.php");
 $level = "";

if (checkLogin($_SESSION['user_id']) ) {

	$level = $_SESSION['level'];

	if (!checkIsAdmin($level)) {
		header('Location: _DOMAIN/404.html');
	}
}

?>

<?php
include("../inc/dbConfig.php");

if (isset($_GET["id"])) {
	$id_user =  $_GET["id"];
	$sql_delete = "DELETE FROM users WHERE id = '$id_user' ";
	mysqli_query($conn,$sql_delete);
	
	header('Location:member-management.php');

} else {
	header('Location: _DOMAIN/404.html');
}
?>