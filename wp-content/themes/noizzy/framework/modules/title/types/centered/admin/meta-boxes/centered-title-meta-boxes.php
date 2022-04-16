<?php

if ( ! function_exists( 'noizzy_edge_centered_title_type_options_meta_boxes' ) ) {
	function noizzy_edge_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'noizzy' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'noizzy' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'noizzy_edge_additional_title_area_meta_boxes', 'noizzy_edge_centered_title_type_options_meta_boxes', 5 );
}