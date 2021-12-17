<?php
  global $product;
  if ($product->is_type( 'variable' )) {
    woocommerce_mobile_variable_add_to_cart();
  } else {
    woocommerce_mobile_simple_add_to_cart();
  }
?>