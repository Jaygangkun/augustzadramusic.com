<?php

if ( ! function_exists( 'noizzy_edge_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function noizzy_edge_register_social_icons_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_social_icons_widget' );
}