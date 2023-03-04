<?php if ( $pagination['status'] !== 'off' ): ?>

	<?php $get = ( isset($_GET['tag']) && !empty($_GET['tag']) ) ? 'tag=' . $_GET['tag'] . '&' : ''; ?>
	
	<div class="section-pagination">
		<?php if ( $pagination['page_number'] > 1 ): ?>
			<div class="section-pagination__item">
				<a class="pagination-button" href="?<?=$get?>page=<?=($pagination['page_number'] - 1)?>">назад</a>
			</div>
		<?php endif ?>

		<?php foreach ($pagination['pagelist'] as $page => $name) : ?>
			<div class="section-pagination__item">
				<a class="pagination-button<?php echo $page == $pagination['page_number'] ? ' active' : '' ?>" href="?<?=$get?>page=<?=$page?>"><?=$name?></a>
			</div>			
		<?php endforeach; ?>

		<?php if ( $pagination['page_number'] < $pagination['number_of_pages'] ): ?>
			<div class="section-pagination__item">
				<a class="pagination-button" href="?<?=$get?>page=<?=($pagination['page_number'] + 1)?>">вперед</a>
			</div>
		<?php endif ?>
	</div>

<?php endif; ?>