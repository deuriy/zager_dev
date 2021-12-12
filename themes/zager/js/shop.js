(function($) {

	function filterProducts () {
		let terms = {};

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
  		min_price = $(".RangeSlider").slider("values", 0);
			max_price = $(".RangeSlider").slider("values", 1);
  	} else {
  		min_price = 0;
  		max_price = 2925;
  	}

  	console.log(min_price);
  	console.log(max_price);

  	let order_settings = {};

  	switch ($('.Select').val()) {
  		case 'alphabetical':
  			order_settings = {
  				'orderby': 'title',
			    'order': 'asc'
  			};

  			break;
  		case 'price_asc':
  			order_settings = {
  				'orderby': 'meta_value_num',
			    'meta_key': '_price',
			    'order': 'asc'
  			};

  			break;
  		case 'price_desc':
  			order_settings = {
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
			min_price: min_price,
			max_price: max_price,
			product_terms: terms,
			order_settings: order_settings
		};

		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: data,
			beforeSend: function( xhr ) {
				if ($( '.Products_items' ).length) {
					$( '.Products_items' ).html( '<h3>Processing...</h3>' );
				} else if ($( '.ProductsWrapper_accessoriesCards' ).length) {
					$( '.ProductsWrapper_accessoriesCards' ).html( '<h3>Processing...</h3>' );
				}
			},
			success: function( response ) {
				if ($( '.Products_items' ).length) {
					$( '.Products_items' ).html(response);
				} else if ($( '.ProductsWrapper_accessoriesCards' ).length) {
					$( '.ProductsWrapper_accessoriesCards' ).html(response);
				}
			}
		});
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
	    	filterProducts();
	    },

	    classes: {
	      "ui-slider-handle": "RangeSlider_handle",
	      "ui-slider-range": "RangeSlider_range"
	    }
	  });
	}

  $('.Select').select2({
  	minimumResultsForSearch: -1,
  	// width: "100px"
  	width: "210px"
  }).data('select2').$dropdown.addClass('select2-sorting');

  $('.Select').on('select2:select', function (e) {
  	filterProducts();
  	console.log($(this).val());
	  console.log('Change');
	});

  Fancybox.bind(`.FancyboxPopupLink`, {
    dragToClose: false,
    showClass: 'fancybox-fadeIn',
    mainClass: 'fancybox__container--popup'
  });

  document.addEventListener('change', function (e) {
  	let filterCheckboxInput = e.target.closest('#Filter .Checkbox_input');

  	if (!filterCheckboxInput) return;

  	filterProducts();
  });  
	
})( jQuery );