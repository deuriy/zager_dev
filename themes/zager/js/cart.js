document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.AccessoriesSwiper', {
    slidesPerView: 'auto',
    spaceBetween: 20,

    pagination: {
      el: '.SwiperPagination',
      clickable: true,
      bulletClass: 'SwiperPagination_bullet',
      bulletActiveClass: 'SwiperPagination_bullet-active',
    },

    navigation: {
      prevEl: '.AccessoriesSection_prev',
      nextEl: '.AccessoriesSection_next',
    },

    breakpoints: {
      768: {
        slidesPerView: 4,
        spaceBetween: 34
      },
      1024: {
        spaceBetween: 48,
        slidesPerView: 4,
      },
      1200: {
        spaceBetween: 48,
        slidesPerView: 4,
        loop: true
      },
    },
  });

  document.addEventListener('click', function (e) {
    let removeProductFromCart = e.target.closest('.woocommerce-cart-form__cart-item .product-remove .remove');
    let cartItemsPrices = document.querySelectorAll('.cart .cart_item .woocommerce-Price-amount');

    if (!removeProductFromCart || cartItemsPrices.length > 1) return;

    let priceAmount = document.querySelector('.SubTotal .woocommerce-Price-amount bdi');

    if (!priceAmount) return;

    priceAmount.innerHTML = `<span class="woocommerce-Price-currencySymbol">$</span>0`;
  });
});

(function($){
  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  jQuery(document.body).on('removed_from_cart updated_cart_totals', function() {
    let priceAmount = document.querySelector('.SubTotal .woocommerce-Price-amount bdi');

    if (!priceAmount) return;

    let sum = 0;
    let allPricesElems = document.querySelectorAll('.cart_item .woocommerce-Price-amount');

    allPricesElems.forEach(priceElem => {
      let price = priceElem.textContent.substring(1);
      sum += parseFloat(price.replace(/[,]+/g, "").trim());
    });

    if (!allPricesElems.length) {
      sum = 0;
    } else {
      sum = numberWithCommas(sum.toFixed(2));
    }

    priceAmount.innerHTML = `<span class="woocommerce-Price-currencySymbol">$</span>${sum}`;
  });
})(jQuery);





