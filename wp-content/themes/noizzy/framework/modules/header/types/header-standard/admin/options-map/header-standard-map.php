<?php

if ( ! function_exists( 'noizzy_edge_get_hide_dep_for_header_standard_options' ) ) {
	function noizzy_edge_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'noizzy_edge_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'noizzy_edge_header_standard_map' ) ) {
	function noizzy_edge_header_standard_map( $parent ) {
		$hide_dep_options = noizzy_edge_get_hide_dep_for_header_standard_options();
		
		noizzy_edge_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'center',
				'label'           => esc_html__( 'Choose Menu Area Position', 'noizzy' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'noizzy' ),
				'options'         => array(
                    'center' => esc_html__( 'Center', 'noizzy' ),
					'right'  => esc_html__( 'Right', 'noizzy' ),
					'left'   => esc_html__( 'Left', 'noizzy' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'noizzy_edge_additional_header_menu_area_options_map', 'noizzy_edge_header_standard_map' );
}