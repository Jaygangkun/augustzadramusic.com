<?php

if ( ! function_exists( 'noizzy_edge_logo_meta_box_map' ) ) {
	function noizzy_edge_logo_meta_box_map() {
		
		$logo_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'noizzy_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'noizzy' ),
				'name'  => 'logo_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'noizzy' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'noizzy' ),
				'parent'      => $logo_meta_box
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'noizzy' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'noizzy' ),
				'parent'      => $logo_meta_box
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'noizzy' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'noizzy' ),
				'parent'      => $logo_meta_box
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'noizzy' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'noizzy' ),
				'parent'      => $logo_meta_box
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'noizzy' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'noizzy' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_logo_meta_box_map', 47 );
}