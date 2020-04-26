<?php
	
	/*
	 * K3Overlay
	 * 
	 * author		komed3
	 * version		1.0.1
	 * date			2020-04-26
	 * modified		2020-04-26
	 * license		MIT
	 * 
	 */
	
	if( function_exists( 'wfLoadExtension' ) ) {
		
		wfLoadExtension( 'K3Overlay' );
		
		# Keep i18n globals so mergeMessageFileList.php doesn't break
		$wgMessagesDirs[ 'K3Overlay' ] = __DIR__ . '/i18n';
		
		wfWarn(
			'Deprecated PHP entry point used for K3Overlay extension. ' .
			'Please use wfLoadExtension instead, ' .
			'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
		);
		
		return;
	
	} else {
		
		die( 'This version of the K3Overlay extension requires MediaWiki 1.25+' );
		
	}
	
?>
