<?php
/**
 * Template Name: Teams
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
    <a href="<?php echo bloginfo('url'); ?>/baseblock/index/#teams" class="mt-4 btn w-50 ml-auto mr-auto d-block text-center"><h3>See Contained</h3></a>
  <?php } ?>  

  <h2 class="mb-0">Team 01</h2>
  <?php /* Team 01 Start */ ?>   
  <section class="b-block team-1">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-8">
          <h1>Our Team</h1>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries.</p>
        </div>
      </div>

      <div class="row-50"></div>

      <div class="row">
        <div class="col-sm-3 text-left">
          <div class="b-box">
            <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_1.svg">

            <div class="content">
              <h3><strong>Sara Doe</strong></h3>
              <p>Founder</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 text-left">
          <div class="b-box">
            <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_2.svg">

            <div class="content">
              <h3><strong>Sara Doe</strong></h3>
              <p>Founder</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 text-left">
          <div class="b-box">
            <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_3.svg">

            <div class="content">
              <h3><strong>Sara Doe</strong></h3>
              <p>Founder</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 text-left">
          <div class="b-box">
            <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_square_4.svg">

            <div class="content">
              <h3><strong>Sara Doe</strong></h3>
              <p>Founder</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Team 01 End */ ?>   

  <h2 class="mb-0">Team 02</h2>
  <?php /* Team 02 Start */ ?>   
  <section class="b-block team-2">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-8">
          <h1>Meet Our Team</h1>
        </div>
      </div>

      <div class="row-50"></div>

      <div class="row text-center justify-content-center">
        <div class="col-sm-3 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h2>Sara Doe</h2>
          <p>Founder</p>
        </div>

        <div class="col-sm-3 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h2>Sara Doe</h2>
          <p>Founder</p>
        </div>

        <div class="col-sm-3 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h2>Sara Doe</h2>

          <p>Founder</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Team 02 End */ ?>   

  <h2 class="mb-0">Team 03</h2>
  <?php /* Team 03 Start */ ?>   
  <section class="b-block team-3">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-8">
          <h1>Meet Our Team</h1>
        </div>
      </div>

      <div class="row-70"></div>

      <div class="row text-center justify-content-center">
        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p><em>Founder</em></p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p><em>Founder</em></p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p><em>Founder</em></p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p><em>Founder</em></p>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p><em>Founder</em></p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p><em>Founder</em></p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p><em>Founder</em></p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Team 03 End */ ?>   

  <h2 class="mb-0">Team 04</h2>
  <?php /* Team 04 Start */ ?>   
  <section class="b-block team-4">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-8">
          <h1>Team</h1>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-3">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
          <h3><strong>John Smith</strong></h3>
          <p>Position</p>
          <p>A wonderful serenity has taken possession of my entire soul.</p>
        </div>

        <div class="col-3">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
          <h3><strong>John Smith</strong></h3>
          <p>Position</p>
          <p>Pityful a rethoric question ran over her cheek.</p>
        </div>

        <div class="col-3">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
          <h3><strong>John Smith</strong></h3>
          <p>Position</p>
          <p>And if she hasn’t been rewritten, then they are still using her.</p>
        </div>

        <div class="col-3">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
          <h3><strong>John Smith</strong></h3>
          <p>Position</p>
          <p>Wild Question Marks, but the Little Blind Text didn’t listen.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Team 04 End */ ?>   

  <h2 class="mb-0">Team 05</h2>
  <?php /* Team 05 Start */ ?>   
  <section class="b-block team-5">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-8">
          <h1>Meet Our Team</h1>
        </div>
      </div>

      <div class="row-70"></div>

      <div class="row text-center justify-content-center">
        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p>"Wild Question Marks, but the Little Blind"</p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p>"Wild Question Marks, but the Little Blind"</p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p>"Wild Question Marks, but the Little Blind"</p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p>"Wild Question Marks, but the Little Blind"</p>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        <div class="col-sm-2  m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p>"Wild Question Marks, but the Little Blind"</p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p>"Wild Question Marks, but the Little Blind"</p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p>"Wild Question Marks, but the Little Blind"</p>
        </div>

        <div class="col-sm-2 m-sm-auto">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">

          <h3><strong>Sara Doe</strong></h3>
          <p>"Wild Question Marks, but the Little Blind"</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Team 05 End */ ?>   

  <h2 class="mb-0">Team 06</h2>
  <?php /* Team 06 Start */ ?>   
  <section class="b-block team-6">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-8">
          <h1>Team</h1>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-4">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
          <h3><strong>John Smith</strong></h3>
          <p>Position</p>
          <p>Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
        </div>

        <div class="col-4">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
          <h3><strong>John Smith</strong></h3>
          <p>Position</p>
          <p>One morning, when Gregor Samsa woke from troubled dreams.</p>
        </div>

        <div class="col-4">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>colors_wide_1.jpg">
          <h3><strong>John Smith</strong></h3>
          <p>Position</p>
          <p>A small river named Duden flows by their place and supplies it.</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Team 06 End */ ?>   

  <h2 class="mb-0">Team 07</h2>
  <?php /* Team 07 Start */ ?>   
  <section class="b-block team-7">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-8">
          <h1>Team</h1>
        </div>
      </div>

      <div class="row-70"></div>

      <div class="row justify-content-center">
        <div class="col-sm-3 m-sm-auto">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3>Employee Name</h3>
              <p>Position</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 m-sm-auto">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3>Employee Name</h3>
              <p>Position</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 m-sm-auto">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3>Employee Name</h3>
              <p>Position</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row-50"></div>

      <div class="row justify-content-center">
        <div class="col-sm-3 m-sm-auto">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3>Employee Name</h3>
              <p>Position</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 m-sm-auto">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3>Employee Name</h3>
              <p>Position</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 m-sm-auto">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3>Employee Name</h3>
              <p>Position</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row-50"></div>

      <div class="row justify-content-center">
        <div class="col-sm-3 m-sm-auto">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3>Employee Name</h3>
              <p>Position</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 m-sm-auto">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3>Employee Name</h3>
              <p>Position</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 m-sm-auto">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3>Employee Name</h3>
              <p>Position</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Team 07 End */ ?>   

  <h2 class="mb-0">Team 08</h2>
  <?php /* Team 08 Start */ ?>   
  <section class="b-block team-8">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-8">
          <h1>Our Amazing Team</h1>
          <p class="text-h3">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        </div>
      </div>

      <div class="row-100"></div>

      <div class="row justify-content-center text-left">
        <div class="col-sm-6">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3><strong>Employee Name</strong></h3>
              <p class="text-h3">Position</p>

              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3><strong>Employee Name</strong></h3>
              <p class="text-h3">Position</p>

              <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row-70"></div>

      <div class="row justify-content-center text-left">
        <div class="col-sm-6">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3><strong>Employee Name</strong></h3>
              <p class="text-h3">Position</p>

              <p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="row align-items-center">
            <div class="col-4">
              <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
            </div>

            <div class="col-8">
              <h3><strong>Employee Name</strong></h3>
              <p class="text-h3">Position</p>

              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Team 08 End */ ?>   
  
</article>

<?php
  get_footer();
