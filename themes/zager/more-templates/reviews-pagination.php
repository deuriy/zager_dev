<div class="Pagination hidden-smMinus">
	<?php if ($list <= 1) : ?>
		<a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowLeft BtnOutline-disabled Pagination_prev" href="#">Previous</a>
	<?php else : ?>
		<a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowLeft Pagination_prev" href="?list=<?=($list - 1)?><?=!(empty($guitar)) ? '&guitar=' . $guitar : ''?>">Previous</a>
	<?php endif; ?>


	<ul class="Pagination_list">
		<?php if ( empty($total) ) : ?>
			<li class="Pagination_item Pagination_item-current"><a class="Pagination_link" href="#">1</a></li>
		<?php else : ?>
			<?php for ($i = 1; $i <= $last; $i++) : ?>
				<?php if ($i === 1 || $i === $last || $i === $list || $i === ($list - 1) || $i === ($list + 1)) : ?>
					<li class="Pagination_item <?=($list === $i) ? 'Pagination_item-current' : '';?>"><a class="Pagination_link reviews-filter reviews-filter-list" href="<?php if($list !== $i):?>?list=<?=$i;?><?=!(empty($guitar)) ? '&guitar=' . $guitar : ''?><?php else: ?>#<?php endif; ?>"><?=$i;?></a></li>
				<?php elseif ( $i === ($list - 2) || $i === ($list + 2) ) : ?>
					<li class="Pagination_item-more">...</li>
				<?php endif; ?>
			<?php endfor; ?>
		<?php endif; ?>
	</ul>


	<?php if ($list >= $last) : ?>
		<a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowRight Pagination_next BtnOutline-disabled" href="#">Next</a>
	<?php else : ?>
		<a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowRight Pagination_next" href="?list=<?=($list + 1)?><?=!(empty($guitar)) ? '&guitar=' . $guitar : ''?>">Next</a>
	<?php endif; ?>
</div>
<!-- <a class="BtnYellow BtnYellow-loadMore LoadingPosts_btn" href="#">Load more</a>-->
