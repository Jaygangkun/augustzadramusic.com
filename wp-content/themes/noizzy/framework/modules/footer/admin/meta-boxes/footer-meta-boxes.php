<?php

if ( ! function_exists( 'noizzy_edge_map_footer_meta' ) ) {
	function noizzy_edge_map_footer_meta() {
		
		$footer_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'noizzy_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'noizzy' ),
				'name'  => 'footer_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'noizzy' ),
				'options'       => noizzy_edge_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = noizzy_edge_add_admin_container(
			array(
				'name'       => 'edge_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'edge_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			noizzy_edge_create_meta_box_field(
				array(
					'name'          => 'edge_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'noizzy' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'noizzy' ),
					'options'       => noizzy_edge_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			noizzy_edge_create_meta_box_field(
				array(
					'name'          => 'edge_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'noizzy' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'noizzy' ),
					'options'       => noizzy_edge_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

        noizzy_edge_create_meta_box_field(
            array(
                'name'          => 'edge_footer_in_grid_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Footer in Grid', 'noizzy' ),
                'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'noizzy' ),
                'options'       => noizzy_edge_get_yes_no_select_array(),
                'dependency' => array(
                    'hide' => array(
                        'edge_show_footer_top_meta' => array('', 'no'),
                        'edge_show_footer_bottom_meta' => array('', 'no')
                    )
                ),
                'parent'        => $show_footer_meta_container
            )
        );

        noizzy_edge_create_meta_box_field(
            array(
                'name'          => 'edge_uncovering_footer_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Uncovering Footer', 'noizzy' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'noizzy' ),
                'options'       => noizzy_edge_get_yes_no_select_array(),
                'parent'        => $show_footer_meta_container,
            )
        );
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_footer_meta', 70 );
}