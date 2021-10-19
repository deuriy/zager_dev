<?php
$action_blocks = $field['action_blocks'];
?>
<section class="page-block">
	<div class="container">
		<div class="row text-center pb-0 pb-lg-4">
			<div class="col-12">
				<h1>Call to action</h1>
			</div>
		</div>
		<?php if( $field['action_blocks'] ) : ?>
			<div class="row text-center pt-4 pt-md-5">
				<?php foreach( $field['action_blocks'] as $block ) : ?>
					<div class="col-12 col-sm-10 col-md-6 col-lg-4 m-sm-auto">
						<?php if( $block['image'] ) : ?>
							<?php echo wp_get_attachment_image( $block['image'], 'thumbnail' ); ?>
						<?php endif; ?>
						<?php if( $block['title'] ) : ?>
							<h3><?php echo $block['title']; ?></h3>
						<?php endif; ?>
						<?php if( $block['content'] ) : ?>
							<?php echo $block['content']; ?>
						<?php endif; ?>
						<?php if( $block['button'] ) : ?>
							<?php
							$button = $block['button'];
							$button_url = $button['url'];
							$button_title = $button['title'];
							$button_target = $button['target'] ? $button['target'] : '_self';
							?>
							<p class="mt-3"><a class="btn btn-secondary" href="<?php esc_attr( $button_url ); ?>" target="<?php esc_attr( $button_target ); ?>"><?php echo $button_title; ?></a></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
