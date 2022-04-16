<?php

if ( ! function_exists( 'noizzy_edge_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function noizzy_edge_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'noizzy_edge_header_vertical_hide_meta_boxes', $hide_dep_options = array( '' => '' ) );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'noizzy_edge_header_vertical_area_meta_options_map' ) ) {
	function noizzy_edge_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = noizzy_edge_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = noizzy_edge_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'dependency' => array(
					'hide' => array(
						'edge_header_type_meta' => $hide_dep_options
					)
				)
			)
		);
		
		noizzy_edge_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'noizzy' )
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'noizzy' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'noizzy' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'noizzy' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'noizzy' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'noizzy' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'noizzy' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'noizzy' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'noizzy' ),
				'description'   => esc_html__( 'Set border on vertical area', 'noizzy' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
		$vertical_header_border_container = noizzy_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'dependency' => array(
					'show' => array(
						'edge_vertical_header_border_meta'  => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'noizzy' ),
				'description' => esc_html__( 'Choose color of border', 'noizzy' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'noizzy' ),
				'description'   => esc_html__( 'Set content in vertical center', 'noizzy' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'noizzy_edge_additional_header_area_meta_boxes_map', 'noizzy_edge_header_vertical_area_meta_options_map', 10, 1 );
}