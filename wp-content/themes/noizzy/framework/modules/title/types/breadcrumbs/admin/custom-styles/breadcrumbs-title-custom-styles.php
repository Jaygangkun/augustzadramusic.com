<?php

if ( ! function_exists( 'noizzy_edge_breadcrumbs_title_area_typography_style' ) ) {
	function noizzy_edge_breadcrumbs_title_area_typography_style() {
		
		$item_styles = noizzy_edge_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.edge-title-holder .edge-title-wrapper .edge-breadcrumbs'
		);
		
		echo noizzy_edge_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = noizzy_edge_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.edge-title-holder .edge-title-wrapper .edge-breadcrumbs a:hover'
		);
		
		echo noizzy_edge_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_breadcrumbs_title_area_typography_style' );
}