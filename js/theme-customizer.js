( function( $ ) {
	alert("");

	//Update site background color...
	wp.customize( 'ulr_section_bg', function( value ) {
		value.bind( function( newval ) {
			alert();
			$('body').css('background-color', newval );
		} );
	} );
		
} )( jQuery );