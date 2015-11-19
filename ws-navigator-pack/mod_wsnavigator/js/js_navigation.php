<?php

?>
<script>
(function($) {
    
    jQuery(document).ready(function(){
                // initialize all
        var docElem = window.document.documentElement, didScroll, scrollPosition;

                // trick to prevent scrolling when opening/closing button
                function noScrollFn() {
                    window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
                }

                function noScroll() {
                    window.removeEventListener( 'scroll', scrollHandler );
                    window.addEventListener( 'scroll', noScrollFn );
                }

                function scrollFn() {
                    window.addEventListener( 'scroll', scrollHandler );
                }

                function canScroll() {
                    window.removeEventListener( 'scroll', noScrollFn );
                    scrollFn();
                }

                function scrollHandler() {
                    if( !didScroll ) {
                        didScroll = true;
                        setTimeout( function() { scrollPage(); }, 60 );
                    }
                };

                function scrollPage() {
                    scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
                    didScroll = false;
                };

                scrollFn();
				var uiBtn = null;
				<?php 
				if($loginOn > 0)
				{
					echo '
						var uiBtn;
						if( document.getElementById("Nav-Wrapper").getAttribute("login-button") ) {
						   uiBtn = new UIMorphingButton( document.getElementById( "morph-button" ), {
									closeEl : ".icon-close2,
									onBeforeOpen : function() {
										if( !uiBtn.expanded ) {
											classie.addClass( uiBtn.el.parentElement, "no-morph-box" );
										}
										noScroll();
									},
									onAfterOpen : function() {
										// can scroll again
										canScroll();
									},
									onBeforeClose : function() {
										// don\'t allow to scroll
										noScroll();
									},
									onAfterClose : function() {
										if( uiBtn.expanded ) {
											// remove class active (after closing)
											classie.removeClass( uiBtn.el.parentElement, "no-morph-box" );
										}
										// can scroll again
										canScroll();
									},
									contentPos: { left : "", top : "", expLeft : "50%", expTop : "50%" }
								} );

					   }';
				}
				?>
        
        new mlPushMenu( document.getElementById( 'st-menu' ), document.getElementById( 'trigger' ), uiBtn, null);

    });
})();
<script>