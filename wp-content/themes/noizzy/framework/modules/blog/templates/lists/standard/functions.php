<?php

if ( ! function_exists( 'noizzy_edge_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function noizzy_edge_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'noizzy' );
		
		return $templates;
	}
	
	add_filter( 'noizzy_edge_register_blog_templates', 'noizzy_edge_register_blog_standard_template_file' );
}

if ( ! function_exists( 'noizzy_edge_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function noizzy_edge_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'noizzy' );
		
		return $options;
	}
	
	add_filter( 'noizzy_edge_blog_list_type_global_option', 'noizzy_edge_set_blog_standard_type_global_option' );
}