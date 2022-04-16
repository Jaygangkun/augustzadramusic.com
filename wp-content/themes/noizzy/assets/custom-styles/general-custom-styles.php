<?php

if(!function_exists('noizzy_edge_design_styles')) {
    /**
     * Generates general custom styles
     */
    function noizzy_edge_design_styles() {
	    $font_family = noizzy_edge_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && noizzy_edge_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo noizzy_edge_dynamic_css( $font_family_selector, array( 'font-family' => noizzy_edge_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = noizzy_edge_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
				'h1 a:hover',
				'h2 a:hover',
				'h3 a:hover',
				'h4 a:hover',
				'h5 a:hover',
				'h6 a:hover',
				'.edge-comment-holder .edge-comment-text #cancel-comment-reply-link',
				'footer .widget ul li a:hover',
				'footer .widget.widget_archive ul li a:hover',
				'footer .widget.widget_categories ul li a:hover',
				'footer .widget.widget_meta ul li a:hover',
				'footer .widget.widget_nav_menu ul li a:hover',
				'footer .widget.widget_pages ul li a:hover',
				'footer .widget.widget_recent_entries ul li a:hover',
				'footer .widget #wp-calendar tfoot a:hover',
				'footer .widget.widget_search .input-holder button:hover',
				'footer .widget.widget_tag_cloud a:hover',
				'.edge-fullscreen-sidebar .widget ul li a:hover',
				'.edge-fullscreen-sidebar .widget.widget_archive ul li a:hover',
				'.edge-fullscreen-sidebar .widget.widget_categories ul li a:hover',
				'.edge-fullscreen-sidebar .widget.widget_meta ul li a:hover',
				'.edge-fullscreen-sidebar .widget.widget_nav_menu ul li a:hover',
				'.edge-fullscreen-sidebar .widget.widget_pages ul li a:hover',
				'.edge-fullscreen-sidebar .widget.widget_recent_entries ul li a:hover',
				'.edge-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
				'.edge-fullscreen-sidebar .widget.widget_search .input-holder button:hover',
				'.edge-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
				'.edge-side-menu .widget ul li a:hover',
				'.edge-side-menu .widget.widget_archive ul li a:hover',
				'.edge-side-menu .widget.widget_categories ul li a:hover',
				'.edge-side-menu .widget.widget_meta ul li a:hover',
				'.edge-side-menu .widget.widget_nav_menu ul li a:hover',
				'.edge-side-menu .widget.widget_pages ul li a:hover',
				'.edge-side-menu .widget.widget_recent_entries ul li a:hover',
				'.edge-side-menu .widget #wp-calendar tfoot a:hover',
				'.edge-side-menu .widget.widget_search .input-holder button:hover',
				'.edge-side-menu .widget.widget_tag_cloud a:hover',
				'.edge-side-menu .textwidget a:hover',
				'.edge-song-widget-holder.edge-track-playing',
				'.edge-song-widget-holder:hover',
				'.widget.widget_edge_twitter_widget .edge-twitter-widget.edge-twitter-slider li .edge-tweet-text a',
				'.widget.widget_edge_twitter_widget .edge-twitter-widget.edge-twitter-slider li .edge-tweet-text span',
				'.widget.widget_edge_twitter_widget .edge-twitter-widget.edge-twitter-standard li .edge-tweet-text a:hover',
				'.widget.widget_edge_twitter_widget .edge-twitter-widget.edge-twitter-slider li .edge-twitter-icon i',
				'body .pp_pic_holder a.pp_next:hover',
				'body .pp_pic_holder a.pp_previous:hover',
				'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
				'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
				'.edge-blog-holder article.sticky .edge-post-title a',
				'.edge-blog-holder article.format-link .edge-link-title a:hover',
				'.edge-blog-holder article.format-link .edge-post-link-holder .edge-link-title a:hover',
				'.edge-blog-holder article.format-quote .edge-quote-title a:hover',
				'.edge-bl-standard-pagination ul li.edge-bl-pag-active a',
				'.edge-blog-pagination ul li a.edge-pag-active',
				'.edge-blog-pagination ul li a:hover',
				'.edge-author-description .edge-author-description-text-holder .edge-author-social-icons a:hover',
				'.edge-blog-single-navigation .edge-blog-single-next:hover',
				'.edge-blog-single-navigation .edge-blog-single-prev:hover',
				'.edge-blog-list-holder .edge-bli-info>div a:hover',
				'.edge-main-menu>ul>li.edge-active-item>a',
				'.edge-main-menu>ul>li>a:hover',
				'.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-main-menu>ul>li.edge-active-item>a',
				'.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-main-menu>ul>li>a:hover',
				'.edge-light-sticky-header .edge-page-header>div.edge-sticky-header .edge-main-menu>ul>li.edge-active-item>a',
				'.edge-light-sticky-header .edge-page-header>div.edge-sticky-header .edge-main-menu>ul>li>a:hover',
				'.edge-drop-down .second .inner ul li a:hover',
				'.edge-drop-down .second .inner ul li.current-menu-ancestor>a',
				'.edge-drop-down .second .inner ul li.current-menu-item>a',
				'.edge-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
				'.edge-drop-down .wide .second .inner>ul>li.current-menu-item>a',
				'.edge-dark-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-fullscreen-menu-opener.edge-fm-opened',
				'.edge-dark-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-fullscreen-menu-opener:hover',
				'.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-fullscreen-menu-opener.edge-fm-opened',
				'.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-fullscreen-menu-opener:hover',
				'.edge-fullscreen-menu-opener:hover',
				'nav.edge-fullscreen-menu ul li a.current',
				'nav.edge-fullscreen-menu ul li a:hover',
				'nav.edge-fullscreen-menu ul li ul li.current-menu-ancestor>a',
				'nav.edge-fullscreen-menu ul li ul li.current-menu-item>a',
				'nav.edge-fullscreen-menu>ul>li.edge-active-item>a',
				'.edge-mobile-header .edge-mobile-menu-opener a:hover',
				'.edge-mobile-header .edge-mobile-menu-opener.edge-mobile-menu-opened a',
				'.edge-mobile-header .edge-mobile-nav .edge-grid>ul>li.edge-active-item>a',
				'.edge-mobile-header .edge-mobile-nav .edge-grid>ul>li.edge-active-item>h6',
				'.edge-mobile-header .edge-mobile-nav ul li a:hover',
				'.edge-mobile-header .edge-mobile-nav ul li h6:hover',
				'.edge-mobile-header .edge-mobile-nav ul ul li.current-menu-ancestor>a',
				'.edge-mobile-header .edge-mobile-nav ul ul li.current-menu-ancestor>h6',
				'.edge-mobile-header .edge-mobile-nav ul ul li.current-menu-item>a',
				'.edge-mobile-header .edge-mobile-nav ul ul li.current-menu-item>h6',
				'.edge-search-opener:hover',
				'.edge-search-page-holder article.sticky .edge-post-title a',
				'.edge-search-cover .edge-search-close:hover',
				'.edge-side-menu-button-opener.opened',
				'.edge-side-menu-button-opener:hover',
				'.edge-title-holder.edge-breadcrumbs-type .edge-breadcrumbs a.edge-current',
				'.edge-title-holder.edge-breadcrumbs-type .edge-breadcrumbs a:hover',
				'.edge-title-holder.edge-breadcrumbs-type .edge-breadcrumbs span.edge-current',
				'.edge-title-holder.edge-centered-with-breadcrumbs-type .edge-breadcrumbs a.edge-current',
				'.edge-title-holder.edge-centered-with-breadcrumbs-type .edge-breadcrumbs a:hover',
				'.edge-title-holder.edge-centered-with-breadcrumbs-type .edge-breadcrumbs span.edge-current',
				'.edge-title-holder.edge-standard-with-breadcrumbs-type .edge-breadcrumbs a.edge-current',
				'.edge-title-holder.edge-standard-with-breadcrumbs-type .edge-breadcrumbs a:hover',
				'.edge-title-holder.edge-standard-with-breadcrumbs-type .edge-breadcrumbs span.edge-current',
				'.edge-banner-holder .edge-banner-link-text .edge-banner-link-hover span',
				'.edge-social-share-holder.edge-dropdown .edge-social-share-dropdown-opener:hover',
				'.edge-tabs.edge-tabs-light.edge-tabs-simple .edge-tabs-nav li.ui-state-active a',
				'.edge-tabs.edge-tabs-light.edge-tabs-simple .edge-tabs-nav li.ui-state-hover a',
				'.edge-tabs.edge-tabs-light.edge-tabs-vertical .edge-tabs-nav li.ui-state-active a',
				'.edge-tabs.edge-tabs-light.edge-tabs-vertical .edge-tabs-nav li.ui-state-hover a',
				'.single-album .edge-album-nav .edge-album-back-btn a:hover',
				'.single-album .edge-album-nav .edge-album-next a:hover',
				'.single-album .edge-album-nav .edge-album-prev a:hover',
				'.single-album .edge-album-light .edge-album-tracks-holder .edge-tracks-holder .edge-track-holder .edge-track-buy a:hover',
				'.single-album .edge-album-light .edge-album-tracks-holder .edge-tracks-holder .edge-track-holder .fa-play',
				'.single-album .edge-album-light .edge-album-tracks-holder .edge-tracks-holder .edge-track-holder.edge-active-track span',
				'.single-album .edge-album-light .edge-single-album-stores-holder .edge-single-album-store-link:hover',
				'.single-album .edge-album-light .edge-social-share-holder.edge-list li a:hover',
				'.edge-audio-player-holder .edge-audio-player-time-holder .time-box',
				'.edge-audio-player-holder .edge-audio-player-controls-holder li a:hover',
				'.edge-audio-player-holder .edge-audio-player-artist',
				'.edge-album-track-list.edge-album-light .edge-track-playing .edge-at-play-button',
				'.edge-album-track-list.edge-album-light .edge-track-playing .edge-at-time',
				'.edge-album-track-list.edge-album-light .edge-track-playing .edge-at-title',
				'.edge-album-track-list.edge-album-light a:hover',
				'.edge-event-nav a:hover',
				'.edge-events-list-holder-outer.edge-events-light-skin .edge-event-content:hover .edge-event-date-holder',
				'.edge-events-list-holder-outer.edge-events-light-skin .edge-event-content:hover .edge-event-title a',
				'.edge-events-list-holder-outer.edge-events-light-skin .edge-events-list-paging .edge-btn.edge-btn-outline',
				'.edge-events-slider-holder-outer .edge-event-title:hover a',
				'.bit-widget-container .bit-widget .bit-event-list-title.bit-show-past.bit-clickable',
				'.bit-widget-container .bit-widget .bit-event-list-title.bit-show-upcoming.bit-clickable',
				'.bit-widget-container .bit-widget.bit-layout-row .bit-past-events-show-all-button:hover',
				'.bit-widget-container .bit-widget.bit-layout-row .bit-upcoming-events-show-all-button:hover',
				'.edge-bandsintown-light .bit-widget-container .bit-widget .bit-event-list-title',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-details:hover .bit-date',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-details:hover .bit-location',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-details:hover .bit-venue',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-rsvp:hover',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-past-events-show-all-button',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-upcoming-events-show-all-button',
            );

            $woo_color_selector = array();
            if(noizzy_edge_is_woocommerce_installed()) {
                $woo_color_selector = array(
					'.woocommerce-page .edge-content .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
					'.woocommerce-page .edge-content a.added_to_cart:hover',
					'.woocommerce-page .edge-content a.button:hover',
					'.woocommerce-page .edge-content button[type=submit]:not(.edge-woo-search-widget-button):hover',
					'.woocommerce-page .edge-content input[type=submit]:hover',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
					'div.woocommerce a.added_to_cart:hover',
					'div.woocommerce a.button:hover',
					'div.woocommerce button[type=submit]:not(.edge-woo-search-widget-button):hover',
					'div.woocommerce input[type=submit]:hover',
					'.woocommerce-pagination .page-numbers li a.current',
					'.woocommerce-pagination .page-numbers li a:hover',
					'.woocommerce-pagination .page-numbers li span.current',
					'.woocommerce-pagination .page-numbers li span:hover',
					'.woocommerce-pagination .page-numbers li a.next:hover:before',
					'.woocommerce-pagination .page-numbers li a.prev:hover:before',
					'.related.products .product .button',
					'.edge-shopping-cart-holder .edge-header-cart.edge-header-cart-icon-pack:hover',
					'.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-shopping-cart-holder .edge-header-cart:hover',
					'.edge-shopping-cart-dropdown .edge-cart-bottom .edge-checkout:hover',
					'.edge-shopping-cart-dropdown .edge-cart-bottom .edge-view-cart:hover',
					'.widget.woocommerce.widget_layered_nav ul li.chosen a',
					'.edge-pl-holder .edge-pli-inner .edge-pli-text-inner .edge-pli-add-to-cart.edge-default-skin .added_to_cart:hover',
					'.edge-pl-holder .edge-pli-inner .edge-pli-text-inner .edge-pli-add-to-cart.edge-default-skin .button:hover'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
		        '.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-song-widget-holder:hover',
				'.edge-light-sticky-header .edge-page-header div.edge-sticky-header .edge-song-widget-holder:hover',
				'.edge-drop-down .second .inner ul li a:hover .item_outer:after',
				'.edge-drop-down .second .inner ul li.current-menu-ancestor>a .item_outer:after',
				'.edge-drop-down .second .inner ul li.current-menu-item>a .item_outer:after',
				'.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-side-menu-button-opener.opened',
				'.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-side-menu-button-opener:hover',
				'.edge-light-header .edge-top-bar .edge-side-menu-button-opener.opened',
				'.edge-light-header .edge-top-bar .edge-side-menu-button-opener:hover'
	        );

			$woo_color_important_selector = array();
			if(noizzy_edge_is_woocommerce_installed()) {
				$woo_color_important_selector = array(
					'.edge-woocommerce-page .return-to-shop .button:hover',
					'.edge-woo-single-page .edge-single-product-summary .single_add_to_cart_button:hover'
				);
			}

			$color_important_selector = array_merge($color_important_selector, $woo_color_important_selector);

            $background_color_selector = array(
				'.edge-st-loader .pulse',
				'.edge-st-loader .double_pulse .double-bounce1',
				'.edge-st-loader .double_pulse .double-bounce2',
				'.edge-st-loader .cube',
				'.edge-st-loader .rotating_cubes .cube1',
				'.edge-st-loader .rotating_cubes .cube2',
				'.edge-st-loader .stripes>div',
				'.edge-st-loader .wave>div',
				'.edge-st-loader .two_rotating_circles .dot1',
				'.edge-st-loader .two_rotating_circles .dot2',
				'.edge-st-loader .five_rotating_circles .container1>div',
				'.edge-st-loader .five_rotating_circles .container2>div',
				'.edge-st-loader .five_rotating_circles .container3>div',
				'.edge-st-loader .atom .ball-1:before',
				'.edge-st-loader .atom .ball-2:before',
				'.edge-st-loader .atom .ball-3:before',
				'.edge-st-loader .atom .ball-4:before',
				'.edge-st-loader .clock .ball:before',
				'.edge-st-loader .mitosis .ball',
				'.edge-st-loader .lines .line1',
				'.edge-st-loader .lines .line2',
				'.edge-st-loader .lines .line3',
				'.edge-st-loader .lines .line4',
				'.edge-st-loader .fussion .ball',
				'.edge-st-loader .fussion .ball-1',
				'.edge-st-loader .fussion .ball-2',
				'.edge-st-loader .fussion .ball-3',
				'.edge-st-loader .fussion .ball-4',
				'.edge-st-loader .wave_circles .ball',
				'.edge-st-loader .pulse_circles .ball',
				'.edge-owl-slider .owl-dots .owl-dot.active span',
				'.edge-owl-slider .owl-dots .owl-dot:hover span',
				'footer .widget.widget_nav_menu ul li a:after',
				'.edge-side-menu .textwidget a:after',
				'.edge-social-icons-group-widget.edge-square-icons .edge-social-icon-widget-holder:hover',
				'.edge-social-icons-group-widget.edge-square-icons.edge-light-skin .edge-social-icon-widget-holder:hover',
				'.edge-blog-holder article.format-audio .edge-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
				'.edge-blog-holder article.format-audio .edge-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
				'.edge-blog-list-holder.edge-bl-masonry article.format-audio .edge-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
				'.edge-blog-list-holder.edge-bl-masonry article.format-audio .edge-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
				'.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-main-menu>ul>li.edge-active-item>a>span.item_outer:after',
				'.edge-light-header .edge-page-header>div:not(.edge-sticky-header):not(.fixed) .edge-main-menu>ul>li>a>span.item_outer:after',
				'.edge-light-sticky-header .edge-page-header>div.edge-sticky-header .edge-main-menu>ul>li.edge-active-item>a>span.item_outer:after',
				'.edge-light-sticky-header .edge-page-header>div.edge-sticky-header .edge-main-menu>ul>li>a>span.item_outer:after',
				'.edge-drop-down .second .inner ul li a .item_text:after',
				'nav.edge-fullscreen-menu ul li a>span:after',
				'.edge-testimonials-holder.edge-testimonials-boxed.edge-testimonials-light .edge-owl-slider .owl-dots .owl-dot.active span',
				'.edge-testimonials-holder.edge-testimonials-boxed.edge-testimonials-light .edge-owl-slider .owl-dots .owl-dot:hover span',
				'.edge-accordion-holder.edge-ac-boxed .edge-accordion-title.ui-state-active',
				'.edge-accordion-holder.edge-ac-boxed .edge-accordion-title.ui-state-hover',
				'.edge-btn.edge-btn-solid',
				'.edge-icon-shortcode.edge-circle',
				'.edge-icon-shortcode.edge-dropcaps.edge-circle',
				'.edge-icon-shortcode.edge-square',
				'.edge-process-holder .edge-process-circle',
				'.edge-process-holder .edge-process-line',
				'.edge-progress-bar .edge-pb-content-holder .edge-pb-content',
				'.edge-tabs.edge-tabs-standard .edge-tabs-nav li.ui-state-active a',
				'.edge-tabs.edge-tabs-standard .edge-tabs-nav li.ui-state-hover a',
				'.edge-tabs.edge-tabs-boxed .edge-tabs-nav li.ui-state-active a',
				'.edge-tabs.edge-tabs-boxed .edge-tabs-nav li.ui-state-hover a',
				'.edge-tabs.edge-tabs-simple .edge-tabs-nav li.ui-state-active:after',
				'.edge-tabs.edge-tabs-simple .edge-tabs-nav li.ui-state-hover:after',
				'.edge-tabs.edge-tabs-vertical .edge-tabs-nav li.ui-state-active:after',
				'.edge-tabs.edge-tabs-vertical .edge-tabs-nav li.ui-state-hover:after',
				'.edge-tabs.edge-tabs-light.edge-tabs-simple .edge-tabs-nav li.ui-state-active:after',
				'.edge-tabs.edge-tabs-light.edge-tabs-simple .edge-tabs-nav li.ui-state-hover:after',
				'.edge-tabs.edge-tabs-light.edge-tabs-vertical .edge-tabs-nav li.ui-state-active:after',
				'.edge-tabs.edge-tabs-light.edge-tabs-vertical .edge-tabs-nav li.ui-state-hover:after',
				'.single-album .edge-album-light .edge-single-album-stores-holder .edge-single-album-store-link:after',
				'.edge-audio-player-holder .edge-audio-player-time-holder .jp-play-bar',
				'.edge-audio-player-holder .edge-audio-player-time-holder .jp-play-bar:after',
				'.edge-audio-player-holder .jp-volume-bar-value',
				'.edge-audio-player-holder .jp-volume-bar-value:after',
				'.bit-widget-container .bit-widget.bit-layout-row .bit-past-events-show-all-button',
				'.bit-widget-container .bit-widget.bit-layout-row .bit-upcoming-events-show-all-button',
            );

            $woo_background_color_selector = array();
            if(noizzy_edge_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
					'.woocommerce-page .edge-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'.woocommerce-page .edge-content a.added_to_cart',
					'.woocommerce-page .edge-content a.button',
					'.woocommerce-page .edge-content button[type=submit]:not(.edge-woo-search-widget-button)',
					'.woocommerce-page .edge-content input[type=submit]',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'div.woocommerce a.added_to_cart',
					'div.woocommerce a.button',
					'div.woocommerce button[type=submit]:not(.edge-woo-search-widget-button)',
					'div.woocommerce input[type=submit]',
					'.related.products .product .button:hover',
					'.edge-woo-single-page .woocommerce-tabs ul.tabs>li.active:after',
					'.edge-shopping-cart-holder .edge-header-cart .edge-cart-icon .edge-cart-number',
					'.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
					'.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
					'.edge-pl-holder .edge-pli-inner .edge-pli-text-inner .edge-pli-add-to-cart.edge-default-skin .added_to_cart',
					'.edge-pl-holder .edge-pli-inner .edge-pli-text-inner .edge-pli-add-to-cart.edge-default-skin .button',
					'.edge-pl-holder .edge-pli-inner .edge-pli-text-inner .edge-pli-add-to-cart.edge-light-skin .added_to_cart:hover',
					'.edge-pl-holder .edge-pli-inner .edge-pli-text-inner .edge-pli-add-to-cart.edge-light-skin .button:hover',
					'.edge-pl-holder .edge-pli-inner .edge-pli-text-inner .edge-pli-add-to-cart.edge-dark-skin .added_to_cart:hover',
					'.edge-pl-holder .edge-pli-inner .edge-pli-text-inner .edge-pli-add-to-cart.edge-dark-skin .button:hover'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

			$background_color_important_selector = array(
				'.edge-events-list-holder-outer.edge-events-light-skin .edge-events-list-paging .edge-btn.edge-btn-outline:hover',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-past-events-show-all-button:hover',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-upcoming-events-show-all-button:hover',
			);

			$woo_background_color_important_selector = array();
			if(noizzy_edge_is_woocommerce_installed()) {
				$woo_background_color_important_selector = array(
					'.edge-woocommerce-page .return-to-shop .button',
					'.edge-woo-single-page .edge-single-product-summary .single_add_to_cart_button'
				);
			}

			$background_color_important_selector = array_merge($background_color_important_selector, $woo_background_color_important_selector);

            $border_color_selector = array(
				'.edge-st-loader .pulse_circles .ball',
				'.edge-owl-slider+.edge-slider-thumbnail>.edge-slider-thumbnail-item.active img',
				'.bit-widget-container .bit-widget.bit-layout-row .bit-past-events-show-all-button',
				'.bit-widget-container .bit-widget.bit-layout-row .bit-upcoming-events-show-all-button',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-past-events-show-all-button',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-upcoming-events-show-all-button',
            );

			$woo_border_color_selector = array();
			if(noizzy_edge_is_woocommerce_installed()) {
				$woo_border_color_selector = array(
					'.woocommerce-page .edge-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'.woocommerce-page .edge-content a.added_to_cart',
					'.woocommerce-page .edge-content a.button',
					'.woocommerce-page .edge-content button[type=submit]:not(.edge-woo-search-widget-button)',
					'.woocommerce-page .edge-content input[type=submit]',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'div.woocommerce a.added_to_cart',
					'div.woocommerce a.button',
					'div.woocommerce button[type=submit]:not(.edge-woo-search-widget-button)',
					'div.woocommerce input[type=submit]',
					'.related.products .product .button',
					'.related.products .product .button:hover',
				);
			}

			$border_color_selector = array_merge($border_color_selector, $woo_border_color_selector);


			$border_color_important_selector = array(
				'.edge-events-list-holder-outer.edge-events-light-skin .edge-events-list-paging .edge-btn.edge-btn-outline',
				'.edge-events-list-holder-outer.edge-events-light-skin .edge-events-list-paging .edge-btn.edge-btn-outline:hover',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-past-events-show-all-button:hover',
				'.edge-bandsintown-light .bit-widget-container .bit-widget.bit-layout-row .bit-upcoming-events-show-all-button:hover'
			);

            echo noizzy_edge_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo noizzy_edge_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo noizzy_edge_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo noizzy_edge_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo noizzy_edge_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo noizzy_edge_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
        }
	
	    $page_background_color = noizzy_edge_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.edge-content'
		    );
		    echo noizzy_edge_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = noizzy_edge_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo noizzy_edge_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo noizzy_edge_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( noizzy_edge_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . noizzy_edge_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo noizzy_edge_dynamic_css( '.edge-preload-background', $preload_background_styles );
    }

    add_action('noizzy_edge_style_dynamic', 'noizzy_edge_design_styles');
}

if ( ! function_exists( 'noizzy_edge_content_styles' ) ) {
	function noizzy_edge_content_styles() {
		$content_style = array();
		
		$padding = noizzy_edge_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.edge-content .edge-content-inner > .edge-full-width > .edge-full-width-inner',
		);
		
		echo noizzy_edge_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_in_grid = noizzy_edge_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.edge-content .edge-content-inner > .edge-container > .edge-container-inner',
		);
		
		echo noizzy_edge_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_content_styles' );
}

if ( ! function_exists( 'noizzy_edge_h1_styles' ) ) {
	function noizzy_edge_h1_styles() {
		$margin_top    = noizzy_edge_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = noizzy_edge_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = noizzy_edge_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = noizzy_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = noizzy_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_h1_styles' );
}

if ( ! function_exists( 'noizzy_edge_h2_styles' ) ) {
	function noizzy_edge_h2_styles() {
		$margin_top    = noizzy_edge_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = noizzy_edge_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = noizzy_edge_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = noizzy_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = noizzy_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_h2_styles' );
}

if ( ! function_exists( 'noizzy_edge_h3_styles' ) ) {
	function noizzy_edge_h3_styles() {
		$margin_top    = noizzy_edge_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = noizzy_edge_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = noizzy_edge_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = noizzy_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = noizzy_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_h3_styles' );
}

if ( ! function_exists( 'noizzy_edge_h4_styles' ) ) {
	function noizzy_edge_h4_styles() {
		$margin_top    = noizzy_edge_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = noizzy_edge_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = noizzy_edge_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = noizzy_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = noizzy_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_h4_styles' );
}

if ( ! function_exists( 'noizzy_edge_h5_styles' ) ) {
	function noizzy_edge_h5_styles() {
		$margin_top    = noizzy_edge_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = noizzy_edge_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = noizzy_edge_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = noizzy_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = noizzy_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_h5_styles' );
}

if ( ! function_exists( 'noizzy_edge_h6_styles' ) ) {
	function noizzy_edge_h6_styles() {
		$margin_top    = noizzy_edge_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = noizzy_edge_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = noizzy_edge_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = noizzy_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = noizzy_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_h6_styles' );
}

if ( ! function_exists( 'noizzy_edge_text_styles' ) ) {
	function noizzy_edge_text_styles() {
		$item_styles = noizzy_edge_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_text_styles' );
}

if ( ! function_exists( 'noizzy_edge_link_styles' ) ) {
	function noizzy_edge_link_styles() {
		$link_styles      = array();
		$link_color       = noizzy_edge_options()->getOptionValue( 'link_color' );
		$link_font_style  = noizzy_edge_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = noizzy_edge_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = noizzy_edge_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo noizzy_edge_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_link_styles' );
}

if ( ! function_exists( 'noizzy_edge_link_hover_styles' ) ) {
	function noizzy_edge_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = noizzy_edge_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = noizzy_edge_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo noizzy_edge_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo noizzy_edge_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_link_hover_styles' );
}

if ( ! function_exists( 'noizzy_edge_smooth_page_transition_styles' ) ) {
	function noizzy_edge_smooth_page_transition_styles( $style ) {
		$id            = noizzy_edge_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = noizzy_edge_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.edge-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= noizzy_edge_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
        $spinner_style_border = array();
		$spinner_color = noizzy_edge_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
            $spinner_style_border['border-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.edge-st-loader .edge-rotate-circles > div',
			'.edge-st-loader .pulse',
			'.edge-st-loader .double_pulse .double-bounce1',
			'.edge-st-loader .double_pulse .double-bounce2',
			'.edge-st-loader .cube',
			'.edge-st-loader .rotating_cubes .cube1',
			'.edge-st-loader .rotating_cubes .cube2',
			'.edge-st-loader .stripes > div',
			'.edge-st-loader .wave > div',
			'.edge-st-loader .two_rotating_circles .dot1',
			'.edge-st-loader .two_rotating_circles .dot2',
			'.edge-st-loader .five_rotating_circles .container1 > div',
			'.edge-st-loader .five_rotating_circles .container2 > div',
			'.edge-st-loader .five_rotating_circles .container3 > div',
			'.edge-st-loader .atom .ball-1:before',
			'.edge-st-loader .atom .ball-2:before',
			'.edge-st-loader .atom .ball-3:before',
			'.edge-st-loader .atom .ball-4:before',
			'.edge-st-loader .clock .ball:before',
			'.edge-st-loader .mitosis .ball',
			'.edge-st-loader .lines .line1',
			'.edge-st-loader .lines .line2',
			'.edge-st-loader .lines .line3',
			'.edge-st-loader .lines .line4',
			'.edge-st-loader .fussion .ball',
			'.edge-st-loader .fussion .ball-1',
			'.edge-st-loader .fussion .ball-2',
			'.edge-st-loader .fussion .ball-3',
			'.edge-st-loader .fussion .ball-4',
			'.edge-st-loader .wave_circles .ball',
			'.edge-st-loader .pulse_circles .ball',
            '.edge-smooth-transition-loader .edge-noizzy-loader .edge-noizzy-inner-circle'
		);

        $spinner_border_selectors = array(
            '.edge-smooth-transition-loader .edge-noizzy-loader .edge-noizzy-outer-circle'
        );
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= noizzy_edge_dynamic_css( $spinner_selectors, $spinner_style );
            $current_style .= noizzy_edge_dynamic_css( $spinner_border_selectors, $spinner_style_border );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'noizzy_edge_add_page_custom_style', 'noizzy_edge_smooth_page_transition_styles' );
}