<?php

if ( ! function_exists( 'noizzy_edge_sticky_header_meta_boxes_options_map' ) ) {
	function noizzy_edge_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = noizzy_edge_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'edge_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'noizzy' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'noizzy' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$noizzy_custom_sidebars = noizzy_edge_get_custom_sidebars();
		if ( count( $noizzy_custom_sidebars ) > 0 ) {
			noizzy_edge_create_meta_box_field(
				array(
					'name'        => 'edge_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'noizzy' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'noizzy' ),
					'parent'      => $header_meta_box,
					'options'     => $noizzy_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'edge_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'noizzy_edge_additional_header_area_meta_boxes_map', 'noizzy_edge_sticky_header_meta_boxes_options_map', 8, 1 );
}