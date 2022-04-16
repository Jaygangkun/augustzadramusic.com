<?php

if ( ! function_exists( 'noizzy_edge_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function noizzy_edge_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$masonry_layout = noizzy_edge_get_meta_field_intersect( 'blog_masonry_layout' );
		if ( $masonry_layout === 'in-grid' ) {
			$params_list['holder'] = 'edge-container';
			$params_list['inner']  = 'edge-container-inner clearfix';
		} else {
			$params_list['holder'] = 'edge-full-width';
			$params_list['inner']  = 'edge-full-width-inner';
		}
		
		return $params_list;
	}
	
	add_filter( 'noizzy_edge_blog_holder_params', 'noizzy_edge_get_blog_holder_params' );
}

if ( ! function_exists( 'noizzy_edge_get_blog_list_classes' ) ) {
	/**
	 * Function that generates blog list holder classes for blog list templates
	 */
	function noizzy_edge_get_blog_list_classes( $classes ) {
		$list_classes   = array();
		$list_classes[] = 'edge-blog-type-masonry';
		
		$number_of_columns = noizzy_edge_get_meta_field_intersect( 'blog_masonry_number_of_columns' );
		if ( ! empty( $number_of_columns ) ) {
			$list_classes[] = 'edge-blog-' . $number_of_columns . '-columns';
		}
		
		$space_between_items = noizzy_edge_get_meta_field_intersect( 'blog_masonry_space_between_items' );
		if ( ! empty( $space_between_items ) ) {
			$list_classes[] = 'edge-' . $space_between_items . '-space';
		}
		
		$masonry_layout = noizzy_edge_get_meta_field_intersect( 'blog_masonry_layout' );
		$list_classes[] = 'edge-blog-masonry-' . $masonry_layout;
		
		$classes = array_merge( $classes, $list_classes );
		
		return $classes;
	}
	
	add_filter( 'noizzy_edge_blog_list_classes', 'noizzy_edge_get_blog_list_classes' );
}

if ( ! function_exists( 'noizzy_edge_blog_part_params' ) ) {
	function noizzy_edge_blog_part_params( $params ) {
		$part_params              = array();

		$part_params['title_tag'] = 'h4';
		$part_params['link_tag']  = 'h5';
		$part_params['quote_tag'] = 'h5';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'noizzy_edge_blog_part_params', 'noizzy_edge_blog_part_params' );
}