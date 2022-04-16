<?php

if ( ! function_exists( 'noizzy_edge_disable_wpml_css' ) ) {
	function noizzy_edge_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'noizzy_edge_disable_wpml_css' );
}