<?php

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/custom-styles/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'noizzy_edge_title_area_typography_style' ) ) {
	function noizzy_edge_title_area_typography_style() {
		
		// title default/small style
		
		$item_styles = noizzy_edge_get_typography_styles( 'page_title' );
		
		$item_selector = array(
			'.edge-title-holder .edge-title-wrapper .edge-page-title'
		);
		
		echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		
		// subtitle style
		
		$item_styles = noizzy_edge_get_typography_styles( 'page_subtitle' );
		
		$item_selector = array(
			'.edge-title-holder .edge-title-wrapper .edge-page-subtitle'
		);
		
		echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_title_area_typography_style' );
}