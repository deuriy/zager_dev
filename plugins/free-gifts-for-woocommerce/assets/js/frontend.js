/* global fgf_frontend_params */

jQuery( function ( $ ) {
	'use strict' ;
	var FGF_Frontend = {
		init : function ( ) {
			$( document ).on( 'click' , '.fgf_pagination' , this.manual_gift_pagination ) ;
			// Block the manual gift products.
			$( document ).on( 'click' , '.fgf-add-manual-gift-product' , this.block_manual_gift_products ) ;
			// Add a gift product via ajax.
			$( document ).on( 'click' , '.fgf-add-manual-gift-product' , this.add_gift_product_ajax ) ;
			// Add the gift product via dropdown.
			$( document ).on( 'click' , '.fgf-add-gift-product' , this.add_manually_gift_product ) ;
			// Add the gift product via dropdown.
			$( document ).on( 'change' , '.fgf-gift-product-selection' , this.add_automatically_gift_product ) ;
			// Add the gift product via dropdown.
			$( document ).on( 'change' , '.fgf-product-variations' , this.handle_variation_gift_product ) ;
			//Update the cart when updating shipping.
			$( document.body ).on( 'updated_shipping_method' , this.updated_shipping_method ) ;
		} , updated_shipping_method : function ( ) {
						console.log('');
			$( document.body ).trigger( 'wc_update_cart' ) ;
		} , block_manual_gift_products : function ( event ) {
			var $this = $( event.currentTarget ) ,
					wrapper = $this.closest( '.fgf_gift_products_wrapper' ) ;
			if ( 'yes' == fgf_frontend_params.ajax_add_to_cart ) {
				return true ;
			}

			FGF_Frontend.block( wrapper ) ;
			return true ;
		} , add_gift_product_ajax : function ( event ) {
			if ( 'yes' != fgf_frontend_params.ajax_add_to_cart ) {
				return true ;
			}

			event.preventDefault( ) ;
			var $this = $( event.currentTarget ) ,
					rule_id = $( $this ).data( 'rule_id' ) ,
					product_id = $( $this ).data( 'product_id' ) ;

			FGF_Frontend.add_gift_product( $this , product_id , rule_id ) ;

		} , add_gift_product : function ( $this , product_id , rule_id ) {

			var content = $this.closest( '.fgf-gift-products-content' ) ;

			FGF_Frontend.block( content ) ;

			var data = ( {
				action : 'fgf_add_gift_product' ,
				product_id : product_id ,
				rule_id : rule_id ,
				fgf_security : fgf_frontend_params.gift_product_nonce ,
			} ) ;
			$.post( fgf_frontend_params.ajaxurl , data , function ( res ) {

				if ( true === res.success ) {
					if ( 'popup' == $( '#fgf_gift_products_type' ).val( ) ) {
						FGF_Frontend.update_gift_products_content( ) ;
						$( document.body ).trigger( 'fgf-enhanced-carousel' ) ;
					} else {
						$( document.body ).trigger( 'wc_update_cart' ) ;
					}

				} else {
					alert( res.data.error ) ;
				}

				FGF_Frontend.unblock( content ) ;
			}
			) ;
		} , update_gift_products_content : function ( ) {
			var data = ( {
				action : 'fgf_update_gift_products_content' ,
				fgf_security : fgf_frontend_params.gift_product_nonce ,
			} ) ;
			$.ajax( {
				type : 'POST' ,
				url : fgf_frontend_params.ajaxurl ,
				data : data ,
				async : false ,
				dataType : 'html' ,
				success : function ( response ) {
					var html = $.parseHTML( response ) ;
					$( '.fgf-gift-products-content' ).replaceWith( $( '.fgf-gift-products-content' , html ) ) ;

					lightcase.settings.onClose = {
						foo : function () {
							window.location.reload() ;
						}
					} ;
				}
			} ) ;
		} , handle_variation_gift_product : function ( event ) {

			var $this = $( event.currentTarget ) ,
					product_id = $( $this ).val( ) ,
					url = fgf_frontend_params.add_to_cart_link ,
					link = $( $this ).closest( 'span' ).find( '.fgf-add-manual-gift-product' ) ;
			// Create a add to cart link.
			url = url.replace( '%s' , product_id ) ;
			url = url.replace( '%s' , $( $this ).data( 'rule_id' ) ) ;
			link.attr( 'href' , url ) ;
			link.data( 'product_id' , product_id ) ;
			link.data( 'rule_id' , $( $this ).data( 'rule_id' ) ) ;
		} , add_manually_gift_product : function ( event ) {
			event.preventDefault( ) ;
			// Check the automatic add to cart is enabled. 
			if ( '2' == fgf_frontend_params.dropdown_add_to_cart_behaviour ) {
				return false ;
			}

			var $this = $( event.currentTarget ) ,
					url = fgf_frontend_params.add_to_cart_link ,
					wrapper = $this.closest( '.fgf-gift-product-wrapper' ) ,
					product_id = wrapper.find( '.fgf-gift-product-selection' ).val( ) ,
					rule_id = wrapper.find( '.fgf-gift-product-selection' ).find( ':selected' ).data( 'rule-id' ) ;
			if ( '' == product_id ) {
				alert( fgf_frontend_params.add_to_cart_alert_message ) ;
				return false ;
			}

			if ( 'yes' == fgf_frontend_params.ajax_add_to_cart ) {
				FGF_Frontend.add_gift_product( $this , product_id , rule_id ) ;
			} else {

				// Create a add to cart link.
				url = url.replace( '%s' , product_id ) ;
				url = url.replace( '%s' , rule_id ) ;
				// Add to cart the gift product.
				window.location.href = url ;
			}

		} , add_automatically_gift_product : function ( event ) {
			event.preventDefault( ) ;
			// Check the automatic add to cart is enabled. 
			if ( '2' != fgf_frontend_params.dropdown_add_to_cart_behaviour ) {
				return false ;
			}

			var $this = $( event.currentTarget ) ,
					url = fgf_frontend_params.add_to_cart_link ,
					rule_id = $( $this ).find( ':selected' ).data( 'rule-id' ) ;
			if ( '' == $( $this ).val( ) ) {
				return false ;
			}

			// Create a add to cart link.
			url = url.replace( '%s' , $( $this ).val( ) ) ;
			url = url.replace( '%s' , rule_id ) ;
			// Add to cart the gift product.
			window.location.href = url ;
		} , manual_gift_pagination : function ( event ) {
			event.preventDefault( ) ;
			var $this = $( event.currentTarget ) ,
					table = $this.closest( 'table.fgf_gift_products_table' ) ,
					table_body = table.find( 'tbody' ) ,
					current_page = $this.data( 'page' ) ;
			FGF_Frontend.block( table_body ) ;
			var data = ( {
				action : 'fgf_gift_products_pagination' ,
				page_number : current_page ,
				page_url : fgf_frontend_params.current_page_url ,
				fgf_security : fgf_frontend_params.gift_products_pagination_nonce ,
			} ) ;
			$.post( fgf_frontend_params.ajaxurl , data , function ( res ) {

				if ( true === res.success ) {
					table_body.html( res.data.html ) ;
					table.find( '.fgf_pagination' ).removeClass( 'current' ) ;
					table.find( '.fgf_pagination_' + current_page ).addClass( 'current' ) ;
					var next_page = current_page ;
					if ( current_page > 1 ) {
						next_page = current_page - 1 ;
					}

					var last_page = table.find( '.fgf_last_pagination' ).data( 'page' ) ;
					if ( current_page < last_page ) {
						last_page = current_page + 1 ;
					}

					table.find( '.fgf_next_pagination' ).data( 'page' , last_page ) ;
					table.find( '.fgf_prev_pagination' ).data( 'page' , next_page ) ;
				} else {
					alert( res.data.error ) ;
				}

				FGF_Frontend.unblock( table_body ) ;
			}
			) ;
		} , block : function ( id ) {
			$( id ).block( {
				message : null ,
				overlayCSS : {
					background : '#fff' ,
					opacity : 0.7
				}
			} ) ;
		} , unblock : function ( id ) {
			$( id ).unblock( ) ;
		} ,
	} ;
	FGF_Frontend.init( ) ;
} ) ;
