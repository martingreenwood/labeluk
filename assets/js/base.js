/**
 * Skip link focus fix
 *
 * Helps with accessibility for keyboard only users.
 */
(function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();

/**
 * customizer
 *
 * Theme Customizer enhancements for a better user experience.
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

// ( function( $ ) {

// 	// Site title and description.
// 	wp.customize( 'blogname', function( value ) {
// 		value.bind( function( to ) {
// 			$( '.site-title a' ).text( to );
// 		} );
// 	} );
// 	wp.customize( 'blogdescription', function( value ) {
// 		value.bind( function( to ) {
// 			$( '.site-description' ).text( to );
// 		} );
// 	} );

// 	// Header text color.
// 	wp.customize( 'header_textcolor', function( value ) {
// 		value.bind( function( to ) {
// 			if ( 'blank' === to ) {
// 				$( '.site-title a, .site-description' ).css( {
// 					'clip': 'rect(1px, 1px, 1px, 1px)',
// 					'position': 'absolute'
// 				} );
// 			} else {
// 				$( '.site-title a, .site-description' ).css( {
// 					'clip': 'auto',
// 					'position': 'relative'
// 				} );
// 				$( '.site-title a, .site-description' ).css( {
// 					'color': to
// 				} );
// 			}
// 		} );
// 	} );
// } )( jQuery );


/**
 * Navigation
 *
 * Handles toggling the navigation menu for small screens
 */

(function($) {

	$('.menu .menu-toggle').on('click', function(event) {
		event.preventDefault();
		$('#masthead').toggleClass('open');
		$(this).toggleClass('open');
		$('.main-navigation').toggleClass('toggled');
	});

})(jQuery);


/**
 * Slick 
 *
 * Handles the slick slider for the twitter section
 */
(function($) {

	$('.tweets').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		adaptiveHeight: true,
	});
		

})(jQuery)