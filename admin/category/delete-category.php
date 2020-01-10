<?php
	session_start();
	$user_level = "";
	include_once("../inc/permission.php");
	if (checkLogin($_SESSION['username']) && checkLogin($_SESSION['user_id']) && checkLogin($_SESSION['level']) ) {
		$user_level = $_SESSION['level'];
	} else {
		header('Location:_DOMAIN');
	}

?>

<?php
include("../inc/dbConfig.php");


$category_id = "";

 if ($_GET["category_id"] && $_GET["category_id"] != 0) {

 	$category_id = $_GET['category_id'];

 	//CHUYẺN CATEGORY ID TỪ NHỮNG POST CÓ CATEGORY CẦN XÓA VỀ 0
 	$sql_select_post = "SELECT category_id FROM posts WHERE category_id = '$category_id' ";
 	$query_select_post = mysqli_query($conn,$sql_select_post);

 	while ($row = mysqli_fetch_array($query_select_post)) {

 		$old_cate = $row["category_id"];

 	    $sql_update_post = "UPDATE posts SET category_id = '0' WHERE category_id = '$old_cate' ";
 	    mysqli_query($conn,$sql_update_post);

 	}

  	//XÓA CATEGORY KHOONGT HÀNH CÔNG CŨNG VỀ TRANG QUẢN LÚ CATEGORY
 	$sql_delete_cate = "DELETE FROM categories WHERE category_id = '$category_id' ";
	mysqli_query($conn,$sql_delete_cate);
	var_dump($category_id);

	header('Location:category-management.php');
 } 
	

