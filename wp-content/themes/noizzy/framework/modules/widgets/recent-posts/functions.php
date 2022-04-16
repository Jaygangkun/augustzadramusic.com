<?php

if ( ! function_exists( 'noizzy_edge_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function noizzy_edge_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_recent_posts_widget' );
}