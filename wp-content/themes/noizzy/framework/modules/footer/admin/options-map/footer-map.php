<?php

if ( ! function_exists( 'noizzy_edge_footer_options_map' ) ) {
	function noizzy_edge_footer_options_map() {

		noizzy_edge_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'noizzy' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = noizzy_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'noizzy' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'noizzy' ),
				'parent'        => $footer_panel
			)
		);

        noizzy_edge_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'noizzy' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'noizzy' ),
                'parent'        => $footer_panel,
            )
        );

		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'noizzy' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = noizzy_edge_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '12',
				'label'         => esc_html__( 'Footer Top Columns', 'noizzy' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'noizzy' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'noizzy' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'noizzy' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'noizzy' ),
					'left'   => esc_html__( 'Left', 'noizzy' ),
					'center' => esc_html__( 'Center', 'noizzy' ),
					'right'  => esc_html__( 'Right', 'noizzy' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'name'        => 'footer_top_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'noizzy' ),
				'description' => esc_html__( 'Set background image for top footer area', 'noizzy' ),
				'parent'      => $show_footer_top_container
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name'        => 'footer_top_background_image_repeat',
				'label'       => esc_html__( 'Background Image Repeat', 'noizzy' ),
				'description' => esc_html__( "Enabling this option will place the background image to it's original size and ratio. The image will be displayed repeatedly across the footer background", 'noizzy' ),
				'parent'      => $show_footer_top_container
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'noizzy' ),
				'description' => esc_html__( 'Set background color for top footer area', 'noizzy' ),
				'parent'      => $show_footer_top_container
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'noizzy' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = noizzy_edge_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'noizzy' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'noizzy' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'noizzy' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'noizzy' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'noizzy_edge_options_map', 'noizzy_edge_footer_options_map', 11 );
}