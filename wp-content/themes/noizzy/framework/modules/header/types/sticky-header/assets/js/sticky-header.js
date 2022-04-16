(function($) {
    "use strict";

    var stickyHeader = {};
    edge.modules.stickyHeader = stickyHeader;
	
	stickyHeader.isStickyVisible = false;
	stickyHeader.stickyAppearAmount = 0;
	stickyHeader.behaviour = '';
	
	stickyHeader.edgeOnDocumentReady = edgeOnDocumentReady;

    $(document).ready(edgeOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
	    if(edge.windowWidth > 1024) {
		    edgeHeaderBehaviour();
	    }
    }

    /*
     **	Show/Hide sticky header on window scroll
     */
    function edgeHeaderBehaviour() {
        var header = $('.edge-page-header'),
	        stickyHeader = $('.edge-sticky-header'),
            fixedHeaderWrapper = $('.edge-fixed-wrapper'),
	        fixedMenuArea = fixedHeaderWrapper.children('.edge-menu-area'),
	        fixedMenuAreaHeight = fixedMenuArea.outerHeight(),
            sliderHolder = $('.edge-slider'),
            revSliderHeight = sliderHolder.length ? sliderHolder.outerHeight() : 0,
	        stickyAppearAmount,
	        headerAppear;
        
        var headerMenuAreaOffset = fixedHeaderWrapper.length ? fixedHeaderWrapper.offset().top - edgeGlobalVars.vars.edgeAddForAdminBar : 0;

        switch(true) {
            // sticky header that will be shown when user scrolls up
            case edge.body.hasClass('edge-sticky-header-on-scroll-up'):
                edge.modules.stickyHeader.behaviour = 'edge-sticky-header-on-scroll-up';
                var docYScroll1 = $(document).scrollTop();
                stickyAppearAmount = parseInt(edgeGlobalVars.vars.edgeTopBarHeight) + parseInt(edgeGlobalVars.vars.edgeLogoAreaHeight) + parseInt(edgeGlobalVars.vars.edgeMenuAreaHeight) + parseInt(edgeGlobalVars.vars.edgeStickyHeaderHeight);
	            
                headerAppear = function(){
                    var docYScroll2 = $(document).scrollTop();
					
                    if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
                        edge.modules.stickyHeader.isStickyVisible = false;
                        stickyHeader.removeClass('header-appear').find('.edge-main-menu .second').removeClass('edge-drop-down-start');
                        edge.body.removeClass('edge-sticky-header-appear');
                    } else {
                        edge.modules.stickyHeader.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
	                    edge.body.addClass('edge-sticky-header-appear');
                    }

                    docYScroll1 = $(document).scrollTop();
                };
                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // sticky header that will be shown when user scrolls both up and down
            case edge.body.hasClass('edge-sticky-header-on-scroll-down-up'):
                edge.modules.stickyHeader.behaviour = 'edge-sticky-header-on-scroll-down-up';

                if(edgePerPageVars.vars.edgeStickyScrollAmount !== 0){
                    edge.modules.stickyHeader.stickyAppearAmount = parseInt(edgePerPageVars.vars.edgeStickyScrollAmount);
                } else {
                    edge.modules.stickyHeader.stickyAppearAmount = parseInt(edgeGlobalVars.vars.edgeTopBarHeight) + parseInt(edgeGlobalVars.vars.edgeLogoAreaHeight) + parseInt(edgeGlobalVars.vars.edgeMenuAreaHeight) + parseInt(revSliderHeight);
                }

                headerAppear = function(){
                    if(edge.scroll < edge.modules.stickyHeader.stickyAppearAmount) {
                        edge.modules.stickyHeader.isStickyVisible = false;
                        stickyHeader.removeClass('header-appear').find('.edge-main-menu .second').removeClass('edge-drop-down-start');
	                    edge.body.removeClass('edge-sticky-header-appear');
                    }else{
                        edge.modules.stickyHeader.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
	                    edge.body.addClass('edge-sticky-header-appear');
                    }
                };

                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // on scroll down, part of header will be sticky
            case edge.body.hasClass('edge-fixed-on-scroll'):
                edge.modules.stickyHeader.behaviour = 'edge-fixed-on-scroll';
                var headerFixed = function(){
	
	                if(edge.scroll <= headerMenuAreaOffset) {
		                fixedHeaderWrapper.removeClass('fixed');
		                edge.body.removeClass('edge-fixed-header-appear');
		                header.css('margin-bottom', '0');
	                } else {
		                fixedHeaderWrapper.addClass('fixed');
		                edge.body.addClass('edge-fixed-header-appear');
		                header.css('margin-bottom', fixedMenuAreaHeight + 'px');
	                }
                };

                headerFixed();

                $(window).scroll(function() {
                    headerFixed();
                });

                break;
        }
    }

})(jQuery);