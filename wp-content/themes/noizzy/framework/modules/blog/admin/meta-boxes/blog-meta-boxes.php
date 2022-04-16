<?php

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'noizzy_edge_map_blog_meta' ) ) {
	function noizzy_edge_map_blog_meta() {
		$edge_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$edge_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'noizzy' ),
				'name'  => 'blog_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'noizzy' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'noizzy' ),
				'parent'      => $blog_meta_box,
				'options'     => $edge_blog_categories
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'noizzy' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'noizzy' ),
				'parent'      => $blog_meta_box,
				'options'     => $edge_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'noizzy' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'noizzy' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'noizzy' ),
					'in-grid'    => esc_html__( 'In Grid', 'noizzy' ),
					'full-width' => esc_html__( 'Full Width', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'noizzy' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'noizzy' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'noizzy' ),
					'two'   => esc_html__( '2 Columns', 'noizzy' ),
					'three' => esc_html__( '3 Columns', 'noizzy' ),
					'four'  => esc_html__( '4 Columns', 'noizzy' ),
					'five'  => esc_html__( '5 Columns', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'noizzy' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'noizzy' ),
				'options'     => noizzy_edge_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'noizzy' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'noizzy' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'noizzy' ),
					'fixed'    => esc_html__( 'Fixed', 'noizzy' ),
					'original' => esc_html__( 'Original', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'noizzy' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'noizzy' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'noizzy' ),
					'standard'        => esc_html__( 'Standard', 'noizzy' ),
					'load-more'       => esc_html__( 'Load More', 'noizzy' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'noizzy' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'noizzy' )
				)
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'edge_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'noizzy' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'noizzy' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_blog_meta', 30 );
}