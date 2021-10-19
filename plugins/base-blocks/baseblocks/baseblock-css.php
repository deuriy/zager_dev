<?php
/**
 * Template Name: CSS
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
    <a href="<?php echo bloginfo('url'); ?>/baseblock/index/#css" class="mt-4 btn w-50 ml-auto mr-auto d-block text-center"><h3>See Contained</h3></a>
  <?php } ?>  

  <h2 class="mb-0">Typography</h2>  
  <section class="b-block">
    <div class="container">
      <h1>Heading 1</h1>
      <h2>Heading 2</h2>
      <h3>Heading 3</h3>
      <h4>Heading 4</h4>
      <h5>Heading 5</h5>
      <h6>Heading 6</h6>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent varius dolor purus, et eleifend lectus congue id. Quisque tempor metus ligula, lacinia rutrum enim ultrices eget. Etiam vitae sem massa. Pellentesque vestibulum ex lectus, nec cursus tortor sollicitudin ut. Nullam volutpat ligula ut odio condimentum, sit amet facilisis nulla tempus. Morbi et hendrerit diam, sit amet luctus orci. Quisque egestas, lacus ac iaculis accumsan, quam eros tempus sem, ac ultrices felis eros porttitor nibh. Nunc condimentum mauris dapibus, pretium ipsum ac, lacinia nisi. Nulla facilisi.</p>
      <p>
        <a href="#" class="btn">Button</a>
        <a href="#" class="btn btn-empty">Button Empty</a>
        <a href="#" class="btn btn-black">Button Black</a>
        <a href="#" class="btn btn-black btn-empty">Button Black Empty</a>
      </p>
      <p>
        <a href="#" class="btn btn-shadow">Button</a>
        <a href="#" class="btn btn-empty btn-shadow">Button Empty</a>
        <a href="#" class="btn btn-black btn-shadow">Button Black</a>
        <a href="#" class="btn btn-black btn-empty btn-shadow">Button Black Empty</a>
      </p>
      <p>
        <a href="#" class="btn btn-round">Button</a>
        <a href="#" class="btn btn-empty btn-round">Button Empty</a>
        <a href="#" class="btn btn-black btn-round">Button Black</a>
        <a href="#" class="btn btn-black btn-empty btn-round">Button Black Empty</a>
      </p>
      <p>
        <a href="#" class="btn btn-white btn-round">Button White</a>
        <a href="#" class="btn btn-white btn-empty btn-round">Button White Empty</a>         
        <a href="#" class="btn btn-white">Button White</a>
        <a href="#" class="btn btn-white btn-empty">Button White Empty</a>      
      </p>
      <p>
        <a href="#" class="btn btn-white btn-shadow">Button White</a>
        <a href="#" class="btn btn-white btn-empty btn-shadow">Button White Empty</a>            
      </p>        
      <p>
        <a href="#">Link</a>
      </p>
      <h1>Heading 1 + P</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <h2>Heading 2 + P</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <h3>Heading 3 + P</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <h4>Heading 4 + P</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <h5>Heading 5 + P</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <h6>Heading 6 + P</h6>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </section>
  
</article>

<?php
  get_footer();
