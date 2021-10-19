<?php
/**
 * The sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'sidebar-post' ) ) {
	return;
}
?>

<div class="widget-area sidebar-post" id="sidebar">
	<?php dynamic_sidebar( 'sidebar-post' ); ?>
</div><!-- #sidebar -->
