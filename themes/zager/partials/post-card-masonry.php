<div class="d-flex py-3 col-lg-6 col-md-12">
	<div class="card align-items-stretch w-100 overflow-hidden post-card <?php if ( is_sticky() ) echo ' border-primary'; ?>">
		<?php if ( has_post_thumbnail() ): ?>
			<a href="<?php echo esc_attr( get_the_permalink() ); ?>" class="overflow-hidden">
				<?php echo get_the_post_thumbnail( $post->ID, 'post-card', array( 'class' => 'card-img-top' ) ); ?>
			</a>
		<?php elseif( get_field( 'default_card_image', 'option' ) ): ?>
			<a href="<?php echo esc_attr( get_the_permalink() ); ?>" class="overflow-hidden">
				<?php echo wp_get_attachment_image( get_field( 'default_card_image', 'option' ), 'post-card', false, array( 'class' => 'card-img-top' ) ); ?>
			</a>
		<?php endif; ?>
		<?php if ( is_sticky() ) : ?>
			<div class="alert alert-info rounded-0" role="alert"><i class="far fa-star"></i> Featured</div>
		<?php endif; ?>
		<div class="card-body d-flex flex-column">
			<h2 class="card-title"><a href="<?php echo esc_attr( get_the_permalink() ); ?>"><?php echo get_the_title(); ?></a></h2>
			<div class="card-text">
				<?php the_excerpt() ?>
			</div>
			<small class="card-meta text-muted">
				<?php echo understrap_posted_on(); ?>
				<?php echo understrap_entry_footer(); ?>
			</small>
		</div>
		<a href="<?php echo esc_attr( get_the_permalink() ); ?>" class="card-action py-2 px-4 d-flex align-items-center justify-content-between">
			<span>Read More</span>
			<i class="fas fa-arrow-right float-right"></i>
		</a>
	</div>
</div>
