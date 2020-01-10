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
	
<?php include_once("../inc/header.php"); ?>
	
	</style>
</head>
<body>

	<?php include_once("../inc/nav-horizontal.php");?>	
	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<?php include_once("../category/add-category.php");?>
			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
<!-- ------------------------------------------------------------------------------------------ -->
				<div class="alert alert-danger alert-dismissable fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<p>+ Khi xóa category tất cả post thuộc category đó sẽ được chuyển về Uncategory.</p>
					<p>+ Không thể xóa Uncategory.</p>
				</div>
				<h3>Categories </h3> 
				<!-- end caption -->
				
				<div class="category-list">
					<caption>Danh sách Category</caption>
					<table class="table table-hover">
						<thead>
							<tr class="cate-info ">
								<th>ID</th>
								<th>Tên Category</th>
								<th>Slug</th>
							</tr>
						</thead>
						<tbody>
								<?php

									$sql_select_cate = "SELECT * FROM categories ORDER BY category_id DESC";
									$query_select_cate = mysqli_query($conn,$sql_select_cate);
									while ($row = mysqli_fetch_array($query_select_cate)) {
								?>
								<tr class="category-info show-action">
									<td><?php echo $row['category_id']; ?><br>

									<?php if ($row['category_id'] != 0): ?>
										<div class="action">
											<a href="edit-category.php?category_id=<?= $row['category_id'] ?>">Sửa</a>
											<a href="delete-category.php?category_id=<?= $row['category_id'] ?>">Xóa</a>
										</div>
									</td>
									<?php endif ?>
									
									<td><?php echo $row['category_name']; ?></td>
									<td><?php echo $row['category_slug']; ?></td>
								</tr>
								<?php } ?>
						</tbody>
					</table>	
				</div>

			</div> <!-- end col 8 -->

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="edit">

			</div>

		</div>
	</div>
<?php include_once("../inc/footer.php");?>