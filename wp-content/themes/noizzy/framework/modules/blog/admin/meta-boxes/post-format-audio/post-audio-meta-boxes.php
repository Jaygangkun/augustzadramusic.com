<?php

if ( ! function_exists( 'noizzy_edge_map_post_audio_meta' ) ) {
	function noizzy_edge_map_post_audio_meta() {
		$audio_post_format_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'noizzy' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'noizzy' ),
				'description'   => esc_html__( 'Choose audio type', 'noizzy' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'noizzy' ),
					'self'            => esc_html__( 'Self Hosted', 'noizzy' )
				)
			)
		);
		
		$edge_audio_embedded_container = noizzy_edge_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'edge_audio_embedded_container'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'noizzy' ),
				'description' => esc_html__( 'Enter audio URL', 'noizzy' ),
				'parent'      => $edge_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'edge_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'noizzy' ),
				'description' => esc_html__( 'Enter audio link', 'noizzy' ),
				'parent'      => $edge_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'edge_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_post_audio_meta', 23 );
}