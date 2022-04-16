(function($) {
    "use strict";

    var blogListSC = {};
    edge.modules.blogListSC = blogListSC;

    blogListSC.edgeOnDocumentReady = edgeOnDocumentReady;
    blogListSC.edgeOnWindowLoad = edgeOnWindowLoad;
    blogListSC.edgeOnWindowScroll = edgeOnWindowScroll;

    $(document).ready(edgeOnDocumentReady);
    $(window).on('load', edgeOnWindowLoad);
    $(window).scroll(edgeOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgeOnDocumentReady() {
        edgeInitBlogListMasonry();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgeOnWindowLoad() {
        edgeInitBlogListShortcodePagination().init();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function edgeOnWindowScroll() {
        edgeInitBlogListShortcodePagination().scroll();
    }

    /**
     * Init blog list shortcode masonry layout
     */
    function edgeInitBlogListMasonry() {
        var holder = $('.edge-blog-list-holder.edge-bl-masonry');

        if(holder.length){
            holder.each(function(){
                var thisHolder = $(this),
                    masonry = thisHolder.find('.edge-blog-list');

                masonry.waitForImages(function() {
                    masonry.isotope({
                        layoutMode: 'packery',
                        itemSelector: 'article',
                        percentPosition: true,
                        packery: {
                            gutter: '.edge-bl-grid-gutter',
                            columnWidth: '.edge-bl-grid-sizer'
                        }
                    });

                    masonry.css('opacity', '1');
                });
            });
        }
    }

    /**
     * Init blog list shortcode pagination functions
     */
    function edgeInitBlogListShortcodePagination(){
        var holder = $('.edge-blog-list-holder');

        var initStandardPagination = function(thisHolder) {
            var standardLink = thisHolder.find('.edge-bl-standard-pagination li');

            if(standardLink.length) {
                standardLink.each(function(){
                    var thisLink = $(this).children('a'),
                        pagedLink = 1;

                    thisLink.on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
                            pagedLink = thisLink.data('paged');
                        }

                        initMainPagFunctionality(thisHolder, pagedLink);
                    });
                });
            }
        };

        var initLoadMorePagination = function(thisHolder) {
            var loadMoreButton = thisHolder.find('.edge-blog-pag-load-more a');

            loadMoreButton.on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                initMainPagFunctionality(thisHolder);
            });
        };

        var initInifiteScrollPagination = function(thisHolder) {
            var blogListHeight = thisHolder.outerHeight(),
                blogListTopOffest = thisHolder.offset().top,
                blogListPosition = blogListHeight + blogListTopOffest - edgeGlobalVars.vars.edgeAddForAdminBar;

            if(!thisHolder.hasClass('edge-bl-pag-infinite-scroll-started') && edge.scroll + edge.windowHeight > blogListPosition) {
                initMainPagFunctionality(thisHolder);
            }
        };

        var initMainPagFunctionality = function(thisHolder, pagedLink) {
            var thisHolderInner = thisHolder.find('.edge-blog-list'),
                nextPage,
                maxNumPages;

            if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
                maxNumPages = thisHolder.data('max-num-pages');
            }

            if(thisHolder.hasClass('edge-bl-pag-standard-shortcodes')) {
                thisHolder.data('next-page', pagedLink);
            }

            if(thisHolder.hasClass('edge-bl-pag-infinite-scroll')) {
                thisHolder.addClass('edge-bl-pag-infinite-scroll-started');
            }

            var loadMoreDatta = edge.modules.common.getLoadMoreData(thisHolder),
                loadingItem = $('body').find('.edge-blog-pag-loading');

            nextPage = loadMoreDatta.nextPage;

			var nonceHolder = $('body').find('input[name*="qodef_blog_load_more_nonce_"]');

			loadMoreDatta.blog_load_more_id = nonceHolder.attr('name').substring(nonceHolder.attr('name').length - 4, nonceHolder.attr('name').length);
			loadMoreDatta.blog_load_more_nonce = nonceHolder.val();

            if(nextPage <= maxNumPages){
                if(thisHolder.hasClass('edge-bl-pag-standard-shortcodes')) {
                    loadingItem.addClass('edge-showing edge-standard-pag-trigger');
                    thisHolder.addClass('edge-bl-pag-standard-shortcodes-animate');
                } else {
                    loadingItem.addClass('edge-showing');
                }

                var ajaxData = edge.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'noizzy_edge_blog_shortcode_load_more');

                $.ajax({
                    type: 'POST',
                    data: ajaxData,
                    url: edgeGlobalVars.vars.edgeAjaxUrl,
                    success: function (data) {
                        if(!thisHolder.hasClass('edge-bl-pag-standard-shortcodes')) {
                            nextPage++;
                        }

                        thisHolder.data('next-page', nextPage);

                        var response = $.parseJSON(data),
                            responseHtml =  response.html;

                        if(thisHolder.hasClass('edge-bl-pag-standard-shortcodes')) {
                            edgeInitStandardPaginationLinkChanges(thisHolder, maxNumPages, nextPage);

                            thisHolder.waitForImages(function(){
                                if(thisHolder.hasClass('edge-bl-masonry')){
                                    edgeInitHtmlIsotopeNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);
                                } else {
                                    edgeInitHtmlGalleryNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);

                                    if (typeof edge.modules.common.edgeStickySidebarWidget === 'function') {
                                        edge.modules.common.edgeStickySidebarWidget().reInit();
                                    }
                                }
                            });
                        } else {
                            thisHolder.waitForImages(function(){
                                if(thisHolder.hasClass('edge-bl-masonry')){
                                    edgeInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
                                } else {
                                    edgeInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);

                                    if (typeof edge.modules.common.edgeStickySidebarWidget === 'function') {
                                        edge.modules.common.edgeStickySidebarWidget().reInit();
                                    }
                                }
                            });
                        }

                        if(thisHolder.hasClass('edge-bl-pag-infinite-scroll-started')) {
                            thisHolder.removeClass('edge-bl-pag-infinite-scroll-started');
                        }
                    }
                });
            }

            if(nextPage === maxNumPages){
                thisHolder.find('.edge-blog-pag-load-more').hide();
            }
        };

        var edgeInitStandardPaginationLinkChanges = function(thisHolder, maxNumPages, nextPage) {
            var standardPagHolder = thisHolder.find('.edge-bl-standard-pagination'),
                standardPagNumericItem = standardPagHolder.find('li.edge-bl-pag-number'),
                standardPagPrevItem = standardPagHolder.find('li.edge-bl-pag-prev a'),
                standardPagNextItem = standardPagHolder.find('li.edge-bl-pag-next a');

            standardPagNumericItem.removeClass('edge-bl-pag-active');
            standardPagNumericItem.eq(nextPage-1).addClass('edge-bl-pag-active');

            standardPagPrevItem.data('paged', nextPage-1);
            standardPagNextItem.data('paged', nextPage+1);

            if(nextPage > 1) {
                standardPagPrevItem.css({'opacity': '1'});
            } else {
                standardPagPrevItem.css({'opacity': '0'});
            }

            if(nextPage === maxNumPages) {
                standardPagNextItem.css({'opacity': '0'});
            } else {
                standardPagNextItem.css({'opacity': '1'});
            }
        };

        var edgeInitHtmlIsotopeNewContent = function(thisHolder, thisHolderInner, loadingItem, responseHtml) {
            thisHolderInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('edge-showing edge-standard-pag-trigger');
            thisHolder.removeClass('edge-bl-pag-standard-shortcodes-animate');

            setTimeout(function() {
                thisHolderInner.isotope('layout');

                if (typeof edge.modules.common.edgeStickySidebarWidget === 'function') {
                    edge.modules.common.edgeStickySidebarWidget().reInit();
                }
            }, 600);
        };

        var edgeInitHtmlGalleryNewContent = function(thisHolder, thisHolderInner, loadingItem, responseHtml) {
            loadingItem.removeClass('edge-showing edge-standard-pag-trigger');
            thisHolder.removeClass('edge-bl-pag-standard-shortcodes-animate');
            thisHolderInner.html(responseHtml);
        };

        var edgeInitAppendIsotopeNewContent = function(thisHolderInner, loadingItem, responseHtml) {
            thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('edge-showing');

            setTimeout(function() {
                thisHolderInner.isotope('layout');

                if (typeof edge.modules.common.edgeStickySidebarWidget === 'function') {
                    edge.modules.common.edgeStickySidebarWidget().reInit();
                }
            }, 600);
        };

        var edgeInitAppendGalleryNewContent = function(thisHolderInner, loadingItem, responseHtml) {
            loadingItem.removeClass('edge-showing');
            thisHolderInner.append(responseHtml);
        };

        return {
            init: function() {
                if(holder.length) {
                    holder.each(function() {
                        var thisHolder = $(this);

                        if(thisHolder.hasClass('edge-bl-pag-standard-shortcodes')) {
                            initStandardPagination(thisHolder);
                        }

                        if(thisHolder.hasClass('edge-bl-pag-load-more')) {
                            initLoadMorePagination(thisHolder);
                        }

                        if(thisHolder.hasClass('edge-bl-pag-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            },
            scroll: function() {
                if(holder.length) {
                    holder.each(function() {
                        var thisHolder = $(this);

                        if(thisHolder.hasClass('edge-bl-pag-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            }
        };
    }

})(jQuery);