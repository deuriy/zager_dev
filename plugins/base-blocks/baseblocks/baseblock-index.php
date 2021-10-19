<?php
/**
 * Template Name: Index
 * Template Post Type: baseblock
 * @package _rebase
 */

get_header(); ?>

    <div id="primary" class="content-area container">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">

                    <article class="w-100 p-0">
                        <header class="entry-header">
                            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        </header>

                        <div class="entry-content">

                            <header class="b-block p-2 border-0" id="navigator">
                                <div class="container-fluid">
                                  <nav class="navbar navbar-expand-md">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigatorblocks" aria-controls="navigatorblocks" aria-expanded="false" aria-label="Toggle navigation">
                                      <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse flex-wrap navbar-collapse m-0 justify-content-center" id="navigatorblocks">
                                        <a id="cta" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/cta?index=true">Call to Action</a>
                                        <a id="contacts" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/contacts?index=true">Contacts</a>
                                        <a id="contents" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/contents?index=true">Contents</a>
                                        <a id="css" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/css?index=true">Typography</a>
                                        <a id="features" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/features?index=true">Features</a>
                                        <a id="footers" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/footers?index=true">Footers</a>
                                        <a id="forms" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/forms?index=true">Forms</a>
                                        <a id="headers" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/headers?index=true">Headers</a>
                                        <a id="pricings" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/pricings?index=true">Pricings</a>
                                        <a id="teams" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/teams?index=true">Teams</a>
                                        <a id="testimonials" class="btn btn-empty m-1"
                                           href="<?php echo bloginfo('url'); ?>/baseblock/testimonials?index=true">Testimonials</a>
                                    </div>
                                  </nav>
                                </div>
                            </header>

                            <div id="playground">
                                <span class="w-50 ml-auto mr-auto d-block text-center font-weight-bold">Select a category to begin</span>
                            </div>

                            <script>
                              // This function actually queries the URL and gathers the data from the page
                              // Grabs everything from the url between the <article> tags and returns it as a callback
                              var get = function (url, callback) {
                                var xhr = new XMLHttpRequest()

                                xhr.onreadystatechange = function () {
                                  if (xhr.readyState == 4 && xhr.status == 200) {
                                    var txt = xhr.responseText
                                    txt = txt.split('<article>')[1].split('</article>')[0]
                                    callback(txt)
                                  }
                                }

                                xhr.open('GET', url, false)
                                xhr.send()
                              }
                              
                              // Prevent the default function and then add the buttons id to the location hash
                              // Use the get function to retrieve the content and append it to the playground
                              var chooseBlock = function (e) {
                                e.preventDefault()
                                location.hash = '#' + this.id;
                                get(this.href, function (resp) {
                                  document.querySelector('#playground').innerHTML = resp
                                })
                              }

                              // Select all blocks in the navigator section and add a click event listener to each one
                              // When a block is clicked trigger the chooseBlock function
                              var els = document.querySelectorAll('#navigator a')
                              for (var i = 0; i < els.length; i++) {
                                var el = els[i]

                                el.addEventListener('click', chooseBlock)
                              }

                              // Action happens when we load the url with a hash variable.
                              // Take the hash and see if a button with that id exists then trigger a click on that button.
                              var stringId = window.location.hash
                              if(stringId){
                                stringId=stringId.slice( 1 )
                                document.getElementById(stringId).click()
                              }

                            </script>

                        </div><!-- .entry-content -->

                    </article>

                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
