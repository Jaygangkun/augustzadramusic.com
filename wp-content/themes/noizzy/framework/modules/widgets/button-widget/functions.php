<?php

if ( ! function_exists( 'noizzy_edge_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function noizzy_edge_register_button_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_button_widget' );
}