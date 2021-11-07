<div class="Sidebar Sidebar-product Product_sidebar hidden-smMinus">
  <?php
    global $product;
    if ($product->is_type( 'variable' )) {
      woocommerce_variable_add_to_cart();
    } else {
      woocommerce_simple_add_to_cart();
    }
  ?>
</div>