<?php

if ( ! function_exists( 'noizzy_edge_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function noizzy_edge_register_search_opener_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_search_opener_widget' );
}