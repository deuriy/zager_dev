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

do_action( 'woocommerce_before_main_content' );

$shop_pages_settings = get_field('shop_pages', 'option');

if (is_shop()) {
  $page_settings = $shop_pages_settings['default_shop_page'];
  $page_type = 'shop';
} elseif (is_product_category('accessories')) {
  $page_settings = $shop_pages_settings['accessories_default_shop_page'];
  $page_type = 'accessories';
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

			<ul class="ProductsWrapper_buttons">
        <li class="ProductsWrapper_btnItem hidden-smPlus">
        	<a class="BtnGrey ProductsWrapper_btn" href="#Filter" data-fancybox="filter">Filter by</a>
        </li>
        <li class="ProductsWrapper_btnItem">
        	<?php if ($page_settings['display_products_sorting'] == 'yes'): ?>
						<div class="Sorting ProductsWrapper_sorting">
			        <div class="Sorting_label hidden-xs">Sort by:</div>
			        <select class="Select" name="product_sorting" id="product_sorting">
			          <option value="default">Default</option>
			          <option value="alphabetical">Alphabetical</option>
			          <option value="price_asc">Sort by price: low to high</option>
			          <option value="price_desc">Sort by price: high to low</option>
			        </select>
			      </div>
					<?php endif ?>
        </li>
      </ul>			
		</header>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if (is_shop()): ?>
			<div class="Products Products-productsWrapper ProductsWrapper_products">
				<?php get_filtered_products($page_type, false) ?>
			</div>
		<?php elseif (is_product_category('accessories')): ?>
			<div class="AccessoriesCards ProductsWrapper_accessoriesCards">
				<?php get_filtered_products($page_type, false) ?>
			</div>
		<?php endif ?>

		<div class="ProductsWrapper_afterProducts">
			<?php render_page_layouts($page_settings['after_products']['page_blocks']); ?>
		</div>
	</div>
</div>

<?php
render_page_layouts($page_settings['bottom_blocks']['page_blocks']);

get_footer( 'shop' );

get_template_part( 'partials/page-blocks', 'footer' );

if ($page_settings['filter_elements']) {
	$popup_ids = array_filter(array_unique(array_column($page_settings['filter_elements'], 'popup')), "is_empty");
}

if (isset($popup_ids)): ?>
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
