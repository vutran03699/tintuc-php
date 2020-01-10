<?php
	session_start();
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
	include_once("../inc/dbConfig.php");


		$img_name = "";
		$img_size = 0;
		$img_type = "";
		$img_tmp = "";
		$img_path = "";
		$img_path = "";
		$img_alt = "";
		$target_dir = "";


		$uploadOK = TRUE;
		$errExtImg = "";
		$errSizeImg = "";
		$errExistsImg = "";
		$errNotImg = "";
		$maxSize = 0;

		$moveFileOk = TRUE;
		$uploadOK = TRUE;
?>

<?php 
	

	if (isset($_POST['upload']) ) {
		
		include_once("img-controler.php");
		
		if ($uploadOK == TRUE) {

			if (isset($_POST['img_alt']) ) {
				$img_alt = $_POST['img_alt'];
			}

			$sql_add_img = "INSERT INTO images(img_name,
												img_path,
												img_type,
												img_size,
												img_alt,
												is_thumb) VALUES (
												'$img_name',
												'$img_path',
												'$img_type',
												'$img_size',
												'$img_alt',
												'0') ";
			if(mysqli_query($conn,$sql_add_img) ){
				$uploadOK = TRUE;

				if (move_uploaded_file($img_tmp,$target_dir)) {
					$moveFileOk = TRUE;
					header("Location:image-management.php");
				} else {
					$moveFileOk = FALSE;
				}
			} else{
				$uploadOK = FALSE;
			}

			
		} 	/*END CHECK UPLOAD*/ else {
			$uploadOK = FALSE;
		}
	} 

?>

<?php include_once("../inc/header.php");?>


	  </style>
</head>
<body>
	<?php include_once("../inc/nav-horizontal.php");?>
		<!-- ---------------------DISPLAY ERROR----------------------------- -->
	
<div class="container-fuid">
	
	<div class="row">

	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="card">
				<img src="<?php echo '../style/img/prevew-img.png';?>" class="card-img-top img-responsive img-thumbnail" id="preview-img">
			</div>
	
	</div>	

	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

<?php 
	if ($moveFileOk == FALSE) {
?>	
			<div class="alert alert-danger alert-dismissable fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span><?php echo 'Xảy ra lỗi khi upload file !';?> </span>
			</div>
<?php }?>

<?php
	if ($uploadOK == FALSE) {
?>
			<div class="alert alert-danger alert-dismissable fade show">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<span><?php echo $errExtImg;?> </span>
				<span><?php echo $errSizeImg;?></span>
				<span><?php echo $errExistsImg;?></span>
				<span><?php echo $errNotImg;?></span>
			</div>
<?php
	}  
?>
			<div class="caption">
				<h3 class="text-center">Thêm ảnh</h3>
			</div>
			<form action="" method="post" enctype="multipart/form-data">

				<label>Chọn ảnh</label>
				<input type="file" class="form-control" name="img" id="img-upload">

				<label>Alt Attribute: </label>
				<input type="text" name="img_alt" class="form-control">
				<button class="btn btn-info btn-upload" type="submit" name="upload">Upload</button>
			</form>

	</div>

	</div> <!-- end-row -->
</div> <!-- end - container -->

<?php include_once("../inc/footer.php"); ?>
<script type="text/javascript">
	function readURL(input) {

	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#preview-img').attr('src', e.target.result);
	    }

	    reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#img-upload").change(function() {
	  readURL(this);
	});
</script>