<?php
/**
 * Template Name: CTA
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
    <a href="<?php echo bloginfo('url'); ?>/baseblock/index/#cta" class="mt-4 btn w-50 ml-auto mr-auto d-block text-center"><h3>See Contained</h3></a>
  <?php } ?>  
  
  <h2 class="mb-0">CTA 01</h2>
  
  <?php /* CTA 01 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 text-center">
          <p class="text-h3">
            "Separated they live in Bookmarksgrove right at the coast of the Semantics, far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast."
          </p>

          <p class="mt-5 mt-sm-4">
            <a class="btn" href="#">Download</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 01 End */ ?>  

  <h2 class="mb-0">CTA 02</h2> 
  <?php /* CTA 02 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 text-center">
          <h1>Call to Action</h1>
          <p class="text-h3">
            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts
          </p>
          <p class="mt-5 mt-sm-4">
            <a class="btn" href="#">Download</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 02 End */ ?>  
    
  <h2 class="mb-0">CTA 03</h2>
  <?php /* CTA 03 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4 text-center">
          <h3>
            <strong>Right at the coast of the Semantics, a large language ocean. A small river named Duden.</strong>
          </h3>
          <p class="mt-5 mt-sm-4">
            <a class="btn" href="#">Download</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 03 End */ ?>  
  
  <h2 class="mb-0">CTA 04</h2>
  <?php /* CTA 04 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 text-center">
          <h1>Call to Action</h1>
          <p class="text-h3">
            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts
          </p>
          <p class="mt-5 mt-sm-4">
            <a class="btn" href="#">Download</a>
          </p>
        </div>
      </div>

      <div class="row pt-5 pb-3">
        <div class="col-12 text-center">
          <p><strong>Fortune 100 companies are using our products</strong></p>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/adobe.svg">
          <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/discovery.svg">
          <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/ebay.svg">
          <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/samsung.svg">
          <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/orange.svg">
          <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/salesforce.svg">
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 04 End */ ?>  
  
  <h2 class="mb-0">CTA 05</h2>
  <?php /* CTA 05 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 text-center">
          <h1>Far far away, behind the word mountains, far from</h1>
          <p class="mt-5">
            <a class="btn" href="#">Download</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 05 End */ ?>  
  
  <h2 class="mb-0">CTA 06</h2>
  <?php /* CTA 06 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-4 text-center">
          <p class="text-h3">
            Follow us and ask more on:
          </p>
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
  <?php /* CTA 06 End */ ?>  
  
  <h2 class="mb-0">CTA 07</h2>
  <?php /* CTA 07 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row text-center pb-0 pb-lg-4">
        <div class="col-12">
          <h1>Call to action</h1>
        </div>
      </div>
      <div class="row text-center pt-4 pt-md-5">
        <div class="col-12 col-sm-10 col-md-6 col-lg-4 m-sm-auto">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3>First Action</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
          <p class="mt-3"><a class="btn" href="#">Button</a></p>
        </div>

        <div class="col-12 col-sm-10 col-md-6 col-lg-4 ml-sm-auto mr-sm-auto mt-5 mt-md-0">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h3>Second Action</h3>
          <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          <p class="mt-3"><a class="btn" href="#">Button</a></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 07 End */ ?>  
  
  <h2 class="mb-0">CTA 08</h2>
  <?php /* CTA 08 Start */ ?>
  <section class="b-block" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_c_1.svg)">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 text-center">
          <div class="b-box">
            <h1>Call to Action</h1>
            <p class="text-h3">
              Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts
            </p>
            <p class="mt-4">
              <a class="btn" href="#">Download</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 08 End */ ?>  
  
  <h2 class="mb-0">CTA 09</h2>
  <?php /* CTA 09 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-sm-9 text-left">
          <h2>Use Base Blocks for free in your project</h2>
        </div>
        <div class="col-12 col-sm-3 text-left text-sm-center mt-4 mt-sm-0">
          <a class="btn" href="#">Download</a>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 09 End */ ?>  
  
  <h2 class="mb-0">CTA 10</h2>
  <?php /* CTA 10 Start */ ?>  
  <section class="b-block pb-0" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_1.svg)">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-12 col-md-8 col-lg-6 text-center">
          <div class="b-box br-0">
            <h1>Call to Action</h1>
            <p class="text-h3">
              When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove
            </p>
            <p class="mt-4">
              <a class="btn" href="#">Download</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 10 End */ ?>  
  
  <h2 class="mb-0">CTA 11</h2>
  <?php /* CTA 11 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-sm-3 text-center">
          <a class="btn" href="#">Download</a>
        </div>

        <div class="col-12 col-sm-9 text-center text-sm-right mt-4 mt-sm-0">
          <h2>Use Base Blocks for free in your project</h2>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 11 End */ ?>  
  
  <h2 class="mb-0">CTA 12</h2>
  <?php /* CTA 12 Start */ ?>  
  <section class="b-block" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>alt_wide_2.svg)">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-left">
          <h1>Call to Action</h1>
          <p class="text-h3">
            A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
          </p>
          <p class="mt-4">
            <a class="btn" href="#">Download</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 12 End */ ?>  
  
  <h2 class="mb-0">CTA 13</h2>
  <?php /* CTA 13 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Base Blocks</h1>
          <p class="text-h3">
            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.
          </p>
        </div>
      </div>

      <div class="row justify-content-center align-items-center pt-5">
        <div class="col-8 col-sm-3">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_2.svg">
        </div>
        <div class="col-12 col-sm-6 m-auto pt-4 pt-sm-0">
          <h2><strong>Bootstrap</strong></h2>
          <p class="text-h3">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
        </div>
        <div class="col-12 col-sm-3 text-center pt-4 pt-sm-0">
          <p><a class="btn btn-empty" href="#">Take a Tour</a></p>
          <p><a class="btn" href="#">Start Now</a></p>
          <p class="text-h5"><em>Some foo text</em></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 13 End */ ?>  
  
  <h2 class="mb-0">CTA 14</h2>
  <?php /* CTA 14 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1>Base Blocks</h1>
          <p class="text-h2">
            Far far away, behind the word mountains, far from.
          </p>
        </div>
      </div>

      <div class="row align-items-center pt-2 pt-lg-5">
        <div class="col-12 col-md-8 col-lg-7">
          <h2>Call to action</h2>
          <p class="text-h3">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
          <p class="mt-4"><a class="btn" href="#">Take a Tour</a></p>
        </div>

        <div class="col-8 col-md-4 m-auto m-md-0 ml-md-auto pt-5">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_1.svg">
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 14 End */ ?>  
  
  <h2 class="mb-0">CTA 15</h2>
  <?php /* CTA 15 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-10 col-sm-6 col-md-4 col-lg-3 m-auto m-md-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_4.svg">
        </div>

        <div class="col-12 col-md-8 ml-auto pt-5 pt-md-0">
          <h2>Call to action</h2>
          <p class="text-h3">On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>
          <p class="mt-4"><a class="btn" href="#">Take a Tour</a></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 15 End */ ?>  
  
  <h2 class="mb-0">CTA 16</h2>
  <?php /* CTA 16 Start */ ?>  
  <section class="b-block bg-dark b-viewport" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_c_1.svg);">
    <div class="container align-items-center justify-content-center d-flex">
      <div class="row justify-content-center text-center">
        <div class="col-12 col-md-10 col-lg-8">
          <h1>Base Blocks is Open Source and free to use in your apps</h1>
          <p class="mt-5"><a href="#" class="btn">Call to Action</a></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 16 End */ ?>  
  
  <h2 class="mb-0">CTA 17</h2>
  <?php /* CTA 17 Start */ ?>  
  <section class="b-block b-viewport bg-dark" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_0.svg)">
    <div class="container justify-content-center align-items-center d-flex">
      <div class="row justify-content-center text-center">
        <div class="col-12 col-md-8">
          <img alt="image" class="b-icon" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <p class="mt-5"><a href="#" class="btn">Call to Action</a></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 17 End */ ?>  
  
  <h2 class="mb-0">CTA 18</h2>
  <?php /* CTA 18 Start */ ?>  
  <section class="b-block pb-0">
    <div class="container align-items-end justify-content-center d-flex">
      <div class="row align-items-top text-left">
        <div class="col-12 col-md-6 col-lg-5">
          <p class="mb-5 mt-5"><img alt="image" height="40" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_logo.png"></p>
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          <p class="mt-4"><a href="#" class="btn">Call to Action</a></p>
        </div>

        <div class="col-12 col-sm-4 col-md-6 col-lg-4 m-auto pt-5">
          <img alt="image" class="img-fluid br-0" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_tall.png">
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 18 End */ ?>  
  
  <h2 class="mb-0">CTA 19</h2>
  <?php /* CTA 19 Start */ ?>
  <section class="b-block">
    <div class="container align-items-center justify-content-center d-flex">
      <div class="row align-items-center text-left">
        <div class="col-12 col-sm-6">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
        </div>

        <div class="col-12 col-lg-5 ml-auto pt-5 pt-lg-0">
          <h1>Base Blocks</h1>
          <p class="text-h3">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
          <p class="mt-4"><a href="#" class="btn">Call to Action</a></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 19 End */ ?>  
  
  <h2 class="mb-0">CTA 20</h2>
  <?php /* CTA 20 Start */ ?>  
  <section class="b-block pb-0">
    <div class="container">
      <div class="row align-items-center text-left">
        <div class="col-12 col-md-8">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
        </div>
        <div class="col-12 col-md-3 ml-auto text-left text-md-right">
          <p><a href="#" class="btn">Call to Action</a></p>
        </div>
      </div>

      <div class="row pt-5">
        <div class="col-12">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_very_wide.svg">
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 20 End */ ?>  
  
  <h2 class="mb-0">CTA 21</h2>
  <?php /* CTA 21 Start */ ?>  
  <section class="b-block b-viewport" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>alt_wide_1.svg)">
    <div class="container align-items-center justify-content-center d-flex">
      <div class="row align-items-center text-left">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
          <h1>Base Blocks is build on Boostrap Framework</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there.</p>
          <p class="mt-5"><a href="#" class="btn btn-shadow">Call to Action</a> <a href="#" class="btn btn-white btn-shadow">Button</a></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 21 End */ ?>  
  
  <h2 class="mb-0">CTA 22</h2>
  <?php /* CTA 22 Start */ ?>
  <section class="b-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-5 text-center pb-md-5">
          <h1>Base Blocks</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
          <p class="mt-4"><a href="#" class="btn">Call to Action</a></p>
        </div>
      </div>

      <div class="row text-center justify-content-center pt-5">
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

          <p>Far far away, behind the word mountains, far from the countries</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* CTA 22 End */ ?>  
  
</article>

<?php
  get_footer();