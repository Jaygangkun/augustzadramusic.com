<?php

if ( ! function_exists( 'noizzy_edge_map_post_video_meta' ) ) {
	function noizzy_edge_map_post_video_meta() {
		$video_post_format_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'noizzy' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'noizzy' ),
				'description'   => esc_html__( 'Choose video type', 'noizzy' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'noizzy' ),
					'self'            => esc_html__( 'Self Hosted', 'noizzy' )
				)
			)
		);
		
		$edge_video_embedded_container = noizzy_edge_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'edge_video_embedded_container'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'noizzy' ),
				'description' => esc_html__( 'Enter Video URL', 'noizzy' ),
				'parent'      => $edge_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edge_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'noizzy' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'noizzy' ),
				'parent'      => $edge_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edge_video_type_meta' => 'self'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'noizzy' ),
				'description' => esc_html__( 'Enter video image', 'noizzy' ),
				'parent'      => $edge_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edge_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_post_video_meta', 22 );
}