<?php 
	include_once("../inc/EditContent.php");

	$category_name = "";
	$errCateEmpty = "";

	$addCateSucess = TRUE;

	if (isset($_POST['add_cate'])) {
		if (empty($_POST['cate_name_add'])) {
			$errCateEmpty = "Tên không được bỏ trống";
		} else {
			$category_name = checkInput($_POST['cate_name_add']);
			$category_slug = toSlug($category_name);

			$sql_add_cate = "INSERT INTO categories(category_name,category_slug) VALUES ('$category_name','$category_slug')";
			if (!mysqli_query($conn,$sql_add_cate)) {
				$addCateSucess = FALSE;
			}

		}
		
	}
?>
<?php if ($addCateSucess == TRUE && isset($_POST['add_cate'])): ?>
	<div class="alert alert-success">Thêm thành công !</div>	
<?php endif ?>

<?php if ($addCateSucess == FALSE && isset($_POST['add_cate'])): ?>
	<div class="alert alert-danger">Thêm thất bại !</div>	
<?php endif ?>

<h3 class="text-center">Thêm Category</h3>
<form action="" method="post" class="form-group">
	<label>Tên: </label>
	<input type="text" name="cate_name_add" class="form-control mr-bottom">
	<?= $errCateEmpty ?>
	<button type="submit" class="btn btn-info" name="add_cate">Thêm</button>
</form>