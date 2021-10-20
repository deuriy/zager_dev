<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php
$footer = get_field('footer', 'options');
$footer_logo_img = '';
$menu_locations = ['footer_first', 'footer_second', 'footer_third', 'footer_fourth'];
$socicons = get_field('socicons', 'options');
?>
<div class="Footer">
  <div class="Footer_top">
    <div class="Container">
      <div class="Footer_topWrapper">
        <?php
        if( $footer['logo'] ) :
          $footer_logo_img = wp_get_attachment_image( $footer['logo'], 'full', false, array(
            'class'    => 'Footer_logoImg'
          ) );
          ?>
          <div class="Footer_col Footer_col-logo">
            <a class="Footer_logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
              <?php echo $footer_logo_img; ?>
            </a>
          </div>
        <?php endif; ?>
        <?php foreach ($menu_locations as $menu_location): ?>
          <div class="Footer_col<?php if ($menu_location === 'footer_first'): ?> Footer_col-borderTop<?php endif ?>">
            <div class="SecondaryMenu">
              <h3 class="SecondaryMenu_title"><?php echo wp_get_nav_menu_name( $menu_location ); ?></h3>
              <?php
              wp_nav_menu(
                array(
                  'theme_location'  => $menu_location,
                  'menu_class'      => 'SecondaryMenu_menu',
                  'walker'          => new Understrap_WP_Secondary_Navwalker(),
                )
              );
              ?>
            </div>
            <?php if ($menu_location === 'footer_fourth' && $socicons): ?>
              <div class="SocIcons Footer_socIcons">
                <ul class="SocIcons_list">
                  <?php foreach ($socicons as $socicon): ?>
                    <li class="SocIcons_item">
                      <a class="SocIcon SocIcon-<?php echo $socicon['icon'] ?> SocIcons_link" href="<?php echo $socicon['url'] ?>" target="_blank">
                      </a>
                    </li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
  <?php if ($footer['display_copyright'] === 'yes' && $footer['copyright']): ?>
    <div class="Footer_bottom">
      <div class="Container">
        <div class="Footer_copyright">
          <?php echo $footer['copyright'] ?>
        </div>
      </div>
    <?php endif ?>
  </div>
</div><!-- #colophon -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>