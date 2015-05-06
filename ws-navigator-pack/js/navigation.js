(function($) {
    var svgIconConfig = {

        hamburger : {
        url : '../images/menu/hamburger.svg',
        animation : [
            {
                el : 'path:nth-child(1)',
                animProperties : {
                    from : { val : '{"path" : "m 5.0916789,20.818994 53.8166421,0"}' },
                    to : { val : '{"path" : "m 5.091679,9.771104 53.816642,0"}' }
                }
            },
            {
                el : 'path:nth-child(3)',
                animProperties : {
                    from : { val : '{"path" : "m 5.0916788,42.95698 53.8166422,0"}' },
                    to : { val : '{"path" : "m 5.0916789,54.00487 53.8166421,0"}' }
                }
            }
        ]
    },
    hamburgerCross : {
        url : '/images/menu/hamburger.svg',
        animation : [
            {
                el : 'path:nth-child(1)',
                animProperties : {
                    from : { val : '{"path" : "m 5.0916789,20.818994 53.8166421,0"}' },
                    to : { val : '{"path" : "M 12.972944,50.936147 51.027056,12.882035"}' }
                }
            },
            {
                el : 'path:nth-child(2)',
                animProperties : {
                    from : { val : '{"transform" : "s1 1", "opacity" : 1}', before : '{"transform" : "s0 0"}' },
                    to : { val : '{"opacity" : 0}' }
                }
            },
            {
                el : 'path:nth-child(3)',
                animProperties : {
                    from : { val : '{"path" : "m 5.0916788,42.95698 53.8166422,0"}' },
                    to : { val : '{"path" : "M 12.972944,12.882035 51.027056,50.936147"}' }
                }
            }
        ]
    }
    };
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
                var uiBtn
               if( useLogin ) {
                   uiBtn = new UIMorphingButton( document.getElementById( 'morph-button' ), {
                            closeEl : '.icon-close',
                            onBeforeOpen : function() {
                                if( !uiBtn.expanded ) {
                                    classie.addClass( uiBtn.el.parentElement, 'no-morph-box' );
                                }
                                noScroll();
                            },
                            onAfterOpen : function() {
                                // can scroll again
                                canScroll();
                            },
                            onBeforeClose : function() {
                                // don't allow to scroll
                                noScroll();
                            },
                            onAfterClose : function() {
                                if( uiBtn.expanded ) {
                                    // remove class active (after closing)
                                    classie.removeClass( uiBtn.el.parentElement, 'no-morph-box' );
                                }
                                // can scroll again
                                canScroll();
                            },
                            contentPos: { left : '', top : '', expLeft : '50%', expTop : '50%' }
                        } );

               }
        var icoClass = document.querySelector( '.si-icons-easing .si-icon-hamburger-cross' );
        var ico = (icoClass)? new svgIcon( icoClass, svgIconConfig, { easing : mina.elastic, speed: 600, animStat: false } ): null;
        new mlPushMenu( document.getElementById( 'st-menu' ), document.getElementById( 'trigger' ), uiBtn, ico);

    });
})();
