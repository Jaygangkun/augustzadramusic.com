<?php

if ( ! function_exists( 'noizzy_edge_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function noizzy_edge_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'noizzy_edge_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'noizzy_edge_header_standard_meta_map' ) ) {
	function noizzy_edge_header_standard_meta_map( $parent ) {
		$hide_dep_options = noizzy_edge_get_hide_dep_for_header_standard_meta_boxes();
		
		noizzy_edge_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'edge_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'noizzy' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'noizzy' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'noizzy' ),
					'left'   => esc_html__( 'Left', 'noizzy' ),
					'right'  => esc_html__( 'Right', 'noizzy' ),
					'center' => esc_html__( 'Center', 'noizzy' )
				),
				'dependency' => array(
					'hide' => array(
						'edge_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'noizzy_edge_additional_header_area_meta_boxes_map', 'noizzy_edge_header_standard_meta_map' );
}