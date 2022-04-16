<?php

if ( ! function_exists( 'noizzy_edge_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function noizzy_edge_register_social_icon_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_social_icon_widget' );
}