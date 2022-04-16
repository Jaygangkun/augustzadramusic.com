<?php

if ( ! function_exists( 'noizzy_edge_get_hide_dep_for_header_logo_area_meta_boxes' ) ) {
	function noizzy_edge_get_hide_dep_for_header_logo_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'noizzy_edge_header_logo_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'noizzy_edge_get_hide_dep_for_header_logo_area_widgets_meta_boxes' ) ) {
	function noizzy_edge_get_hide_dep_for_header_logo_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'noizzy_edge_header_logo_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'noizzy_edge_header_logo_area_meta_options_map' ) ) {
	function noizzy_edge_header_logo_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = noizzy_edge_get_hide_dep_for_header_logo_area_meta_boxes();
		$hide_dep_widgets = noizzy_edge_get_hide_dep_for_header_logo_area_widgets_meta_boxes();
		
		$logo_area_container = noizzy_edge_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_container',
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
				'parent' => $logo_area_container,
				'name'   => 'logo_area_style',
				'title'  => esc_html__( 'Logo Area Style', 'noizzy' )
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_disable_header_widget_logo_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Logo Area Widget', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the logo area', 'noizzy' ),
				'parent'        => $logo_area_container,
				'dependency' => array(
					'hide' => array(
						'edge_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$noizzy_custom_sidebars = noizzy_edge_get_custom_sidebars();
		if ( count( $noizzy_custom_sidebars ) > 0 ) {
			noizzy_edge_create_meta_box_field(
				array(
					'name'        => 'edge_custom_logo_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area for Logo Area', 'noizzy' ),
					'description' => esc_html__( 'Choose custom widget area to display in header logo area"', 'noizzy' ),
					'parent'      => $logo_area_container,
					'options'     => $noizzy_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'edge_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_logo_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area In Grid', 'noizzy' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'noizzy' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_container = noizzy_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'edge_logo_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'noizzy' ),
				'description' => esc_html__( 'Set grid background color for logo area', 'noizzy' ),
				'parent'      => $logo_area_in_grid_container
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'noizzy' ),
				'description' => esc_html__( 'Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'noizzy' ),
				'parent'      => $logo_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_logo_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'noizzy' ),
				'description'   => esc_html__( 'Set border on grid logo area', 'noizzy' ),
				'parent'        => $logo_area_in_grid_container,
				'default_value' => '',
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_border_container = noizzy_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_border_container',
				'parent'          => $logo_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'edge_logo_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'noizzy' ),
				'description' => esc_html__( 'Set border color for grid area', 'noizzy' ),
				'parent'      => $logo_area_in_grid_border_container
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'noizzy' ),
				'description' => esc_html__( 'Choose a background color for logo area', 'noizzy' ),
				'parent'      => $logo_area_container
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'noizzy' ),
				'description' => esc_html__( 'Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'noizzy' ),
				'parent'      => $logo_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_logo_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area Border', 'noizzy' ),
				'description'   => esc_html__( 'Set border on logo area', 'noizzy' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
		$logo_area_border_bottom_color_container = noizzy_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_border_bottom_color_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'edge_logo_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_logo_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'noizzy' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'noizzy' ),
				'parent'      => $logo_area_border_bottom_color_container
			)
		);
		
		do_action( 'noizzy_edge_header_logo_area_additional_meta_boxes_map', $logo_area_container );
	}
	
	add_action( 'noizzy_edge_header_logo_area_meta_boxes_map', 'noizzy_edge_header_logo_area_meta_options_map', 10, 1 );
}