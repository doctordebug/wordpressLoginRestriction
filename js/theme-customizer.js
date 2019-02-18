( function( $ ) {
	//Update site background color...
	wp.customize( 'ulr_section_bg', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-color', newval );
		} );
	} );

	wp.customize( 'ulr_section_bg2', function( value ) {
		value.bind( function( newval ) {
			$('.login-form form').css('background', newval );
		} );
	} );

	wp.customize( 'ulr_section_bg_img', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'background-image', 'url( ' + to + ')' );
		});
	});

	wp.customize( 'ulr_section_width', function( value ) {
		value.bind( function( to ) {
			$( '.login-form' ).css( 'width', to + 'px' );
		});
	});
} )( jQuery );