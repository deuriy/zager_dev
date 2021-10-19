<?php
/**
 * The sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'sidebar-page' ) ) {
	return;
}
?>

<div class="widget-area sidebar-page" id="sidebar">
	<?php dynamic_sidebar( 'sidebar-page' ); ?>
</div><!-- #sidebar -->
