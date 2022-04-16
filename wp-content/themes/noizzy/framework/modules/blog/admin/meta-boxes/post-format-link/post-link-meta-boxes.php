<?php

if ( ! function_exists( 'noizzy_edge_map_post_link_meta' ) ) {
	function noizzy_edge_map_post_link_meta() {
		$link_post_format_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'noizzy' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'noizzy' ),
				'description' => esc_html__( 'Enter link', 'noizzy' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_post_link_meta', 24 );
}