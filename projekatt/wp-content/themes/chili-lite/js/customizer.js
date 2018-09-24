/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// hexa to rgb
	function vhex2rgb (hex) {
	    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	    return result ? {
	        r: parseInt(result[1], 16),
	        g: parseInt(result[2], 16),
	        b: parseInt(result[3], 16),
	        rgb: parseInt(result[1], 16) + ", " + parseInt(result[2], 16) + ", " + parseInt(result[3], 16)
	    } : null;
	} 

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// logo 
	wp.customize( 'custom_logo', function( value ) {
		value.bind( function( to ) {
			$( '.logo-area a img' ).attr( 'src',to );
		} );
	} );

	// copyright text
	wp.customize( 'v_copyright_text', function( value ) {
	  value.bind( function( to ) {
	    $( '.footer-bottom p' ).html( to );
	  } );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			var cl = '#'+to;
		
			$( '.page-header-area h1,.header-area .main-menu-area ul li a, .logo-area a strong' ).css( 'color', '#'+to ); 
			
		} );
	} ); 
 	// footer background color
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( to ) { 
		    var style, el;

		    style = '<style class="hover-styles2"> .footer-bottom-area{ background: ' + to + ';}</style>'; // build the style element
		    el =  $( '.hover-styles2' ); // look for a matching style element that might already be there

		    // add the style element into the DOM or replace the matching style element that is already there
		    if ( el.length ) {
		        el.replaceWith( style ); // style element already exists, so replace it
		    } else {
		        $( 'head' ).append( style ); // style element doesn't exist so add it
		    }
		} );
	} );
  
} )( jQuery );
