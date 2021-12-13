<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

$shop_pages_settings = get_field('shop_pages', 'option');

if (is_shop()) {
  $page_settings = $shop_pages_settings['default_shop_page'];
} elseif (is_product_category('accessories')) {
  $page_settings = $shop_pages_settings['accessories_default_shop_page'];
}

if (isset($page_settings['top_blocks'])) {
	render_page_layouts($page_settings['top_blocks']['page_blocks']);
}

?>
<div class="ProductsWrapper">
	<?php do_action( 'woocommerce_sidebar' ); ?>
	<div class="ProductsWrapper_content">	
		<header class="ProductsWrapper_header woocommerce-products-header">
			<?php if ($page_settings['products_section_title']): ?>
				<h1 class="woocommerce-products-header__title page-title SectionTitle ProductsWrapper_title">
					<?php echo $page_settings['products_section_title']; ?>
				</h1>
			<?php elseif ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<h1 class="woocommerce-products-header__title page-title SectionTitle ProductsWrapper_title">
					<?php woocommerce_page_title(); ?>
				</h1>
			<?php endif; ?>

			<?php if ($page_settings['display_products_sorting'] == 'yes'): ?>
				<div class="Sorting ProductsWrapper_sorting hidden-xs">
	        <div class="Sorting_label">Sort by:</div>
	        <select class="Select" name="product_sorting" id="product_sorting">
	          <option value="default">Default</option>
	          <option value="alphabetical">Alphabetical</option>
	          <option value="price_asc">Sort by price: low to high</option>
	          <option value="price_desc">Sort by price: high to low</option>
	        </select>
	      </div>
			<?php endif ?>
		</header>

		<?php
			/**
			 * Hook: woocommerce_archive_description.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if (is_shop()): ?>
			<div class="Products Products-productsWrapper ProductsWrapper_products">
				<div class="Products_items hidden-xs">
					<?php
						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked woocommerce_output_all_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						// do_action( 'woocommerce_before_shop_loop' );
					?>

					<?php
					if ( woocommerce_product_loop() ) {

						// woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 */
								do_action( 'woocommerce_shop_loop' );

								if (get_field('display_product_on_shop_pages', get_the_ID()) != 'no') {
									wc_get_template_part( 'content', 'product-twocol' );
								}
							}
						}

						// woocommerce_product_loop_end();

						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
					} else {
						/**
						 * Hook: woocommerce_no_products_found.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
					}
					?>
				</div>
			</div>

			<?php do_action( 'woocommerce_after_shop_loop' ); ?>
		<?php elseif (is_product_category('accessories')): ?>
			<div class="AccessoriesCards ProductsWrapper_accessoriesCards">
				<?php
					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					// do_action( 'woocommerce_before_shop_loop' );
				?>

				<?php if ( woocommerce_product_loop() ) {

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							do_action( 'woocommerce_shop_loop' );

							if (get_field('display_product_on_shop_pages', get_the_ID()) != 'no') {
								wc_get_template_part( 'content', 'accessory-card' );
							}
						}
					}

				} else {
					do_action( 'woocommerce_no_products_found' );
				}
				?>
			</div>

			<?php do_action( 'woocommerce_after_shop_loop' ); ?>
		<?php endif ?>

		<?php render_page_layouts($page_settings['after_products']['page_blocks']); ?>
	</div>
</div>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
// do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

render_page_layouts($page_settings['bottom_blocks']['page_blocks']);

get_footer( 'shop' );

get_template_part( 'partials/page-blocks', 'footer' );

?>

<?php
if ($page_settings['filter_elements']) {
	$popup_ids = array_filter(array_unique(array_column($page_settings['filter_elements'], 'popup')), "is_empty");
}
?>

<?php if (isset($popup_ids)): ?>
  <?php foreach ($popup_ids as $popup_id): ?>
    <?php
      $popup_title = get_the_title( $popup_id );
      $popup_layouts = get_field('popup_blocks', $popup_id);
    ?>

    <div class="FancyboxPopup" id="FancyboxPopup-<?php echo $popup_id ?>" style="display:none;">
      <?php if ($popup_title): ?>
        <h2 class="FancyboxPopup_title">
          <?php echo $popup_title ?>
        </h2>
      <?php endif ?>

      <?php if ($popup_layouts): ?>
        <div class="FancyboxPopup_content">
          <?php foreach ($popup_layouts as $popup_layout): ?>
            <?php
            if ($popup_layout['acf_fc_layout'] == 'popup_page_blocks') {
              render_page_layouts($popup_layout['page_blocks']);
            } else {
              $layout_name = str_replace('_', '-', $popup_layout['acf_fc_layout']);
              $template = locate_template('page-blocks/'.$layout_name.'/template.php', false, false);
              if ($template) {
                $field = $popup_layout;
                include($template);
              }
            }
            ?>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>
  <?php endforeach ?>
<?php endif ?>
