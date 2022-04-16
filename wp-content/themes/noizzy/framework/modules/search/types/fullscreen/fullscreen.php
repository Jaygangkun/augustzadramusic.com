<?php

if ( ! function_exists( 'noizzy_edge_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function noizzy_edge_search_body_class( $classes ) {
		$classes[] = 'edge-fullscreen-search';
		$classes[] = 'edge-search-fade';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'noizzy_edge_search_body_class' );
}

if ( ! function_exists( 'noizzy_edge_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function noizzy_edge_get_search() {
		noizzy_edge_load_search_template();
	}
	
	add_action( 'noizzy_edge_before_page_header', 'noizzy_edge_get_search' );
}

if ( ! function_exists( 'noizzy_edge_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function noizzy_edge_load_search_template() {
		$parameters = array(
			'search_close_icon_class' 	=> noizzy_edge_get_search_close_icon_class(),
			'search_submit_icon_class' 	=> noizzy_edge_get_search_submit_icon_class()
		);

        noizzy_edge_get_module_template_part( 'types/fullscreen/templates/fullscreen', 'search', '', $parameters );
	}
}