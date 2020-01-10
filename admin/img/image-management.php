<?php
	if (!isset($_SESSION))
	  {
	    session_start();
	  }
	 include_once("../inc/const.php");
	$user_level = "";
	include_once("../inc/permission.php");
	if (checkLogin($_SESSION['username']) && checkLogin($_SESSION['user_id']) && checkLogin($_SESSION['level']) ) {
		$user_level = $_SESSION['level'];
	} else {
		header('Location:_DOMAIN');
	}

?>
<?php 
	include_once("../inc/getDataFromDB.php");
	include_once("../inc/dbConfig.php");

	//TỔNG SỐ POST ĐỦ ĐIỀU KIỆN ĐĂNG
	$query = mysqli_query($conn, "SELECT COUNT(img_id) as total from images");
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

	$sql_select_img = "SELECT * FROM images ORDER BY img_id DESC LIMIT $start_post, $limit";
	$query_select_img = mysqli_query($conn,$sql_select_img);

?>

<?php include_once("../inc/header.php");?>
		.img-cover{
			height: 150px;
		}
		.card-cover{
			width: 290px;
			padding-left: 5px;
			padding-right: 5px;
			margin-top: 10px;
		
		}
		.card-body-cover{
			padding-left: 5px;
			padding-right: 5px;
		}
	  </style>
</head>
<body>
<?php include_once("../inc/nav-horizontal.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3>Quản lý hình ảnh </h3>
			<a href="add-image.php">
				<button type="button" class="btn-sm btn btn-dark">
					<span>Thêm</span> 
					<span class="fa fa-plus"></span>
				</button>
			</a>
		</div>
	</div>
	<div class="row">

		<?php while ($row = mysqli_fetch_array($query_select_img) ) {  ?>

		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

			<div class="card card-cover">
				<img class="card-img-top img-responsive img-cover" src="<?php echo _DOMAIN.$row['img_path'] ?>" alt="<?= $row['img_alt'] ?>">

				<div class="card-body card-body-cover">
					<div class="card-title">
						<span><?= $row['img_name'] ?></span>
						<span><?php  if($row['is_thumb'] == 1){
							echo '<span class="badge badge-info">thumb</span>';
						}
						?></span>
					</div> <!-- IMG TITLE -->

					<div class="form-inline">
						<input type="text" name="img_path"  class="form-control" value="<?php echo _DOMAIN.$row['img_path'] ?>" >
						<?php if ($row['is_thumb'] == 0): ?>
						<a href="delete-image.php?img_id=<?=$row['img_id'] ?>">
							<button type="button" class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>
						</a>
						<?php else: ?>
							<br>
							<p class="text-info">Xóa post để xóa thumb !</p>
						<?php endif ?>
						
					</div> <!-- IMG PATH AND DELETE IMG -->
					
					<div class="img-info">
						<span>Tình trạng:
							<?php
								if (file_exists("../../uploads/thumbnail/".$row['img_name']) || file_exists("../../uploads/image/".$row['img_name'])) { 
									$img_status = '<div class="badge badge-success">Tồn tại</div>';
								} else {
									$img_status = '<div class="badge badge-danger">Hỏng</div>';
								}
								echo $img_status;	
							?> 
						 </span><br>
						<span>Dung Lượng: <?= $row['img_size']/1024 ?> KB</span> <br>
						<span>Định dạng: <?= $row['img_type'] ?></span> <br>
						<span>alt Attribute: <?= $row['img_alt'] ?></span>
					</div> <!-- IMG INFO -->


				</div> <!-- end card-body -->
			</div> <!-- end-card -->
		</div> <!-- end -col -->
		
		<?php }?>

		
	</div> <!-- END ROW 1 -->


	<div class="row">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		<ul class="pagination pagination-cover">
		<!-- BUTTON Previous -->
		<?php if ($current_page > 1 && $total_page > 1): ?>
			<li class="page-item"><a class="page-link" href="index.php?page=<?= $current_page-1 ?>">Previous</a></li>
		<?php endif ?>
		<!-- PAGINATION -->
		<?php for ($count = 1; $count <= $total_page; $count++) { ?>
			<?php if ($count == $current_page): ?>
				<li class="page-item"><a class="page-link active" href="index.php?page=<?= $count ?>"><?= $count ?></a></li>
			<?php else: ?>
				<li class="page-item"><a class="page-link" href="index.php?page=<?= $count ?>"><?= $count ?></a></li>
			<?php endif ?>

		<?php }?>	
		<!-- BUTTON NEXT -->
		<?php if ($current_page < $total_page && $total_page > 1): ?>
			<li class="page-item"><a class="page-link" href="index.php?page=<?= $current_page+1 ?>">Next</a></li>					
		<?php endif ?>

		</ul> <!-- END PAGINATION -->
		</div> <!-- END COL 4 -->
		</div> <!-- END ROW -->
</div>


<?php include_once("../inc/footer.php"); ?>