jQuery(document).ready(function (){
	function cl(o) {
		console.log(o);
	}

	jQuery(document).on('click', '.reviews-filter', function (e){
		e.preventDefault();
		e.stopPropagation();

		let a = jQuery(this);

		if ( a.parent().hasClass('FilterTabsMenu_item-active') )
			return false;

		if ( a.hasClass('reviews-filter-list') ) {
			window.location.href = '#reviews-container';
		}

		if ( a.hasClass('reviews-filter-guitar') ) {
			jQuery('.reviews').find('.FilterTabsMenu_list li.FilterTabsMenu_item-active').removeClass('FilterTabsMenu_item-active');
			a.parent().addClass('FilterTabsMenu_item-active');
		}

		let data = {
			action : 'get_reviews',
			href : a.attr('href'),
		};

		jQuery('.reviews-block').html('<div class="loader-box"><div class="lds-dual-ring"></div></div>');

		jQuery.post( '/wp-admin/admin-ajax.php', data, function(response) {
			let json = JSON.parse(response);

			jQuery('.reviews-block').html(json.reviews);
			jQuery('.reviews-pagination-block').html(json.pagination);

			const players =  Plyr.setup('audio', {
				controls: ['play-large', 'play', 'progress', 'duration', 'captions', 'pip', 'airplay']
			});
		});
	});
});
