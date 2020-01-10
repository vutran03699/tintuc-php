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