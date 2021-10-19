<?php
/**
 * Template Name: Footers
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
    <a href="<?php echo bloginfo('url'); ?>/baseblock/index/#footers" class="mt-4 btn w-50 ml-auto mr-auto d-block text-center"><h3>See Contained</h3></a>
  <?php } ?>  
  
  <h2 class="mb-0">Footer 01</h2>
  <?php /* Footer 01 Start */ ?>     
  <footer class="b-block footer-small">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <p class="mb-0">&copy; 2017 Reaction. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 01 End */ ?>   

  <h2 class="mb-0">Footer 02</h2>
  <?php /* Footer 02 Start */ ?>     
  <footer class="b-block footer-small bg-dark">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-8">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'nav justify-content-center justify-content-md-start',
              'depth'           => 1,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>          
        </div>

        <div class="col-12 col-md-4 mt-4 mt-md-0 text-center text-md-right">
          &copy; 2017 Reaction. All Rights Reserved
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 02 End */ ?>   

  <h2 class="mb-0">Footer 03</h2>
  <?php /* Footer 03 Start */ ?>     
  <footer class="b-block footer-small">
    <div class="container">
      <div class="row text-center align-items-center">
        <div class="col-12 col-md-8">
          <ul class="nav justify-content-center justify-content-md-start align-items-center">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <img alt="image" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="40">
              </a>
            </li>
            <li class="w-100 d-block d-sm-none"></li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Terms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
        </div>

        <div class="col-12 col-md-4 mt-4 mt-md-0 text-md-right">
          &copy; 2013-2017 Reaction
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 03 End */ ?>   

  <h2 class="mb-0">Footer 04</h2>
  <?php /* Footer 04 Start */ ?>     
  <footer class="b-block footer-small">
    <div class="container">
      <div class="row text-center align-items-center">
        <div class="col-12 col-sm-6 col-md-4 text-sm-left">
          <img alt="image" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="40">
        </div>

        <div class="col-12 col-sm-6 col-md-4 mt-4 mt-sm-0 text-center text-sm-right text-md-center">
          &copy; 2013-2017 Reaction
        </div>

        <div class="col-12 col-md-4 mt-4 mt-md-0 text-center text-md-right">
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 04 End */ ?>   

  <h2 class="mb-0">Footer 05</h2>
  <?php /* Footer 05 Start */ ?>     
  <footer class="b-block footer-small">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'nav justify-content-center justify-content-md-start',
              'depth'           => 1,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>             
        </div>

        <div class="col-12 col-md-6 mt-4 mt-md-0 text-center text-md-right">
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 05 End */ ?>   

  <h2 class="mb-0">Footer 06</h2>
  <?php /* Footer 06 Start */ ?>     
  <footer class="b-block footer-small bg-dark">
    <div class="container">
      <div class="row text-center align-items-center">
        <div class="col">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'nav justify-content-center',
              'depth'           => 1,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>              

          <p class="text-h5 mt-5">&copy; 2013-2017 Reaction</p>
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 06 End */ ?>   

  <h2 class="mb-0">Footer 07</h2>
  <?php /* Footer 07 Start */ ?>     
  <footer class="b-block footer-small">
    <div class="container">
      <div class="row text-center align-items-center">
        <div class="col-12 col-lg-2 text-lg-left">
          <img alt="image" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="40">
        </div>

        <div class="col mt-4 mt-lg-0 text-center">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'nav justify-content-center',
              'depth'           => 1,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>    
        </div>

        <div class="col-12 col-lg-2 mt-4 mt-lg-0 text-lg-right">
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>&nbsp;&nbsp;
          <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col text-center">
          &copy; 2017 Reaction. All Rights Reserved
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 07 End */ ?>   

  <h2 class="mb-0">Footer 08</h2>
  <?php /* Footer 08 Start */ ?>     
  <footer class="b-block footer-small">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <?php
          wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'nav justify-content-center justify-content-md-start',
              'depth'           => 1,
              'container'       => '',
              'fallback_cb'     => '',
              'walker'          => new Understrap_WP_Bootstrap_Navwalker()
          ));
          ?>    
        </div>

        <div class="col mt-4 mt-md-0 text-center text-md-right">
          <a href="#" class="btn">Contact Us</a>
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 08 End */ ?>   

  <h2 class="mb-0">Footer 09</h2>
  <?php /* Footer 09 Start */ ?>     
  <footer class="b-block footer-large">
    <div class="container">
      <div class="row align-items-top text-center">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-sm-left">
          <h3><strong>Group 1</strong></h3>
          <nav class="nav flex-column">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Pricing</a>
            <a class="nav-link" href="#">Team</a>
            <a class="nav-link" href="#">Contact Us</a>
          </nav>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5 mt-sm-0 text-sm-left">
          <h3><strong>Group 2</strong></h3>
          <nav class="nav flex-column">
            <a class="nav-link active" href="#">Privacy Policy</a>
            <a class="nav-link" href="#">Terms</a>
            <a class="nav-link" href="#">FAQ</a>
            <a class="nav-link" href="#">Support</a>
          </nav>
        </div>

        <div class="col-12 col-md-4 col-lg-3 text-md-left mt-5 mt-md-0">
          <h3><strong>About Us</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>

        <div class="col-12 col-lg-2 ml-auto text-lg-left mt-4 mt-lg-0">
          <h3><strong>Follow Us</strong></h3>
          <p class="text-h3">
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>&nbsp;&nbsp;
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>&nbsp;&nbsp;
            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>&nbsp;&nbsp;
            <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
          </p>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col text-center">
          &copy; 2017 Reaction. All Rights Reserved
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 09 End */ ?>   
  
  <h2 class="mb-0">Footer 10</h2>
  <?php /* Footer 10 Start */ ?>   
  <footer class="b-block footer-large bg-dark">
    <div class="container">
      <div class="row align-items-top text-center text-md-left">
        <div class="col-12 col-sm-6 col-md-4">
          <h3><strong>Country A</strong></h3>
          <p>Street Address 52<br>Contact Name</p>
          <p>+44 827 312 5002</p>
          <p><a href="#">countrya@amazing.com</a></p>
        </div>

        <div class="col-12 col-sm-6 col-md-4 mt-4 mt-sm-0">
          <h3><strong>Country B</strong></h3>
          <p>Street Address 100<br>Contact Name</p>
          <p>+13 827 312 5002</p>
          <p><a href="#">countryb@amazing.com</a></p>
        </div>

        <div class="col-12 col-md-4 mt-5 mt-md-0 text-md-left">
          <h3><strong>About Us</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col text-center">
          &copy; 2017 Reaction. All Rights Reserved
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 10 End */ ?>   

  <h2 class="mb-0">Footer 11</h2>
  <?php /* Footer 11 Start */ ?>   
  <footer class="b-block footer-small">
    <div class="container">
      <div class="row align-items-center text-center">
        <div class="col-12 col-lg-4 text-lg-left">
          &copy; 2017 Reaction
        </div>

        <div class="col-12 col-lg-4 mt-4 mt-lg-0">
          <img alt="image" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png" height="40">
        </div>

        <div class="col-12 col-lg-4 text-lg-right mt-4 mt-lg-0">
          <ul class="nav justify-content-lg-end justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="#">Privacy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Terms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 11 End */ ?>   

  <h2 class="mb-0">Footer 12</h2>
  <?php /* Footer 12 Start */ ?>   
  <footer class="b-block footer-large">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <h3>Company Name</h3>
          <p>70 Bowman St.<br>South Windsor, CT 06074</p>
          <p>USA</p>
          <p>+13 827 312 5002</p>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col text-center">
          <p class="text-h3">
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> &nbsp; &nbsp;
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> &nbsp; &nbsp;
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a> &nbsp; &nbsp;
            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a> &nbsp; &nbsp;
            <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <?php /* Footer 12 End */ ?>   

</article>

<?php
  get_footer();
