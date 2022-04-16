<?php

if ( ! function_exists( 'noizzy_edge_get_hide_dep_for_header_vertical_closed_options' ) ) {
	function noizzy_edge_get_hide_dep_for_header_vertical_closed_options() {
		$hide_dep_options = apply_filters( 'noizzy_edge_header_vertical_closed_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'noizzy_edge_header_vertical_closed_options_map' ) ) {
	function noizzy_edge_header_vertical_closed_options_map( $panel_header ) {
		$hide_dep_options = noizzy_edge_get_hide_dep_for_header_vertical_closed_options();
		
		$vertical_closed_container = noizzy_edge_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'vertical_closed_container',

			)
		);
		
		noizzy_edge_add_admin_section_title(
			array(
				'parent' => $vertical_closed_container,
				'name'   => 'vertical_closed_opener_style',
				'title'  => esc_html__( 'Vertical Closed Opener Style', 'noizzy' )
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'parent'        => $vertical_closed_container,
				'type'          => 'select',
				'name'          => 'vertical_closed_icon_source',
				'default_value' => 'icon_pack',
				'label'         => esc_html__( 'Select Vertical Closed Icon Source', 'noizzy' ),
				'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'noizzy' ),
				'options'       => noizzy_edge_get_icon_sources_array()
			)
		);

		$vertical_closed_icon_pack_container = noizzy_edge_add_admin_container(
			array(
				'parent'          => $vertical_closed_container,
				'name'            => 'vertical_closed_icon_pack_container',
				'dependency' => array(
					'show' => array(
						'vertical_closed_icon_source' => 'icon_pack'
					)
				)
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'parent'        => $vertical_closed_icon_pack_container,
				'type'          => 'select',
				'name'          => 'vertical_closed_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Vertical Closed Icon Pack', 'noizzy' ),
				'description'   => esc_html__( 'Choose icon pack for vertical closed menu icon', 'noizzy' ),
				'options'       => noizzy_edge_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'dripicons', 'simple_line_icons' ) )
			)
		);

		$vertical_closed_icon_svg_path_container = noizzy_edge_add_admin_container(
			array(
				'parent'          => $vertical_closed_container,
				'name'            => 'vertical_closed_icon_svg_path_container',
				'dependency' => array(
					'show' => array(
						'vertical_closed_icon_source' => 'svg_path'
					)
				)
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'parent'      => $vertical_closed_icon_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'vertical_closed_icon_svg_path',
				'label'       => esc_html__( 'Vertical Closed Icon SVG Path', 'noizzy' ),
				'description' => esc_html__( 'Enter your vertical closed icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'noizzy' ),
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'parent'      => $vertical_closed_icon_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'vertical_closed_close_icon_svg_path',
				'label'       => esc_html__( 'Vertical Closed Close Icon SVG Path', 'noizzy' ),
				'description' => esc_html__( 'Enter your vertical closed close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'noizzy' ),
			)
		);

		$vertical_closed_icon_style_group = noizzy_edge_add_admin_group(
			array(
				'parent'      => $vertical_closed_container,
				'name'        => 'vertical_closed_icon_style_group',
				'title'       => esc_html__( 'Vertical Closed Icon Style', 'noizzy' ),
				'description' => esc_html__( 'Define styles for vetical closed icon', 'noizzy' )
			)
		);
		
		$vertical_closed_icon_colors_row = noizzy_edge_add_admin_row(
			array(
				'parent' => $vertical_closed_icon_style_group,
				'name'   => 'vertical_closed_icon_colors_row'
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'parent' => $vertical_closed_icon_colors_row,
				'type'   => 'colorsimple',
				'name'   => 'vertical_closed_icon_color',
				'label'  => esc_html__( 'Color', 'noizzy' ),
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'parent' => $vertical_closed_icon_colors_row,
				'type'   => 'colorsimple',
				'name'   => 'vertical_closed_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'noizzy' ),
			)
		);
		
		do_action( 'noizzy_edge_header_vertical_closed_additional_options', $panel_header );
	}
	
	add_action( 'noizzy_edge_additional_header_menu_area_options_map', 'noizzy_edge_header_vertical_closed_options_map' );
}