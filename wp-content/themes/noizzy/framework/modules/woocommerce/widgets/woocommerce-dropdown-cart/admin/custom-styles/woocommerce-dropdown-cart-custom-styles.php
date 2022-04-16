<?php

if ( ! function_exists( 'noizzy_edge_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function noizzy_edge_dropdown_cart_icon_styles() {
		$icon_color       = noizzy_edge_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = noizzy_edge_options()->getOptionValue( 'dropdown_cart_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo noizzy_edge_dynamic_css( '.edge-shopping-cart-holder .edge-header-cart a', array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo noizzy_edge_dynamic_css( '.edge-shopping-cart-holder .edge-header-cart a:hover', array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_dropdown_cart_icon_styles' );
}