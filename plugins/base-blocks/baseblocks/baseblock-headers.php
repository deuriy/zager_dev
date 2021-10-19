<?php
/**
 * Template Name: Headers
 * Template Post Type: baseblock
* @package _rebase
 */
get_header(); 
?>

<section class="b-block p-2 border-0" id="navigator">
  <div class="container-fluid">
    <p class="m-0 text-center">
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/cta">Call to action</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/contacts">Contacts</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/contents">Contents</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/css">Typography</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/features">Features</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/footers">Footers</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/forms">Forms</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/headers">Headers</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/pricings">Pricings</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/teams">Teams</a>
      <a class="btn btn-empty m-1" href="<?php echo bloginfo('url'); ?>/baseblock/testimonials">Testimonials</a>
    </p>
  </div>
</section>

<article>
  
  <?php if (isset($_GET['index'])) { ?>
    <a href="<?php the_permalink(); ?>" class="btn w-50 m-auto d-block text-center"><h3>See Fullscreen</h3></a>
  <?php } else { ?>
    <a href="<?php echo bloginfo('url'); ?>/baseblock/index/#headers" class="mt-4 btn w-50 ml-auto mr-auto d-block text-center"><h3>See Contained</h3></a>
  <?php } ?>  

  <h2 class="mb-0">Header 01</h2>
  <?php /* Header 01 Start */ ?>     
  <header>
    <div class="container">
      <nav class="navbar">
        <a href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>
      </nav>
    </div>
  </header>  
  <?php /* Header 01 End */ ?>  
  
  <h2 class="mb-0">Header 02</h2>
  <?php /* Header 02 Start */ ?>   
  <header>
    <div class="container text-center">
      <nav class="navbar">
        <a class="ml-auto mr-auto" href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>
      </nav>
    </div>
  </header>  
  <?php /* Header 02 End */ ?>
  
  <h2 class="mb-0">Header 03</h2>
  <?php /* Header 03 Start */ ?>   
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-md">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav0" aria-controls="navbarNav0" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav0">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav mr-auto ml-auto',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 03 End */ ?>

  <h2 class="mb-0">Header 04</h2>
  <?php /* Header 04 Start */ ?>   
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav1">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav mr-auto',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>

          <ul class="navbar-nav justify-content-end d-none d-lg-flex ml-md-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-slack"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-github"></i></a>
            </li>
          </ul>

          <a class="btn btn-empty ml-md-3" href="#">Button</a>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 04 End */ ?>

  <h2 class="mb-0">Header 05</h2>
  <?php /* Header 05 Start */ ?>   
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-md no-gutters">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-4 col-md-2 text-right text-md-center order-lg-6">
          <a href="#">
            <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
          </a>
        </div>

        <div class="collapse navbar-collapse col-12 col-md-5 order-lg-1" id="navbarNav2">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav col-12',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>

        <ul class="navbar-nav justify-content-end col-sm-5 order-lg-12 d-none d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-github"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-slack"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </header>  
  <?php /* Header 05 End */ ?>

  <h2 class="mb-0">Header 06</h2>
  <?php /* Header 06 Start */ ?>   
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav3" aria-controls="navbarNav3" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav3">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav ml-auto',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>

          <a class="btn btn-empty ml-md-3" href="#">Button</a>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 06 End */ ?>

  <h2 class="mb-0">Header 07</h2>
  <?php /* Header 07 Start */ ?>   
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-md no-gutters">
        <div class="col-2 text-left">
          <a href="#">
            <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
          </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center col-md-8" id="navbarNav4">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav justify-content-center',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>

        <ul class="navbar-nav col-2 justify-content-end d-none d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-github"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-google"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </header>  
  <?php /* Header 07 End */ ?>

  <h2 class="mb-0">Header 08</h2>
  <?php /* Header 08 Start */ ?>   
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav5" aria-controls="navbarNav5" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav5">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav mr-auto',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>

          <ul class="navbar-nav justify-content-end ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Docs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Log In</a>
            </li>
          </ul>

          <a class="btn ml-md-3" href="#">Button</a>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 08 End */ ?>

  <h2 class="mb-0">Header 09</h2>
  <?php /* Header 09 Start */ ?>   
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-md no-gutters">
        <div class="col-2 text-left">
          <a href="#">
            <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
          </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse-1" aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center col-md-8 navbar-collapse-1">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav justify-content-center',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>

        <div class="collapse navbar-collapse justify-content-end col-md-2 navbar-collapse-1">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Log In &rarr;</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 09 End */ ?>

  <h2 class="mb-0">Header 10</h2>
  <?php /* Header 10 Start */ ?>   
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-md no-gutters">
        <div class="col-3 text-left">
          <a href="#">
            <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
          </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse-2" aria-controls="navbarNav7" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-collapse-2 justify-content-center col-md-6" id="navbarNav7">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav justify-content-center',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>

        <div class="collapse navbar-collapse navbar-collapse-2">
          <ul class="navbar-nav ml-auto justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="#">Log In</a>
            </li>
          </ul>

          <a class="btn ml-md-3" href="#">Register</a>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 10 End */ ?>

  <h2 class="mb-0">Header 11</h2>
  <?php /* Header 11 Start */ ?>   
  <header class="bg-dark">
    <div class="container">
      <nav class="navbar">
        <a href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>
      </nav>
    </div>
  </header>  
  <?php /* Header 11 End */ ?>
  
  <h2 class="mb-0">Header 12</h2>
  <?php /* Header 12 Start */ ?>   
  <header class="bg-dark">
    <div class="container text-center">
      <nav class="navbar">
        <a class="ml-auto mr-auto" href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>
      </nav>
    </div>
  </header>  
  <?php /* Header 12 End */ ?>

  <h2 class="mb-0">Header 13</h2>
  <?php /* Header 13 Start */ ?>   
  <header class="bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-md">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav8" aria-controls="navbarNav8" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav8">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav mr-auto ml-auto',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 13 End */ ?>

  <h2 class="mb-0">Header 14</h2>
  <?php /* Header 14 Start */ ?>   
  <header class="bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav9" aria-controls="navbarNav9" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav9">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav mr-auto',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>

          <ul class="navbar-nav justify-content-end d-none d-lg-flex ml-md-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fa fa-slack"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-github"></i></a>
            </li>
          </ul>

          <a class="btn btn-white btn-empty ml-md-3" href="#">Button</a>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 14 End */ ?>

  <h2 class="mb-0">Header 15</h2>
  <?php /* Header 15 Start */ ?>   
  <header class="bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-md no-gutters">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav10" aria-controls="navbarNav10" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-4 col-sm-2 text-center order-lg-6">
          <a href="#">
            <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
          </a>
        </div>

        <div class="collapse navbar-collapse col-12 col-md-5 order-lg-1" id="navbarNav10">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav col-12',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>

        <ul class="navbar-nav justify-content-end col-sm-5 order-lg-12 d-none d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-github"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-slack"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </header>  
  <?php /* Header 15 End */ ?>

  <h2 class="mb-0">Header 16</h2>
  <?php /* Header 16 Start */ ?>   
  <header class="bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav11" aria-controls="navbarNav11" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav11">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav ml-auto',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>

          <a class="btn btn-white btn-empty ml-md-3" href="#">Button</a>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 16 End */ ?>

  <h2 class="mb-0">Header 17</h2>
  <?php /* Header 17 Start */ ?>   
  <header class="bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-md no-gutters">
        <div class="col-2 text-left">
          <a href="#">
            <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
          </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav12" aria-controls="navbarNav12" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center col-md-8" id="navbarNav12">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav justify-content-center',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>

        <ul class="navbar-nav col-2 justify-content-end d-none d-md-flex">
          <li class="nav-item active">
            <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-github"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-google"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </header>  
  <?php /* Header 17 End */ ?>

  <h2 class="mb-0">Header 18</h2>
  <?php /* Header 18 Start */ ?>   
  <header class="bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
          <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav13" aria-controls="navbarNav13" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav13">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav mr-auto',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>

          <ul class="navbar-nav justify-content-end ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Docs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Log In</a>
            </li>
          </ul>

          <a class="btn btn-white ml-md-3" href="#">Button</a>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 18 End */ ?>

  <h2 class="mb-0">Header 19</h2>
  <?php /* Header 19 Start */ ?>   
  <header class="bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-md no-gutters">
        <div class="col-2 text-left">
          <a href="#">
            <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
          </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse-3" aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center col-md-8 navbar-collapse-3">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav justify-content-center',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>

        <div class="collapse navbar-collapse justify-content-end col-md-2 navbar-collapse-3">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Log In &rarr;</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 19 End */ ?>
  
  <h2 class="mb-0">Header 20</h2>
  <?php /* Header 20 Start */ ?>   
  <header class="bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-md no-gutters">
        <div class="col-3 text-left">
          <a href="#">
            <img src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="32" alt="image">
          </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse-4" aria-controls="navbarNav7" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-collapse-4 justify-content-center col-md-6" id="navbarNav7">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav justify-content-center',
              'depth'           => 2,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>
        </div>

        <div class="collapse navbar-collapse navbar-collapse-4">
          <ul class="navbar-nav ml-auto justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="#">Log In</a>
            </li>
          </ul>

          <a class="btn ml-md-3" href="#">Register</a>
        </div>
      </nav>
    </div>
  </header>  
  <?php /* Header 20 End */ ?>

</article>  

<?php
  get_footer();
