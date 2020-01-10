<?php /* include_once("../inc/header.php");*/ ?>
<style type="text/css">
	.nav-vertical-container{
		position: fixed;
		width: 110px;
		height: 100vh;
		background: #212529;
	}
	.text-sm{
		font-size: 12px;
	}
</style>
<div class="nav-vertical-container">
		<ul class="navbar-nav">
			<li class="nav-item " data-toggle="collapse" data-target="#post-action">
				<a href="#" class="nav-link text-light text-left nav-item-margin ">
					<i class="fas fa-edit"></i> Post</a></li>
		</ul>
		<div id="post-action" class="collapse ">
			<ul class="list-group none-border-radius">
			  <li class="list-group-item"><a href="" class="text-sm text-dark">Add Post</a></li>
			  <li class="list-group-item"><a href="" class="text-sm text-dark">All Post</a></li>
			</ul>
		</div>

		<ul class="navbar-nav">
			<li class="nav-item " data-toggle="collapse" data-target="#category-action"><a href="#" class="nav-link text-light text-left nav-item-margin"><i class="far fa-list-alt"></i> Category</a></li>
		</ul>
		<div id="category-action" class="collapse">
			<ul class="list-group none-border-radius">
			  <li class="list-group-item"><a href="" class="text-sm text-dark">All Category</a></li>
			  <li class="list-group-item"><a href="" class="text-sm text-dark">Add Category</a></li>
			</ul>
		</div>

</div>
<?php /*include_once("../inc/footer.php");*/ ?>