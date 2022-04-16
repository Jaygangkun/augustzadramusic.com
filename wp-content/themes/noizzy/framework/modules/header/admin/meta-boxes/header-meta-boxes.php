<?php

if ( ! function_exists( 'noizzy_edge_header_types_meta_boxes' ) ) {
	function noizzy_edge_header_types_meta_boxes() {
		$header_type_options = apply_filters( 'noizzy_edge_header_type_meta_boxes', $header_type_options = array( '' => esc_html__( 'Default', 'noizzy' ) ) );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'noizzy_edge_get_hide_dep_for_header_behavior_meta_boxes' ) ) {
	function noizzy_edge_get_hide_dep_for_header_behavior_meta_boxes() {
		$hide_dep_options = apply_filters( 'noizzy_edge_header_behavior_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( EDGE_FRAMEWORK_HEADER_ROOT_DIR . '/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

foreach ( glob( EDGE_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'noizzy_edge_map_header_meta' ) ) {
	function noizzy_edge_map_header_meta() {
		$header_type_meta_boxes              = noizzy_edge_header_types_meta_boxes();
		$header_behavior_meta_boxes_hide_dep = noizzy_edge_get_hide_dep_for_header_behavior_meta_boxes();
		
		$header_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'noizzy_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'header_meta' ),
				'title' => esc_html__( 'Header', 'noizzy' ),
				'name'  => 'header_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Choose Header Type', 'noizzy' ),
				'description'   => esc_html__( 'Select header type layout', 'noizzy' ),
				'parent'        => $header_meta_box,
				'options'       => $header_type_meta_boxes
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'noizzy' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'noizzy' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'noizzy' ),
					'light-header' => esc_html__( 'Light', 'noizzy' ),
					'dark-header'  => esc_html__( 'Dark', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'parent'          => $header_meta_box,
				'type'            => 'select',
				'name'            => 'edge_header_behaviour_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Header Behaviour', 'noizzy' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'noizzy' ),
				'options'         => array(
					''                                => esc_html__( 'Default', 'noizzy' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'noizzy' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'noizzy' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'noizzy' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'noizzy' )
				),
				'dependency' => array(
					'hide' => array(
						'edge_header_type_meta'  => $header_behavior_meta_boxes_hide_dep
					)
				)
			)
		);

		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_sticky_header_skin_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Sticky Header Skin', 'noizzy' ),
				'description'   => esc_html__( 'Choose a sticky header style to make header elements (logo, main menu, side menu button) in that predefined style', 'noizzy' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'noizzy' ),
					'light-sticky-header' => esc_html__( 'Light', 'noizzy' ),
					'dark-sticky-header'  => esc_html__( 'Dark', 'noizzy' )
				),
				'dependency' => array(
					'hide' => array(
						'edge_header_type_meta'  => $header_behavior_meta_boxes_hide_dep
					)
				)
			)
		);
		
		//additional area
		do_action( 'noizzy_edge_additional_header_area_meta_boxes_map', $header_meta_box );
		
		//top area
		do_action( 'noizzy_edge_header_top_area_meta_boxes_map', $header_meta_box );
		
		//logo area
		do_action( 'noizzy_edge_header_logo_area_meta_boxes_map', $header_meta_box );
		
		//menu area
		do_action( 'noizzy_edge_header_menu_area_meta_boxes_map', $header_meta_box );
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_header_meta', 50 );
}