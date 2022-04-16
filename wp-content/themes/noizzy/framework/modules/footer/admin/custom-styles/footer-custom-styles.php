<?php

if ( ! function_exists( 'noizzy_edge_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function noizzy_edge_footer_top_general_styles() {
		$item_styles      = array();
		$background_image = noizzy_edge_options()->getOptionValue( 'footer_top_background_image' );
		$background_color = noizzy_edge_options()->getOptionValue( 'footer_top_background_color' );
		$background_repeat = noizzy_edge_options()->getOptionValue( 'footer_top_background_image_repeat' );

		if ( ! empty( $background_image ) ) {
			$item_styles['background-image'] = 'url(' . $background_image . ')';
			$item_styles['background-position'] = 'center center';
			$item_styles['background-attachment'] = 'fixed';
		}
		
		if ( $background_repeat === 'yes' ) { 
			$item_styles['background-size'] = 'auto';
			$item_styles['background-repeat'] = 'repeat';
		} else {
			$item_styles['background-size'] = 'cover';
			$item_styles['background-repeat'] = 'no-repeat';
		}

		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo noizzy_edge_dynamic_css( '.edge-page-footer .edge-footer-top-holder', $item_styles );
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_footer_top_general_styles' );
}

if ( ! function_exists( 'noizzy_edge_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function noizzy_edge_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = noizzy_edge_options()->getOptionValue( 'footer_bottom_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo noizzy_edge_dynamic_css( '.edge-page-footer .edge-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_footer_bottom_general_styles' );
}