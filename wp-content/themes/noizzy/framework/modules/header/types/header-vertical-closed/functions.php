<?php

if ( ! function_exists( 'noizzy_edge_register_header_vertical_closed_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function noizzy_edge_register_header_vertical_closed_type( $header_types ) {
		$header_type = array(
			'header-vertical-closed' => 'NoizzyEdge\Modules\Header\Types\HeaderVerticalClosed'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'noizzy_edge_init_register_header_vertical_closed_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function noizzy_edge_init_register_header_vertical_closed_type() {
		add_filter( 'noizzy_edge_register_header_type_class', 'noizzy_edge_register_header_vertical_closed_type' );
	}
	
	add_action( 'noizzy_edge_before_header_function_init', 'noizzy_edge_init_register_header_vertical_closed_type' );
}

if ( ! function_exists( 'noizzy_edge_include_header_vertical_closed_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function noizzy_edge_include_header_vertical_closed_menu( $menus ) {
		if ( ! array_key_exists( 'vertical-navigation', $menus ) ) {
			$menus['vertical-navigation'] = esc_html__( 'Vertical Navigation', 'noizzy' );
		}
		
		return $menus;
	}
	
	if ( noizzy_edge_check_is_header_type_enabled( 'header-vertical-closed' ) ) {
		add_filter( 'noizzy_edge_register_headers_menu', 'noizzy_edge_include_header_vertical_closed_menu' );
	}
}

if ( ! function_exists( 'noizzy_edge_get_header_vertical_closed_main_menu' ) ) {
	/**
	 * Loads vertical menu HTML
	 */
	function noizzy_edge_get_header_vertical_closed_main_menu() {
		noizzy_edge_get_module_template_part( 'templates/vertical-closed-navigation', 'header/types/header-vertical-closed' );
	}
}

if ( ! function_exists( 'noizzy_edge_vertical_closed_header_holder_class' ) ) {
	/**
	 * Return holder class for this header type html
	 */
	function noizzy_edge_vertical_closed_header_holder_class() {
		$center_content = noizzy_edge_get_meta_field_intersect( 'vertical_header_center_content', noizzy_edge_get_page_id() );
		$holder_class   = $center_content === 'yes' ? 'edge-vertical-alignment-center' : 'edge-vertical-alignment-top';
		
		return $holder_class;
	}
}

if ( ! function_exists( 'noizzy_edge_get_vertical_closed_header_icon_class' ) ) {
	/**
	 * Loads vertical closed icon class
	 */
	function noizzy_edge_get_vertical_closed_header_icon_class() {
		$classes = array(
			'edge-vertical-area-opener'
		);
		
		$classes[] = noizzy_edge_get_icon_sources_class( 'vertical_closed', 'edge-vertical-area-opener' );

		return $classes;
	}
}