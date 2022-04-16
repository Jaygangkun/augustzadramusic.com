<?php

if ( ! function_exists( 'noizzy_edge_search_opener_icon_size' ) ) {
	function noizzy_edge_search_opener_icon_size() {
		$icon_size = noizzy_edge_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo noizzy_edge_dynamic_css( '.edge-search-opener', array(
				'font-size' => noizzy_edge_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_search_opener_icon_size' );
}

if ( ! function_exists( 'noizzy_edge_search_opener_icon_colors' ) ) {
	function noizzy_edge_search_opener_icon_colors() {
		$icon_color       = noizzy_edge_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = noizzy_edge_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo noizzy_edge_dynamic_css( '.edge-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo noizzy_edge_dynamic_css( '.edge-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_search_opener_icon_colors' );
}

if ( ! function_exists( 'noizzy_edge_search_opener_text_styles' ) ) {
	function noizzy_edge_search_opener_text_styles() {
		$item_styles = noizzy_edge_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.edge-search-icon-text'
		);
		
		echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = noizzy_edge_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo noizzy_edge_dynamic_css( '.edge-search-opener:hover .edge-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_search_opener_text_styles' );
}