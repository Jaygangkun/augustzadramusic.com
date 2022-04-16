<?php

if ( ! function_exists( 'noizzy_edge_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function noizzy_edge_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_woocommerce_dropdown_cart_widget' );
}


if ( ! function_exists( 'noizzy_edge_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function noizzy_edge_get_dropdown_cart_icon_class() {
		$dropdown_cart_icon_source = noizzy_edge_options()->getOptionValue( 'dropdown_cart_icon_source' );
		
		$dropdown_cart_icon_class_array = array(
			'edge-header-cart'
		);
		
		$dropdown_cart_icon_class_array[] = $dropdown_cart_icon_source == 'icon_pack' ? 'edge-header-cart-icon-pack' : 'edge-header-cart-svg-path';
		
		return $dropdown_cart_icon_class_array;
	}
}

if ( ! function_exists( 'noizzy_edge_get_dropdown_cart_icon_html' ) ) {
	/**
	 * Returns dropdown cart icon HTML
	 */
	function noizzy_edge_get_dropdown_cart_icon_html() {
		$dropdown_cart_icon_source   = noizzy_edge_options()->getOptionValue( 'dropdown_cart_icon_source' );
		$dropdown_cart_icon_pack     = noizzy_edge_options()->getOptionValue( 'dropdown_cart_icon_pack' );
		$dropdown_cart_icon_svg_path = noizzy_edge_options()->getOptionValue( 'dropdown_cart_icon_svg_path' );
		
		$dropdown_cart_icon_html = '';
		
		if ( ( $dropdown_cart_icon_source == 'icon_pack' ) && ( isset( $dropdown_cart_icon_pack ) ) ) {
			$dropdown_cart_icon_html .= noizzy_edge_icon_collections()->getDropdownCartIcon( $dropdown_cart_icon_pack );
		} else if ( isset( $dropdown_cart_icon_svg_path ) ) {
			$dropdown_cart_icon_html .= $dropdown_cart_icon_svg_path;
		}
		
		return $dropdown_cart_icon_html;
	}
}