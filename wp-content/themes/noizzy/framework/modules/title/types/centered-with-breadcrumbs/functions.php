<?php

if ( ! function_exists( 'noizzy_edge_set_title_centered_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function noizzy_edge_set_title_centered_with_breadcrumbs_type_for_options( $type ) {
		$type['centered-with-breadcrumbs'] = esc_html__( 'Centered With Breadcrumbs', 'noizzy' );
		
		return $type;
	}
	
	add_filter( 'noizzy_edge_title_type_global_option', 'noizzy_edge_set_title_centered_with_breadcrumbs_type_for_options' );
	add_filter( 'noizzy_edge_title_type_meta_boxes', 'noizzy_edge_set_title_centered_with_breadcrumbs_type_for_options' );
}