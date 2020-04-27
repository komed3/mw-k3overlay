<?php
	
	class K3OverlayHooks {
		
        /**
         * MediaWiki hook BeforePageDisplay
         * manual: https://www.mediawiki.org/wiki/Manual:Hooks/BeforePageDisplay
         * 
         * @var OutputPage
         * @var Skin
         * 
         */
		public static function onBeforePageDisplay( OutputPage $out, Skin $skin ) {
			
			global $wgUser, $wgK3O_cookie_expires, $wgK3O_only_logged_in, $wgK3O_groups_rest;
			
            $show_overlay = (
                
                // show overlay only after cookie has expired
                (
                    !array_key_exists( 'k3overlay', $_COOKIE ) ||
                    $_COOKIE[ 'k3overlay' ] != $wgUser->getId()
                ) &&
                
                // hide overlay for specific user groups
                !array_intersect( $wgK3O_groups_rest, $wgUser->getGroups() ) &&
                
                // hide if overlay text is null
                strlen( trim( $out->msg( 'k3overlay-text' )->plain() ) ) > 0
                
            );
            
            // overwrite with $_GET parameter -- since 1.0.2
            if( array_key_exists( 'showoverlay', $_GET ) ) {
                
                $show_overlay = true;
                
            }
            
            // check if only logged in users can see the overlay -- since 1.0.2
            if( $wgK3O_only_logged_in && !$wgUser->isLoggedIn() ) {
                
                $show_overlay = false;
                
            }
            
            if( $show_overlay ) {
                
                // create overlay
                $out->addHTML('
                    <div id="k3overlay-text">
                        <div id="k3overlay-close">×</div>
                        <div class="textbox">
                            <div class="text">
                                ' . $out->msg( 'k3overlay-text' ) . '
                            </div>
                        </div>
                    </div>
                ');
                
                // load ressources (stylesheet, script)
                $out->addModules( 'ext.k3overlay' );
                
                // disable overlay output for a certain time
                setcookie(
                    'k3overlay', $wgUser->getId(),
                    time() + $wgK3O_cookie_expires
                );
                
            }
			
		}
		
	}
	
?>
