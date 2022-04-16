<?php

if ( ! function_exists( 'noizzy_edge_register_song_widget' ) ) {
	/**
	 * Function that register song widget
	 */
	function noizzy_edge_register_song_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeSongWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_song_widget' );
}