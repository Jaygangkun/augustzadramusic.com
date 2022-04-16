<?php

if ( ! function_exists( 'noizzy_edge_include_blog_shortcodes' ) ) {
	function noizzy_edge_include_blog_shortcodes() {
		include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-list/blog-list.php';
	}
	
	if ( noizzy_edge_core_plugin_installed() ) {
		add_action( 'noizzy_core_action_include_shortcodes_file', 'noizzy_edge_include_blog_shortcodes' );
	}
}

if ( ! function_exists( 'noizzy_edge_add_blog_shortcodes' ) ) {
	function noizzy_edge_add_blog_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'NoizzyCore\CPT\Shortcodes\BlogList\BlogList'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( noizzy_edge_core_plugin_installed() ) {
		add_filter( 'noizzy_core_filter_add_vc_shortcode', 'noizzy_edge_add_blog_shortcodes' );
	}
}

if ( ! function_exists( 'noizzy_edge_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function noizzy_edge_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( noizzy_edge_core_plugin_installed() ) {
		add_filter( 'noizzy_core_filter_add_vc_shortcodes_custom_icon_class', 'noizzy_edge_set_blog_list_icon_class_name_for_vc_shortcodes' );
	}
}