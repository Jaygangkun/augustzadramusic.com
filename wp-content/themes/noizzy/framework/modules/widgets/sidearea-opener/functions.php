<?php

if ( ! function_exists( 'noizzy_edge_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function noizzy_edge_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_sidearea_opener_widget' );
}