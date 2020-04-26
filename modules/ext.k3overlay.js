$( document ).ready( function() {
	
	var colorClasses = [ 'cBlack', 'cBlue', 'cCoral', 'cGreen', 'cPink', 'cPurple', 'cRed', 'cTurquoise', 'cYellow' ],
		fontClasses = [ 'fSansSerif', 'fSerif', 'fMonospace', 'fHandwriting', 'fDisplay' ];
	
	// create Overlay
	$( 'body' ).append( '<div id="k3overlay">' + $( '#k3overlay-text' ).html() + '</div>' );
	$( '#k3overlay-text' ).remove();
	
	// hide other contents
	$( '#content' ).css( 'display', 'none' );
	$( '#mw-navigation' ).css( 'display', 'none' );
	$( '#footer' ).css( 'display', 'none' );
	
	// set style
	$( '#k3overlay' )
		.addClass( colorClasses[ Math.floor( Math.random() * colorClasses.length ) ] )
		.addClass( fontClasses[ Math.floor( Math.random() * fontClasses.length ) ] )
		.fadeIn();
	
	// close overlay function
	$( document ).on( 'click', '#k3overlay-close', function() {
		
		$( '#content' ).css( 'display', 'block' );
		$( '#mw-navigation' ).css( 'display', 'block' );
		$( '#footer' ).css( 'display', 'block' );
		
		$( '#k3overlay' ).remove();
		
	} );
	
} );