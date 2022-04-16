<?php

if ( ! function_exists( 'noizzy_edge_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function noizzy_edge_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'noizzy_edge_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'noizzy_edge_header_top_area_meta_options_map' ) ) {
	function noizzy_edge_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = noizzy_edge_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = noizzy_edge_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'edge_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		noizzy_edge_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'noizzy' )
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'noizzy' ),
				'parent'        => $top_header_container,
				'options'       => noizzy_edge_get_yes_no_select_array(),
			)
		);
		
		$top_bar_container = noizzy_edge_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'dependency' => array(
					'show' => array(
						'edge_top_bar_meta' => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'noizzy' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'noizzy' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'   => 'edge_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'noizzy' ),
				'parent' => $top_bar_container
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'noizzy' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'noizzy' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'noizzy' ),
				'description'   => esc_html__( 'Set border on top bar', 'noizzy' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
		$top_bar_border_container = noizzy_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'show' => array(
						'edge_top_bar_border_meta' => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'noizzy' ),
				'description' => esc_html__( 'Choose color for top bar border', 'noizzy' ),
				'parent'      => $top_bar_border_container
			)
		);
	}
	
	add_action( 'noizzy_edge_additional_header_area_meta_boxes_map', 'noizzy_edge_header_top_area_meta_options_map', 10, 1 );
}