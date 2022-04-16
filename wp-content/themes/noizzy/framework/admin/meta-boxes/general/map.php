<?php

if ( ! function_exists( 'noizzy_edge_map_general_meta' ) ) {
	function noizzy_edge_map_general_meta() {
		
		$general_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'noizzy_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'noizzy' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'noizzy' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'noizzy' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'noizzy' ),
				'parent'        => $general_meta_box
			)
		);
		
		$edge_content_padding_group = noizzy_edge_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'noizzy' ),
				'description' => esc_html__( 'Define styles for Content area', 'noizzy' ),
				'parent'      => $general_meta_box
			)
		);
		
			$edge_content_padding_row = noizzy_edge_add_admin_row(
				array(
					'name'   => 'edge_content_padding_row',
					'next'   => true,
					'parent' => $edge_content_padding_group
				)
			);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'   => 'edge_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'noizzy' ),
						'parent' => $edge_content_padding_row,
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'    => 'edge_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'noizzy' ),
						'parent'  => $edge_content_padding_row,
					)
				);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'noizzy' ),
				'description' => esc_html__( 'Choose background color for page content', 'noizzy' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'    => 'edge_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'noizzy' ),
				'parent'  => $general_meta_box,
				'options' => noizzy_edge_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = noizzy_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'edge_boxed_meta'  => array('','no')
						)
					)
				)
			);

                noizzy_edge_create_meta_box_field(
                    array(
                        'name'        => 'edge_page_box_layout_shadow_meta',
                        'type'        => 'select',
                        'label'       => esc_html__( 'Boxed Layout Shadow', 'noizzy' ),
                        'parent'      => $boxed_container_meta,
                        'options'     => noizzy_edge_get_yes_no_select_array()
                    )
                );
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'noizzy' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'noizzy' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'noizzy' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'noizzy' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'noizzy' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'noizzy' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'          => 'edge_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'noizzy' ),
						'description'   => esc_html__( 'Choose background image attachment', 'noizzy' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'noizzy' ),
							'fixed'  => esc_html__( 'Fixed', 'noizzy' ),
							'scroll' => esc_html__( 'Scroll', 'noizzy' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'noizzy' ),
				'parent'        => $general_meta_box,
				'options'       => noizzy_edge_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = noizzy_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'edge_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'edge_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'noizzy' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'noizzy' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'noizzy' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'noizzy' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'noizzy' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'noizzy' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edge_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'noizzy' ),
						'options'       => noizzy_edge_get_yes_no_select_array(),
					)
				);
		
				noizzy_edge_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edge_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'noizzy' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'noizzy' ),
						'options'       => noizzy_edge_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'noizzy' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'noizzy' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'noizzy' ),
					'edge-grid-1100' => esc_html__( '1100px', 'noizzy' ),
					'edge-grid-1300' => esc_html__( '1300px', 'noizzy' ),
					'edge-grid-1200' => esc_html__( '1200px', 'noizzy' ),
					'edge-grid-1000' => esc_html__( '1000px', 'noizzy' ),
					'edge-grid-800'  => esc_html__( '800px', 'noizzy' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'noizzy' ),
				'parent'        => $general_meta_box,
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = noizzy_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'edge_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'noizzy' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'noizzy' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => noizzy_edge_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = noizzy_edge_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'edge_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					noizzy_edge_create_meta_box_field(
						array(
							'name'   => 'edge_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'noizzy' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = noizzy_edge_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'noizzy' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'noizzy' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = noizzy_edge_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					noizzy_edge_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'edge_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'noizzy' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'noizzy' ),
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
					
					noizzy_edge_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'edge_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'noizzy' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					noizzy_edge_create_meta_box_field(
						array(
							'name'        => 'edge_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'noizzy' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'noizzy' ),
							'options'     => noizzy_edge_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'noizzy' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'noizzy' ),
				'parent'      => $general_meta_box,
				'options'     => noizzy_edge_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_general_meta', 10 );
}