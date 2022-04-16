<?php

if ( ! function_exists( 'noizzy_edge_get_blog_list_types_options' ) ) {
	function noizzy_edge_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'noizzy_edge_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'noizzy_edge_blog_options_map' ) ) {
	function noizzy_edge_blog_options_map() {
		$blog_list_type_options = noizzy_edge_get_blog_list_types_options();
		
		noizzy_edge_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'noizzy' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = noizzy_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'noizzy' )
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'noizzy' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'noizzy' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'noizzy' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'noizzy' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => noizzy_edge_get_custom_sidebars_options(),
			)
		);
		
		$noizzy_custom_sidebars = noizzy_edge_get_custom_sidebars();
		if ( count( $noizzy_custom_sidebars ) > 0 ) {
			noizzy_edge_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'noizzy' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'noizzy' ),
					'parent'      => $panel_blog_lists,
					'options'     => noizzy_edge_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'noizzy' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'noizzy' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'noizzy' ),
					'full-width' => esc_html__( 'Full Width', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'noizzy' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'noizzy' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'noizzy' ),
					'three' => esc_html__( '3 Columns', 'noizzy' ),
					'four'  => esc_html__( '4 Columns', 'noizzy' ),
					'five'  => esc_html__( '5 Columns', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'noizzy' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'noizzy' ),
				'default_value' => 'normal',
				'options'       => noizzy_edge_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'noizzy' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'noizzy' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'noizzy' ),
					'original' => esc_html__( 'Original', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'noizzy' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'noizzy' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'noizzy' ),
					'load-more'       => esc_html__( 'Load More', 'noizzy' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'noizzy' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'noizzy' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'noizzy' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_tags_area_blog',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Blog Tags on Standard List', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show tags on standard blog list', 'noizzy' ),
				'parent'        => $panel_blog_lists
			)
		);

        noizzy_edge_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'override_default_date_format',
                'default_value' => 'no',
                'label'         => esc_html__( 'Override Default WordPress date format on List and Single pages', 'noizzy' ),
                'description'   => esc_html__( 'If set to YES, day and month will be shown', 'noizzy' ),
                'parent'        => $panel_blog_lists
            )
        );
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = noizzy_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'noizzy' )
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'noizzy' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'noizzy' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => noizzy_edge_get_custom_sidebars_options()
			)
		);
		
		if ( count( $noizzy_custom_sidebars ) > 0 ) {
			noizzy_edge_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'noizzy' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'noizzy' ),
					'parent'      => $panel_blog_single,
					'options'     => noizzy_edge_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'noizzy' ),
				'parent'        => $panel_blog_single,
				'options'       => noizzy_edge_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'noizzy' ),
				'parent'        => $panel_blog_single,
				'dependency' => array(
					'hide' => array(
						'show_title_area_blog' => 'no'
					)
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'noizzy' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'noizzy' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'noizzy' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'noizzy' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = noizzy_edge_add_admin_container(
			array(
				'name'            => 'edge_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'noizzy' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'noizzy' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'noizzy' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = noizzy_edge_add_admin_container(
			array(
				'name'            => 'edge_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'noizzy' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'noizzy' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'noizzy_edge_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'noizzy_edge_options_map', 'noizzy_edge_blog_options_map', 13 );
}