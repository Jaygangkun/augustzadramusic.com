<?php

if ( ! function_exists( 'noizzy_edge_get_title_types_meta_boxes' ) ) {
	function noizzy_edge_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'noizzy_edge_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'noizzy' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'noizzy_edge_map_title_meta' ) ) {
	function noizzy_edge_map_title_meta() {
		$title_type_meta_boxes = noizzy_edge_get_title_types_meta_boxes();
		
		$title_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'noizzy_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'noizzy' ),
				'name'  => 'title_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'noizzy' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'noizzy' ),
				'parent'        => $title_meta_box,
				'options'       => noizzy_edge_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = noizzy_edge_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'edge_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'edge_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'          => 'edge_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'noizzy' ),
						'description'   => esc_html__( 'Choose title type', 'noizzy' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'          => 'edge_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'noizzy' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'noizzy' ),
						'options'       => noizzy_edge_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'noizzy' ),
						'description' => esc_html__( 'Set a height for Title Area', 'noizzy' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'noizzy' ),
						'description' => esc_html__( 'Choose a background color for title area', 'noizzy' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'noizzy' ),
						'description' => esc_html__( 'Choose an Image for title area', 'noizzy' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'          => 'edge_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'noizzy' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'noizzy' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'noizzy' ),
							'hide'                => esc_html__( 'Hide Image', 'noizzy' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'noizzy' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'noizzy' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'noizzy' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'noizzy' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'noizzy' )
						)
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'          => 'edge_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'noizzy' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'noizzy' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'noizzy' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'noizzy' ),
							'window-top'    => esc_html__( 'From Window Top', 'noizzy' )
						)
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'          => 'edge_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'noizzy' ),
						'options'       => noizzy_edge_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'noizzy' ),
						'description' => esc_html__( 'Choose a color for title text', 'noizzy' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'          => 'edge_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'noizzy' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'noizzy' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				noizzy_edge_create_meta_box_field(
					array(
						'name'          => 'edge_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'noizzy' ),
						'options'       => noizzy_edge_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				noizzy_edge_create_meta_box_field(
					array(
						'name'        => 'edge_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'noizzy' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'noizzy' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'noizzy_edge_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_title_meta', 60 );
}