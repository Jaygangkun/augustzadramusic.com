<?php

if ( ! function_exists( 'noizzy_edge_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function noizzy_edge_register_custom_font_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_custom_font_widget' );
}