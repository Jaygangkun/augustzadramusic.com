<?php

if ( ! function_exists( 'noizzy_edge_map_content_bottom_meta' ) ) {
	function noizzy_edge_map_content_bottom_meta() {
		
		$content_bottom_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'noizzy_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'noizzy' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'noizzy' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'noizzy' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = noizzy_edge_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'edge_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'edge_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'noizzy' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'noizzy' ),
				'options'       => noizzy_edge_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edge_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'noizzy' ),
				'options'       => noizzy_edge_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'edge_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'noizzy' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'noizzy' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_content_bottom_meta', 71 );
}