(function($) {
    "use strict";

    var headerMinimal = {};
    edge.modules.headerMinimal = headerMinimal;
	
	headerMinimal.edgeOnDocumentReady = edgeOnDocumentReady;

    $(document).ready(edgeOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
        edgeFullscreenMenu();
    }

    /**
     * Init Fullscreen Menu
     */
    function edgeFullscreenMenu() {
	    var popupMenuOpener = $( 'a.edge-fullscreen-menu-opener');
	    
        if (popupMenuOpener.length) {
            var popupMenuHolderOuter = $(".edge-fullscreen-menu-holder-outer"),
                cssClass,
            //Flags for type of animation
                fadeRight = false,
                fadeTop = false,
            //Widgets
                widgetAboveNav = $('.edge-fullscreen-above-menu-widget-holder'),
                widgetBelowNav = $('.edge-fullscreen-below-menu-widget-holder'),
            //Menu
                menuItems = $('.edge-fullscreen-menu-holder-outer nav > ul > li > a'),
                menuItemWithChild =  $('.edge-fullscreen-menu > ul li.has_sub > a'),
                menuItemWithoutChild = $('.edge-fullscreen-menu ul li:not(.has_sub) a');

            //set height of popup holder and initialize perfectScrollbar
            popupMenuHolderOuter.perfectScrollbar({
                wheelSpeed: 0.6,
                suppressScrollX: true
            });

            if (edge.windowWidth <= 1024) {
                popupMenuHolderOuter.height(edge.windowHeight - $('.edge-mobile-header').height());
            } else {
                popupMenuHolderOuter.height(edge.windowHeight);
            }

            //set height of popup holder on resize
            $(window).resize(function() {

                if (edge.windowWidth <= 1024) {
                    popupMenuHolderOuter.height(edge.windowHeight - $('.edge-mobile-header').height());
                } else {
                    popupMenuHolderOuter.height(edge.windowHeight);
                }
            });

            if (edge.body.hasClass('edge-fade-push-text-right')) {
                cssClass = 'edge-push-nav-right';
                fadeRight = true;
            } else if (edge.body.hasClass('edge-fade-push-text-top')) {
                cssClass = 'edge-push-text-top';
                fadeTop = true;
            }

            //Appearing animation
            if (fadeRight || fadeTop) {
                if (widgetAboveNav.length) {
                    widgetAboveNav.children().css({
                        '-webkit-animation-delay' : 0 + 'ms',
                        '-moz-animation-delay' : 0 + 'ms',
                        'animation-delay' : 0 + 'ms'
                    });
                }
                menuItems.each(function(i) {
                    $(this).css({
                        '-webkit-animation-delay': (i+1) * 70 + 'ms',
                        '-moz-animation-delay': (i+1) * 70 + 'ms',
                        'animation-delay': (i+1) * 70 + 'ms'
                    });
                });
                if (widgetBelowNav.length) {
                    widgetBelowNav.children().css({
                        '-webkit-animation-delay' : (menuItems.length + 1)*70 + 'ms',
                        '-moz-animation-delay' : (menuItems.length + 1)*70 + 'ms',
                        'animation-delay' : (menuItems.length + 1)*70 + 'ms'
                    });
                }
            }

            // Open popup menu
            popupMenuOpener.on('click',function(e){
                e.preventDefault();

                if (!popupMenuOpener.hasClass('edge-fm-opened')) {
                    popupMenuOpener.addClass('edge-fm-opened');
                    edge.body.removeClass('edge-fullscreen-fade-out').addClass('edge-fullscreen-menu-opened edge-fullscreen-fade-in');
                    edge.body.removeClass(cssClass);
                    edge.modules.common.edgeDisableScroll();
                    
                    $(document).keyup(function(e){
                        if (e.keyCode == 27 ) {
                            popupMenuOpener.removeClass('edge-fm-opened');
                            edge.body.removeClass('edge-fullscreen-menu-opened edge-fullscreen-fade-in').addClass('edge-fullscreen-fade-out');
                            edge.body.addClass(cssClass);
                            edge.modules.common.edgeEnableScroll();

                            $("nav.edge-fullscreen-menu ul.sub_menu").slideUp(200);
                        }
                    });
                } else {
                    popupMenuOpener.removeClass('edge-fm-opened');
                    edge.body.removeClass('edge-fullscreen-menu-opened edge-fullscreen-fade-in').addClass('edge-fullscreen-fade-out');
                    edge.body.addClass(cssClass);
                    edge.modules.common.edgeEnableScroll();

                    $("nav.edge-fullscreen-menu ul.sub_menu").slideUp(200);
                }
            });

            //logic for open sub menus in popup menu
            menuItemWithChild.on('tap click', function(e) {
                e.preventDefault();

                var thisItem = $(this),
	                thisItemParent = thisItem.parent(),
					thisItemParentSiblingsWithDrop = thisItemParent.siblings('.menu-item-has-children');

                if (thisItemParent.hasClass('has_sub')) {
	                var submenu = thisItemParent.find('> ul.sub_menu');
	
	                if (submenu.is(':visible')) {
		                submenu.slideUp(450, 'easeInOutQuint');
		                thisItemParent.removeClass('open_sub');
	                } else {
		                thisItemParent.addClass('open_sub');
		
		                if(thisItemParentSiblingsWithDrop.length === 0) {
			                submenu.slideDown(400, 'easeInOutQuint');
		                } else {
							thisItemParent.closest('li.menu-item').siblings().find('.menu-item').removeClass('open_sub');
			                thisItemParent.siblings().removeClass('open_sub').find('.sub_menu').slideUp(400, 'easeInOutQuint', function() {
				                submenu.slideDown(400, 'easeInOutQuint');
			                });
		                }
	                }
                }
                
                return false;
            });

            //if link has no submenu and if it's not dead, than open that link
            menuItemWithoutChild.on('click',function(e){
                if(($(this).attr('href') !== "http://#") && ($(this).attr('href') !== "#")){
                    if (e.which == 1) {
                        popupMenuOpener.removeClass('edge-fm-opened');
                        edge.body.removeClass('edge-fullscreen-menu-opened');
                        edge.body.removeClass('edge-fullscreen-fade-in').addClass('edge-fullscreen-fade-out');
                        edge.body.addClass(cssClass);
                        $("nav.edge-fullscreen-menu ul.sub_menu").slideUp(200);
                        edge.modules.common.edgeEnableScroll();
                    }
                } else {
                    return false;
                }
            });
        }
    }

})(jQuery);