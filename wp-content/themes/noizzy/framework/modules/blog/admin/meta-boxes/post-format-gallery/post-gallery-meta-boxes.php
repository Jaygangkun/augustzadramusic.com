<?php

if ( ! function_exists( 'noizzy_edge_map_post_gallery_meta' ) ) {
	
	function noizzy_edge_map_post_gallery_meta() {
		$gallery_post_format_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'noizzy' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		noizzy_edge_add_multiple_images_field(
			array(
				'name'        => 'edge_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'noizzy' ),
				'description' => esc_html__( 'Choose your gallery images', 'noizzy' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_post_gallery_meta', 21 );
}
