<?php
	
	class K3OverlayHooks {
		
		public static function onBeforePageDisplay( OutputPage $out, Skin $skin ) {
			
			global $wgUser, $wgK3Overlay_cexp, $wgK3Overlay_gout;
			
			// show overlay only after cookie has expired
			if( !array_key_exists( 'k3overlay', $_COOKIE ) ) {
				
				// hide overlay for specific user groups or if null
				if( strlen( trim( $out->msg( 'k3overlay-text' )->plain() ) ) == 0 ||
				    !array_intersect( $wgK3Overlay_gout, $wgUser->getGroups() ) ) {
					
					$out->addHTML('
						<div id="k3overlay-text">
							<div id="k3overlay-close">×</div>
							<div class="text">
								' . $out->msg( 'k3overlay-text' ) . '
							</div>
						</div>
					');
					
					$out->addModules( 'ext.k3overlay' );
					
					// disable overlay output for a certain time
					setcookie(
						'k3overlay', '1',
						time() + $wgK3Overlay_cexp
					);
					
				}
				
			}
			
		}
		
	}
	
?>
