<?php

if ( ! function_exists( 'noizzy_edge_map_sidebar_meta' ) ) {
	function noizzy_edge_map_sidebar_meta() {
		$edge_sidebar_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'noizzy_edge_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'noizzy' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'noizzy' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'noizzy' ),
				'parent'      => $edge_sidebar_meta_box,
                'options'       => noizzy_edge_get_custom_sidebars_options( true )
			)
		);
		
		$edge_custom_sidebars = noizzy_edge_get_custom_sidebars();
		if ( count( $edge_custom_sidebars ) > 0 ) {
			noizzy_edge_create_meta_box_field(
				array(
					'name'        => 'edge_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'noizzy' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'noizzy' ),
					'parent'      => $edge_sidebar_meta_box,
					'options'     => $edge_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_sidebar_meta', 31 );
}