<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = EDGE_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'noizzy_edge_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function noizzy_edge_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'noizzy_edge_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'noizzy_edge_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function noizzy_edge_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Edge Row Content Width', 'noizzy' ),
				'value'      => array(
					esc_html__( 'Full Width', 'noizzy' ) => 'full-width',
					esc_html__( 'In Grid', 'noizzy' )    => 'grid'
				),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);

        vc_add_param( 'vc_row',
            array(
                'type'       => 'textfield',
                'param_name' => 'marquee_text',
                'heading'     => esc_html__( 'Edge Row Marquee Text', 'noizzy' ),
                'description' => esc_html__( 'Enter the marquee text that will appear above row', 'noizzy' ),
                'group'      => esc_html__( 'Edge Settings', 'noizzy' )
            )
        );
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Edge Anchor ID', 'noizzy' ),
				'description' => esc_html__( 'For example "home"', 'noizzy' ),
				'group'       => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Edge Background Color', 'noizzy' ),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Edge Background Image', 'noizzy' ),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Edge Disable Background Image', 'noizzy' ),
				'value'       => array(
					esc_html__( 'Never', 'noizzy' )        => '',
					esc_html__( 'Below 1280px', 'noizzy' ) => '1280',
					esc_html__( 'Below 1024px', 'noizzy' ) => '1024',
					esc_html__( 'Below 768px', 'noizzy' )  => '768',
					esc_html__( 'Below 680px', 'noizzy' )  => '680',
					esc_html__( 'Below 480px', 'noizzy' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'noizzy' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Edge Parallax Background Image', 'noizzy' ),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Edge Parallax Speed', 'noizzy' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'noizzy' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Edge Parallax Section Height (px)', 'noizzy' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Edge Content Aligment', 'noizzy' ),
				'value'      => array(
					esc_html__( 'Default', 'noizzy' ) => '',
					esc_html__( 'Left', 'noizzy' )    => 'left',
					esc_html__( 'Center', 'noizzy' )  => 'center',
					esc_html__( 'Right', 'noizzy' )   => 'right'
				),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);

        vc_add_param( 'vc_row',
            array(
                'type'        => 'dropdown',
                'param_name'  => 'row_btt_skin',
                'heading'     => esc_html__( 'Back To Top Button Skin', 'noizzy' ),
                'value'       => array(
                    esc_html__( 'Dark', 'noizzy' ) => 'dark',
                    esc_html__( 'Light', 'noizzy' )  => 'light'
                ),
                'save_always' => 'true',
                'group'       => esc_html__( 'Edge Settings', 'noizzy' )
            )
        );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Edge Row Content Width', 'noizzy' ),
				'value'      => array(
					esc_html__( 'Full Width', 'noizzy' ) => 'full-width',
					esc_html__( 'In Grid', 'noizzy' )    => 'grid'
				),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Edge Background Color', 'noizzy' ),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Edge Background Image', 'noizzy' ),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Edge Disable Background Image', 'noizzy' ),
				'value'       => array(
					esc_html__( 'Never', 'noizzy' )        => '',
					esc_html__( 'Below 1280px', 'noizzy' ) => '1280',
					esc_html__( 'Below 1024px', 'noizzy' ) => '1024',
					esc_html__( 'Below 768px', 'noizzy' )  => '768',
					esc_html__( 'Below 680px', 'noizzy' )  => '680',
					esc_html__( 'Below 480px', 'noizzy' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'noizzy' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Edge Content Aligment', 'noizzy' ),
				'value'      => array(
					esc_html__( 'Default', 'noizzy' ) => '',
					esc_html__( 'Left', 'noizzy' )    => 'left',
					esc_html__( 'Center', 'noizzy' )  => 'center',
					esc_html__( 'Right', 'noizzy' )   => 'right'
				),
				'group'      => esc_html__( 'Edge Settings', 'noizzy' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( noizzy_edge_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Edge Enable Passepartout', 'noizzy' ),
					'value'       => array_flip( noizzy_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Edge Settings', 'noizzy' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Edge Passepartout Size', 'noizzy' ),
					'value'       => array(
						esc_html__( 'Tiny', 'noizzy' )   => 'tiny',
						esc_html__( 'Small', 'noizzy' )  => 'small',
						esc_html__( 'Normal', 'noizzy' ) => 'normal',
						esc_html__( 'Large', 'noizzy' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'noizzy' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Edge Disable Side Passepartout', 'noizzy' ),
					'value'       => array_flip( noizzy_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'noizzy' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Edge Disable Top Passepartout', 'noizzy' ),
					'value'       => array_flip( noizzy_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'noizzy' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'noizzy_edge_vc_row_map' );
}