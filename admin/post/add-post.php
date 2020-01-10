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
	include_once("../inc/EditContent.php");
	

	$username_edit = "";
	$id_user_edit = 0;
	if (isset($_SESSION['username']) ) {
		$username_edit = $_SESSION['username'];
	} 
	
	if (isset($_SESSION['user_id']) ) {
		$id_user_edit = $_SESSION['user_id'];
	} 
	//$createdate = now();
	$updatedate =  " ";

	$thumb_name = "";
	$thumb_size = 0;
	$thumb_type = "";
	$thumb_tmp = "";
	$thumb_path = "";
	$thumb_path = "";
	$thumb_alt = "";
	$target_dir = "";


	$uploadOK = TRUE;
	$errExtThumb = "";
	$errSizeThumb = "";
	$errExistsThumb = "";
	$errNotThumb = "";

	$post_id = "";
	$post_title = "";
	$post_content = "";
	$isPublic = 0;
	$post_seo_title = "" ;
	$post_description = "";
	$post_keyword = "";
	$post_category = 0;
	$post_slug = "";

	$publishOK = TRUE;

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		if (isset($_POST['publish'])) {

			$post_title = $_POST['post_title'];
			$post_content = $_POST['post_content'];
			$post_seo_title = $_POST['post_seo_title'];
			$post_description = $_POST['post_description'];
			$post_keyword = $_POST['post_keyword'];
			
			$post_slug = toSlug($post_title);

			if (isset($_POST['post_public'])) {
				$isPublic = $_POST['post_public'];
			}

			if (isset($_POST['post_category'])) {
				$post_category = $_POST['post_category'];
			}

			$thumb_alt = toSlug($post_title);
			

			

			include_once("upload-thumb-controler.php");

			if ($uploadOK == TRUE) {
			

			// image process-----------------------------------
			$sql_add_img = "INSERT INTO images(img_name,
										img_path,
										img_type,
										img_size,
										img_alt,
										is_thumb) VALUES ('$thumb_name',
														'$thumb_path',
														'$thumb_type',
														'$thumb_size',
														'$thumb_alt',
														'1')";

			$query_add_img = mysqli_query($conn,$sql_add_img);

			$sql_getImageId = "SELECT * FROM images";
			$query_getImageId = mysqli_query($conn,$sql_getImageId);

			while ($add_img = mysqli_fetch_array($query_getImageId)) {
				$thumb_id = $add_img['img_id'];
			    $thumb_name = $add_img['img_name'];
			    $thumb_path = $add_img['img_path'];
			}

			move_uploaded_file($thumb_tmp,$target_dir);
			
			//INSERT POST INFO TO DB----------------------------------------
			$sql_add_post = "INSERT INTO posts(
												post_title,
												post_content,
												id,
												img_id,
												is_public,
												createdate,
												updatedate,
												seo_title,
												post_description,
												key_word,
												category_id,
												post_slug ) VALUES (
												'$post_title',
												'$post_content',
												'$id_user_edit',
												'$thumb_id',
												'$isPublic',
												 now(),
												 now(),				
												'$post_seo_title',
												'$post_description',
												'$post_keyword',
												'$post_category',
												'$post_slug'
												)";

				if ($query_add_post = mysqli_query($conn,$sql_add_post) ) {

					//GET ID FROM POST AND USE GET METHOD TO EDIT POST
					$post_id = mysqli_insert_id($conn);
					header('Location:edit-post.php?post_id='.$post_id);
					//--------------------
				} else {
					$publishOK = FALSE;
				}

			 } else {
				$uploadOK = FALSE;			
			}
		}
	}

?>
<?php include_once("../inc/header.php"); ?>
		  </style>
</head>
<body>

	<?php include_once("../inc/nav-horizontal.php");?>
	<!-- ---------------------DISPLAY ERROR----------------------------- -->
	<?php
		if ($publishOK == FALSE) {
	?>
		<div class="alert alert-danger alert-dismissable fade show">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<span>Publish không thành công !</span>
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
				<span><?php echo $errNotThumb;?></span>
			</div>
	<?php
		}  
	?>
			
		<div class="container-fluid">
			<div class="row ">
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

					<form method="post" action="" enctype="multipart/form-data">

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
							      		<span class="text-dark">SEO</span> 
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
											<label for="">Keyword: </label>
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
						      		Thời gian đăng:
						      	</span> <br>
						      	<span class="post-info-item"><i class="fa fa-user" style="font-size:14px;"></i> Người đăng: <?php echo $username_edit;?></span><br>
						      	<span class="post-info-item"><i class="fa fa-cog" style="font-size:14px;"></i> Trạng thái: <?php echo ($isPublic == 1)?"Public":"Editing"; ?></span><br>

								<input type="submit" name="publish" class="btn btn-sm btn-info"  value="Publish">

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
						      		<?php if (isset($_POST['post_thumb']) && isset($thumb_path)) {
						      		?>
										<img src="<?php echo $thumb_path;?>" alt="<?php echo $post_keyword;?>" class="thumbnail" id="preview-thumb">
						      		<?php
						      			}
						      		?>
						      		
						      		<p>Thumb name: <?php echo (!empty($thumb_name))?"$thumb_name":"Undefine" ;?></p>
						      	</div>	
						      
						      	<div class="form-group">
									 <input type="file" name="post_thumb" accept="image/*" class="form-control">
								</div>
								

						      </div>
						    </div>
						</div> <!-- END THUMBNAIL -->

	  				</div> <!-- end col 3 -->
				</form> <!-- END FORM -->
			</div> <!-- end row -->
		</div><!-- end container-fluid -->

<?php include_once("../inc/footer.php");?>
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script> 
	<script>
							   
	    CKEDITOR.replace( 'post_content' );
	</script>

		