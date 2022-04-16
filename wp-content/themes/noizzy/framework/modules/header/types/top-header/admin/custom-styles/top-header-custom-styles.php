<?php

if ( ! function_exists( 'noizzy_edge_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function noizzy_edge_header_top_bar_styles() {
		$top_header_height = noizzy_edge_options()->getOptionValue( 'top_bar_height' );
		
		if ( ! empty( $top_header_height ) ) {
			echo noizzy_edge_dynamic_css( '.edge-top-bar', array( 'height' => noizzy_edge_filter_px( $top_header_height ) . 'px' ) );
			echo noizzy_edge_dynamic_css( '.edge-top-bar .edge-logo-wrapper a', array( 'max-height' => noizzy_edge_filter_px( $top_header_height ) . 'px' ) );
		}
		
		echo noizzy_edge_dynamic_css( '.edge-header-box .edge-top-bar-background', array( 'height' => noizzy_edge_get_top_bar_background_height() . 'px' ) );
		
		$top_bar_container_selector = '.edge-top-bar > .edge-vertical-align-containers';
		$top_bar_container_styles   = array();
		$container_side_padding     = noizzy_edge_options()->getOptionValue( 'top_bar_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( noizzy_edge_string_ends_with( $container_side_padding, 'px' ) || noizzy_edge_string_ends_with( $container_side_padding, '%' ) ) {
				$top_bar_container_styles['padding-left'] = $container_side_padding;
				$top_bar_container_styles['padding-right'] = $container_side_padding;
			} else {
				$top_bar_container_styles['padding-left'] = noizzy_edge_filter_px( $container_side_padding ) . 'px';
				$top_bar_container_styles['padding-right'] = noizzy_edge_filter_px( $container_side_padding ) . 'px';
			}
			
			echo noizzy_edge_dynamic_css( $top_bar_container_selector, $top_bar_container_styles );
		}
		
		if ( noizzy_edge_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector                = '.edge-top-bar .edge-grid .edge-vertical-align-containers';
			$top_bar_grid_styles                  = array();
			$top_bar_grid_background_color        = noizzy_edge_options()->getOptionValue( 'top_bar_grid_background_color' );
			$top_bar_grid_background_transparency = noizzy_edge_options()->getOptionValue( 'top_bar_grid_background_transparency' );
			
			if ( !empty($top_bar_grid_background_color) ) {
				$grid_background_color        = $top_bar_grid_background_color;
				$grid_background_transparency = 1;
				
				if ( $top_bar_grid_background_transparency !== '' ) {
					$grid_background_transparency = $top_bar_grid_background_transparency;
				}
				
				$grid_background_color                   = noizzy_edge_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}
			
			echo noizzy_edge_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}
		
		$top_bar_styles   = array();
		$background_color = noizzy_edge_options()->getOptionValue( 'top_bar_background_color' );
		$border_color     = noizzy_edge_options()->getOptionValue( 'top_bar_border_color' );
		
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( noizzy_edge_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = noizzy_edge_options()->getOptionValue( 'top_bar_background_transparency' );
			}
			
			$background_color                   = noizzy_edge_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
			
			echo noizzy_edge_dynamic_css( '.edge-header-box .edge-top-bar-background', array( 'background-color' => $background_color ) );
		}
		
		if ( noizzy_edge_options()->getOptionValue( 'top_bar_border' ) == 'yes' && $border_color != '' ) {
			$top_bar_styles['border-bottom'] = '1px solid ' . $border_color;
		}
		
		echo noizzy_edge_dynamic_css( '.edge-top-bar', $top_bar_styles );
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_header_top_bar_styles' );
}