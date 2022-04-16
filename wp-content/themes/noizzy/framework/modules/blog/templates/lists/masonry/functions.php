<?php

if ( ! function_exists( 'noizzy_edge_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function noizzy_edge_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'noizzy' );
		
		return $templates;
	}
	
	add_filter( 'noizzy_edge_register_blog_templates', 'noizzy_edge_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'noizzy_edge_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function noizzy_edge_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'noizzy' );
		
		return $options;
	}
	
	add_filter( 'noizzy_edge_blog_list_type_global_option', 'noizzy_edge_set_blog_masonry_type_global_option' );
}