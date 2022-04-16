<?php

if ( ! function_exists( 'noizzy_edge_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function noizzy_edge_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'NoizzyEdgeImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'noizzy_edge_register_widgets', 'noizzy_edge_register_image_gallery_widget' );
}