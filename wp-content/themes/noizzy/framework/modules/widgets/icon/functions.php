<?php

if ( ! function_exists( 'noizzy_edge_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function noizzy_edge_register_icon_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_icon_widget' );
}