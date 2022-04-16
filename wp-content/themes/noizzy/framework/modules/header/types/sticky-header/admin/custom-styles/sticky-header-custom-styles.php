<?php

if ( ! function_exists( 'noizzy_edge_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function noizzy_edge_sticky_header_styles() {
		$background_color        = noizzy_edge_options()->getOptionValue( 'sticky_header_background_color' );
		$background_transparency = noizzy_edge_options()->getOptionValue( 'sticky_header_transparency' );
		$border_color            = noizzy_edge_options()->getOptionValue( 'sticky_header_border_color' );
		$header_height           = noizzy_edge_options()->getOptionValue( 'sticky_header_height' );
		$background_image 		 = noizzy_edge_options()->getOptionValue( 'sticky_header_background_image' );

 		if ( $background_image !== '' ) {
            echo noizzy_edge_dynamic_css( '.edge-page-header .edge-sticky-header .edge-sticky-holder', array( 'background-image' => 'url(' . $background_image . ')' ) );
            echo noizzy_edge_dynamic_css( '.edge-page-header .edge-sticky-header .edge-sticky-holder', array( 'background-repeat' => 'repeat' ) );
        }
		
		if ( ! empty( $background_color ) ) {
			$header_background_color              = $background_color;
			$header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$header_background_color_transparency = $background_transparency;
			}
			
			echo noizzy_edge_dynamic_css( '.edge-page-header .edge-sticky-header .edge-sticky-holder', array( 'background-color' => noizzy_edge_rgba_color( $header_background_color, $header_background_color_transparency ) ) );
		}
		
		if ( ! empty( $border_color ) ) {
			echo noizzy_edge_dynamic_css( '.edge-page-header .edge-sticky-header .edge-sticky-holder', array( 'border-color' => $border_color ) );
		}
		
		if ( ! empty( $header_height ) ) {
			$height = noizzy_edge_filter_px( $header_height ) . 'px';
			
			echo noizzy_edge_dynamic_css( '.edge-page-header .edge-sticky-header', array( 'height' => $height ) );
			echo noizzy_edge_dynamic_css( '.edge-page-header .edge-sticky-header .edge-logo-wrapper a', array( 'max-height' => $height ) );
		}
		
		$sticky_container_selector = '.edge-sticky-header .edge-sticky-holder .edge-vertical-align-containers';
		$sticky_container_styles   = array();
		$container_side_padding    = noizzy_edge_options()->getOptionValue( 'sticky_header_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( noizzy_edge_string_ends_with( $container_side_padding, 'px' ) || noizzy_edge_string_ends_with( $container_side_padding, '%' ) ) {
				$sticky_container_styles['padding-left']  = $container_side_padding;
				$sticky_container_styles['padding-right'] = $container_side_padding;
			} else {
				$sticky_container_styles['padding-left']  = noizzy_edge_filter_px( $container_side_padding ) . 'px';
				$sticky_container_styles['padding-right'] = noizzy_edge_filter_px( $container_side_padding ) . 'px';
			}
			
			echo noizzy_edge_dynamic_css( $sticky_container_selector, $sticky_container_styles );
		}
		
		// sticky menu style
		
		$menu_item_styles = noizzy_edge_get_typography_styles( 'sticky' );
		
		$menu_item_selector = array(
			'.edge-main-menu.edge-sticky-nav > ul > li > a'
		);
		
		echo noizzy_edge_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = noizzy_edge_options()->getOptionValue( 'sticky_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.edge-main-menu.edge-sticky-nav > ul > li:hover > a',
			'.edge-main-menu.edge-sticky-nav > ul > li.edge-active-item > a'
		);
		
		echo noizzy_edge_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_sticky_header_styles' );
}