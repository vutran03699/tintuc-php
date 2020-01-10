<?php include_once("const.php"); ?>
<div class="nav-horizontal-container">
	<div class="row no-gutter">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			
		
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			  <!-- Brand -->
				<a class="navbar-brand" href="<?= _DOMAIN_ADMIN ?>">Dashboard</a>

				<!-- Links -->
				<ul class="navbar-nav">				
				<!-- Dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="<?= _DOMAIN_ADMIN ?>/post/post-management.php" data-toggle="dropdown">
						 Post
						</a>
						<div class="dropdown-menu cover-dropdown">
							<a class="dropdown-item dropdown-item-cover" href="<?= _DOMAIN_ADMIN ?>/post/add-post.php"><i class="far fa-plus-square"></i> Add Post</a>
							<a class="dropdown-item dropdown-item-cover" href="<?= _DOMAIN_ADMIN ?>/post/post-management.php"><i class="far fa-list-alt"></i> All Post</a>
						</div>
					</li>
				<!-- -------------------------- -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#dropdown-cate" data-toggle="dropdown">
						 Category
						</a>
						<div class="dropdown-menu cover-dropdown" id="dropdown-cate">
							<a class="dropdown-item dropdown-item-cover" href="<?= _DOMAIN_ADMIN ?>/category/category-management.php"><i class="far fa-plus-square"></i> Add Category</a>
							<a class="dropdown-item dropdown-item-cover" href="<?= _DOMAIN_ADMIN ?>/category/category-management.php"><i class="far fa-list-alt"></i> All Category</a>
						</div>
					</li>
				<!-- -------------------------- -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#dropdown-img" data-toggle="dropdown">
						 Image
						</a>
						<div class="dropdown-menu cover-dropdown" id="dropdown-img">
							<a class="dropdown-item dropdown-item-cover" href="<?= _DOMAIN_ADMIN ?>/img/add-image.php"><i class="far fa-plus-square"></i> Add Image</a>
							<a class="dropdown-item dropdown-item-cover" href="<?= _DOMAIN_ADMIN ?>/img/image-management.php"><i class="far fa-list-alt"></i> All Image</a>
						</div>
					</li>

					<?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1): ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#dropdown-member"  data-toggle="dropdown">
							 Member
							</a>
							<div class="dropdown-menu cover-dropdown" id="dropdown-member">
								<a class="dropdown-item dropdown-item-cover" href="<?= _DOMAIN_ADMIN ?>/member/member-management.php"><i class="far fa-list-alt"></i> Member Management</a>
							</div>
						</li>
					<?php endif ?>
				</ul>
			</nav>
		</div> <!-- end col -->


		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
			
			
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<ul class="navbar-nav">
			
			</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
					
						<a class="nav-link dropdown-toggle" href="#dropdown-user" id="navbardrop" data-toggle="dropdown">
						
						<?php if ( isset($_SESSION['name']) ): ?>
						Hi |	<?= $_SESSION['name'] ?>		
						<?php endif ?>	
						
						</a>
						<div class="dropdown-menu cover-dropdown" id="dropdown-user">
							<a class="dropdown-item dropdown-item-cover" href="<?= _DOMAIN_ADMIN ?>/sign-out.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
						</div>
					</li>
				</ul>
			</nav>
		</div> <!-- end col 2 -->
	</div> <!-- end row -->
</div> <!-- end nav horizontal -->