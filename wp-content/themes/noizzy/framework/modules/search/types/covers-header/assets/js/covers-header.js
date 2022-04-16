(function($) {
    "use strict";

    var searchCoversHeader = {};
    edge.modules.searchCoversHeader = searchCoversHeader;

    searchCoversHeader.edgeOnDocumentReady = edgeOnDocumentReady;

    $(document).ready(edgeOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
	    edgeSearchCoversHeader();
    }
	
	/**
	 * Init Search Types
	 */
	function edgeSearchCoversHeader() {
        if ( edge.body.hasClass( 'edge-search-covers-header' ) ) {

            var searchOpener = $('a.edge-search-opener');

            if (searchOpener.length > 0) {
                searchOpener.on('click',function(e){
                    e.preventDefault();

                    var thisSearchOpener = $(this),
                        searchFormHeight,
                        searchFormHeaderHolder = $('.edge-page-header'),
                        searchFormTopHeaderHolder = $('.edge-top-bar'),
                        searchFormFixedHeaderHolder = searchFormHeaderHolder.find('.edge-fixed-wrapper.fixed'),
                        searchFormMobileHeaderHolder = $('.edge-mobile-header'),
                        searchForm = $('.edge-search-cover'),
                        searchFormIsInTopHeader = !!thisSearchOpener.parents('.edge-top-bar').length,
                        searchFormIsInFixedHeader = !!thisSearchOpener.parents('.edge-fixed-wrapper.fixed').length,
                        searchFormIsInStickyHeader = !!thisSearchOpener.parents('.edge-sticky-header').length,
                        searchFormIsInMobileHeader = !!thisSearchOpener.parents('.edge-mobile-header').length;

                    searchForm.removeClass('edge-is-active');

                    //Find search form position in header and height
                    if (searchFormIsInTopHeader) {
                        searchFormHeight = edgeGlobalVars.vars.edgeTopBarHeight;
                        searchFormTopHeaderHolder.find('.edge-search-cover').addClass('edge-is-active');

                    } else if (searchFormIsInFixedHeader) {
                        searchFormHeight = searchFormFixedHeaderHolder.outerHeight();
                        searchFormHeaderHolder.children('.edge-search-cover').addClass('edge-is-active');

                    } else if (searchFormIsInStickyHeader) {
                        searchFormHeight = edgeGlobalVars.vars.edgeStickyHeaderHeight;
                        searchFormHeaderHolder.children('.edge-search-cover').addClass('edge-is-active');

                    } else if (searchFormIsInMobileHeader) {
                        if (searchFormMobileHeaderHolder.hasClass('mobile-header-appear')) {
                            searchFormHeight = searchFormMobileHeaderHolder.children('.edge-mobile-header-inner').outerHeight();
                        } else {
                            searchFormHeight = searchFormMobileHeaderHolder.outerHeight();
                        }

                        searchFormMobileHeaderHolder.find('.edge-search-cover').addClass('edge-is-active');

                    } else {
                        searchFormHeight = searchFormHeaderHolder.outerHeight();
                        searchFormHeaderHolder.children('.edge-search-cover').addClass('edge-is-active');
                    }

                    if (searchForm.hasClass('edge-is-active')) {
                        searchForm.height(searchFormHeight).stop(true).fadeIn(600).find('input[type="text"]').focus();
                    }

                    searchForm.find('.edge-search-close').on('click',function(e){
                        e.preventDefault();
                        searchForm.stop(true).fadeOut(450);
                    });

                    searchForm.blur(function () {
                        searchForm.stop(true).fadeOut(450);
                    });

                    $(window).scroll(function () {
                        searchForm.stop(true).fadeOut(450);
                    });
                });
            }
        }
	}

})(jQuery);
