<?php
 session_start();
//kiểm tra người dùng đăng nhập chưa nếu chưa chuyển về trang login
include_once("../inc/permission.php");
include_once("../inc/const.php");
 $level = "";

if (checkLogin($_SESSION['user_id']) ) {

	$level = $_SESSION['level'];

	if (!checkIsAdmin($level)) {
		header('Location: _DOMAIN/404.html');
	}
}

?>

	<?php
		
		include_once("../inc/dbConfig.php");
		include_once("../inc/validForm.php");

		$id = "";
		$name = " ";
		$username = " ";
		$level = " ";

		$nameEmpty= "";
		$usernameEmpty= "";	
		$levelEmpty = "";

		$updateUserSucess = TRUE;

		if( isset($_GET["id"])) {
			$id = $_GET["id"];
			$sql_get_id = "SELECT * FROM users WHERE id = '$id' ";
			$query_get_id = mysqli_query($conn,$sql_get_id);

			while($get_info_user = mysqli_fetch_array($query_get_id) ){
				$name = $get_info_user['name'];
				$username = $get_info_user['username'];
				$level = $get_info_user['level'];
			}
		} else {
			header('Location: _DOMAIN/404.html');
		}
		
		if (isset($_POST["update"])) {
			//check value is empty ?
			$id_user = $_POST['id_user'];
			$name = $_POST['name'];
			$username = $_POST['username'];
			$level = $_POST['level'];

				if (empty($name)) {
						$nameEmpty = valueIsEmpty("Họ tên");
					}	
				if (empty($username)) {
					$usernameEmpty = valueIsEmpty("Username");
				} //end check value is empty
				
				if (empty($level)) {
					$levelEmpty = valueIsEmpty("Cấp độ");

				} else {

					$name = checkInput($name);
					$username = checkInput($username);
					$password = checkInput($password);
					$gender = checkInput($gender);
					$email = checkInput($email);

					$sql_update = "UPDATE users SET name = '$name',
													username = '$username',
													level = '$level' 
													WHERE id = '$id_user' ";
					if(mysqli_query($conn,$sql_update)){
						header('Location:member-management.php');
					} else {
						$updateUserSucess = FALSE;
					}
					
				
				} /*end process*/
			} 
			
			
		

	?>
<?php include_once("../inc/header.php");?>


	  </style>
</head>
<body>


<?php include_once("../inc/nav-horizontal.php");?>

<!-- ERROR PROCESS -->
<?php if ($updateUserSucess == TRUE && isset($_POST["update"]) ) {  ?>

	<div class="alert alert-sucess">Thay đổi thành công !</div>
<?php } 
	if ($updateUserSucess == FALSE && isset($_POST["update"]) ) {?>
	<div class="alert alert-danger">Thay đổi thất bại !</div>
<?php }?>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">

				<form method="post" action="edit-member.php">
					<input type="hidden" name="id_user" value="<?php echo $id;?>">

					<div class="form-group">
						<label for="name">Họ tên: <span class="compel">*</span></label>
						<input type="text" name="name"  class="form-control" id="name" value="<?php echo $name; ?>" >
						<span class="value_empty"><?php echo $nameEmpty;?></span>
					</div>
					

					<div class="form-group">
						<label for="">Username: <span class="compel">*</span></label>
						<input type="text" name="username"  class="form-control" id="username" value="<?php echo $username; ?>">
						<span class="value_empty"><?php echo $usernameEmpty;?></span>
					</div>
					
					
					<div class="form-group">
						<label for="level">Cấp độ: <span class="compel">*</span></label>
						<select class="form-control" name="level" id="level">
							<option value = "" ></option>
							<option value = "1" <?php echo ($level==1)?"selected":"";?> >Administrator</option>
							<option value = "2" <?php echo ($level==2)?"selected":"";?> >Mod</option>
						</select>
						<span class="value_empty"><?php echo $levelEmpty;?></span>
					</div>

					
					<button type="submit" class="btn btn-info" name="update"><span>Lưu</span></button>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div> <!-- end row -->
	</div> <!-- end container -->

<?include_once("../inc/footer.php");?>