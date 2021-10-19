<?php
/**
 * Template Name: Forms
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
    <a href="<?php echo bloginfo('url'); ?>/baseblock/index/#forms" class="mt-4 btn w-50 ml-auto mr-auto d-block text-center"><h3>See Contained</h3></a>
  <?php } ?>  

  <h2 class="mb-0">Form 01</h2>
  <?php /* Form 01 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 text-center">
          <h1>Subscribe</h1>
          <div class="input-group mt-4 mb-4">
            <input type="text" class="form-control" placeholder="Enter your email address">
            <span class="input-group-btn">
              <button class="btn" type="button">Submit</button>
            </span>
          </div>

          <p class="text-h4">Find us on <a href="#">Facebook</a> and <a href="#">Twitter</a>.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 01 End */ ?>   

  <h2 class="mb-0">Form 02</h2>
  <?php /* Form 02 Start */ ?>   
  <section class="b-block" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_2.svg)">
    <div class="container">
      <div class="b-box">
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-lg-6">
            <h2>Join us!</h2>
            <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. </p>
          </div>
          <div class="col-12 col-lg-5 text-center">
            <div class="input-group mt-4">
              <input type="text" class="form-control" placeholder="Enter your email address">
              <span class="input-group-btn">
                <button class="btn" type="button">Submit</button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 02 End */ ?>   

  <h2 class="mb-0">Form 03</h2>
  <?php /* Form 03 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8 text-center">
          <div class="row">
            <div class="col">
              <h1>Register</h1>
              <p class="text-h3">When she reached the first hills, she had a last view back on the skyline of her hometown.</p>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-12 col-md-5 mt-4">
              <input type="text" class="form-control" placeholder="Email">
            </div>
            <div class="col-12 col-md-5 mt-4">
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="col-12 col-md-2 mt-4">
              <button class="btn" type="button">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 03 End */ ?>   

  <h2 class="mb-0">Form 04</h2>
  <?php /* Form 04 Start */ ?>   
  <section class="b-block" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>alt_wide_1.svg)">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-left">
          <div class="row">
            <div class="col">
              <h1>Sign Up</h1>
              <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. </p>
            </div>
          </div>
          <div class="row">
            <div class="col mt-4">
              <input type="text" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <input type="password" class="form-control" placeholder="Password">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <button class="btn" type="button">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 04 End */ ?>   

  <h2 class="mb-0">Form 05</h2>
  <?php /* Form 05 Start */ ?>   
  <section class="b-block" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_4.svg)">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-left">
          <div class="b-box">
            <div class="row">
              <div class="col">
                <h1>Log In</h1>
                <p class="text-h3">Right at the coast of the Semantics, a large language ocean. A small river named Duden.</p>
              </div>
            </div>
            <div class="row">
              <div class="col mt-4">
                <input type="text" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <input type="password" class="form-control" placeholder="Password">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <button class="btn" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 05 End */ ?>   

  <h2 class="mb-0">Form 06</h2>
  <?php /* Form 06 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Register</h1>
              <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. </p>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col mt-4">
              <input type="text" class="form-control" placeholder="Company Name">
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="email" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="col">
              <input type="password" class="form-control" placeholder="Confirm Password">
            </div>
          </div>
          <div class="row justify-content-start mt-4">
            <div class="col">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input">
                  I Read and Accept <a href="#">Terms and Conditions</a>
                </label>
              </div>

              <button class="btn mt-4">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 06 End */ ?>   

  <h2 class="mb-0">Form 07</h2>
  <?php /* Form 07 Start */ ?>   
  <section class="b-block" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_0.svg)">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-center">
          <div class="b-box b-touch">
            <div class="row">
              <div class="col">
                <h1>Log In</h1>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <input type="text" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <input type="password" class="form-control mb-1" placeholder="Password">
                <p class="text-right"><a href="#">Recover Password</a></p>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <button class="btn" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 07 End */ ?>   

  <h2 class="mb-0">Form 08</h2>
  <?php /* Form 08 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-7 col-md-5 text-center">
          <div class="b-box b-touch">
            <div class="row">
              <div class="col">
                <h1>Register</h1>
              </div>
            </div>
            <div class="row">
              <div class="col mt-4">
                <input type="text" class="form-control" placeholder="Name">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <input type="text" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <input type="password" class="form-control mb-1" placeholder="Password">
                <p class="text-right"><a href="#">Already have an account?</a></p>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <button class="btn" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 08 End */ ?>   

  <h2 class="mb-0">Form 09</h2>
  <?php /* Form 09 Start */ ?>   
  <section class="b-block bg-gray">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12  col-md-10 col-lg-8 col-xl-6 text-center">
          <img alt="image" height="40" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h1>Never miss an update</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          <div class="input-group mt-4 mb-4">
            <input type="text" class="form-control" placeholder="Enter your email address">
            <span class="input-group-btn">
              <button class="btn" type="button">Submit</button>
            </span>
          </div>
          <p class="text-h5"><em>*Your email address is safe with us. We never share your email address.</em></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 09 End */ ?>   

  <h2 class="mb-0">Form 10</h2>
  <?php /* Form 10 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
          <h1>Company Name</h1>
          <p class="text-h3">When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown.</p>
          <div class="input-group mt-5 mb-5">
            <input type="text" class="form-control" placeholder="Enter your email address">
            <span class="input-group-btn">
              <button class="btn" type="button">Submit</button>
            </span>
          </div>
          <p class="text-h2">
            <a href="#"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-google"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-pinterest"></i></a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 10 End */ ?>   

  <h2 class="mb-0">Form 11</h2>
  <?php /* Form 11 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 m-md-auto ml-lg-0 col-lg-5">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
        </div>
        <div class="col-12 col-md-10 col-lg-6 mt-4 mt-lg-0 ml-auto mr-auto ml-lg-auto text-left">
          <div class="row">
            <div class="col">
              <h1>Subscribe</h1>
              <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. </p>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <span class="input-group-btn">
                  <button class="btn" type="button">Submit</button>
                </span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <p class="text-h4">* Leave your email address to be notified first.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 11 End */ ?>   

  <h2 class="mb-0">Form 12</h2>
  <?php /* Form 12 Start */ ?>   
  <section class="b-block" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_c_2.svg);">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-12 col-md-9 col-lg-8">
          <div class="b-box b-touch">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-10">
                <h1>Subscribe</h1>
                <p class="text-h3">When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.</p>
              </div>
            </div>
            <div class="row justify-content-center mt-4">
              <div class="col-12 col-lg-10">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Enter your email address">
                  <span class="input-group-btn">
                    <button class="btn" type="button">Submit</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Form 12 End */ ?>   
  
</article>  

<?php
  get_footer();
