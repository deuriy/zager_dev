(function($) {
	let loadingStep = 10;
	// let loadingMode = 'rewrite';
	let windowWidth = document.documentElement.clientWidth;
	// console.log(windowWidth);

	if ($( '.AccessoriesCards' ).length) {
		loadingStep = 9;
	}

	let postsPerPage = loadingStep;

	function loadFilteredProducts (loadingMode = 'rewrite', page = 1) {
		let terms = {};
  	let orderSettings = {};
  	// let postsPerPage = postsPerPage != undefined ? postsPerPage : 10;
  	let minPrice = 0;
		let maxPrice = 2925;

  	document.querySelectorAll('#Filter .CheckboxList').forEach(function(checkboxList) {
  		terms[checkboxList.querySelector('.Checkbox_input').getAttribute('name')] = [];
  		checkboxList.querySelectorAll('.Checkbox').forEach(function(checkbox) {
  			let checkboxInput = checkbox.querySelector('.Checkbox_input');
  			if (checkboxInput.checked) {
  				terms[checkboxInput.getAttribute('name')].push(checkboxInput.value);
  			}
  		});
  	});

  	if ($(".RangeSlider").length) {
  		minPrice = $(".RangeSlider").slider("values", 0);
			maxPrice = $(".RangeSlider").slider("values", 1);
  	}

  	switch ($('.Select').val()) {
  		case 'alphabetical':
  			orderSettings = {
  				'orderby': 'title',
			    'order': 'asc'
  			};
  			break;
  		case 'price_asc':
  			orderSettings = {
  				'orderby': 'meta_value_num',
			    'meta_key': '_price',
			    'order': 'asc'
  			};
  			break;
  		case 'price_desc':
  			orderSettings = {
  				'orderby': 'meta_value_num',
			    'meta_key': '_price',
			    'order': 'desc'
  			};
  			break;
  	}

  	let ajaxurl = '/wp-admin/admin-ajax.php';
		let data = {
			action: 'get_filtered_products',
			contentType: 'application/json',
			page_type: $('#Filter').data('page-type'),
			min_price: minPrice,
			max_price: maxPrice,
			page: page,
			posts_per_page: postsPerPage,
			product_terms: terms,
			order_settings: orderSettings,
			loading_mode: loadingMode
		};

		// console.log(`loadingStep: ${loadingStep}`);
		// console.log(`postsPerPage: ${postsPerPage}`);

		// console.log(`page: ${page}`);
		// console.log(`loadingMode: ${loadingMode}`);

		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: data,
			beforeSend: function( xhr ) {
				if ($( '.Products' ).length) {
					if (loadingMode == 'rewrite') {
						$( '.Products' ).html( '<div class="Reload Reload-center Products_reload"></div>' );
					} else {
						$( '.Products .LoadingPosts' ).remove();
						$( '.Products' ).append( '<div class="Reload Reload-center Products_reload"></div>' );
					}
					
				} else if ($( '.AccessoriesCards' ).length) {
					if (loadingMode == 'rewrite') {
						$( '.AccessoriesCards' ).html( '<div class="Reload Reload-center Products_reload"></div>' );
					} else {
						$( '.AccessoriesCards .LoadingPosts' ).remove();
						$( '.AccessoriesCards' ).append( '<div class="Reload Reload-center Products_reload"></div>' );
					}
				}
			},
			success: function( response ) {
				if ($( '.Products' ).length) {
					if (loadingMode == 'rewrite') {
						$( '.Products' ).html(response);
					} else {
						$( '.Products .Reload' ).remove();
						$( '.Products_items' ).append(response);
						$( '.Products' ).append($( '.LoadingPosts' ));

						$('.Products_slides .ProductCardsSwiper_slide').each(function(index, el) {
							$('.ProductCardsSwiper .swiper-wrapper').append($(el));
						});

						$('.Products_slides').remove();
					}

					new Swiper('.ProductCardsSwiper', {
					  slidesPerView: 'auto',
					  spaceBetween: 20,
					});
				} else if ($( '.AccessoriesCards' ).length) {
					if (loadingMode == 'rewrite') {
						$( '.AccessoriesCards' ).html(response);
					} else {
						$( '.AccessoriesCards .Reload' ).remove();
						$( '.AccessoriesCards_items' ).append(response);
						$( '.AccessoriesCards' ).append($( '.LoadingPosts' ));
					}
				}
			}
		});

		if (loadingMode == 'rewrite') {
			let productsWrapperHeader = document.querySelector('.ProductsWrapper_header');

			if (productsWrapperHeader) {
				productsWrapperHeader.scrollIntoView();
			}
		}		
	}
	
	if ($(".RangeSlider").length) {
		$(".RangeSlider").slider({
	    range: true,
	    min: Number(document.querySelector('.RangeSliderWrapper_number-from').textContent),
	    max: Number(document.querySelector('.RangeSliderWrapper_number-to').textContent),
	    values: [Number(document.querySelector('.RangeSliderWrapper_number-from').textContent), Number(document.querySelector('.RangeSliderWrapper_number-to').textContent)],

	    slide: function (event, ui) {
	      let filterElement = this.closest('.FilterElement');
	      let numberFrom = filterElement.querySelector('.RangeSliderWrapper_number-from');
	      let numberTo = filterElement.querySelector('.RangeSliderWrapper_number-to');

	      numberFrom.textContent = $(this).slider("values", 0);
	      numberTo.textContent = $(this).slider("values", 1);
	    },

	    change: function (event, ui) {
	    	if (windowWidth > 767) {
	    		loadFilteredProducts();
	    	}
	    },

	    classes: {
	      "ui-slider-handle": "RangeSlider_handle",
	      "ui-slider-range": "RangeSlider_range"
	    }
	  });
	}

  $('.Select').select2({
  	minimumResultsForSearch: -1,
  	width: ''
  }).data('select2').$dropdown.addClass('select2-sorting');

  $('.Select').on('select2:select', function (e) {
  	loadFilteredProducts();
	});

  Fancybox.bind(`[data-fancybox="filter"]`, {
	  dragToClose: false,
	  showClass: 'fancybox-fadeIn',
	  mainClass: 'fancybox__container--filter-popup'
	});

  Fancybox.bind(`.FancyboxPopupLink`, {
    dragToClose: false,
    showClass: 'fancybox-fadeIn',
    mainClass: 'fancybox__container--popup'
  });

  document.addEventListener('change', function (e) {
  	let filterCheckboxInput = e.target.closest('#Filter .Checkbox_input');

  	if (!filterCheckboxInput || windowWidth < 768) return;

  	loadFilteredProducts();
  });

  document.addEventListener('click', function (e) {
  	let paginationLink = e.target.closest('.Pagination_link');

  	if (!paginationLink) return;

  	let paginationItem = paginationLink.closest('.Pagination_item');
  	let pageIndex = paginationItem.dataset.pageIndex;
  	loadFilteredProducts('rewrite', pageIndex);

  	e.preventDefault();
  });

  document.addEventListener('click', function (e) {
  	let loadingPostsBtn = e.target.closest('.LoadingPosts_btn');

  	if (!loadingPostsBtn) return;

  	let currentPaginationItem = document.querySelector('.Pagination_item-current');
  	let currentPageIndex = Number(currentPaginationItem.dataset.pageIndex);
  	loadFilteredProducts('append', currentPageIndex + 1);

  	e.preventDefault();
  });

  document.addEventListener('click', function (e) {
  	let filterResetBtn = e.target.closest('.Filter_resetBtn');

  	if (!filterResetBtn) return;

  	Fancybox.getInstance().close();
  });

  document.addEventListener('click', function (e) {
  	let filterApplyBtn = e.target.closest('.Filter_applyBtn');

  	if (!filterApplyBtn) return;

  	loadFilteredProducts();
  	Fancybox.getInstance().close();
  });

  new Swiper('.ProductCardsSwiper', {
	  slidesPerView: 'auto',
	  spaceBetween: 20,
	});
	
})( jQuery );