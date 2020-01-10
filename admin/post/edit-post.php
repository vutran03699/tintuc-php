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

	if(!isset($_GET['post_id']) ){
		header('Location:_DOMAIN_ADMIN/post/post-management.php');
	}

?>
	<?php
		include_once("../inc/dbConfig.php");
		include_once("../inc/EditContent.php");
		include_once("../inc/validForm.php");
		date_default_timezone_set("Asia/Bangkok");

		$editor_id = "";
		$editor_name = "";


		$thumb_id = "";
		$thumb_name = "";
		$thumb_path = "";
		$thumb_type = "";
		$thumb_size = "";
		$is_thumb = 1;
		$uploadOK = TRUE;
		$old_thumb_path = "";


		$errExtThumb = "";
		$errSizeThumb = "";
		$errExistsThumb = "";
		$errUploadFailed = "";

		$post_id = "";
		$post_title = "";
		$post_content = "";
		$isPublic = 0;
		$post_seo_title = "" ;
		$post_description = "";
		$post_keyword = "";
		$post_category = 0;
		$post_thumb = "";
		$post_editor = "";
		$create_date = "";
		$update_date = "";
		$post_slug = "";

		$updateOK = TRUE;
	?>

<!-- ---------------------------------------SHOW DATA-------------------------------------------------- -->
	<?php

		if(isset($_GET['post_id']) ){

			$post_id = $_GET['post_id'];

			$sql_GetPostId = "SELECT * FROM posts WHERE post_id = '$post_id' ";
			$query_GetPostId = mysqli_query($conn,$sql_GetPostId);
			 
			 //PROCESS CONTENT POST
			while ($getPostInfo = mysqli_fetch_array($query_GetPostId) ) {
			    $post_title = $getPostInfo['post_title'];
				$post_content = $getPostInfo['post_content'];
				$isPublic = $getPostInfo['is_public'];
				$post_seo_title = $getPostInfo['seo_title'];
				$post_description = $getPostInfo['post_description'];
				$post_keyword = $getPostInfo['key_word'];
				$post_editor = $getPostInfo['id'];
				$post_category = $getPostInfo['category_id'];
				$post_thumb = $getPostInfo['img_id'];
				$create_date = $getPostInfo['createdate'];
				$update_date = $getPostInfo['updatedate'];
			}

			//PROCESS EDITOR
			$sql_getUserInfo = "SELECT * FROM users WHERE id = '$post_editor' ";
			$query_getUserInfo = mysqli_query($conn,$sql_getUserInfo);

			while ($getUserInfo = mysqli_fetch_array($query_getUserInfo) ) {
			    $editor_id = $getUserInfo['id'];
			    $editor_name = $getUserInfo['name'];
			}

			//PROCESS THUMBNAIL
			$sql_getImgInfo = "SELECT * FROM images WHERE img_id = '$post_thumb' ";
			$query_getImgInfo = mysqli_query($conn,$sql_getImgInfo);

			while ($getImgInfo = mysqli_fetch_array($query_getImgInfo) ) {
				$thumb_id = $getImgInfo['img_id'];
			    $thumb_name = $getImgInfo['img_name'];
			    $thumb_path = $getImgInfo['img_path'];
			    $old_thumb_path = $getImgInfo['img_path'];
			}
		} /*END SHOW INFO CONTETNT AFTER EDIT*/ 

	?>

<!-- ---------------------------------------UPDATE DATA TO DATABASE-------------------------------------------------- -->
	<?php
		//UPDATE DATA TO DATABASE
		if (isset($_POST['update']) ) {

				$post_id = $_POST['post_id'];
				$post_title = $_POST['post_title'];
				$post_content = $_POST['post_content'];
				
				$isPublic = $_POST['post_public'];

				$post_seo_title = $_POST['post_seo_title'];
				$post_description = $_POST['post_description'];
				$post_keyword = $_POST['post_keyword'];

				if (isset($_POST['post_category']) ) {
					$post_category = $_POST['post_category'];
				} 
				
				$post_thumb = $_POST['thumb_id'];
				$update_date = date ("Y-m-d H:i:s");
				$post_slug = toSlug($post_title);

				//update image if user selec new thumb------------------------------------------------

				if (isset($_FILES["post_thumb"]) && $_FILES["post_thumb"]["error"] == 0) {

					
					$thumb_name = $_FILES['post_thumb']['name'];
					$thumb_size = $_FILES['post_thumb']['size'];
					$thumb_type = $_FILES['post_thumb']['type'];
					$thumb_error = $_FILES["post_thumb"]["error"];
					$thumb_tmp = $_FILES['post_thumb']['tmp_name'];

					$target_dir = "../../uploads/thumbnail/".basename($thumb_name);
					$thumb_path = '/uploads/thumbnail/'. basename($thumb_name);
					$uploadOK = TRUE;
					$thumbFileType = strtolower(pathinfo($thumb_name,PATHINFO_EXTENSION));
				
					if (!checkExtImg($thumb_name)) {
						$uploadOK = FALSE;
						$errExtThumb = "Lỗi: Ảnh không đúng định dạng !";
					}

					$maxsize = 2 * 1024 * 1024 ;
					if (!checkSizeOfFile($thumb_size,$maxsize)) {
						$uploadOK = FALSE;
						$errSizeThumb = "Lỗi: size ảnh lớn hơn cho phép ".$maxsize/(1024*2)." MB !";
					}
					

					if (file_exists("../../uploads/thumbnail/".$thumb_name)) {
						$uploadOK = FALSE;
						$errExistsThumb = "Tên ảnh đã tồn tại !";
					} 

					if ($uploadOK == TRUE) {
						

						$thumb_alt = toSlug($post_title);
						$sql_updateImg = "UPDATE images SET img_name = '$thumb_name',
															img_path = '$thumb_path',
															img_size = '$thumb_size',
															img_type = '$thumb_type',
															img_alt = '$thumb_alt',
															is_thumb = '$is_thumb' WHERE img_id = '$post_thumb' ";

						if (!mysqli_query($conn,$sql_updateImg)) {
							$errUploadFailed = "Upload ảnh không thành công";
						} else {
							unlink('../..'.$old_thumb_path);
							move_uploaded_file($thumb_tmp,$target_dir);

						}
					}

				}

			
				$sql_updatePost = "UPDATE posts SET post_title = '$post_title',
											post_content = '$post_content',
											category_id = '$post_category',
											img_id = '$post_thumb', 
											is_public = '$isPublic', 
											updatedate = '$update_date',
											seo_title = '$post_seo_title',
											post_description = '$post_description',
											key_word = '$post_keyword', 
											post_slug = '$post_slug' WHERE post_id = '$post_id' ";
			
				if (mysqli_query($conn,$sql_updatePost)) {
					header('Location:edit-post.php?post_id='.$post_id);	
				} else {
					$updateOK = FALSE;
				}
				
		}	
	?>


<?php include_once("../inc/header.php"); ?>
		
		  </style>

</head>
<body>
	
<?php include_once("../inc/nav-horizontal.php");?>	
<?php
	if ($updateOK == FALSE) {
?>
	<div class="alert alert-danger alert-dismissable fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<span>Update không thành công !</span>
	</div>
<?php
	}  
?>

<?php
	if ($uploadOK == FALSE) {
?>
		<div class="alert alert-danger alert-dismissable fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
			<span><?php echo $errExtThumb;?> </span>
			<span><?php echo $errSizeThumb;?></span>
			<span><?php echo $errExistsThumb;?></span>
			<span><?php echo $$errUploadFailed;?></span>
		</div>
<?php
	}  
?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<form method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="post_id" value="<?php echo $post_id;?>">

						<!-- ------------------------COMMON CONTENT OF POST------------------------------------- -->
						<div class="add-new-post">
							<h3>Add New Post 
				  				<a href="add-post.php">
				  					<button type="button" class="btn-sm btn btn-dark">
				  						<span>Thêm</span> 
				  						<span class="fa fa-plus"></span>
				  					</button>
				  				</a>
			  				</h3>
						</div> <!-- end add-new-post -->
						
						<div class="content-element">


							<div class="form-group">
		  						<input type="text" name="post_title" id="post_title" class="form-control" placeholder="Tiêu đề" value="<?php echo $post_title; ?>" >
			  				</div>

							<div>
								<a href="<?php echo '../img/add-image.php';?>" target="_BLANK">
				  					<button type="button" class="btn-sm btn btn-outline-dark mr-bottom">
				  						<span>Thêm ảnh</span> 
				  						<span class="fa fa-plus"></span>
				  					</button>
				  				</a>
			  				</div>

						    <div class="form-group">
						      <textarea class="form-control" id="post_content" name="post_content"><?php echo $post_content; ?></textarea>
						    </div>
								
				  			

							<div class="form-inline">
								<label for="post_public">Public:</label>
								<input type="checkbox" name="post_public" class="form-control" id="post_public" value="1" <?php echo ($isPublic==1)?"checked":" "; ?> >
			  				</div>
						</div> <!-- end content-element -->

						<hr>

						<!-- /---------------------------SEO--------------------------------/ -->
						<div class="seo-element">
							<div class="card">
							    <div class="card-header">
							      <a class="card-link" data-toggle="collapse" href="#seo">
							      	<h6>
							      		<span class="text-dark">Yoast SEO</span> 
							      		<span><i class=" text-dark pull-right fa fa-caret-down "></i></span>
							      	</h6>
							      </a>
							    </div>

							    <div id="seo" class="collapse show">
							      <div class="card-body">
							      	<div class="form-group">
					
										<div class="form-group">
											<label for="">SEO title: </label>
											<input type="text" name="post_seo_title" class="form-control" value="<?php echo $post_seo_title; ?>" >
										</div>

										<div class="form-group">
											<label for="">Meta description: </label>
											<textarea class="form-control" name="post_description"><?php echo $post_description; ?></textarea>
										</div>

										<div class="form-group">
											<label for="">Focus keyword: </label>
											<input type="text" name="post_keyword" class="form-control" value="<?php echo $post_keyword; ?>" >
										</div>	

									</div>
							      </div>
							    </div> <!-- end  seo collapse -->
							 </div> <!-- end yoast SEO  -->
						</div> <!-- end seo-element -->

					</div> <!-- end col-9 -->
					
					<!-- -----------------------COMMON INFO------------------------------------ -->
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				
						<div class="card">
						    <div class="card-header">
						      <a class="card-link" data-toggle="collapse" href="#post-info">
						      	<h6>
						      		<span class="text-dark">Thông tin chung</span> 
						      		<span><i class="text-dark pull-right fa fa-caret-down "></i></span>
						      	</h6>
						      </a>
						    </div>

						    <div id="post-info" class="collapse show">
						      <div class="card-body">
						      	<span class="post-info-item">
						      		<i class="fa fa-calendar" style="font-size:14px;"></i> 
						      		Thời gian đăng: <?php echo $create_date;?>
						      	</span> <br>
								
						      	<span class="post-info-item">
						      		<i class="fa fa-calendar" style="font-size:14px;"></i> 
						      		Lần  sửa cuối: <?php echo $update_date;?>
						      	</span> <br>

						      	<span class="post-info-item"><i class="fa fa-user" style="font-size:14px;"></i> Người đăng: <?php echo $editor_name;?></span><br>

						      	<span class="post-info-item"><i class="fa fa-cog" style="font-size:14px;"></i> Trạng thái: <?php echo ($isPublic == 1)?"Public":"Editing"; ?></span><br>

								<input type="submit" name="update" class="btn btn-sm btn-info"  value="Update">

						      </div>
						    </div>
						 </div> <!-- end post-info -->

						<hr>
								<!-- ------------------CATEGORIES------------------------------ -->
						<div class="card">
							<div class="card-header">
							  <a class="card-link" data-toggle="collapse" href="#post-category">
							  	<h6>
							  		<span class="text-dark">Categories</span> 
							  		<span><i class=" text-dark pull-right fa fa-caret-down "></i></span>
							  	</h6>
							  </a>
							</div>

							<div id="post-category" class="collapse show">
							  <div class="card-body">
							 	
						 		<?php 

						 			$sql_show_category = "SELECT * FROM categories";
						 			$query_show_category = mysqli_query($conn,$sql_show_category);
						 			while ($show_category = mysqli_fetch_array($query_show_category) ) {
						 		?>
						 		
								<div class="form-inline">
									<input type="checkbox" name="post_category" class="form-control form-category" 
										value="<?php echo $show_category['category_id']?>" 
										<?php echo ($post_category == $show_category['category_id'] )?"checked":" ";?> >
							 		<span><?php echo $show_category['category_name']; ?></span>
								 	
								</div>

						 		<?php 
						 			}
						 		?>
									 
							  </div>
							</div>
						</div> <!-- end post category <-->

						<!-- -----------------------THUMBNAILS----------------------------------- -->
						<hr>

						<div class="card">
						    <div class="card-header">
						      <a class="card-link" data-toggle="collapse" href="#post_thumb">
						      	<h6>
						      		<span class="text-dark">Thumbnail: </span> 
						      		<span><i class="text-dark pull-right fa fa-caret-down "></i></span>
						      	</h6>
						      </a>
						    </div>

						    <div id="post_thumb" class="collapse show">
						      <div class="card-body">

						      	<div class="thumb-info">
						      		<img src='<?php echo _DOMAIN.$thumb_path;?>' 
										alt = '<?php echo $post_keyword; ?> '
						      			class="img-thumbnail">
						      		<p>Thumb name: <?php echo $thumb_name;?></p>
						      	</div>	
						      
						      	<div class="form-group">

									 <input type="file" name="post_thumb" accept="image/*" class="form-control">
									 <input type="hidden" name="thumb_id" value="<?php echo $thumb_id;?>">
								</div>
								

						      </div>
						    </div>
						</div> <!-- END THUMBNAIL -->

	  				</div> <!-- end col 3 -->
				</form> <!-- END FORM -->
			</div> <!-- end row -->
		</div><!-- end container-fluid -->
 	<?php include_once"../inc/footer.php"; ?>


	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script> 
	<script>
							   
	    CKEDITOR.replace( 'post_content' );
	</script>


		