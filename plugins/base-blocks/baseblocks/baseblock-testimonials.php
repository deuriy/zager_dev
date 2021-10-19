<?php
/**
 * Template Name: Testimonials
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
    <a href="<?php echo bloginfo('url'); ?>/baseblock/index/#testimonials" class="mt-4 btn w-50 ml-auto mr-auto d-block text-center"><h3>See Contained</h3></a>
  <?php } ?>  
  
  <h2 class="mb-0">Testimonial 01</h2>
  <?php /* Testimonial 01 Start */ ?>     
  <section class="b-block">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
          <p class="text-h3">
            "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean."
          </p>

          <p class="text-h3"><strong>Person Name</strong>&nbsp; &nbsp;&nbsp;<em>Co-founder at Company</em></p>
        </div>
        <div class="col-8 col-sm-6 col-md-2 col-lg-3 col-xl-2 mt-4 mt-md-0 ml-auto mr-auto mr-md-0">
          <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"/>
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 01 End */ ?>   
  
  <h2 class="mb-0">Testimonial 02</h2>
  <?php /* Testimonial 02 Start */ ?>   
  <section class="b-block" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_3.svg)">
    <div class="container">
      <div class="b-box">
        <div class="row align-items-center justify-content-center">
          <div class="col-10 col-sm-6 col-md-4 col-lg-3 col-xl-2 m-auto">
            <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"/>
          </div>

          <div class="col-12 col-md-8 ml-auto mr-auto mt-4 mt-md-0">
            <p class="text-h3">
              "Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar."
            </p>

            <p class="text-h3 mt-4 mt-lg-5"><strong>Person Name</strong></p>
            <p><em>Co-founder at Company</em></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 02 End */ ?>   

  <h2 class="mb-0">Testimonial 03</h2>
  <?php /* Testimonial 03 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h3><strong>You are in good company</strong></h3>

          <div class="mt-5 justify-content-center">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/adobe.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/discovery.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/ebay.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/samsung.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/orange.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/salesforce.svg">
          </div>
          <div class="mt-2 mt-md-5 justify-content-center">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/cisco.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/apple.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/ibm.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/intel.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/panasonic.svg">
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 03 End */ ?>   

  <h2 class="mb-0">Testimonial 04</h2>
  <?php /* Testimonial 04 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-6">
          <div class="b-box b-touch">
            <p class="text-h3 mb-4">"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics."</p>

            <p>
              <img alt="image" height="50" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <strong class="ml-3">Person Name</strong>
            </p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0">
          <div class="b-box b-touch">
            <p class="text-h3 mb-4">"A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth."</p>

            <p>
              <img alt="image" height="50" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg">
              <strong class="ml-3">Person Name</strong>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 04 End */ ?>   

  <h2 class="mb-0">Testimonial 05</h2>
  <?php /* Testimonial 05 Start */ ?>   
  <section class="b-block" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_2.svg)">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-9 col-xl-6">
          <div class="b-box">
            <div class="row">
              <div class="col-8 col-sm-6 col-md-4 col-xl-3 ml-auto mr-auto">
                <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"/>
              </div>

              <div class="col-md-8 mt-4 mt-md-0">
                <p class="text-h3">
                  "Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar."
                </p>

                <p class="text-h3 mt-4 mt-xl-5"><strong>Person Name</strong></p>
                <p><em>Co-founder at Company</em></p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-9 col-xl-6 mt-4 mt-xl-0">
          <div class="b-box">
            <div class="row">
              <div class="col-8 col-sm-6 col-md-4 col-xl-3 ml-auto mr-auto">
                <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"/>
              </div>

              <div class="col-md-8 mt-4 mt-md-0">
                <p class="text-h3">
                  "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean."
                </p>

                <p class="text-h3 mt-4 mt-xl-5"><strong>Person Name</strong></p>
                <p><em>Co-founder at Company</em></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 05 End */ ?>   

  <h2 class="mb-0">Testimonial 06</h2>
  <?php /* Testimonial 06 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-lg-8">
          <h2>You are in good company</h2>
          <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          <div class="mt-5 justify-content-center">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/adobe.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/discovery.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/ebay.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/samsung.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/orange.svg">
            <img alt="image" height="30" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/salesforce.svg">
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 06 End */ ?>   

  <h2 class="mb-0">Testimonial 07</h2>
  <?php /* Testimonial 07 Start */ ?>   
  <section class="b-block bg-dark">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col">
          <img alt="image" height="40" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/adobe.svg">
          <img alt="image" height="40" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/discovery.svg">
          <img alt="image" height="40" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/ebay.svg">
          <img alt="image" height="40" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/samsung.svg">
          <img alt="image" height="40" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/orange.svg">
          <img alt="image" height="40" class="ml-3 mr-3 mb-2 mt-2" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/salesforce.svg">
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 07 End */ ?>   

  <h2 class="mb-0">Testimonial 08</h2>
  <?php /* Testimonial 08 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row pb-xl-5 text-center justify-content-center">
        <div class="col-md-10 col-lg-7">
          <h1>Testimonials</h1>
        </div>
      </div>

      <div class="row mt-5 justify-content-center">
        <div class="col-md-8 col-lg-4 col-xl-3 m-auto text-center">
          <img alt="image" height="50" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/intel.svg">
          <p class="text-h3 mt-3">"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia."</p>

          <p class="text-h3 mt-4 mt-xl-5"><strong>Person Name</strong></p>
          <p>Co-founder at Company</p>
        </div>

        <div class="col-md-8 col-lg-4 col-xl-3 pt-5 pt-lg-0 m-auto text-center">
          <img alt="image" height="50" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/apple.svg">
          <p class="text-h3 mt-3">"Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean."</p>

          <p class="text-h3 mt-4 mt-xl-5"><strong>Person Name</strong></p>
          <p>Co-founder at Company</p>
        </div>

        <div class="col-md-8 col-lg-4 col-xl-3 pt-5 pt-lg-0 m-auto text-center">
          <img alt="image" height="50" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>customers/samsung.svg">
          <p class="text-h3 mt-3">"A small river named Duden flows by their place and supplies it with the necessary regelialia."</p>

          <p class="text-h3 mt-4 mt-xl-5"><strong>Person Name</strong></p>
          <p>Co-founder at Company</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 08 End */ ?>   

  <h2 class="mb-0">Testimonial 09</h2>
  <?php /* Testimonial 09 Start */ ?>   
  <section class="b-block bg-dark" style="background-image: url(<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>bg_4.svg)">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
          <h1>Testimonials</h1>
          <p class="text-h3">A small river named Duden flows by their place and supplies it with the necessary regelialia. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
        </div>
      </div>

      <div class="row mt-5 align-items-center justify-content-center">
        <div class="col-md-8 col-lg-4">
          <div class="b-box">
            <div class="row no-gutters align-items-center">
              <div class="col-3">
                <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"/>
              </div>
              <div class="col-8 ml-auto">
                <p>
                  <strong>Person Name</strong><br>
                  <em>Co-founder at Company</em>
                </p>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12">
                <p class="text-h3">
                  "Even the all-powerful Pointing has no control about the blind texts it is an unorthographic life. One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar."
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8 col-lg-4 mt-4 mt-lg-0">
          <div class="b-box">
            <div class="row no-gutters align-items-center">
              <div class="col-3">
                <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"/>
              </div>
              <div class="col-8 ml-auto">
                <p>
                  <strong>Person Name</strong><br>
                  <em>Co-founder at Company</em>
                </p>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12">
                <p class="text-h3">
                  "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean."
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8 col-lg-4 mt-4 mt-lg-0">
          <div class="b-box">
            <div class="row no-gutters align-items-center">
              <div class="col-3">
                <img alt="image" class="img-fluid" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"/>
              </div>
              <div class="col-8 ml-auto">
                <p>
                  <strong>Person Name</strong><br>
                  <em>Co-founder at Company</em>
                </p>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12">
                <p class="text-h3">
                  "Separated they live in Bookmarksgrove right at the coast of the Semantics, far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts."
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 09 End */ ?>   

  <h2 class="mb-0">Testimonial 10</h2>
  <?php /* Testimonial 10 Start */ ?>   
  <section class="b-block">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-md-10 col-lg-7">
          <h1>Testimonials</h1>
        </div>
      </div>

      <div class="row mt-5 justify-content-center">
        <div class="col-md-10 col-lg-3 ml-auto mr-auto text-center">
          <p class="text-h3 mb-4 mb-lg-5">"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia."</p>

          <p><img alt="image" height="50" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"></p>
          <p class="text-h3"><strong>Person Name</strong></p>
          <p>Co-founder, Company</p>
        </div>

        <div class="col-md-10 col-lg-3 pt-5 pt-lg-0 ml-auto mr-auto text-center">
          <p class="text-h3 mb-4 mb-lg-5">"Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean."</p>

          <p><img alt="image" height="50" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"></p>
          <p class="text-h3"><strong>Person Name</strong></p>
          <p>Co-founder, Company</p>
        </div>

        <div class="col-md-10 col-lg-3 pt-5 pt-lg-0 ml-auto mr-auto text-center">
          <p class="text-h3 mb-4 mb-lg-5">"A small river named Duden flows by their place and supplies it with the necessary regelialia."</p>

          <p><img alt="image" height="50" src="<?php echo content_url('/plugins/reaction/baseblocks/img/'); ?>img_round.svg"></p>
          <p class="text-h3"><strong>Person Name</strong></p>
          <p>Co-founder, Company</p>
        </div>
      </div>
    </div>
  </section>
  <?php /* Testimonial 10 End */ ?>   
  
</article>

<?php
  get_footer();
