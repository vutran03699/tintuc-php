<?php
	session_start();
?>

	<?php

		include "../admin/inc/dbConfig.php";
		include "../admin/inc/validForm.php";

		$username = "";
		$password = "";

		$usernameEmpty= "";
		$passwordEmpty= "";
		
		//$passwordmd5 = $password;

		$loginSucess = TRUE;

		
		if (isset($_POST["login"])) {
			$username = $_POST["username"];
			$password = $_POST["pwd"];

			if (empty($username)) {
				$usernameEmpty = valueIsEmpty("Tên đăng nhập");
			}

			if (empty($password)) {
				$passwordEmpty = valueIsEmpty("Mật khẩu");	
			} /*end check empty form*/
			 else {
			 	
				$username = checkInput($username);
				$password = checkInput($password);
				$md5 =md5($password);

				$sql_login = "SELECT id,username,name,password,level FROM users WHERE username = '$username' AND password = '$md5' ";
				$query_login = mysqli_query($conn,$sql_login);


				if (!$query_login || mysqli_num_rows($query_login) == 0) {
					$loginSucess = FALSE;
				} else {

					while ( $session_login = mysqli_fetch_array($query_login) ) {
			    		$_SESSION["user_id"] = $session_login["id"];
						$_SESSION['username'] = $session_login["username"];
						$_SESSION['level'] = $session_login["level"];
						$_SESSION['name'] = $session_login["name"];
	    			}
					
					header("Location:index.php");

				}
			} /*end check username and password*/
		}
	?>
	<?php include_once("inc/header.php"); ?>
		  </style>
</head>
<body>
	<div class="container">
		<?php if ( $loginSucess == FALSE && isset($_POST["login"]) ): ?>
			<div class="alert alert-danger">Đăng nhập thất bại. Thử lại!</div>
		<?php endif ?>

		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
			
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h3 class="text-center">Đăng nhập</h3>
				<hr>
				<div class="login-form">
					<form method="post" action="login.php">
						<div class="form-group">
							<label for="username">Username: <span class="compel">*</span></label>
							<input type="text" class="form-control" id="username" name="username" value="<?php echo $username;?>">
							<span class="value_empty"><?php echo $usernameEmpty;?></span>
						</div>

						<div class="form-group">
							<label for="pwd">Password: <span class="compel">*</span></label>
							<input type="password" class="form-control" id="password" name="pwd" value="<?php echo $password;?>">
							<span class="value_empty"><?php echo $passwordEmpty;?></span>
						</div>

						<button type="submit" name="login" class="btn btn-info"><span class="login">Login</span></button>

					</form>
					<p>
						
					</p>
				</div>
			</div> <!-- end col login -->

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
				
		</div> <!-- end row -->
	</div> <!-- end container -->

<?php include_once("../admin/inc/footer.php");?>