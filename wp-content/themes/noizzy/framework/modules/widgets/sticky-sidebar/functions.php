<?php

if(!function_exists('noizzy_edge_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function noizzy_edge_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'NoizzyEdgeStickySidebar';
		
		return $widgets;
	}
	
	add_filter('noizzy_edge_register_widgets', 'noizzy_edge_register_sticky_sidebar_widget');
}