<?php

if ( ! function_exists( 'noizzy_edge_map_post_quote_meta' ) ) {
	function noizzy_edge_map_post_quote_meta() {
		$quote_post_format_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'noizzy' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'noizzy' ),
				'description' => esc_html__( 'Enter Quote text', 'noizzy' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'noizzy' ),
				'description' => esc_html__( 'Enter Quote author', 'noizzy' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_post_quote_meta', 25 );
}