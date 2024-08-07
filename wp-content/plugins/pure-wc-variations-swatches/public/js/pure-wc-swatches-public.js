(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	// get variation 
	$(document).on('click', '.tpwvs-swatches', function(e){
		e.preventDefault();
		var $el = $(this);
		var attributes = $el.data('attributes')
		var thisName = attributes.name
		var thisVal  = attributes.value
		makeActiveSwatch($el);
		$el.closest('.product').find('select[name="'+thisName+'"]').val(thisVal).trigger('change');
	});

	// reset variations

	$(document).on('click', '.reset_variations', function(e){
		e.preventDefault();
		$('.tpwvs-attr-image').each(function(i, el){
			$(el).removeClass('swatches-active-img')
		})
		$('.tpwvs-attr-color').each(function(i, el){
			$(el).removeClass('swatches-active')
		})
		$('.tpwvs-attr-button').each(function(i, el){
			$(el).removeClass('button-active')
		})
	})

	// make the swatch active
	function makeActiveSwatch(element){
		if( element.hasClass('tpwvs-attr-image') ){
			$('.tpwvs-attr-image').each(function(i, el){
				$(el).removeClass('swatches-active-img')
			})
			element.addClass('swatches-active-img');
		}else if( element.hasClass('tpwvs-attr-color') ){
			$('.tpwvs-attr-color').each(function(i, el){
				$(el).removeClass('swatches-active')
			})
			element.addClass('swatches-active');
		}else if( element.hasClass('tpwvs-attr-button') ){
			$('.tpwvs-attr-button').each(function(i, el){
				$(el).removeClass('button-active')
			})
			element.addClass('button-active');
		}else{
			
		}
	}


	function addVariationFunctionality() {
		$( '.tpwvs-variations-form:not(.variation-function-added)' ).each(
			function () {
				const thisForm = $( this );
				thisForm.addClass( 'variation-function-added' );
				thisForm.wc_variation_form();
				thisForm.on( 'found_variation', function ( e, variation ) {
					updateThumbnail( thisForm, variation.image );
					updatePrice( thisForm, variation );
					updatebuttonData( thisForm, variation );
				} );
			}
		);
	}

	function updateThumbnail( swatch, imageData ) {
		const listItem = swatch.closest( 'li' );
		if(listItem.length > 1){
			const thumbnail = listItem.find( 'img:first' );
			// if ( 0 === listItem.find( '.tpwvs-original-thumbnail' ).length ) {
			// 	const originalThumbnail = thumbnail.clone();
			// 	thumbnail.after( '<span class="tpwvs-original-thumbnail"></span>' );
			// 	listItem
			// 		.find( '.tpwvs-original-thumbnail' )
			// 		.html( originalThumbnail );
			// }
			thumbnail.attr( 'src', imageData.full_src );
			thumbnail.attr( 'srcset', '' );
		}else{
			const listItem = swatch.closest( '.has-post-thumbnail' );
			const thumbnail = listItem.find( 'img:first' );
			console.log(thumbnail, thumbnail.find( '.tpwvs-original-thumbnail' ).length);
			
			// if ( 0 === thumbnail.find( '.tpwvs-original-thumbnail' ).length ) {
			// 	const originalThumbnail = thumbnail.clone();
			// 	thumbnail.after( '<span class="tpwvs-original-thumbnail"></span>' );
			// 	thumbnail
			// 		.find( '.tpwvs-original-thumbnail' )
			// 		.html( originalThumbnail );
			// }
			thumbnail.attr( 'src', imageData.full_src );
			thumbnail.attr( 'srcset', '' );
		}
		
	}

	function updatePrice( swatch, variation ) {
		if ( 0 === variation.price_html.length ) {
			return;
		}
		if ( swatch.parents( 'li' ).find( '.tpwvs-original-price' ).length ) {
			const price = swatch.parents( 'li' ).find( '.price' );
			price.replaceWith( variation.price_html );
		} else {
			const price = swatch.closest( '.product' ).find( '.price' );
			
			if( price.length > 1 ){
				price.removeClass( 'price' ).addClass( 'tpwvs-original-price' );
				price.after( variation.price_html );
			}else{
				const price = swatch.closest( '.has-post-thumbnail' ).find( '.price' );
				price.removeClass( 'price' ).addClass( 'tpwvs-original-price' );
				price.after( variation.price_html );
			}
			
			
		}
	}

	function updatebuttonData( variant, variation ) {
		const select = variant.find( '.variations select' );
		const data = {};
		const button = variant
			.parents( 'li' )
			.find( '.tpwvs-ajax-add-to-cart' );
		select.each( function () {
			const attributeName =
				$( this ).data( 'attribute_name' ) || $( this ).attr( 'name' );
			const value = $( this ).val() || '';
			data[ attributeName ] = value;
		});

		var buttonText = button.text();
		if( buttonText.search('Select options') != -1 ){
			buttonText = 'Add To Cart';
		}else{
			buttonText = button.html();
		}

		if( button.length > 1 ){
			button.html( buttonText );
			button.addClass( 'tpwvs-variation-found' );
			button.attr( 'data-variation_id', variation.variation_id );
			button.attr( 'data-selected_variant', JSON.stringify( data ) );
		}else{
			const button = variant
				.closest( '.has-post-thumbnail' )
				.find( '.add_to_cart_button' );
			button.html( buttonText );
			button.addClass( 'tpwvs-variation-found' );
			button.attr( 'data-variation_id', variation.variation_id );
			button.attr( 'data-selected_variant', JSON.stringify( data ) );
		}
		
	}

	$( document ).on( 'pure_wc_ajax_loaded', function(){
		addVariationFunctionality();
	});

	$( window ).load( function () {
		addVariationFunctionality();
	});



	$( document ).on('click', '.tpwvs-ajax-add-to-cart.tpwvs-variation-found', function ( e ) {
			e.preventDefault();
			triggerAddToCart( $( this ) );
	});

	$( document ).on('click', '.add_to_cart_button.tpwvs-variation-found', function ( e ) {
		e.preventDefault();
		triggerAddToCart( $( this ) );
	});


	function triggerAddToCart( variant ) {
		if ( variant.is( '.wc-variation-is-unavailable' ) ) {
			return window.alert( tpwvs_swatches_settings.unavailable_text );
		}
		const productId = variant.data( 'product_id' );
		let variationId = variant.attr( 'data-variation_id' );
		variationId = parseInt( variationId );
		if (
			isNaN( productId ) ||
			productId === 0 ||
			isNaN( variationId ) ||
			variationId === 0
		) {
			return true;
		}
		let variation = variant.attr( 'data-selected_variant' );
		variation = JSON.parse( variation );
		const data = {
			action: 'tpwvs_ajax_add_to_cart',
			security: tpwvs_swatches_settings.ajax_add_to_cart_nonce,
			product_id: productId,
			variation_id: variationId,
			variation,
		};
		$( document.body ).trigger( 'adding_to_cart', [ variant, data ] );
		variant.removeClass( 'added' ).addClass( 'loading' );
		// Ajax add to cart request
		$.ajax( {
			type: 'POST',
			url: tpwvs_swatches_settings.ajax_url,
			data,
			dataType: 'json',
			success( response ) {
				if ( ! response ) {
					return;
				}

				if ( response.error && response.product_url ) {
					window.location = response.product_url;
					return;
				}

				// Trigger event so themes can refresh other areas.
				$( document.body ).trigger( 'added_to_cart', [
					response.fragments,
					response.cart_hash,
					variant,
				] );
				$( document.body ).trigger( 'update_checkout' );

				variant.removeClass( 'loading' ).addClass( 'added' );
			},
			error( errorThrown ) {
				variant.removeClass( 'loading' );
				console.log( errorThrown );
			},
		} );
	}

})( jQuery );
