<?php

if ( ! function_exists( 'noizzy_edge_disable_behaviors_for_header_vertical_closed' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function noizzy_edge_disable_behaviors_for_header_vertical_closed( $allow_behavior ) {
		return false;
	}
	
	if ( noizzy_edge_check_is_header_type_enabled( 'header-vertical-closed', noizzy_edge_get_page_id() ) ) {
		add_filter( 'noizzy_edge_allow_sticky_header_behavior', 'noizzy_edge_disable_behaviors_for_header_vertical_closed' );
		add_filter( 'noizzy_edge_allow_content_boxed_layout', 'noizzy_edge_disable_behaviors_for_header_vertical_closed' );
	}
}