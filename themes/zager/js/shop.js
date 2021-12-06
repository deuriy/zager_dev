(function($) {

	function filterProducts () {
		let attributes = {};

  	document.querySelectorAll('#Filter .CheckboxList').forEach(function(checkboxList) {
  		attributes[checkboxList.querySelector('.Checkbox_input').getAttribute('name')] = [];
  		checkboxList.querySelectorAll('.Checkbox').forEach(function(checkbox) {
  			let checkboxInput = checkbox.querySelector('.Checkbox_input');
  			if (checkboxInput.checked) {
  				attributes[checkboxInput.getAttribute('name')].push(checkboxInput.value);
  			}
  		});
  	});

  	let ajaxurl = '/wp-admin/admin-ajax.php';
		let data = {
			action: 'get_filtered_products',
			contentType: 'application/json',
			min_price: $(".RangeSlider").slider("values", 0),
			max_price: $(".RangeSlider").slider("values", 1),
			product_attributes: attributes
		};

		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: data,
			beforeSend: function( xhr ) {
				$( '.Products_items' ).html( '<h3>Processing...</h3>' );	
			},
			success: function( response ) {
				$( '.Products_items' ).html(response);
			}
		});
	}
	
	$(".RangeSlider").slider({
    range: true,
    min: 625,
    max: 2925,
    values: [625, 2925],

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

  $('.Select').select2({
  	minimumResultsForSearch: -1,
  	width: "100px"
  }).data('select2').$dropdown.addClass('select2-sorting');

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