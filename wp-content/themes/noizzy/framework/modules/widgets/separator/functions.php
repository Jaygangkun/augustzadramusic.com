<?php

if ( ! function_exists( 'noizzy_edge_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function noizzy_edge_register_separator_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_separator_widget' );
}