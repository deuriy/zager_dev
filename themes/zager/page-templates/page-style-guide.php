<?php
/**
 * Template Name: Style Guide
 *
 * This template can be used to review typical styles applied across the website.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action('wp_head', 'style_guide_custom_styles', 100);

function style_guide_custom_styles() {
echo "<style>
section.style-guide {padding: 2em 0; margin-bottom: 1em; border-bottom: 2px solid black;}
section.style-guide h1.section-heading { margin-bottom: 1em; }
section.style-guide h2.section-subheading { margin-bottom: 1em; }
.color-box { height: 100px; }
#grid-layout .row { position: relative; z-index: -1; }
#grid-layout .col:before { position: absolute; z-index: -1; content: ''; top:0; left:0.75em; right:0.75em; bottom:0; background-color: pink; }
</style>";
}

get_header();

?>

<div class="wrapper py-4" id="page-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

		<div class="row primary-content-wrapper">

			<?php get_template_part( 'sidebar-templates/sidebar', 'page' ); ?>

			<div class="content-area" id="primary">
				<main class="site-main" id="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						?>

						<hr>

						<article class="page type-page status-publish hentry">

						<header class="entry-header">
							<h1 class="entry-title">Style Guide</h1>
						</header>

						<div class="entry-content clearfix">

						<section class="style-guide toc">

							<p>Use this style guide to ensure all elements match the feel of the developed website. Included are some edge cases and non-typical elements to ensure we future proof the theme for requests which may arise.</p>

							<ul>
								<li><a href="#grid-layout">Grid Layout</a></li>
								<li><a href="#paragraph-content">Paragraph Content</a></li>
								<li><a href="#colors">Colors</a></li>
								<li><a href="#headings">Headings</a></li>
								<li><a href="#tables">Tables</a></li>
								<li><a href="#lists">Lists</a></li>
								<li><a href="#forms">Forms</a></li>
							</ul>
						</section>

						<section class="style-guide" id="grid-layout">
							<h1 class="section-heading">Grid Layout</h1>

							<div class="container text-center">
								<div class="row bg-primary">
									<div class="col">1 of 12</div>
									<div class="col">2 of 12</div>
									<div class="col">3 of 12</div>
									<div class="col">4 of 12</div>
									<div class="col">5 of 12</div>
									<div class="col">6 of 12</div>
									<div class="col">7 of 12</div>
									<div class="col">8 of 12</div>
									<div class="col">9 of 12</div>
									<div class="col">10 of 12</div>
									<div class="col">11 of 12</div>
									<div class="col">12 of 12</div>
								</div>
							</div>
						</section>

						<section class="style-guide" id="paragraph-content">
							<h1 class="section-heading">Paragraph Content</h1>
							<p>Lorem ipsum dolor sit amet, <a href="https://www.example.com">consectetur adipiscing elit</a>. Integer hendrerit elit nec elementum ultrices. Morbi aliquet in ante at consectetur. Curabitur dictum malesuada neque, vel placerat nisl vulputate sit amet. Aliquam id dolor vitae dolor maximus ornare non in orci. Phasellus quis vehicula dui, eget rhoncus sem. Cras eu tristique dui. Vivamus tempor velit sed augue imperdiet, a venenatis felis ultricies.</p>
							<p>Sed blandit enim a pulvinar semper. Ut id gravida purus. Aliquam vitae arcu accumsan, consectetur elit sit amet, tempor augue. Donec pulvinar diam sed risus finibus sollicitudin. Morbi neque lacus, condimentum vitae urna nec, gravida elementum velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie felis eget magna varius vestibulum. Nam condimentum, ex ut iaculis placerat, libero ex pretium risus, eu sodales lectus lectus eu turpis. Integer sit amet est sit amet nisi dapibus pellentesque. Pellentesque hendrerit convallis augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent nec ullamcorper nisl. Nunc lacus lectus, tempor id orci sit amet, mollis auctor massa. Fusce sed interdum eros, vitae laoreet nulla. Maecenas sit amet est justo.</p>
							<p>Phasellus nunc lectus, vehicula eu euismod sed, tincidunt in purus. Ut ullamcorper metus nec tellus consectetur, tempus ullamcorper turpis vestibulum. Nam eleifend enim id lectus facilisis, eget euismod justo accumsan. Morbi nec porta neque. Maecenas tincidunt, lorem in aliquet placerat, leo nisl tempor ipsum, sed interdum nisl augue et nibh. Quisque eget dignissim erat, porttitor imperdiet libero. Sed ut nisl nec justo tristique accumsan vitae non tellus. Integer ultricies non quam non tristique.</p>
							<h2>Subheading</h2>
							<p>Nulla dolor risus, facilisis quis tincidunt vel, ornare nec elit. Ut sit amet finibus urna, in cursus arcu. Vestibulum elementum hendrerit sodales. Etiam ut ligula luctus, pellentesque diam nec, interdum mauris. Praesent augue urna, congue id rutrum fermentum, luctus eu ipsum. Phasellus felis lorem, tristique eget aliquet id, sodales ut mi. Curabitur tincidunt nisi ac quam feugiat, non cursus tellus scelerisque. Integer non egestas est. Maecenas nec ultricies lacus. Pellentesque ac urna cursus, viverra dolor ut, fringilla mauris. In et pretium nisl. Etiam laoreet elit lectus, ut dictum nunc porttitor eget. Suspendisse potenti. Proin eget tempus dui, nec placerat arcu. Nullam tellus purus, porta sit amet leo eget, porttitor suscipit elit.</p>
							<p>Fusce mattis nec nibh a iaculis. Sed pharetra placerat nisl, vel dapibus augue. Nullam interdum dolor vitae lorem hendrerit maximus. Nam dignissim diam nisl, id eleifend nibh finibus vel. Pellentesque a nunc quis turpis mollis bibendum vitae quis ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus augue augue, condimentum in pulvinar sed, finibus et mi. Proin ultricies fringilla dui ut posuere.</p>
						</section>

						<section class="style-guide">
							<h1 class="section-heading">Colors</h1>

							<h2 class="section-subheading">Text Colors</h2>
							<p class="text-primary">.text-primary</p>
							<p class="text-secondary">.text-secondary</p>
							<p class="text-success">.text-success</p>
							<p class="text-danger">.text-danger</p>
							<p class="text-warning">.text-warning</p>
							<p class="text-info">.text-info</p>
							<p class="text-light bg-dark">.text-light</p>
							<p class="text-dark">.text-dark</p>
							<p class="text-body">.text-body</p>
							<p class="text-muted">.text-muted</p>
							<p class="text-white bg-dark">.text-white</p>
							<p class="text-black-50">.text-black-50</p>
							<p class="text-white-50 bg-dark">.text-white-50</p>

							<h2 class="section-subheading">Background</h2>

							<div class="p-3 mb-2 bg-primary text-white">.bg-primary</div>
							<div class="p-3 mb-2 bg-secondary text-white">.bg-secondary</div>
							<div class="p-3 mb-2 bg-success text-white">.bg-success</div>
							<div class="p-3 mb-2 bg-danger text-white">.bg-danger</div>
							<div class="p-3 mb-2 bg-warning text-dark">.bg-warning</div>
							<div class="p-3 mb-2 bg-info text-white">.bg-info</div>
							<div class="p-3 mb-2 bg-light text-dark">.bg-light</div>
							<div class="p-3 mb-2 bg-dark text-white">.bg-dark</div>
							<div class="p-3 mb-2 bg-white text-dark">.bg-white</div>
							<div class="p-3 mb-2 bg-transparent text-dark">.bg-transparent</div>

						</section>

						<section class="style-guide">
							<h1 class="section-heading">Headings</h1>

							<hr>

							<h1>h1. Bootstrap heading</h1>
							<h2>h2. Bootstrap heading</h2>
							<h3>h3. Bootstrap heading</h3>
							<h4>h4. Bootstrap heading</h4>
							<h5>h5. Bootstrap heading</h5>
							<h6>h6. Bootstrap heading</h6>

						</section>

						<section class="style-guide">
							<h1 class="section-heading">Tables</h1>
							<table class="table">
								<thead>
									<tr>
									<th scope="col">#</th>
									<th scope="col">First</th>
									<th scope="col">Last</th>
									<th scope="col">Handle</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									<th scope="row">1</th>
									<td>Mark</td>
									<td>Otto</td>
									<td>@mdo</td>
									</tr>
									<tr>
									<th scope="row">2</th>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>@fat</td>
									</tr>
									<tr>
									<th scope="row">3</th>
									<td>Larry</td>
									<td>the Bird</td>
									<td>@twitter</td>
									</tr>
								</tbody>
							</table>
						</section>

						<section class="style-guide" id="lists">
							<h1 class="section-heading">Lists</h1>

							<p>Nested and mixed lists are an interesting beast. It's a corner case to make sure that</p>

							<ul>
								<li>Lists within lists do not break the ordered list numbering order</li>
								<li>Your list styles go deep enough.</li>
							</ul>
							<h3>Ordered - Unordered - Ordered</h3>
							<ol>
								<li>ordered item</li>
								<li>ordered item
							<ul>
								<li><strong>unordered</strong></li>
								<li><strong>unordered</strong>
							<ol>
								<li>ordered item</li>
								<li>ordered item</li>
							</ol>
							</li>
							</ul>
							</li>
								<li>ordered item</li>
								<li>ordered item</li>
							</ol>
							<h3>Ordered - Unordered - Unordered</h3>
							<ol>
								<li>ordered item</li>
								<li>ordered item
							<ul>
								<li><strong>unordered</strong></li>
								<li><strong>unordered</strong>
							<ul>
								<li>unordered item</li>
								<li>unordered item</li>
							</ul>
							</li>
							</ul>
							</li>
								<li>ordered item</li>
								<li>ordered item</li>
							</ol>
							<h3>Unordered - Ordered - Unordered</h3>
							<ul>
								<li>unordered item</li>
								<li>unordered item
							<ol>
								<li>ordered</li>
								<li>ordered
							<ul>
								<li>unordered item</li>
								<li>unordered item</li>
							</ul>
							</li>
							</ol>
							</li>
								<li>unordered item</li>
								<li>unordered item</li>
							</ul>
							<h3>Unordered - Unordered - Ordered</h3>
							<ul>
								<li>unordered item</li>
								<li>unordered item
							<ul>
								<li>unordered</li>
								<li>unordered
							<ol>
								<li><strong>ordered item</strong></li>
								<li><strong>ordered item</strong></li>
							</ol>
							</li>
							</ul>
							</li>
								<li>unordered item</li>
								<li>unordered item</li>
							</ul>

						</section>

						<section class="style-guide">
							<h1 class="section-heading">Forms</h1>

							<?php echo do_shortcode('[ninja_form id=1]'); ?>

						</section>

						<section class="style-guide">

							<h1 class="section-heading">Image Alignemtns</h1>

							<p>Welcome to image alignment! The best way to demonstrate the ebb and flow of the various image positioning options is to nestle them snuggly among an ocean of words. Grab a paddle and let’s get started.</p>
							<p>On the topic of alignment, it should be noted that users can choose from the options of <em>None</em>, <em>Left</em>, <em>Right, </em>and <em>Center</em>. In addition, they also get the options of <em>Thumbnail</em>, <em>Medium</em>, <em>Large</em> &amp; <em>Fullsize</em>. Be sure to try this page in RTL mode and it should look the same as LTR.</p>
							<p><img loading="lazy" class="size-full wp-image-906 aligncenter" title="Image Alignment 580x300" alt="Image Alignment 580x300" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-580x300-1.jpg" width="580" height="300"></p>
							<p>The image above happens to be <em><strong>centered</strong></em>.</p>
							<p><img loading="lazy" class="size-full wp-image-904 alignleft" title="Image Alignment 150x150" alt="Image Alignment 150x150" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-150x150-1.jpg" width="150" height="150"> The rest of this paragraph is filler for the sake of seeing the text wrap around the 150×150 image, which is <em><strong>left aligned</strong></em>.</p>
							<p>As you can see there should be some space above, below, and to the right of the image. The text should not be creeping on the image. Creeping is just not right. Images need breathing room too. Let them speak like you words. Let them do their jobs without any hassle from the text. In about one more sentence here, we’ll see that the text moves from the right of the image down below the image in seamless transition. Again, letting the do it’s thang. Mission accomplished!</p>
							<p>And now for a <em><strong>massively large image</strong></em>. It also has <em><strong>no alignment</strong></em>.</p>
							<p><img loading="lazy" class="alignnone  wp-image-907" title="Image Alignment 1200x400" alt="Image Alignment 1200x400" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-1200x4002-1.jpg" width="1200" height="400"></p>
							<p>The image above, though 1200px wide, should not overflow the content area. It should remain contained with no visible disruption to the flow of content.</p>
							<p><img loading="lazy" class="aligncenter  wp-image-907" title="Image Alignment 1200x400" alt="Image Alignment 1200x400" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-1200x4002-1.jpg" width="1200" height="400"></p>
							<p>And we try the large image again, with the center alignment since that sometimes is a problem. The image above, though 1200px wide, should not overflow the content area. It should remain contained with no visible disruption to the flow of content.</p>
							<p><img loading="lazy" class="size-full wp-image-905 alignright" title="Image Alignment 300x200" alt="Image Alignment 300x200" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-300x200-1.jpg" width="300" height="200"></p>
							<p>And now we’re going to shift things to the <em><strong>right align</strong></em>. Again, there should be plenty of room above, below, and to the left of the image. Just look at him there… Hey guy! Way to rock that right side. I don’t care what the left aligned image says, you look great. Don’t let anyone else tell you differently.</p>
							<p>In just a bit here, you should see the text start to wrap below the right aligned image and settle in nicely. There should still be plenty of room and everything should be sitting pretty. Yeah… Just like that. It never felt so good to be right.</p>
							<p>And just when you thought we were done, we’re going to do them all over again with captions!</p>
							<figure id="attachment_906" aria-describedby="caption-attachment-906" style="width: 580px" class="wp-caption aligncenter"><img loading="lazy" class="size-full wp-image-906  " title="Image Alignment 580x300" alt="Image Alignment 580x300" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-580x300-1.jpg" width="580" height="300"><figcaption id="caption-attachment-906" class="wp-caption-text">Look at 580×300 getting some <a title="Image Settings" href="https://en.support.wordpress.com/images/image-settings/">caption</a> love.</figcaption></figure>
							<p>The image above happens to be <em><strong>centered</strong></em>. The caption also has a link in it, just to see if it does anything funky.</p>
							<figure id="attachment_904" aria-describedby="caption-attachment-904" style="width: 150px" class="wp-caption alignleft"><img loading="lazy" class="size-full wp-image-904  " title="Image Alignment 150x150" alt="Image Alignment 150x150" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-150x150-1.jpg" width="150" height="150"><figcaption id="caption-attachment-904" class="wp-caption-text">Bigger caption than the image usually is.</figcaption></figure>
							<p>The rest of this paragraph is filler for the sake of seeing the text wrap around the 150×150 image, which is <em><strong>left aligned</strong></em>.</p>
							<p>As you can see the should be some space above, below, and to the right of the image. The text should not be creeping on the image. Creeping is just not right. Images need breathing room too. Let them speak like you words. Let them do their jobs without any hassle from the text. In about one more sentence here, we’ll see that the text moves from the right of the image down below the image in seamless transition. Again, letting the do it’s thang. Mission accomplished!</p>
							<p>And now for a <em><strong>massively large image</strong></em>. It also has <em><strong>no alignment</strong></em>.</p>
							<figure id="attachment_907" aria-describedby="caption-attachment-907" style="width: 1200px" class="wp-caption alignnone"><img loading="lazy" class=" wp-image-907" title="Image Alignment 1200x400" alt="Image Alignment 1200x400" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-1200x4002-1.jpg" width="1200" height="400"><figcaption id="caption-attachment-907" class="wp-caption-text">Comment for massive image for your eyeballs.</figcaption></figure>
							<p>The image above, though 1200px wide, should not overflow the content area. It should remain contained with no visible disruption to the flow of content.</p>
							<figure id="attachment_907" aria-describedby="caption-attachment-907" style="width: 1200px" class="wp-caption aligncenter"><img loading="lazy" class=" wp-image-907" title="Image Alignment 1200x400" alt="Image Alignment 1200x400" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-1200x4002-1.jpg" width="1200" height="400"><figcaption id="caption-attachment-907" class="wp-caption-text">This massive image is centered.</figcaption></figure>
							<p>And again with the big image centered. The image above, though 1200px wide, should not overflow the content area. It should remain contained with no visible disruption to the flow of content.</p>
							<figure id="attachment_905" aria-describedby="caption-attachment-905" style="width: 300px" class="wp-caption alignright"><img loading="lazy" class="size-full wp-image-905 " title="Image Alignment 300x200" alt="Image Alignment 300x200" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-300x200-1.jpg" width="300" height="200"><figcaption id="caption-attachment-905" class="wp-caption-text">Feels good to be right all the time.</figcaption></figure>
							<p>And now we’re going to shift things to the <em><strong>right align</strong></em>. Again, there should be plenty of room above, below, and to the left of the image. Just look at him there… Hey guy! Way to rock that right side. I don’t care what the left aligned image says, you look great. Don’t let anyone else tell you differently.</p>
							<p>In just a bit here, you should see the text start to wrap below the right aligned image and settle in nicely. There should still be plenty of room and everything should be sitting pretty. Yeah… Just like that. It never felt so good to be right.</p>
							<p>And that’s a wrap, yo! You survived the tumultuous waters of alignment. Image alignment achievement unlocked! Last thing is a small image aligned right. Whatever follows should be unaffected. <img loading="lazy" class="size-full wp-image-904 alignright" title="Image Alignment 150x150" alt="Image Alignment 150x150" src="http://reactionbase2.local/wp-content/uploads/2013/03/image-alignment-150x150-1.jpg" width="150" height="150"></p>
						</section>

						</div>

						</article>

						<?php

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->


<?php
get_footer();
