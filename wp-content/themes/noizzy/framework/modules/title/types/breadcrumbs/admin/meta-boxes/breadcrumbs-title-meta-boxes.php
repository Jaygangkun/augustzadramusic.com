<?php

if ( ! function_exists( 'noizzy_edge_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function noizzy_edge_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'noizzy' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'noizzy' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'noizzy_edge_additional_title_area_meta_boxes', 'noizzy_edge_breadcrumbs_title_type_options_meta_boxes' );
}