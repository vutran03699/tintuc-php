<?php
 session_start();
//kiểm tra người dùng đăng nhập chưa nếu chưa chuyển về trang login
 include_once("../inc/const.php");
include_once("../inc/permission.php");
 $level = "";

if (checkLogin($_SESSION['user_id']) ) {

	$level = $_SESSION['level'];

	if (!checkIsAdmin($level)) {
		header('Location:_DOMAIN/404.html');
	}
}

?>
<?php
	include_once("../inc/dbConfig.php");
	include_once("../inc/validForm.php");


	$name = "";
	$username = "";
	$password = "";
	$gender = "";
	$email = "";

	$nameEmpty= "";
	$usernameEmpty= "";
	$passwordEmpty= "";
	$emailEmpty= "";
	$genderEmpty= "";

	$userExisted = "";
	$addUserSucess = TRUE;

	if (isset($_POST["add"])) {
		$name = $_POST["name"];
		$username = $_POST["username"];
		$password = $_POST["pwd"];
		$gender = $_POST["gender"];
		$email = $_POST["email"];

		//check value is empty ?
		if (empty($name)) {
				$nameEmpty = valueIsEmpty("Họ tên");
			}	
		if (empty($username)) {
			$usernameEmpty = valueIsEmpty("Username");
		}
		if (empty($password)) {
			$passwordEmpty = valueIsEmpty("Password");
		}
		if (empty($gender)) {
			$genderEmpty = valueIsEmpty("Giới tính");
		}
		if (empty($email)) {
			$emailEmpty = valueIsEmpty("Email");
		} 
		//end check value is empty

		else {
			//check input XSS injection
			$name = checkInput($name);
			$username = checkInput($username);
			$password = checkInput($password);
			$gender = checkInput($gender);
			$email = checkInput($email);
			$md5 =md5($password);

			//check acc is existed ?
			$sql = "SELECT * FROM users WHERE username = '$username' ";
			$sql_checkExistUser = mysqli_query($conn,$sql);

			if (mysqli_num_rows($sql_checkExistUser) > 0) {
			 	$userExisted = "Tài khoản đã tồn tại !";
			 } 

			 else{

			 //add member to database
				$sql = "INSERT INTO users (name,
											username,
											password,
											gender,
											email
											) VALUES (

											'$name',
											'$username',
											'$md5',	
											'$gender', 
											'$email' ) ";
				$addmember_query = mysqli_query($conn,$sql);
				if (!$addmember_query) {
					$addUserSucess = FALSE;
					
				} else{
					$addUserSucess = TRUE;
					header("Location:member-management.php");
					
				}
			} /*end insert to database*/
			
		}
	} /*end process*/
	

?>
<?php 
include_once("../inc/header.php");?>


	  </style>
</head>
<body>


<?php include_once("../inc/nav-horizontal.php");?>

<!-- ERROR PROCESS -->
<?php if ($addUserSucess == TRUE && isset($_POST["add"]) ) {  ?>

	<div class="alert alert-sucess">Thêm thành viên thành công !</div>
<?php } 
	if ($addUserSucess == FALSE && isset($_POST["add"]) ) {?>
	<div class="alert alert-danger">Thêm thành viên thất bại !</div>
<?php }?>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<!-- <?php echo '<div class="alert alert-danger">'. $userExisted ."</div>"; ?> -->

				<form method="post" action="">
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
						<label for="">Password: <span class="compel">*</span></label>
						<input type="password" name="pwd"  class="form-control" id="pwd" value="<?php echo $password; ?>">
						<span class="value_empty"><?php echo $passwordEmpty;?></span>
					</div>
					

					<div class="form-group">
					<label for="gender">Giới tính: <span class="compel">*</span></label>
						<select class="form-control" name="gender" id="gender">
							<option value = "" ></option>
							<option value = "male" <?php echo ($gender=="male")?"selected":"";?> >Nam</option>
							<option value = "female" <?php echo ($gender=="female")?"selected":"";?> >Nữ</option>
							<option value = "other" <?php echo ($gender=="other")?"selected":"";?>>Khác</option>
						</select>
						<span class="value_empty"><?php echo $genderEmpty;?></span>
					</div>
					

					<div class="form-group">
						<label for="email">Email: <span class="compel">*</span></label>
						<input type="text" name="email" class="form-control" id="email" value="<?php echo $email; ?>">
						<span class="value_empty"><?php echo $emailEmpty;?></span>
					</div>
					
					<button type="submit" class="btn btn-info" name="add"><span>Thêm thành viên</span></button>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div> <!-- end row -->
	</div> <!-- end container -->

<?php include_once("../inc/footer.php");?>