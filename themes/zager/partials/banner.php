<?php
$page_id          = 0;
$image_id         = 0;
$banner_caption   = [];
$show_caption     = true;
$caption_headline = '';
$caption_content  = '';
$image_size       = 'banner-page';

// Determine which $page_id to use

if ( is_home() ) {
	$page_id = get_option( 'page_for_posts' );
}

if( is_page() || is_single() ) {
	$page_id = get_the_ID();
}

if ( is_archive() ) {
	$page_id = get_queried_object();
}

if ( is_search() || is_404() ) {
	$page_id = 'options';
}

$banner_type    = get_field( 'banner_type', $page_id );
$banner_caption = get_field( 'banner_caption', $page_id );


// If banner type is none, then abort output.
if( 'none' === $banner_type ) {
	return;
}

if( 'default' === $banner_type ) {
	$image_id = get_field( 'default_post_banner', 'option' );
}

if( 'featured' === $banner_type ) {
	$image_id = get_post_thumbnail_id( $page_id );
}

if( 'custom' === $banner_type ) {
	$image_id = get_field( 'banner_image', $page_id );
}

if( isset( $banner_caption ) && 'none' === $banner_caption['headline_type'] ) {
	$show_caption = false;
}

if( isset( $banner_caption ) && 'title' === $banner_caption['headline_type'] ) {
	$caption_headline =	get_the_title( $page_id );
	$caption_content = '';
}

if( isset( $banner_caption ) && 'custom' === $banner_caption['headline_type'] ) {
	$caption_headline = $banner_caption['caption_headline'];
	$caption_content = $banner_caption['caption_content'];
}

// If no image selected, then abort output.
if( 0 === (int) $image_id ) {
	return;
}

?>
<div class="banner-page" id="wrapper-banner">

	<?php if( 0 !== $image_id ) : ?>
		<?php echo wp_get_attachment_image( $image_id, $image_size ); ?>
	<?php endif; ?>

	<?php if( $show_caption ) : ?>
	<div class="caption">
		<?php if( $caption_headline ) : ?>
			<div class="heading"><?php echo $caption_headline; ?></div>
		<?php endif; ?>

		<?php if( $caption_content ) : ?>
			<div class="content"><?php echo $caption_content; ?></div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

</div>
