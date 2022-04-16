<?php

if ( ! function_exists( 'noizzy_edge_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function noizzy_edge_register_author_info_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_author_info_widget' );
}