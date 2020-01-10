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
	include_once("../inc/dbConfig.php");
	include_once("../inc/validForm.php");

	?>

	<?php

	$category_id = "";
	$category_name = "";

	$updateCateSucess = TRUE;

	if (isset($_GET['category_id'])) {
		$category_id = $_GET['category_id'];
	

		$sql_select_cate = "SELECT * FROM categories WHERE category_id = '$category_id' ";
		$query_select_cate = mysqli_query($conn,$sql_select_cate);
		 
		while ($row = mysqli_fetch_array($query_select_cate) ) {
		   	$category_id = $row['category_id'];
			$category_name = $row['category_name'];
			$category_slug = $row['category_slug'];
		}

		if (isset($_POST['edit_cate'])) {
			$category_id = checkInput($_POST['cate_id']); 
			$category_name = checkInput($_POST['cate_name_edit']);
			$category_slug= checkInput($_POST['cate_slug_edit']);

			$sql_update_cate = "UPDATE categories SET category_name = '$category_name',category_slug = '$category_slug' WHERE category_id = '$category_id ' ";
			if (!mysqli_query($conn,$sql_update_cate)) {
				$updateCateSucess = FALSE;
			} else{
				header('Location:category-management.php');
			}
		}
	} /*end isset*/
?>
<!-- ------------------------------------------------------------------------------- -->	
<?php include_once("../inc/header.php"); ?>
	
	</style>
</head>
<body>
	<?php include_once("../inc/nav-horizontal.php");?>	
	<div class="container">
		<div class="row">

			<div class=" col-lg-12">
				
				<?php if ($updateCateSucess == TRUE && isset($_POST['edit_cate'])): ?>
					<div class="alert alert-success">Sửa thành công !</div>	
				<?php endif ?>

				<?php if ($updateCateSucess == FALSE && isset($_POST['edit_cate'])): ?>
					<div class="alert alert-danger">Sửa thất bại !</div>	
				<?php endif ?>
				<h3 class="text-center">Sửa Category</h3>
				<form method="post" action="" class="form-group">
					<input type="hidden" name="cate_id" value="<?= $_GET['category_id'] ?>">
					<label>Tên mới: </label>
					<input type="text" name="cate_name_edit" class="form-control" value="<?= $category_name ?>">
					<label>Slug: </label>
					<input type="text" name="cate_slug_edit" class="form-control mr-bottom" value="<?= $category_slug ?>">
					<button class="btn btn-info" type="submit" name="edit_cate">Sửa</button>
				</form>
			</div>

		</div>
	</div>
<?php include_once("../inc/footer.php");?>

