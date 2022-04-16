<?php

if ( ! function_exists( 'noizzy_edge_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function noizzy_edge_register_blog_list_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_blog_list_widget' );
}