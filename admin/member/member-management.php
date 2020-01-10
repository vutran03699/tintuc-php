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
include_once "../inc/dbConfig.php";
include_once("../inc/header.php");?>


	  </style>
</head>
<body>
	<?php include_once("../inc/nav-horizontal.php");?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<table class="table table-hover">
					<h4>Danh sách thành viên 
						<a href="add-member.php">
						<button type="button" class="btn-sm btn btn-dark">
							<span>Thêm</span> 
							<span class="fa fa-plus"></span>
						</button>
						</a>
					</h4>
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ tên</th>
							<th>Username</th>
							<th>Email</th>
							<th>Cấp độ</th>
							<th>Hành động</th>
						</tr>
					</thead> <!-- end table header -->
					<tbody>
						<?php 
							$stt = 0;
							$sql_show_table = "SELECT * FROM users";
							$query_show_table = mysqli_query($conn,$sql_show_table);
							while ($show_table = mysqli_fetch_array($query_show_table)) {
							    
						?>
						<tr>
							<td><?php $stt++; echo $stt;?></td>	
							<td><?php echo $show_table["name"];?></td>
							<td><?php echo $show_table["username"];?></td>
							<td><?php echo $show_table["email"];?></td>
							<td>
								<?php
									if($show_table['level'] == 1){
										echo 'Administrator';
									} else if($show_table['level'] == 2){
										echo 'Mod';
									} else{
										echo 'Undefine';
									}
								?>
							</td>
							<td>
								<a href="edit-member.php?id=<?php echo $show_table['id']; ?>">Sửa</a>
								<a href="delete-member.php?id=<?php echo $show_table['id']; ?>">Xóa</a>
							</td>
						</tr>
						<?php
							}
						?>
					</tbody> <!-- end table body -->
					
				</table><!--  end table -->
			</div>
	
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
				
		</div>
	</div>

<?php include_once("../inc/footer.php");?>