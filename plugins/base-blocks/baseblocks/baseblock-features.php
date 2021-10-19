<?php
/**
 * Template Name: Features
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
    <a href="<?php echo bloginfo('url'); ?>/baseblock/index/#features" class="mt-4 btn w-50 ml-auto mr-auto d-block text-center"><h3>See Contained</h3></a>
  <?php } ?>  

  <h2 class="mb-0">Feature 01</h2>
  <?php /* Feature 01 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-center justify-content-sm-center no-gutters">
        <div class="col-12 col-sm-8 col-md-3 m-auto">
          <h3><strong>Feature 1</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
        </div>

        <div class="col-12 col-sm-8 col-md-3 m-auto pt-3 pt-md-0">
          <h3><strong>Feature 2</strong></h3>
          <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>

        <div class="col-12 col-sm-8 col-md-3 m-auto pt-3 pt-md-0">
          <h3><strong>Feature 3</strong></h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
        </div>
      </div>

      <div class="row text-center justify-content-md-center pt-3 pt-md-5">
        <div class="col-12 col-sm-8 col-md-3 m-auto">
          <h3><strong>Feature 4</strong></h3>
          <p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth</p>
        </div>

        <div class="col-12 col-sm-8 col-md-3 m-auto pt-3 pt-md-0">
          <h3><strong>Feature 5</strong></h3>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day.</p>
        </div>

        <div class="col-12 col-sm-8 col-md-3 m-auto pt-3 pt-md-0">
          <h3><strong>Feature 6</strong></h3>
          <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 01 End */ ?>   

  <h2 class="mb-0">Feature 02</h2>
  <?php /* Feature 02 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-left justify-content-sm-center">
        <div class="col-12 col-sm-6 col-lg-3 col-xl-2 ml-xl-auto mr-xl-auto">
          <h3><strong>Feature 1</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 col-xl-2 ml-xl-auto mr-xl-auto pt-3 pt-lg-0">
          <h3><strong>Feature 2</strong></h3>
          <p>Separated they live in Bookmarksgrove right at the coast of the.</p>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 col-xl-2 ml-xl-auto mr-xl-auto pt-3 pt-lg-0">
          <h3><strong>Feature 3</strong></h3>
          <p>A small river named Duden flows by their place and supplies it with.</p>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 col-xl-2 ml-xl-auto mr-xl-auto pt-3 pt-lg-0">
          <h3><strong>Feature 4</strong></h3>
          <p>But nothing the copy said could convince her and so it didn’t take long</p>
        </div>
      </div>

      <div class="row text-left justify-content-sm-center pt-3 pt-lg-5">
        <div class="col-12 col-sm-6 col-lg-3 col-xl-2 ml-xl-auto mr-xl-auto">
          <h3><strong>Feature 5</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 col-xl-2 ml-xl-auto mr-xl-auto pt-3 pt-lg-0">
          <h3><strong>Feature 6</strong></h3>
          <p>Separated they live in Bookmarksgrove right at the coast of the.</p>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 col-xl-2 ml-xl-auto mr-xl-auto pt-3 pt-lg-0">
          <h3><strong>Feature 7</strong></h3>
          <p>A small river named Duden flows by their place and supplies it with.</p>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 col-xl-2 ml-xl-auto mr-xl-auto pt-3 pt-lg-0">
          <h3><strong>Feature 8</strong></h3>
          <p>But nothing the copy said could convince her and so it didn’t take long</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 02 End */ ?>   

  <h2 class="mb-0">Feature 03</h2>
  <?php /* Feature 03 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1>Features</h1>
        </div>
      </div>

      <div class="row text-left justify-content-center pt-5">
        <div class="col-12 col-md-6 col-lg-5 m-auto">
          <h3><strong>Feature One</strong></h3>

          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
        <div class="col-12 col-md-6 col-lg-5 m-auto pt-3 pt-md-0">
          <h3><strong>Feature Two</strong></h3>

          <p class="text-h3">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line.</p>
        </div>
      </div>

      <div class="row text-left justify-content-center pt-lg-4">
        <div class="col-12 col-md-6 col-lg-5 m-auto pt-3 pt-lg-0">
          <h3><strong>Feature Three</strong></h3>

          <p class="text-h3">On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times.</p>
        </div>
        <div class="col-12 col-md-6 col-lg-5 m-auto pt-3 pt-lg-0">
          <h3><strong>Feature Four</strong></h3>

          <p class="text-h3">A small river named Duden flows by their place far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 03 End */ ?>   

  <h2 class="mb-0">Feature 04</h2>
  <?php /* Feature 04 Start */ ?>     
  <section class="b-block bg-dark" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_0.svg)">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h1>Base Blocks</h1>
        </div>
      </div>

      <div class="row-70"></div>

      <div class="row text-center justify-content-sm-center no-gutters">
        <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-3 m-auto">
          <div class="b-box b-touch">
            <h2>Feature 1</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
            <p class="mt-4"><a href="#">Learn More &gt;</a></p>
          </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-3 m-auto pt-5 pt-xl-0">
          <div class="b-box b-touch">
            <h2>Feature 2</h2>
            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mt-4"><a href="#">Learn More &gt;</a></p>
          </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-3 m-auto pt-5 pt-xl-0">
          <div class="b-box b-touch">
            <h2>Feature 3</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p class="mt-4"><a href="#">Learn More &gt;</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 04 End */ ?>   

  <h2 class="mb-0">Feature 05</h2>
  <?php /* Feature 05 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-6 col-xl-5">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

          <div class="row pt-4 pt-xl-5">
            <div class="col-12 col-md-5">
              <h4><strong>Feature One</strong></h4>
              <p>A small river named Duden flows</p>
            </div>
            <div class="col-12 col-md-5 m-auto pt-3 pt-md-0">
              <h4><strong>Feature Two</strong></h4>
              <p>Separated they live in Bookmarksgrove</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-8 col-lg-6 m-auto mr-lg-0 ml-lg-auto pt-5 pt-lg-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 05 End */ ?>   

  <h2 class="mb-0">Feature 06</h2>
  <?php /* Feature 06 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-8 col-lg-6 m-md-auto ml-lg-0 mr-lg-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
        </div>
        <div class="col-12 col-lg-6 col-xl-5 ml-sm-auto pt-5 pt-lg-0">
          <h1>Base Blocks</h1>

          <div class="row pt-4 pt-xl-5">
            <div class="col-12 col-sm-6 col-xl-5">
              <h4><strong>Feature One</strong></h4>
              <p>Far far away, behind the word mountains</p>
            </div>
            <div class="col-12 col-sm-6 col-xl-5 m-auto pt-3 pt-sm-0">
              <h4><strong>Feature Two</strong></h4>
              <p>Separated they live in Bookmarksgrove</p>
            </div>
          </div>

          <div class="row pt-3">
            <div class="col-12 col-sm-6 col-xl-5">
              <h4><strong>Feature Three</strong></h4>
              <p>A small river named Duden flows by me</p>
            </div>
            <div class="col-12 col-sm-6 col-xl-5 m-auto pt-3 pt-sm-0">
              <h4><strong>Feature Four</strong></h4>
              <p>Separated they live in Bookmarksgrove</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 06 End */ ?>   

  <h2 class="mb-0">Feature 07</h2>
  <?php /* Feature 07 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12 col-sm-6 col-lg-5 col-xl-4 m-auto">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature 1</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
        </div>

        <div class="col-12 col-sm-6 col-lg-5 col-xl-4 m-auto pt-4 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature 2</strong></h3>
          <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 07 End */ ?>   

  <h2 class="mb-0">Feature 08</h2>
  <?php /* Feature 08 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h1>Features</h1>
          <img alt="image" class="img-fluid mt-5" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_wide.svg">
        </div>
      </div>

      <div class="row text-center justify-content-center mt-5">
        <div class="col-12 col-sm-4 col-lg-3 m-md-auto">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature 1</strong></h3>
        </div>

        <div class="col-12 col-sm-4 col-lg-3 m-auto pt-4 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature 2</strong></h3>
        </div>

        <div class="col-12 col-sm-4 col-lg-3 m-auto pt-4 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature 3</strong></h3>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 08 End */ ?>   

  <h2 class="mb-0">Feature 09</h2>
  <?php /* Feature 09 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h1>Features</h1>
        </div>
      </div>

      <div class="row text-center justify-content-center mt-5">
        <div class="col-12 col-sm-4 col-xl-3 m-md-auto">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature 1</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>

        <div class="col-12 col-sm-4 col-xl-3 m-auto pt-4 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature 2</strong></h3>
          <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>

        <div class="col-12 col-sm-4 col-xl-3 m-auto pt-4 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature 3</strong></h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 09 End */ ?>   

  <h2 class="mb-0">Feature 10</h2>
  <?php /* Feature 10 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h1>Features</h1>
        </div>
      </div>
      <div class="row text-center justify-content-center mt-5">
        <div class="col-12 col-sm-6 col-lg-3">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature One</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries</p>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 pt-4 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature Two</strong></h3>
          <p>Separated they live in Bookmarksgrove right at the coast</p>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 pt-4 pt-lg-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature Three</strong></h3>
          <p>A small river named Duden flows by their place and supplies it</p>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 pt-4 pt-lg-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature Four</strong></h3>
          <p>Duden flows by their place far far away, behind the word mountains.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 10 End */ ?>   

  <h2 class="mb-0">Feature 11</h2>
  <?php /* Feature 11 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h1>Features</h1>
        </div>
      </div>
      <div class="row text-left mt-5">
        <div class="col-12 col-md-4">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature One</strong></h3>
              <p>Far far away, behind the word mountains, far from the countries</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4 pt-3 pt-sm-4 pt-md-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Two</strong></h3>
              <p>Even the all-powerful Pointing has no control about the blind texts.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4 pt-3 pt-sm-4 pt-md-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Three</strong></h3>
              <p>A small river named Duden flows by their place and supplies it</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-left pt-3 pt-sm-4 pt-md-5">
        <div class="col-12 col-md-4">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Four</strong></h3>
              <p>Duden flows by their place far far away, behind the word mountains.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4 pt-3 pt-sm-4 pt-md-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Five</strong></h3>
              <p>Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4 pt-3 pt-sm-4 pt-md-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Six</strong></h3>
              <p>On her way she met a copy. The copy warned the Little Blind Text.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 11 End */ ?>   

  <h2 class="mb-0">Feature 12</h2>
  <?php /* Feature 12 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h1>Features</h1>
        </div>
      </div>
      <div class="row text-left mt-5">
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature One</strong></h3>
              <p>Even the all-powerful Pointing has no control about the blind texts</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 pt-3 pt-sm-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Two</strong></h3>
              <p>Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 pt-3 pt-lg-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Three</strong></h3>
              <p>A small river named Duden flows by their place and supplies it</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 pt-3 pt-lg-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Four</strong></h3>
              <p>Far far away, behind the word mountains, far from the countries</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-left pt-3 pt-lg-5">
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Five</strong></h3>
              <p>On her way she met a copy. The copy warned the Little Blind Text.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 pt-3 pt-sm-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Six</strong></h3>
              <p>Far far away, behind the word mountains, far from the countries</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 pt-3 pt-lg-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Seven</strong></h3>
              <p>Duden flows by their place far far away, behind the word mountains.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 pt-3 pt-lg-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Eight</strong></h3>
              <p>Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 12 End */ ?>   

  <h2 class="mb-0">Feature 13</h2>
  <?php /* Feature 13 Start */ ?>     
  <section class="b-block pb-0">
    <div class="container">
      <div class="row text-lg-right align-items-center">
        <div class="col-12 col-sm-6 col-lg-3">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h4><strong>Feature One</strong></h4>
          <p>Far far away, behind the word mountains is hope.</p>

          <img alt="image" class="b-icon mt-3 mt-xl-5" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h4><strong>Feature Two</strong></h4>
          <p>On her way she met a copy of the Little Blind Text.</p>

          <img alt="image" class="b-icon mt-3 mt-xl-5" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h4><strong>Feature Three</strong></h4>
          <p>Even the all-powerful has no control about the blind texts</p>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 text-left pt-3 pt-sm-0 order-lg-12">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h4><strong>Feature Four</strong></h4>
          <p>Duden flows by their place, behind the word mountains.</p>

          <img alt="image" class="b-icon mt-3 mt-xl-5" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h4><strong>Feature Five</strong></h4>
          <p>Separated they live in Bookmark right at the coast</p>

          <img alt="image" class="b-icon mt-3 mt-xl-5" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h4><strong>Feature Six</strong></h4>
          <p>A small river named Duden flows by their place and supplies it</p>
        </div>

        <div class="col-7 col-sm-4 col-lg-4 m-auto pt-5 pt-lg-0 order-lg-1">
          <img alt="image" class="img-fluid br-b-0" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_tall.png">
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 13 End */ ?>   

  <h2 class="mb-0">Feature 14</h2>
  <?php /* Feature 14 Start */ ?>     
  <section class="b-block pb-md-0">
    <div class="container">
      <div class="row text-right align-items-center">
        <div class="col-7 col-md-4 m-auto">
          <img alt="image" class="img-fluid br-b-0" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_tall.png">
        </div>

        <div class="col-12 col-md-7 col-lg-5 m-auto text-left pt-5 pt-md-0">
          <div class="row pb-lg-5">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Seven</strong></h3>
              <p>Even the all-powerful Pointing has no control about the blind texts.</p>
            </div>
          </div>

          <div class="row pt-4 pt-md-5 pb-lg-5">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Seven</strong></h3>
              <p>Duden flows by their place far far away, behind the word mountains.</p>
            </div>
          </div>


          <div class="row pt-4 pt-md-5">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Seven</strong></h3>
              <p>A small river named Duden flows by their place and supplies it.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 14 End */ ?>   

  <h2 class="mb-0">Feature 15</h2>
  <?php /* Feature 15 Start */ ?>     
  <section class="b-block pb-0">
    <div class="container">
      <div class="row text-right align-items-center">
        <div class="col-12 col-lg-6 col-xl-5 m-lg-auto text-left">
          <h1>Features</h1>
          <p class="text-h3 pb-xl-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

          <div class="row pt-5">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.</p>
            </div>
          </div>

          <div class="row pt-5">
            <div class="col-9 text-right">
              <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, there live the blind texts.</p>
            </div>

            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
          </div>
        </div>

        <div class="col-7 col-sm-4 m-auto pt-5 pt-md-0">
          <img alt="image" class="img-fluid br-b-0" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_tall.png">
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 15 End */ ?>   

  <h2 class="mb-0">Feature 16</h2>
  <?php /* Feature 16 Start */ ?>     
  <section class="b-block pb-md-0">
    <div class="container">
      <div class="row justify-content-center pb-xl-5">
        <div class="col-12 col-md-8 text-center">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
      </div>

      <div class="row text-right align-items-center-lg align-items-end pt-5">
        <div class="col-7 col-sm-4 m-auto mb-md-0 mt-md-0 m-lg-auto">
          <img alt="image" class="img-fluid br-b-0" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_tall.png">
        </div>

        <div class="col-12 col-md-7 col-lg-6 col-xl-5 m-auto text-left pt-5 pt-md-0">
          <h3><strong>Feature One</strong></h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.</p>

          <h3 class="mt-4 mt-xl-5"><strong>Feature Two</strong></h3>
          <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, there live the blind texts.</p>

          <h3 class="mt-4 mt-xl-5"><strong>Feature Three</strong></h3>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 16 End */ ?>   

  <h2 class="mb-0">Feature 17</h2>
  <?php /* Feature 17 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 text-left">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          <img alt="image" class="img-fluid mt-5" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_wide.svg">
        </div>
      </div>

      <div class="row text-left mt-5">
        <div class="col-12 col-md-4">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature One</strong></h3>
              <p>Far far away, behind the word mountains, far from the countries</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4 pt-4 pt-md-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Two</strong></h3>
              <p>Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4 pt-4 pt-md-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Three</strong></h3>
              <p>A small river named Duden flows by their place and supplies it</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 17 End */ ?>   

  <h2 class="mb-0">Feature 18</h2>
  <?php /* Feature 18 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 text-center">
          <h1>Features</h1>
        </div>
      </div>

      <div class="row text-center mt-5">
        <div class="col-12 col-sm-4">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature One</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
        </div>

        <div class="col-12 col-sm-4 pt-4 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature Two</strong></h3>
          <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. </p>
        </div>

        <div class="col-12 col-sm-4 pt-4 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature Three</strong></h3>
          <p>A small river named Duden flows by their place and supplies it  with the necessary regelialia. It is a paradisematic country,</p>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-12">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_wide.svg">
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 18 End */ ?>   

  <h2 class="mb-0">Feature 19</h2>
  <?php /* Feature 19 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 text-left">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
      </div>

      <div class="row text-left mt-5">
        <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto mr-md-auto ml-md-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_1.svg">
          <h3><strong>Feature One</strong></h3>
          <p>Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>

        <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto pt-5 pt-md-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_2.svg">
          <h3><strong>Feature Two</strong></h3>
          <p> It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
        </div>

        <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto ml-md-auto mr-md-0 pt-5 pt-md-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_3.svg">
          <h3><strong>Feature Three</strong></h3>
          <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 19 End */ ?>   

  <h2 class="mb-0">Feature 20</h2>
  <?php /* Feature 20 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 text-left">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

          <img alt="image" class="img-fluid mt-5" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_wide.svg">
        </div>
      </div>

      <div class="row text-left pt-5">
        <div class="col-12 col-md-6">
          <h3><strong>Feature One</strong></h3>

          <p>Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>

          <p><a href="#">Learn More &gt;</a></p>
        </div>
        <div class="col-12 col-md-6 pt-4 pt-md-0">
          <h3><strong>Feature Two</strong></h3>

          <p> It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin.</p>

          <p><a href="#">Learn More &gt;</a></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 20 End */ ?>   

  <h2 class="mb-0">Feature 21</h2>
  <?php /* Feature 21 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 text-left">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text.</p>
        </div>
      </div>

      <div class="row text-left pt-5">
        <div class="col-12 col-sm-6 col-md-5">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_2.svg">
          <h3><strong>Feature One</strong></h3>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
        </div>

        <div class="col-12 col-sm-6 col-md-5 ml-sm-auto pt-5 pt-sm-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_4.svg">
          <h3><strong>Feature Two</strong></h3>
          <p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 21 End */ ?>   

  <h2 class="mb-0">Feature 22</h2>
  <?php /* Feature 22 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center pb-5">
        <div class="col-12 text-center">
          <h1>Base Blocks</h1>
        </div>
      </div>

      <div class="row text-left align-items-center pt-5 pb-md-5">
        <div class="col-4 col-md-5">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_1.svg">
        </div>

        <div class="col-12 col-md-5 m-md-auto">
          <h2><strong>Feature One</strong></h2>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          <p><a href="#">Learn More &gt;</a></p>
        </div>
      </div>

      <div class="row text-left align-items-center pt-5 pb-md-5">
        <div class="col-4 col-md-5 m-md-auto order-md-5">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_3.svg">
        </div>

        <div class="col-12 col-md-5">
          <h2><strong>Feature Two</strong></h2>
          <p class="text-h3">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
          <p><a href="#">Learn More &gt;</a></p>
        </div>
      </div>

      <div class="row text-left align-items-center pt-5">
        <div class="col-4 col-md-5">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_2.svg">
        </div>

        <div class="col-12 col-md-5 m-md-auto">
          <h2><strong>Feature Three</strong></h2>
          <p class="text-h3">On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around.</p>
          <p><a href="#">Learn More &gt;</a></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 22 End */ ?>   

  <h2 class="mb-0">Feature 23</h2>
  <?php /* Feature 23 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-10 col-lg-8 text-left">
          <h1>Base Blocks is simply ahead the word mountains</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

          <p class="text-h3"><a href="#">Explore all features &gt;</a></p>
        </div>
      </div>

      <div class="row text-center no-gutters pt-5">
        <div class="col-12 col-md-10 col-lg-8">
          <div class="row">
            <div class="col-8 col-sm-5 col-md-2 m-auto">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <h4>Feature One</h4>
            </div>
            <div class="col-8 col-sm-5 col-md-2 m-auto pt-5 pt-sm-0">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <h4>Feature Two</h4>
            </div>
            <div class="col-8 col-sm-5 col-md-2 m-auto pt-5 pt-md-0">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <h4>Feature Three</h4>
            </div>
            <div class="col-8 col-sm-5 col-md-2 m-auto pt-5 pt-md-0">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <h4>Feature Four</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 23 End */ ?>   

  <h2 class="mb-0">Feature 24</h2>
  <?php /* Feature 24 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row align-items-top">
        <div class="col-12 col-md-6 col-xl-4 m-auto">
          <h2>Learn more about the Base Blocks you love</h2>
        </div>

        <div class="col-12 col-md-6 pt-5 pt-md-0">
          <div class="row justify-content-left">
            <div class="col-3 m-auto text-center">
              <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <p><a href="#">One &gt;</a></p>
            </div>
            <div class="col-3 m-auto text-center">
              <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <p><a href="#">Two &gt;</a></p>
            </div>
            <div class="col-3 m-auto text-center">
              <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <p><a href="#">Three &gt;</a></p>
            </div>
          </div>

          <div class="row justify-content-left mt-4 mt-xl-5">
            <div class="col-3 m-auto text-center">
              <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <p><a href="#">Four &gt;</a></p>
            </div>
            <div class="col-3 m-auto text-center">
              <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <p><a href="#">Five &gt;</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 24 End */ ?>   

  <h2 class="mb-0">Feature 25</h2>
  <?php /* Feature 25 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h1>There is a feature for everyone</h1>
          <p class="text-h3"><a href="#">See all features &gt;</a>
        </div>
      </div>

      <div class="row text-center justify-content-center mt-5">
        <div class="col-10 col-sm-3">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_1.svg">
          <h3><strong>Feature One</strong></h3>
        </div>
        <div class="col-10 col-sm-3 pt-5 pt-sm-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_4.svg">
          <h3><strong>Feature Two</strong></h3>
        </div>

        <div class="col-10 col-sm-3 pt-5 pt-sm-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_2.svg">
          <h3><strong>Feature Three</strong></h3>
        </div>

        <div class="col-10 col-sm-3 pt-5 pt-sm-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_3.svg">
          <h3><strong>Feature Four</strong></h3>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 25 End */ ?>   

  <h2 class="mb-0">Feature 26</h2>
  <?php /* Feature 26 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row align-items-center pb-xl-5">
        <div class="col-12 col-md-7 col-xl-5">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
        <div class="col-12 col-sm-6 col-md-4 m-sm-auto mr-md-0 ml-md-auto pt-4 pt-md-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_1.svg">
        </div>
      </div>

      <div class="row pt-5">
        <div class="col-12 col-sm-6 col-md-3">
          <h3><strong>Feature One</strong></h3>
          <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large ocean.</p>
        </div>

        <div class="col-12 col-sm-6 col-md-3 pt-3 pt-sm-0">
          <h3><strong>Feature Two</strong></h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
        </div>

        <div class="col-12 col-sm-6 col-md-3 pt-3 pt-md-0">
          <h3><strong>Feature Three</strong></h3>
          <p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        </div>

        <div class="col-12 col-sm-6 col-md-3 pt-3 pt-md-0">
          <h3><strong>Feature Four</strong></h3>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 26 End */ ?>   

  <h2 class="mb-0">Feature 27</h2>
  <?php /* Feature 27 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center pb-xl-5">
        <div class="col-12 col-sm-11 text-center">
          <h1>Base Blocks</h1>
          <img alt="image" class="img-fluid mt-5" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_wide.svg">
        </div>
      </div>

      <div class="row text-left justify-content-center pt-5">
        <div class="col-12 col-md-6 col-lg-5 m-sm-auto">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature One</strong></h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-5 m-sm-auto pt-3 pt-sm-5 pt-md-0">
          <div class="row">
            <div class="col-3">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>
            <div class="col-9">
              <h3><strong>Feature Two</strong></h3>
              <p>Separated they live in Bookmarksgrove, right at the coast of the Semantics, a large language ocean.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 27 End */ ?>   

  <h2 class="mb-0">Feature 28</h2>
  <?php /* Feature 28 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h1>Features</h1>
        </div>
      </div>
      <div class="row text-center justify-content-center mt-5">
        <div class="col-12 col-md-4 col-lg-3 m-md-auto">
          <h3><strong>Feature 1</strong></h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>

        <div class="col-12 col-md-4 col-lg-3 m-md-auto pt-3 pt-md-0">
          <h3><strong>Feature 2</strong></h3>
          <p>Separated they live in Bookmarksgrove right at the coast, a large language ocean.</p>
        </div>

        <div class="col-12 col-md-4 col-lg-3 m-md-auto pt-3 pt-md-0">
          <h3><strong>Feature 3</strong></h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 28 End */ ?>   

  <h2 class="mb-0">Feature 29</h2>
  <?php /* Feature 29 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12col-md-10 col-lg-8 text-center">
          <h1>Base Blocks</h1>
        </div>
      </div>

      <div class="row justify-content-center text-center mt-5">
        <div class="col-12 col-sm-6 col-md-5 col-lg-3">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature one longer Text</strong></h3>
        </div>

        <div class="col-12 col-sm-6 col-md-5 col-lg-3 pt-4 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Feature two shorter</strong></h3>
        </div>
      </div>

      <div class="row justify-content-center text-center mt-5 mt-md-4">
        <div class="col-12 col-md-10 col-lg-8">
          <img alt="image" class='img-fluid' src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_wide.svg">
          <p><em>Coming this fall</em></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 29 End */ ?>   

  <h2 class="mb-0">Feature 30</h2>
  <?php /* Feature 30 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12 col-sm-6 col-md-3">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>The all-powerful Pointing has no control</strong></h3>
          <p class="mt-3"><a class="btn" href="#">Learn</a></p>
        </div>

        <div class="col-12 col-sm-6 col-md-3 pt-5 pt-sm-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>Far far away, behind the word mountains</strong></h3>
          <p class="mt-3"><a class="btn" href="#">Learn</a></p>
        </div>

        <div class="col-12 col-sm-6 col-md-3 pt-5 pt-md-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>The Big Oxmox advised her not to do so</strong></h3>
          <p class="mt-3"><a class="btn" href="#">Learn</a></p>
        </div>

        <div class="col-12 col-sm-6 col-md-3 pt-5 pt-md-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3><strong>The copy warned the Little Blind Text</strong></h3>
          <p class="mt-3"><a class="btn" href="#">Learn</a></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 30 End */ ?>   

  <h2 class="mb-0">Feature 31</h2>
  <?php /* Feature 31 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12 col-md-8 m-auto col-lg-4">
          <div class="b-box b-touch">
            <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            <h2>Feature 1</h2>
            <p>Far far away, behind the word mountains, far from the countries.</p>
          </div>
        </div>

        <div class="col-12 col-md-8 m-auto col-lg-4 pt-5 pt-lg-0">
          <div class="b-box b-touch">
            <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            <h2>Feature 2</h2>
            <p>Separated they live in Bookmarksgrove right at the coast.</p>
          </div>
        </div>

        <div class="col-12 col-md-8 m-auto col-lg-4 pt-5 pt-lg-0">
          <div class="b-box b-touch">
            <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            <h2>Feature 3</h2>
            <p>A small river named Duden flows by their place and supplies.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 31 End */ ?>   

  <h2 class="mb-0">Feature 32</h2>
  <?php /* Feature 32 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row text-left">
        <div class="col-12 col-md-8 m-auto col-lg-4">
          <div class="b-box b-touch">
            <h2>Feature 1</h2>
            <p>Far far away, behind the word mountains, far from the country Vokalia, there live the blind texts.</p>
            <p><a href="#">Read more</a></p>
          </div>
        </div>
        <div class="col-12 col-md-8 m-auto col-lg-4 pt-5 pt-lg-0">
          <div class="b-box b-touch">
            <h2>Feature 2</h2>
            <p>Separated they live in Bookmarks right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#">Read more</a></p>
          </div>
        </div>
        <div class="col-12 col-md-8 m-auto col-lg-4 pt-5 pt-lg-0">
          <div class="b-box b-touch">
            <h2>Feature 3</h2>
            <p>A small river named Duden flows by their small place and supplies it with the necessary regelialia.</p>
            <p><a href="#">Read more</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 32 End */ ?>   

  <h2 class="mb-0">Feature 33</h2>
  <?php /* Feature 33 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row text-left">
        <div class="col-12 col-md-4">
          <h2>Feature One</h2>
          <p><strong>Far far away</strong>, behind the word mountains, far from the countries <a href="#">Vokalia and Consonantia</a>, there live the blind texts.</p>
        </div>

        <div class="col-12 col-md-4 pt-5 pt-sm-4 pt-md-0">
          <h2>Feature Two</h2>
          <p> A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
        </div>

        <div class="col-12 col-md-4 pt-5 pt-sm-4 pt-md-0">
          <h2>Feature Three</h2>
          <p>Even the all-powerful Pointing has no control about the <strong>blind texts</strong> it is an almost unorthographic life.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Feature 33 End */ ?>   
  
</article>  

<?php
  get_footer();
