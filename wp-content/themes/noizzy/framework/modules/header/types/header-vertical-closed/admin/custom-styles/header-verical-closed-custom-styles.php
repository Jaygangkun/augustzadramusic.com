<?php

if ( ! function_exists( 'noizzy_edge_vertical_closed_icon_styles' ) ) {
	function noizzy_edge_vertical_closed_icon_styles() {
		$icon_color       = noizzy_edge_options()->getOptionValue( 'vertical_closed_icon_color' );
		$icon_hover_color = noizzy_edge_options()->getOptionValue( 'vertical_closed_icon_hover_color' );
		
		$icon_hover_selector = array(
			'.edge-vertical-area-opener:hover'
		);
		
		if ( ! empty( $icon_color ) ) {
			echo noizzy_edge_dynamic_css( '.edge-vertical-area-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo noizzy_edge_dynamic_css( $icon_hover_selector, array(
				'color' => $icon_hover_color . '!important'
			) );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic', 'noizzy_edge_vertical_closed_icon_styles' );
}