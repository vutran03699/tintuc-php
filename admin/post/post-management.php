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
//TỔNG SỐ POST ĐỦ ĐIỀU KIỆN ĐĂNG
$query = mysqli_query($conn, "SELECT COUNT(post_id) as total from posts WHERE category_id != '0' AND is_public = '1' ");
$row = mysqli_fetch_assoc($query);
	
$total_post = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$total_page = ceil($total_post / $limit);
$start_post = ( (int)$current_page - 1 ) * $limit;

if ($current_page > $total_page){
        $current_page = $total_page;
}
else if ($current_page < 1){
        $current_page = 1;
}

?>
	
<?php include_once("../inc/header.php"); ?>

	</style>
</head>
<body>

	<?php include_once("../inc/nav-horizontal.php");?>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<!-- ------------------------------------------------------------------------------------------ -->
				<h3>Postes 
	  				<a href="add-post.php">
	  					<button type="button" class="btn-sm btn btn-dark">Add new 
	  						<span class="fa fa-plus"></span>
	  					</button>
	  				</a>
  				</h3> <!-- end caption -->

				<div class="post-list">
					<caption>Danh sách bài viết</caption>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Tiêu đề</th>
								<th>Người đăng</th>
								<th>Categories</td>
								<th>Thời gian đăng</th>
								<th>Tình trạng</th>
							</tr>
						</thead>
						<tbody>
								<?php

									$sql = "SELECT post_id,post_title,id,category_id,createdate,is_public FROM posts ORDER BY post_id DESC LIMIT $start_post, $limit ";
									$query = mysqli_query($conn,$sql);
									while ($row = mysqli_fetch_array($query)) {
								?>
								<tr class="post-info show-action">
									<td><?php echo $row['post_title']; ?>

										<div class="action">
											<a href="../post/edit-post.php?post_id=<?php echo $row['post_id'];?>">Sửa</a>
											<a href="../post/delete-post.php?post_id=<?php echo $row['post_id'];?>">Xóa</a>
										</div>
									</td>
									<td><?php echo getNameUser($row['id'],$conn); ?></td>
									<td><?php echo getCategoryName($row['category_id'],$conn); ?>
										
									</td>
									<td><?php echo $row['createdate']; ?></td>
									<td><?php 
									if($row['is_public'] == 0){
										echo "Editting";
									} else{
										echo "Public";
									}
									?>
										
									</td>

								</tr>
							<?php } ?>
						</tbody>
					</table>	
				</div>

			</div> <!-- end col 11 -->
		</div> <!-- END ROW -->

		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<ul class="pagination pagination-cover">
			<!-- BUTTON Previous -->
			<?php if ($current_page > 1 && $total_page > 1): ?>
				<li class="page-item"><a class="page-link" href="post-management.php?page=<?= $current_page-1 ?>">Previous</a></li>
			<?php endif ?>
			<!-- PAGINATION -->
			<?php for ($count = 1; $count <= $total_page; $count++) { ?>
				<?php if ($count == $current_page): ?>
					<li class="page-item"><a class="page-link active" href="post-management.php?page=<?= $count ?>"><?= $count ?></a></li>
				<?php else: ?>
					<li class="page-item"><a class="page-link" href="post-management.php?page=<?= $count ?>"><?= $count ?></a></li>
				<?php endif ?>

			<?php }?>	
			<!-- BUTTON NEXT -->
			<?php if ($current_page < $total_page && $total_page > 1): ?>
				<li class="page-item"><a class="page-link" href="post-management.php?page=<?= $current_page+1 ?>">Next</a></li>					
			<?php endif ?>

			</ul> <!-- END PAGINATION -->
			</div> <!-- END COL 4 -->
		</div> <!-- END ROW -->
	</div> <!-- END CONTAINER -->
<?php include_once("../inc/footer.php");?>