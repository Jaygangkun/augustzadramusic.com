<?php

if ( ! function_exists( 'noizzy_edge_add_product_list_shortcode' ) ) {
	function noizzy_edge_add_product_list_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'NoizzyCore\CPT\Shortcodes\ProductList\ProductList',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( noizzy_edge_core_plugin_installed() ) {
		add_filter( 'noizzy_core_filter_add_vc_shortcode', 'noizzy_edge_add_product_list_shortcode' );
	}
}

if ( ! function_exists( 'noizzy_edge_add_product_list_into_shortcodes_list' ) ) {
	function noizzy_edge_add_product_list_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'edge_product_list';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'noizzy_edge_woocommerce_shortcodes_list', 'noizzy_edge_add_product_list_into_shortcodes_list' );
}