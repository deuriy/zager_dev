<?php
/**
 * The sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
	return;
}
?>

<div class="widget-area sidebar-shop" id="sidebar">
	<?php dynamic_sidebar( 'sidebar-shop' ); ?>
</div><!-- #sidebar -->
