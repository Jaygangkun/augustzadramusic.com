(function($) {
	"use strict";

    var blog = {};
    edge.modules.blog = blog;

    blog.edgeOnDocumentReady = edgeOnDocumentReady;
    blog.edgeOnWindowLoad = edgeOnWindowLoad;
    blog.edgeOnWindowResize = edgeOnWindowResize;
    blog.edgeOnWindowScroll = edgeOnWindowScroll;

    $(document).ready(edgeOnDocumentReady);
    $(window).on('load', edgeOnWindowLoad);
    $(window).resize(edgeOnWindowResize);
    $(window).scroll(edgeOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
        edgeInitAudioPlayer();
        edgeInitBlogMasonry();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgeOnWindowLoad() {
	    edgeInitBlogPagination().init();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgeOnWindowResize() {
        edgeInitBlogMasonry();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgeOnWindowScroll() {
	    edgeInitBlogPagination().scroll();
    }

    /**
    * Init audio player for Blog list and single pages
    */
    function edgeInitAudioPlayer() {
	    var players = $('audio.edge-blog-audio');
	
	    if (players.length) {
		    players.mediaelementplayer({
			    audioWidth: '100%'
		    });
	    }
    }

    /**
    * Init Blog Masonry Layout
    */
    function edgeInitBlogMasonry() {
	    var holder = $('.edge-blog-holder.edge-blog-type-masonry');
	
	    if(holder.length){
		    holder.each(function(){
			    var thisHolder = $(this),
				    masonry = thisHolder.children('.edge-blog-holder-inner'),
                    size = thisHolder.find('.edge-blog-masonry-grid-sizer').width();
                
			    masonry.waitForImages(function() {
				    masonry.isotope({
					    layoutMode: 'packery',
					    itemSelector: 'article',
					    percentPosition: true,
					    packery: {
						    gutter: '.edge-blog-masonry-grid-gutter',
						    columnWidth: '.edge-blog-masonry-grid-sizer'
					    }
				    });
				
				    edge.modules.common.setFixedImageProportionSize(thisHolder, thisHolder.find('article'), size);
				    
                    masonry.isotope('layout').css('opacity', '1');
                });
		    });
	    }
    }
	
	/**
	 * Initializes blog pagination functions
	 */
	function edgeInitBlogPagination(){
		var holder = $('.edge-blog-holder');
		
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
			
			if(!thisHolder.hasClass('edge-blog-pagination-infinite-scroll-started') && edge.scroll + edge.windowHeight > blogListPosition) {
				initMainPagFunctionality(thisHolder);
			}
		};
		
		var initMainPagFunctionality = function(thisHolder) {
			var thisHolderInner = thisHolder.children('.edge-blog-holder-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
				maxNumPages = thisHolder.data('max-num-pages');
			}
			
			if(thisHolder.hasClass('edge-blog-pagination-infinite-scroll')) {
				thisHolder.addClass('edge-blog-pagination-infinite-scroll-started');
			}
			
			var loadMoreDatta = edge.modules.common.getLoadMoreData(thisHolder),
				loadingItem = $('body').find('.edge-blog-pag-loading');

			nextPage = loadMoreDatta.nextPage;

			var nonceHolder = $('body').find('input[name*="qodef_blog_load_more_nonce_"]');

			loadMoreDatta.blog_load_more_id = nonceHolder.attr('name').substring(nonceHolder.attr('name').length - 4, nonceHolder.attr('name').length);
			loadMoreDatta.blog_load_more_nonce = nonceHolder.val();
			
			if(nextPage <= maxNumPages){
				loadingItem.addClass('edge-showing');
				
				var ajaxData = edge.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'noizzy_edge_blog_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: edgeGlobalVars.vars.edgeAjaxUrl,
					success: function (data) {
						nextPage++;
						
						thisHolder.data('next-page', nextPage);

						var response = $.parseJSON(data),
							responseHtml =  response.html;

						thisHolder.waitForImages(function(){
							if(thisHolder.hasClass('edge-blog-type-masonry')){
								edgeInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
								edge.modules.common.setFixedImageProportionSize(thisHolder, thisHolder.find('article'), thisHolderInner.find('.edge-blog-masonry-grid-sizer').width());
							} else {
								edgeInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);
							}
							
							setTimeout(function() {
								edgeInitAudioPlayer();
								edge.modules.common.edgeOwlSlider();
								edge.modules.common.edgeFluidVideo();
                                edge.modules.common.edgeInitSelfHostedVideoPlayer();
                                edge.modules.common.edgeSelfHostedVideoSize();
								
								if (typeof edge.modules.common.edgeStickySidebarWidget === 'function') {
									edge.modules.common.edgeStickySidebarWidget().reInit();
								}

                                // Trigger event.
                                $( document.body ).trigger( 'blog_list_load_more_trigger' );

							}, 400);
						});
						
						if(thisHolder.hasClass('edge-blog-pagination-infinite-scroll-started')) {
							thisHolder.removeClass('edge-blog-pagination-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisHolder.find('.edge-blog-pag-load-more').hide();
			}
		};
		
		var edgeInitAppendIsotopeNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('edge-showing');
			
			setTimeout(function() {
				thisHolderInner.isotope('layout');
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
						
						if(thisHolder.hasClass('edge-blog-pagination-load-more')) {
							initLoadMorePagination(thisHolder);
						}
						
						if(thisHolder.hasClass('edge-blog-pagination-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			},
			scroll: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);
						
						if(thisHolder.hasClass('edge-blog-pagination-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			}
		};
	}

})(jQuery);
(function ($) {
	"use strict";
	
	var footer = {};
    edge.modules.footer = footer;
	
	footer.edgeOnWindowLoad = edgeOnWindowLoad;
	
	$(window).on('load', edgeOnWindowLoad);
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	 
	function edgeOnWindowLoad() {
		uncoveringFooter();
	}
	
	function uncoveringFooter() {
		var uncoverFooter = $('body:not(.error404) .edge-footer-uncover');

		if (uncoverFooter.length && !edge.htmlEl.hasClass('touch')) {

			var footer = $('footer'),
				footerHeight = footer.outerHeight(),
				content = $('.edge-content');
			
			var uncoveringCalcs = function () {
				content.css('margin-bottom', footerHeight);
				footer.css('height', footerHeight);
			};


			//set
			uncoveringCalcs();
			
			$(window).resize(function () {
				//recalc
				footerHeight = footer.find('.edge-footer-inner').outerHeight();
				uncoveringCalcs();
			});
		}
	}
	
})(jQuery);
(function($) {
	"use strict";
	
	var header = {};
	edge.modules.header = header;
	
	header.edgeSetDropDownMenuPosition     = edgeSetDropDownMenuPosition;
	header.edgeSetDropDownWideMenuPosition = edgeSetDropDownWideMenuPosition;
	
	header.edgeOnDocumentReady = edgeOnDocumentReady;
	header.edgeOnWindowLoad = edgeOnWindowLoad;
	
	$(document).ready(edgeOnDocumentReady);
	$(window).on('load', edgeOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgeOnDocumentReady() {
		edgeSetDropDownMenuPosition();
		setTimeout(function(){
			edgeDropDownMenu();
		}, 100);
	}
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgeOnWindowLoad() {
		edgeSetDropDownWideMenuPosition();
	}
	
	/**
	 * Set dropdown position
	 */
	function edgeSetDropDownMenuPosition() {
		var menuItems = $('.edge-drop-down > ul > li.narrow.menu-item-has-children');
		
		if (menuItems.length) {
			menuItems.each(function (i) {
				var thisItem = $(this),
					menuItemPosition = thisItem.offset().left,
					dropdownHolder = thisItem.find('.second'),
					dropdownMenuItem = dropdownHolder.find('.inner ul'),
					dropdownMenuWidth = dropdownMenuItem.outerWidth(),
					menuItemFromLeft = edge.windowWidth - menuItemPosition;
				
				if (edge.body.hasClass('edge-boxed')) {
					menuItemFromLeft = edge.boxedLayoutWidth - (menuItemPosition - (edge.windowWidth - edge.boxedLayoutWidth ) / 2);
				}
				
				var dropDownMenuFromLeft; //has to stay undefined because 'dropDownMenuFromLeft < dropdownMenuWidth' conditional will be true
				
				if (thisItem.find('li.sub').length > 0) {
					dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
				}
				
				dropdownHolder.removeClass('right');
				dropdownMenuItem.removeClass('right');
				if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
					dropdownHolder.addClass('right');
					dropdownMenuItem.addClass('right');
				}
			});
		}
	}
	
	/**
	 * Set dropdown wide position
	 */
	function edgeSetDropDownWideMenuPosition(){
		var menuItems = $(".edge-drop-down > ul > li.wide");
		
		if(menuItems.length) {
			menuItems.each( function(i) {
                var menuItem = $(this);
				var menuItemSubMenu = menuItem.find('.second');
				
				if(menuItemSubMenu.length && !menuItemSubMenu.hasClass('left_position') && !menuItemSubMenu.hasClass('right_position')) {
					menuItemSubMenu.css('left', 0);
					
					var left_position = menuItemSubMenu.offset().left;
					
					if(edge.body.hasClass('edge-boxed')) {
                        //boxed layout case
                        var boxedWidth = $('.edge-boxed .edge-wrapper .edge-wrapper-inner').outerWidth();
						left_position = left_position - (edge.windowWidth - boxedWidth) / 2;
						menuItemSubMenu.css({'left': -left_position, 'width': boxedWidth});

					} else if(edge.body.hasClass('edge-wide-dropdown-menu-in-grid')) {
                        //wide dropdown in grid case
                        menuItemSubMenu.css({'left': -left_position + (edge.windowWidth - edge.gridWidth()) / 2, 'width': edge.gridWidth()});

                    }
                    else {
                        //wide dropdown full width case
                        menuItemSubMenu.css({'left': -left_position, 'width': edge.windowWidth});

					}
				}
			});
		}
	}
	
	function edgeDropDownMenu() {
		var menu_items = $('.edge-drop-down > ul > li');
		
		menu_items.each(function() {
			var thisItem = $(this);
			
			if(thisItem.find('.second').length) {
				thisItem.waitForImages(function(){
					var dropDownHolder = thisItem.find('.second'),
						dropDownHolderHeight = !edge.menuDropdownHeightSet ? dropDownHolder.outerHeight() : 0;
					
					if(thisItem.hasClass('wide')) {
						var tallest = 0,
							dropDownSecondItem = dropDownHolder.find('> .inner > ul > li');
						
						dropDownSecondItem.each(function() {
							var thisHeight = $(this).outerHeight();
							
							if(thisHeight > tallest) {
								tallest = thisHeight;
							}
						});
						
						dropDownSecondItem.css('height', '').height(tallest);
						
						if (!edge.menuDropdownHeightSet) {
							dropDownHolderHeight = dropDownHolder.outerHeight();
						}
					}
					
					if (!edge.menuDropdownHeightSet) {
						dropDownHolder.height(0);
					}
					
					if(navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
						thisItem.on("touchstart mouseenter", function() {
							dropDownHolder.css({
								'height': dropDownHolderHeight,
								'overflow': 'visible',
								'visibility': 'visible',
								'opacity': '1'
							});
						}).on("mouseleave", function() {
							dropDownHolder.css({
								'height': '0px',
								'overflow': 'hidden',
								'visibility': 'hidden',
								'opacity': '0'
							});
						});
					} else {
						if (edge.body.hasClass('edge-dropdown-animate-height')) {
							var animateConfig = {
								interval: 0,
								over: function () {
									setTimeout(function () {
										dropDownHolder.addClass('edge-drop-down-start').css({
											'visibility': 'visible',
											'height': '0',
											'opacity': '1'
										});
										dropDownHolder.stop().animate({
											'height': dropDownHolderHeight
										}, 400, 'easeInOutQuint', function () {
											dropDownHolder.css('overflow', 'visible');
										});
									}, 100);
								},
								timeout: 100,
								out: function () {
									dropDownHolder.stop().animate({
										'height': '0',
										'opacity': 0
									}, 100, function () {
										dropDownHolder.css({
											'overflow': 'hidden',
											'visibility': 'hidden'
										});
									});
									
									dropDownHolder.removeClass('edge-drop-down-start');
								}
							};
							
							thisItem.hoverIntent(animateConfig);
						} else {
							var config = {
								interval: 0,
								over: function () {
									setTimeout(function () {
										dropDownHolder.addClass('edge-drop-down-start').stop().css({'height': dropDownHolderHeight});
									}, 150);
								},
								timeout: 150,
								out: function () {
									dropDownHolder.stop().css({'height': '0'}).removeClass('edge-drop-down-start');
								}
							};
							
							thisItem.hoverIntent(config);
						}
					}
				});
			}
		});
		
		$('.edge-drop-down ul li.wide ul li a').on('click', function(e) {
			if (e.which === 1){
				var $this = $(this);
				
				setTimeout(function() {
					$this.mouseleave();
				}, 500);
			}
		});
		
		edge.menuDropdownHeightSet = true;
	}
	
})(jQuery);
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

(function($) {
    "use strict";

    var title = {};
    edge.modules.title = title;

    title.edgeOnDocumentReady = edgeOnDocumentReady;

    $(document).ready(edgeOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
	    edgeParallaxTitle();
    }

    /*
     **	Title image with parallax effect
     */
	function edgeParallaxTitle() {
		var parallaxBackground = $('.edge-title-holder.edge-bg-parallax');
		
		if (parallaxBackground.length > 0 && edge.windowWidth > 1024) {
			var parallaxBackgroundWithZoomOut = parallaxBackground.hasClass('edge-bg-parallax-zoom-out'),
				titleHeight = parseInt(parallaxBackground.data('height')),
				imageWidth = parseInt(parallaxBackground.data('background-width')),
				parallaxRate = titleHeight / 10000 * 7,
				parallaxYPos = -(edge.scroll * parallaxRate),
				adminBarHeight = edgeGlobalVars.vars.edgeAddForAdminBar;
			
			parallaxBackground.css({'background-position': 'center ' + (parallaxYPos + adminBarHeight) + 'px'});
			
			if (parallaxBackgroundWithZoomOut) {
				parallaxBackgroundWithZoomOut.css({'background-size': imageWidth - edge.scroll + 'px auto'});
			}
			
			//set position of background on window scroll
			$(window).scroll(function () {
				parallaxYPos = -(edge.scroll * parallaxRate);
				parallaxBackground.css({'background-position': 'center ' + (parallaxYPos + adminBarHeight) + 'px'});
				
				if (parallaxBackgroundWithZoomOut) {
					parallaxBackgroundWithZoomOut.css({'background-size': imageWidth - edge.scroll + 'px auto'});
				}
			});
		}
	}

})(jQuery);

(function($) {
    'use strict';

    var woocommerce = {};
    edge.modules.woocommerce = woocommerce;

    woocommerce.edgeOnDocumentReady = edgeOnDocumentReady;
    woocommerce.edgeOnWindowLoad = edgeOnWindowLoad;
    woocommerce.edgeOnWindowResize = edgeOnWindowResize;

    $(document).ready(edgeOnDocumentReady);
    $(window).on('load', edgeOnWindowLoad);
    $(window).resize(edgeOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
        edgeInitQuantityButtons();
        edgeInitSelect2();
	    edgeInitSingleProductLightbox();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgeOnWindowLoad() {
        edgeInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgeOnWindowResize() {
        edgeInitProductListMasonryShortcode();
    }
	
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
	function edgeInitQuantityButtons() {
		$(document).on('click', '.edge-quantity-minus, .edge-quantity-plus', function (e) {
			e.stopPropagation();
			
			var button = $(this),
				inputField = button.siblings('.edge-quantity-input'),
				step = parseFloat(inputField.data('step')),
				max = parseFloat(inputField.data('max')),
				minus = false,
				inputValue = parseFloat(inputField.val()),
				newInputValue;
			
			if (button.hasClass('edge-quantity-minus')) {
				minus = true;
			}
			
			if (minus) {
				newInputValue = inputValue - step;
				if (newInputValue >= 1) {
					inputField.val(newInputValue);
				} else {
					inputField.val(0);
				}
			} else {
				newInputValue = inputValue + step;
				if (max === undefined) {
					inputField.val(newInputValue);
				} else {
					if (newInputValue >= max) {
						inputField.val(max);
					} else {
						inputField.val(newInputValue);
					}
				}
			}
			
			inputField.trigger('change');
		});
	}

    /*
    ** Init select2 script for select html dropdowns
    */
	function edgeInitSelect2() {
		var orderByDropDown = $('.woocommerce-ordering .orderby');
		if (orderByDropDown.length) {
			orderByDropDown.select2({
				minimumResultsForSearch: Infinity
			});
		}
		
		var variableProducts = $('.edge-woocommerce-page .edge-content .variations td.value select');
		if (variableProducts.length) {
			variableProducts.select2();
		}
		
		var shippingCountryCalc = $('#calc_shipping_country');
		if (shippingCountryCalc.length) {
			shippingCountryCalc.select2();
		}
		
		var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
		if (shippingStateCalc.length) {
			shippingStateCalc.select2();
		}
	}
	
	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function edgeInitSingleProductLightbox() {
		var item = $('.edge-woo-single-page.edge-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');
		
		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
			
			if (typeof edge.modules.common.edgePrettyPhoto === "function") {
				edge.modules.common.edgePrettyPhoto();
			}
		}
	}
	
	/*
	 ** Init Product List Masonry Shortcode Layout
	 */
	function edgeInitProductListMasonryShortcode() {
		var container = $('.edge-pl-holder.edge-masonry-layout .edge-pl-outer');
		
		if (container.length) {
			container.each(function () {
				var thisContainer = $(this),
					size = thisContainer.find('.edge-pl-sizer').width();
				
				thisContainer.waitForImages(function () {
					thisContainer.isotope({
						itemSelector: '.edge-pli',
						resizable: false,
						masonry: {
							columnWidth: '.edge-pl-sizer',
							gutter: '.edge-pl-gutter'
						}
					});
					
					if (thisContainer.find('.edge-woo-fixed-masonry').length) {
						edge.modules.common.setFixedImageProportionSize(thisContainer, thisContainer.find('.edge-pli'), size, true);
					}
					
					thisContainer.isotope('layout').css('opacity', 1);
				});
			});
		}
	}

})(jQuery);
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
(function($) {
    "use strict";

    var headerVertical = {};
    edge.modules.headerVertical = headerVertical;
	
	headerVertical.edgeOnDocumentReady = edgeOnDocumentReady;

    $(document).ready(edgeOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
        edgeVerticalMenu().init();
    }

    /**
     * Function object that represents vertical menu area.
     * @returns {{init: Function}}
     */
    var edgeVerticalMenu = function() {
	    var verticalMenuObject = $('.edge-vertical-menu-area');

	    /**
	     * Checks if vertical area is scrollable (if it has edge-with-scroll class)
	     *
	     * @returns {bool}
	     */
	    var verticalAreaScrollable = function () {
		    return verticalMenuObject.hasClass('edge-with-scroll');
	    };
	
	    /**
	     * Initialzes navigation functionality. It checks navigation type data attribute and calls proper functions
	     */
	    var initNavigation = function () {
		    var verticalNavObject = verticalMenuObject.find('.edge-vertical-menu');

		    if (verticalNavObject.hasClass('edge-vertical-dropdown-below')) {
				dropdownClickToggle();
			} else if (verticalNavObject.hasClass('edge-vertical-dropdown-side')) {
				dropdownFloat();
			}

		    /**
		     * Initializes click toggle navigation type. Works the same for touch and no-touch devices
		     */
		    function dropdownClickToggle() {
			    var menuItems = verticalNavObject.find('ul li.menu-item-has-children');
			
			    menuItems.each(function () {
				    var elementToExpand = $(this).find(' > .second, > ul');
				    var menuItem = this;
				    var dropdownOpener = $(this).find('> a');
				    var slideUpSpeed = 'fast';
				    var slideDownSpeed = 'slow';
				
				    dropdownOpener.on('click tap', function (e) {
					    e.preventDefault();
					    e.stopPropagation();
					
					    if (elementToExpand.is(':visible')) {
						    $(menuItem).removeClass('open');
						    elementToExpand.slideUp(slideUpSpeed);
					    } else if (dropdownOpener.parent().parent().children().hasClass('open') && dropdownOpener.parent().parent().parent().hasClass('edge-vertical-menu')) {
						    $(this).parent().parent().children().removeClass('open');
						    $(this).parent().parent().children().find(' > .second').slideUp(slideUpSpeed);
						
						    $(menuItem).addClass('open');
						    elementToExpand.slideDown(slideDownSpeed);
					    } else {
						
						    if (!$(this).parents('li').hasClass('open')) {
							    menuItems.removeClass('open');
							    menuItems.find(' > .second, > ul').slideUp(slideUpSpeed);
						    }
						
						    if ($(this).parent().parent().children().hasClass('open')) {
							    $(this).parent().parent().children().removeClass('open');
							    $(this).parent().parent().children().find(' > .second, > ul').slideUp(slideUpSpeed);
						    }
						
						    $(menuItem).addClass('open');
						    elementToExpand.slideDown(slideDownSpeed);
					    }
				    });
			    });
		    }


			/**
			 * Initializes click float navigation type
			 */
			function dropdownFloat() {
				var menuItems = verticalNavObject.find('ul li.menu-item-has-children');
				var allDropdowns = menuItems.find(' > .second > .inner > ul, > ul');

				menuItems.each(function() {
					var elementToExpand = $(this).find(' > .second > .inner > ul, > ul');
					var menuItem = this;

					if(Modernizr.touch) {
						var dropdownOpener = $(this).find('> a');

						dropdownOpener.on('click tap', function(e) {
							e.preventDefault();
							e.stopPropagation();

							if(elementToExpand.hasClass('edge-float-open')) {
								elementToExpand.removeClass('edge-float-open');
								$(menuItem).removeClass('open');
							} else {
								if(!$(this).parents('li').hasClass('open')) {
									menuItems.removeClass('open');
									allDropdowns.removeClass('edge-float-open');
								}

								elementToExpand.addClass('edge-float-open');
								$(menuItem).addClass('open');
							}
						});
					} else {
						//must use hoverIntent because basic hover effect doesn't catch dropdown
						//it doesn't start from menu item's edge
						$(this).hoverIntent({
							over: function() {
								elementToExpand.addClass('edge-float-open');
								$(menuItem).addClass('open');
							},
							out: function() {
								elementToExpand.removeClass('edge-float-open');
								$(menuItem).removeClass('open');
							},
							timeout: 300
						});
					}
				});
			}
	    };

        /**
         * Initializes scrolling in vertical area. It checks if vertical area is scrollable before doing so
         */
        var initVerticalAreaScroll = function() {
            if(verticalAreaScrollable()) {
                edge.modules.common.edgeInitPerfectScrollbar().init(verticalMenuObject);
            }
        };

        return {
            /**
             * Calls all necessary functionality for vertical menu area if vertical area object is valid
             */
            init: function() {
                if(verticalMenuObject.length) {
                    initNavigation();
                    initVerticalAreaScroll();
                }
            }
        };
    };

})(jQuery);
(function($) {
    "use strict";

    var headerVerticalClosed = {};
    edge.modules.headerVerticalClosed = headerVerticalClosed;
	
	headerVerticalClosed.edgeOnDocumentReady = edgeOnDocumentReady;

    $(document).ready(edgeOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgeOnDocumentReady() {
        edgeVerticalClosedMenu().init();
    }

    /**
     * Function object that represents vertical menu area.
     * @returns {{init: Function}}
     */
    var edgeVerticalClosedMenu = function() {
	    var verticalMenuObject = $('.edge-header-vertical-closed .edge-vertical-menu-area');

        var initHiddenVerticalArea = function() {
            var verticalLogo = $('.edge-vertical-area-bottom-logo');
            var verticalMenuOpener = verticalMenuObject.find('.edge-vertical-area-opener');
            var scrollPosition = 0;

            verticalMenuOpener.on('click tap', function() {
                if(isVerticalAreaOpen()) {
                    closeVerticalArea();
                } else {
                    openVerticalArea();
                }
            });

            $(window).scroll(function() {
                if(Math.abs($(window).scrollTop() - scrollPosition) > 400){
                    closeVerticalArea();
                }
            });

            /**
             * Closes vertical menu area by removing 'active' class on that element
             */
            function closeVerticalArea() {
                verticalMenuObject.removeClass('active');

                if(verticalLogo.length) {
                    verticalLogo.removeClass('active');
                }
            }

            /**
             * Opens vertical menu area by adding 'active' class on that element
             */
            function openVerticalArea() {
                verticalMenuObject.addClass('active');

                if(verticalLogo.length) {
                    verticalLogo.addClass('active');
                }
                scrollPosition = $(window).scrollTop();
            }

            function isVerticalAreaOpen() {
                return verticalMenuObject.hasClass('active');
            }
        };

        return {
            /**
             * Calls all necessary functionality for vertical menu area if vertical area object is valid
             */
            init: function() {
                if(verticalMenuObject.length) {
                    initHiddenVerticalArea();
                }
            }
        };
    };

})(jQuery);
(function ($) {
	"use strict";
	
	var mobileHeader = {};
	edge.modules.mobileHeader = mobileHeader;
	
	mobileHeader.edgeOnDocumentReady = edgeOnDocumentReady;
	mobileHeader.edgeOnWindowResize = edgeOnWindowResize;
	
	$(document).ready(edgeOnDocumentReady);
	$(window).resize(edgeOnWindowResize);
	
	/*
		All functions to be called on $(document).ready() should be in this function
	*/
	function edgeOnDocumentReady() {
		edgeInitMobileNavigation();
		edgeInitMobileNavigationScroll();
		edgeMobileHeaderBehavior();
	}
	
	/*
        All functions to be called on $(window).resize() should be in this function
    */
	function edgeOnWindowResize() {
		edgeInitMobileNavigationScroll();
	}
	
	function edgeInitMobileNavigation() {
		var navigationOpener = $('.edge-mobile-header .edge-mobile-menu-opener'),
			navigationHolder = $('.edge-mobile-header .edge-mobile-nav'),
			dropdownOpener = $('.edge-mobile-nav .mobile_arrow, .edge-mobile-nav h6, .edge-mobile-nav a.edge-mobile-no-link');
		
		//whole mobile menu opening / closing
		if (navigationOpener.length && navigationHolder.length) {
			navigationOpener.on('tap click', function (e) {
				e.stopPropagation();
				e.preventDefault();
				
				if (navigationHolder.is(':visible')) {
					navigationHolder.slideUp(450, 'easeInOutQuint');
					navigationOpener.removeClass('edge-mobile-menu-opened');
				} else {
					navigationHolder.slideDown(450, 'easeInOutQuint');
					navigationOpener.addClass('edge-mobile-menu-opened');
				}
			});
		}
		
		//dropdown opening / closing
		if (dropdownOpener.length) {
			dropdownOpener.each(function () {
				var thisItem = $(this);

				thisItem.on('tap click', function (e) {
					var thisItemParent = thisItem.parent('li'),
						thisItemParentSiblingsWithDrop = thisItemParent.siblings('.menu-item-has-children');

					if (thisItemParent.hasClass('has_sub')) {
						var submenu = thisItemParent.find('> ul.sub_menu');

						if (submenu.is(':visible')) {
							submenu.slideUp(450, 'easeInOutQuint');
							thisItemParent.removeClass('edgtf-opened');
						} else {
							thisItemParent.addClass('edgtf-opened');

							if (thisItemParentSiblingsWithDrop.length === 0) {
								thisItemParent.find('.sub_menu').slideUp(400, 'easeInOutQuint', function () {
									submenu.slideDown(400, 'easeInOutQuint');
								});
							} else {
								thisItemParent.siblings().removeClass('edgtf-opened').find('.sub_menu').slideUp(400, 'easeInOutQuint', function () {
									submenu.slideDown(400, 'easeInOutQuint');
								});
							}
						}
					}
				});
			});
		}
		
		$('.edge-mobile-nav a, .edge-mobile-logo-wrapper a').on('click tap', function (e) {
			if ($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
				navigationHolder.slideUp(450, 'easeInOutQuint');
				navigationOpener.removeClass("edge-mobile-menu-opened");
			}
		});
	}
	
	function edgeInitMobileNavigationScroll() {
		if (edge.windowWidth <= 1024) {
			var mobileHeader = $('.edge-mobile-header'),
				mobileHeaderHeight = mobileHeader.length ? mobileHeader.height() : 0,
				navigationHolder = mobileHeader.find('.edge-mobile-nav'),
				navigationHeight = navigationHolder.outerHeight(),
				windowHeight = edge.windowHeight - 100;
			
			//init scrollable menu
			var scrollHeight = mobileHeaderHeight + navigationHeight > windowHeight ? windowHeight - mobileHeaderHeight : navigationHeight;
			
			navigationHolder.height(scrollHeight).perfectScrollbar({
				wheelSpeed: 0.6,
				suppressScrollX: true
			});
		}
	}
	
	function edgeMobileHeaderBehavior() {
		var mobileHeader = $('.edge-mobile-header'),
			mobileMenuOpener = mobileHeader.find('.edge-mobile-menu-opener'),
			mobileHeaderHeight = mobileHeader.length ? mobileHeader.outerHeight() : 0;
		
		if (edge.body.hasClass('edge-content-is-behind-header') && mobileHeaderHeight > 0 && edge.windowWidth <= 1024) {
			$('.edge-content').css('marginTop', -mobileHeaderHeight);
		}
		
		if (edge.body.hasClass('edge-sticky-up-mobile-header')) {
			var stickyAppearAmount,
				adminBar = $('#wpadminbar');
			
			var docYScroll1 = $(document).scrollTop();
			stickyAppearAmount = mobileHeaderHeight + edgeGlobalVars.vars.edgeAddForAdminBar;
			
			$(window).scroll(function () {
				var docYScroll2 = $(document).scrollTop();
				
				if (docYScroll2 > stickyAppearAmount) {
					mobileHeader.addClass('edge-animate-mobile-header');
				} else {
					mobileHeader.removeClass('edge-animate-mobile-header');
				}
				
				if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount && !mobileMenuOpener.hasClass('edge-mobile-menu-opened')) || (docYScroll2 < stickyAppearAmount)) {
					mobileHeader.removeClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', 0);
					
					if (adminBar.length) {
						mobileHeader.find('.edge-mobile-header-inner').css('top', 0);
					}
				} else {
					mobileHeader.addClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', stickyAppearAmount);
				}
				
				docYScroll1 = $(document).scrollTop();
			});
		}
	}
	
})(jQuery);
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
