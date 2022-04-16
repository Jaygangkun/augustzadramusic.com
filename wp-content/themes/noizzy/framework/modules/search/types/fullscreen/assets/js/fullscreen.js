(function($) {
    "use strict";

    var searchFullscreen = {};
    edge.modules.searchFullscreen = searchFullscreen;

    searchFullscreen.edgeOnDocumentReady = edgeOnDocumentReady;

    $(document).ready(edgeOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
	    edgeSearchFullscreen();
    }
	
	/**
	 * Init Search Types
	 */
	function edgeSearchFullscreen() {
        if ( edge.body.hasClass( 'edge-fullscreen-search' ) ) {

            var searchOpener = $('a.edge-search-opener');

            if (searchOpener.length > 0) {

                var searchHolder = $('.edge-fullscreen-search-holder'),
                    searchClose = $('.edge-search-close');

                searchOpener.on('click', function (e) {
                    e.preventDefault();

                    if (searchHolder.hasClass('edge-animate')) {
                        edge.body.removeClass('edge-fullscreen-search-opened edge-search-fade-out');
                        edge.body.removeClass('edge-search-fade-in');
                        searchHolder.removeClass('edge-animate');

                        setTimeout(function () {
                            searchHolder.find('.edge-search-field').val('');
                            searchHolder.find('.edge-search-field').blur();
                        }, 300);

                        edge.modules.common.edgeEnableScroll();
                    } else {
                        edge.body.addClass('edge-fullscreen-search-opened edge-search-fade-in');
                        edge.body.removeClass('edge-search-fade-out');
                        searchHolder.addClass('edge-animate');

                        setTimeout(function () {
                            searchHolder.find('.edge-search-field').focus();
                        }, 900);

                        edge.modules.common.edgeDisableScroll();
                    }

                    searchClose.on('click', function (e) {
                        e.preventDefault();
                        edge.body.removeClass('edge-fullscreen-search-opened edge-search-fade-in');
                        edge.body.addClass('edge-search-fade-out');
                        searchHolder.removeClass('edge-animate');

                        setTimeout(function () {
                            searchHolder.find('.edge-search-field').val('');
                            searchHolder.find('.edge-search-field').blur();
                        }, 300);

                        edge.modules.common.edgeEnableScroll();
                    });

                    //Close on click away
                    $(document).mouseup(function (e) {
                        var container = $(".edge-form-holder-inner");

                        if (!container.is(e.target) && container.has(e.target).length === 0) {
                            e.preventDefault();
                            edge.body.removeClass('edge-fullscreen-search-opened edge-search-fade-in');
                            edge.body.addClass('edge-search-fade-out');
                            searchHolder.removeClass('edge-animate');

                            setTimeout(function () {
                                searchHolder.find('.edge-search-field').val('');
                                searchHolder.find('.edge-search-field').blur();
                            }, 300);

                            edge.modules.common.edgeEnableScroll();
                        }
                    });

                    //Close on escape
                    $(document).keyup(function (e) {
                        if (e.keyCode === 27) { //KeyCode for ESC button is 27
                            edge.body.removeClass('edge-fullscreen-search-opened edge-search-fade-in');
                            edge.body.addClass('edge-search-fade-out');
                            searchHolder.removeClass('edge-animate');

                            setTimeout(function () {
                                searchHolder.find('.edge-search-field').val('');
                                searchHolder.find('.edge-search-field').blur();
                            }, 300);

                            edge.modules.common.edgeEnableScroll();
                        }
                    });
                });

                //Text input focus change
                var inputSearchField = $('.edge-fullscreen-search-holder .edge-search-field'),
                    inputSearchLine = $('.edge-fullscreen-search-holder .edge-field-holder .edge-line');

                inputSearchField.focus(function () {
                    inputSearchLine.css('width', '100%');
                });

                inputSearchField.blur(function () {
                    inputSearchLine.css('width', '0');
                });
            }
        }
	}

})(jQuery);
