(function($) {
    "use strict";

    var sidearea = {};
    edge.modules.sidearea = sidearea;

    sidearea.edgeOnDocumentReady = edgeOnDocumentReady;

    $(document).ready(edgeOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
	    edgeSideArea();
	    edgeSideAreaScroll();
    }
	
	/**
	 * Show/hide side area
	 */
    function edgeSideArea() {

        var wrapper = $('.edge-wrapper'),
            sideMenu = $('.edge-side-menu'),
            sideMenuButtonOpen = $('a.edge-side-menu-button-opener'),
            cssClass,
            //Flags
            slideFromRight = false,
            slideWithContent = false,
            slideUncovered = false;

        if (edge.body.hasClass('edge-side-menu-slide-from-right')) {
            $('.edge-cover').remove();
            cssClass = 'edge-right-side-menu-opened';
            wrapper.prepend('<div class="edge-cover"/>');
            slideFromRight = true;
        } else if (edge.body.hasClass('edge-side-menu-slide-with-content')) {
            cssClass = 'edge-side-menu-open';
            slideWithContent = true;
        } else if (edge.body.hasClass('edge-side-area-uncovered-from-content')) {
            cssClass = 'edge-right-side-menu-opened';
            slideUncovered = true;
        }

        $('a.edge-side-menu-button-opener, a.edge-close-side-menu').on('click', function (e) {
            e.preventDefault();

            if(!sideMenuButtonOpen.hasClass('opened')) {

                sideMenuButtonOpen.addClass('opened');
                edge.body.addClass(cssClass);

                if (slideFromRight) {
                    $('.edge-wrapper .edge-cover').on('click', function (e) {
                        edge.body.removeClass('edge-right-side-menu-opened');
                        sideMenuButtonOpen.removeClass('opened');
                    });
                }

                if (slideUncovered) {
                    sideMenu.css({
                        'visibility' : 'visible'
                    });
                }

                var currentScroll = $(window).scrollTop();
                $(window).scroll(function() {
                    if(Math.abs(edge.scroll - currentScroll) > 400){
                        edge.body.removeClass(cssClass);
                        sideMenuButtonOpen.removeClass('opened');
                        if (slideUncovered) {
                            var hideSideMenu = setTimeout(function(){
                                sideMenu.css({'visibility':'hidden'});
                                clearTimeout(hideSideMenu);
                            },400);
                        }
                    }
                });

            } else {

                sideMenuButtonOpen.removeClass('opened');
                edge.body.removeClass(cssClass);
                if (slideUncovered) {
                    var hideSideMenu = setTimeout(function(){
                        sideMenu.css({'visibility':'hidden'});
                        clearTimeout(hideSideMenu);
                    },400);
                }

            }

            if (slideWithContent) {

                e.stopPropagation();
                wrapper.on('click', function (e) {
                    e.preventDefault();
                    sideMenuButtonOpen.removeClass('opened');
                    edge.body.removeClass('edge-side-menu-open');
                });

            }

        });

    }
	
	/*
	 **  Smooth scroll functionality for Side Area
	 */
	function edgeSideAreaScroll(){
		var sideMenu = $('.edge-side-menu');
		
		if(sideMenu.length){
            sideMenu.perfectScrollbar({
                wheelSpeed: 0.6,
                suppressScrollX: true
            });
		}
	}

})(jQuery);
