<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
  <?php do_action('wp_body_open'); ?>

  <?php
  $contacts = get_field('contacts', 'options');
  $display_cart_button = get_field('display_cart_button', 'options');
  ?>

  <div class="Wrapper">
    <div class="Header">
      <div class="Header_top">
        <div class="Container Container-header">
          <div class="Header_topWrapper">
            <div class="Header_left">
              <?php
              $logo_img = '';
              if ($custom_logo_id = get_theme_mod('custom_logo')) :
                $logo_img = wp_get_attachment_image($custom_logo_id, 'full', false, array(
                  'class'    => 'Header_logoImg'
                ));
                ?>
                <a class="Header_logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                  <?php echo $logo_img; ?>
                </a>
              <?php endif; ?>
            </div>
            <div class="Header_right">
              <?php if ($contacts): ?>
                <div class="ContactLinks Header_contacts hidden-xs">
                  <ul class="ContactLinks_list">
                    <?php foreach ($contacts as $contact): ?>
                      <li class="ContactLinks_item">
                        <?php
                        $link_prefix = $contact['type'] === 'phone' ? 'tel:+' : 'mailto:';
                        ?>
                        <a class="ContactLink ContactLink-<?php echo $contact['type']; ?> ContactLinks_link" href="<?php echo $link_prefix . $contact['text'] ?>">
                          <?php if ($contact['text']): ?>
                            <?php echo $contact['text'] ?>
                          <?php endif ?>
                        </a>
                      </li>
                    <?php endforeach ?>
                  </ul>
                </div>
              <?php endif ?>
              <div class="Header_buttons">
                <?php if ($display_cart_button === 'yes'): ?>
                  <a class="CartBtn" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><span class="CartBtn_text hidden-xs">cart</span></a>
                <?php endif ?>
                <a class="MenuHamburger hidden-mdPlus" href="#"><span class="MenuHamburger_text hidden-xs">menu</span></a>
                <div class="MobileNavigation Header_mobileNavigation hidden-mdPlus">
                  <div class="MobileNavigation_header hidden-sm">
                    <button class="CloseButton MobileNavigation_closeBtn" type="button"></button>
                  </div>
                  <div class="Container Container-mobileNavigation">
                    <div class="MainMenu MobileNavigation_mainMenu">
                      <h3 class="MainMenu_title hidden-sm">Menu</h3>
                      <?php
                      wp_nav_menu(
                        array(
                          'theme_location'  => 'header',
                          'container_class' => 'MainMenu',
                          'menu_class'      => 'MainMenu_menu',
                          'walker'          => new Understrap_WP_Primary_Navwalker(),
                        )
                      );
                      ?>
                    </div>
                    <div class="ContactLinks ContactLinks-mobileNavigation MobileNavigation_contacts">
                      <ul class="ContactLinks_list">
                        <li class="ContactLinks_item"><a class="ContactLink ContactLink-mobileNavigation ContactLink-phone ContactLinks_link" href="tel:+4027707747">402-770-7747</a></li>
                        <li class="ContactLinks_item"><a class="ContactLink ContactLink-mobileNavigation ContactLink-email ContactLinks_link" href="mailto:help@zager.com">help@zager.com</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="Header_bottom hidden-smMinus">
        <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'header',
            'container_class' => 'MainMenu',
            'menu_class'      => 'MainMenu_menu',
            'walker'          => new Understrap_WP_Primary_Navwalker(),
          )
        );
        ?>
      </div>
    </div>