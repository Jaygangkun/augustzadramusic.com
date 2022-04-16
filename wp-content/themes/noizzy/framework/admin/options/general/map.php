<?php

if ( ! function_exists( 'noizzy_edge_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function noizzy_edge_general_options_map() {
		
		noizzy_edge_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'noizzy' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = noizzy_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'noizzy' )
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'noizzy' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'noizzy' ),
				'parent'        => $panel_design_style
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'noizzy' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = noizzy_edge_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'noizzy' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'noizzy' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'noizzy' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'noizzy' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'noizzy' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'noizzy' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'noizzy' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'noizzy' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'noizzy' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'noizzy' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'noizzy' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'noizzy' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'noizzy' ),
					'100i' => esc_html__( '100 Thin Italic', 'noizzy' ),
					'200'  => esc_html__( '200 Extra-Light', 'noizzy' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'noizzy' ),
					'300'  => esc_html__( '300 Light', 'noizzy' ),
					'300i' => esc_html__( '300 Light Italic', 'noizzy' ),
					'400'  => esc_html__( '400 Regular', 'noizzy' ),
					'400i' => esc_html__( '400 Regular Italic', 'noizzy' ),
					'500'  => esc_html__( '500 Medium', 'noizzy' ),
					'500i' => esc_html__( '500 Medium Italic', 'noizzy' ),
					'600'  => esc_html__( '600 Semi-Bold', 'noizzy' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'noizzy' ),
					'700'  => esc_html__( '700 Bold', 'noizzy' ),
					'700i' => esc_html__( '700 Bold Italic', 'noizzy' ),
					'800'  => esc_html__( '800 Extra-Bold', 'noizzy' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'noizzy' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'noizzy' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'noizzy' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'noizzy' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'noizzy' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'noizzy' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'noizzy' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'noizzy' ),
					'greek'        => esc_html__( 'Greek', 'noizzy' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'noizzy' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'noizzy' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'noizzy' ),
				'parent'      => $panel_design_style
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'noizzy' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'noizzy' ),
				'parent'      => $panel_design_style
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'noizzy' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'noizzy' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'noizzy' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = noizzy_edge_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);

                noizzy_edge_add_admin_field(
                    array(
                        'name'        => 'page_box_layout_shadow',
                        'type'        => 'select',
                        'label'       => esc_html__( 'Boxed Layout Shadow', 'noizzy' ),
                        'parent'      => $boxed_container,
                        'options'     => noizzy_edge_get_yes_no_select_array()
                    )
                );
		
				noizzy_edge_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'noizzy' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'noizzy' ),
						'parent'      => $boxed_container
					)
				);
				
				noizzy_edge_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'noizzy' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'noizzy' ),
						'parent'      => $boxed_container
					)
				);
				
				noizzy_edge_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'noizzy' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'noizzy' ),
						'parent'      => $boxed_container
					)
				);
				
				noizzy_edge_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'noizzy' ),
						'description'   => esc_html__( 'Choose background image attachment', 'noizzy' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'noizzy' ),
							'fixed'  => esc_html__( 'Fixed', 'noizzy' ),
							'scroll' => esc_html__( 'Scroll', 'noizzy' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'noizzy' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = noizzy_edge_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				noizzy_edge_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'noizzy' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'noizzy' ),
						'parent'      => $paspartu_container
					)
				);
				
				noizzy_edge_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'noizzy' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'noizzy' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				noizzy_edge_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'noizzy' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'noizzy' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				noizzy_edge_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'noizzy' )
					)
				);
		
				noizzy_edge_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'noizzy' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'noizzy' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'noizzy' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'noizzy' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'edge-grid-1100' => esc_html__( '1100px - default', 'noizzy' ),
					'edge-grid-1300' => esc_html__( '1300px', 'noizzy' ),
					'edge-grid-1200' => esc_html__( '1200px', 'noizzy' ),
					'edge-grid-1000' => esc_html__( '1000px', 'noizzy' ),
					'edge-grid-800'  => esc_html__( '800px', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'noizzy' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'noizzy' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = noizzy_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'noizzy' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'noizzy' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'noizzy' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = noizzy_edge_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				noizzy_edge_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'noizzy' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'noizzy' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = noizzy_edge_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
		
		
					noizzy_edge_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'noizzy' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = noizzy_edge_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'noizzy' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'noizzy' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = noizzy_edge_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					noizzy_edge_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'noizzy' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'noizzy_loader'      => esc_html__( 'Noizzy Loader', 'noizzy' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'noizzy' ),
								'pulse'                 => esc_html__( 'Pulse', 'noizzy' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'noizzy' ),
								'cube'                  => esc_html__( 'Cube', 'noizzy' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'noizzy' ),
								'stripes'               => esc_html__( 'Stripes', 'noizzy' ),
								'wave'                  => esc_html__( 'Wave', 'noizzy' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'noizzy' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'noizzy' ),
								'atom'                  => esc_html__( 'Atom', 'noizzy' ),
								'clock'                 => esc_html__( 'Clock', 'noizzy' ),
								'mitosis'               => esc_html__( 'Mitosis', 'noizzy' ),
								'lines'                 => esc_html__( 'Lines', 'noizzy' ),
								'fussion'               => esc_html__( 'Fussion', 'noizzy' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'noizzy' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'noizzy' )
							)
						)
					);

					noizzy_edge_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'noizzy' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					noizzy_edge_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'noizzy' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'noizzy' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'noizzy' ),
				'parent'        => $panel_settings
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'noizzy' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = noizzy_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'noizzy' )
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'noizzy' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'noizzy' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = noizzy_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'noizzy' )
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'noizzy' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'noizzy' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'noizzy_edge_options_map', 'noizzy_edge_general_options_map', 1 );
}

if ( ! function_exists( 'noizzy_edge_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function noizzy_edge_page_general_style( $style ) {
		$current_style = '';
		$page_id       = noizzy_edge_get_page_id();
		$class_prefix  = noizzy_edge_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = noizzy_edge_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = noizzy_edge_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = noizzy_edge_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = noizzy_edge_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.edge-boxed .edge-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= noizzy_edge_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.edge-paspartu-enabled .edge-page-header .edge-fixed-wrapper.fixed',
			'.edge-paspartu-enabled .edge-sticky-header',
			'.edge-paspartu-enabled .edge-mobile-header.mobile-header-appear .edge-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.edge-paspartu-enabled.edge-fixed-paspartu-enabled .edge-page-header .edge-fixed-wrapper.fixed',
			'.edge-paspartu-enabled.edge-fixed-paspartu-enabled .edge-sticky-header.header-appear',
			'.edge-paspartu-enabled.edge-fixed-paspartu-enabled .edge-mobile-header.mobile-header-appear .edge-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = noizzy_edge_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = noizzy_edge_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( noizzy_edge_string_ends_with( $paspartu_width, '%' ) || noizzy_edge_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = noizzy_edge_string_ends_with( $paspartu_width, '%' ) ? noizzy_edge_filter_suffix( $paspartu_width, '%' ) : noizzy_edge_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = noizzy_edge_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.edge-paspartu-enabled .edge-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= noizzy_edge_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= noizzy_edge_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= noizzy_edge_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = noizzy_edge_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( noizzy_edge_string_ends_with( $paspartu_responsive_width, '%' ) || noizzy_edge_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = noizzy_edge_string_ends_with( $paspartu_responsive_width, '%' ) ? noizzy_edge_filter_suffix( $paspartu_responsive_width, '%' ) : noizzy_edge_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = noizzy_edge_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_responsive_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . noizzy_edge_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . noizzy_edge_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . noizzy_edge_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'noizzy_edge_add_page_custom_style', 'noizzy_edge_page_general_style' );
}