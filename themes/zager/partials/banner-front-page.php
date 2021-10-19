<?php

$image_id         = 0;
$banner_caption   = array();
$show_caption     = true;
$caption_headline = '';
$caption_content  = '';
$image_size       = 'banner-front-page';

$banner_type    = get_field( 'banner_type' );
$banner_caption = get_field( 'banner_caption' );

// If banner type is none, then abort output.
if ( 'none' === $banner_type ) {
	return;
}

if ( 'default' === $banner_type ) {
	$image_id = get_field( 'default_page_banner', 'option' );
}

if ( 'featured' === $banner_type ) {
	$image_id = get_post_thumbnail_id();
}

if ( 'custom' === $banner_type ) {
	$image_id = get_field( 'banner_image' );
}

if ( isset( $banner_caption ) && 'none' === $banner_caption['headline_type'] ) {
	$show_caption = false;
}

if ( isset( $banner_caption ) && 'title' === $banner_caption['headline_type'] ) {
	$caption_headline =	get_the_title();
	$caption_content = '';
}

if ( isset( $banner_caption ) && 'custom' === $banner_caption['headline_type'] ) {
	$caption_headline = $banner_caption['caption_headline'];
	$caption_content = $banner_caption['caption_content'];
}

// If no image selected, then abort output.
if ( 0 === $image_id ) {
	return;
}

?>
<div class="banner-page" id="wrapper-banner">

	<?php if ( 0 !== $image_id ) : ?>
		<?php echo wp_get_attachment_image( $image_id, 'banner-page' ); ?>
	<?php endif; ?>

	<?php if ( $show_caption ) : ?>
	<div class="caption">
		<?php if ( $caption_headline ) : ?>
			<div class="heading"><?php echo $caption_headline; ?></div>
		<?php endif; ?>

		<?php if ( $caption_content ) : ?>
			<div class="content"><?php echo $caption_content; ?></div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

</div>
