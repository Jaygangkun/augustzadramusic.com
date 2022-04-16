<?php

if ( ! function_exists( 'noizzy_edge_sticky_header_global_js_var' ) ) {
	function noizzy_edge_sticky_header_global_js_var( $global_variables ) {
		$global_variables['edgeStickyHeaderHeight']             = noizzy_edge_get_sticky_header_height();
		$global_variables['edgeStickyHeaderTransparencyHeight'] = noizzy_edge_get_sticky_header_height_of_complete_transparency();
		
		return $global_variables;
	}
	
	add_filter( 'noizzy_edge_js_global_variables', 'noizzy_edge_sticky_header_global_js_var' );
}

if ( ! function_exists( 'noizzy_edge_sticky_header_per_page_js_var' ) ) {
	function noizzy_edge_sticky_header_per_page_js_var( $perPageVars ) {
		$perPageVars['edgeStickyScrollAmount'] = noizzy_edge_get_sticky_scroll_amount();
		
		return $perPageVars;
	}
	
	add_filter( 'noizzy_edge_per_page_js_vars', 'noizzy_edge_sticky_header_per_page_js_var' );
}

if ( ! function_exists( 'noizzy_edge_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function noizzy_edge_register_sticky_header_areas() {
		register_sidebar(
			array(
				'id'            => 'edge-sticky-right',
				'name'          => esc_html__( 'Sticky Header Widget Area', 'noizzy' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the sticky menu', 'noizzy' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s edge-sticky-right">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'noizzy_edge_register_sticky_header_areas' );
}

if ( ! function_exists( 'noizzy_edge_get_sticky_menu' ) ) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function noizzy_edge_get_sticky_menu( $additional_class = 'edge-default-nav' ) {
		noizzy_edge_get_module_template_part( 'templates/sticky-navigation', 'header/types/sticky-header', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'noizzy_edge_get_sticky_header' ) ) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function noizzy_edge_get_sticky_header( $slug = '', $module = '' ) {
        $page_id             = noizzy_edge_get_page_id();
		$sticky_in_grid      = noizzy_edge_options()->getOptionValue( 'sticky_header_in_grid' ) == 'yes' ? true : false;
		$header_in_grid_meta = get_post_meta( $page_id, 'edge_menu_area_in_grid_meta', true);
		$menu_area_position  = noizzy_edge_get_meta_field_intersect( 'set_menu_area_position', $page_id );
		
		if ( $header_in_grid_meta === 'yes' && ! $sticky_in_grid ) {
			$sticky_in_grid = true;
		} else if ( $header_in_grid_meta === 'no' && $sticky_in_grid ) {
			$sticky_in_grid = false;
		}
		
		$parameters = array(
			'hide_logo'                  => noizzy_edge_options()->getOptionValue( 'hide_logo' ) == 'yes' ? true : false,
			'sticky_header_in_grid'      => $sticky_in_grid,
			'fullscreen_menu_icon_class' => noizzy_edge_get_fullscreen_menu_icon_class(),
            'menu_area_position'    	 => $menu_area_position,
			'menu_area_class'       	 => ! empty( $menu_area_position ) ? 'edge-menu-' . $menu_area_position : ''
		);
		
		$module = ! empty( $module ) ? $module : 'header/types/sticky-header';
		
		noizzy_edge_get_module_template_part( 'templates/sticky-header', $module, $slug, $parameters );
	}
}

if ( ! function_exists( 'noizzy_edge_get_sticky_header_widget_menu_area' ) ) {
	/**
	 * Loads sticky header widgets area HTML
	 */
	function noizzy_edge_get_sticky_header_widget_menu_area() {
		$page_id                 = noizzy_edge_get_page_id();
		$custom_menu_widget_area = get_post_meta( $page_id, 'edge_custom_sticky_menu_area_sidebar_meta', true );
		
		if ( is_active_sidebar( 'edge-sticky-right' ) && empty( $custom_menu_widget_area ) ) {
			dynamic_sidebar( 'edge-sticky-right' );
		} else if ( ! empty( $custom_menu_widget_area ) && is_active_sidebar( $custom_menu_widget_area ) ) {
			dynamic_sidebar( $custom_menu_widget_area );
		}
	}
}

if ( ! function_exists( 'noizzy_edge_get_sticky_header_height' ) ) {
	/**
	 * Returns top sticky header height
	 *
	 * @return bool|int|void
	 */
	function noizzy_edge_get_sticky_header_height() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'noizzy_edge_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = noizzy_edge_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu height, needed only for sticky header on scroll up
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up' ) ) ) {
			$sticky_header_height = noizzy_edge_filter_px( noizzy_edge_options()->getOptionValue( 'sticky_header_height' ) );
			
			return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'noizzy_edge_get_sticky_header_height_of_complete_transparency' ) ) {
	/**
	 * Returns top sticky header height it is fully transparent. used in anchor logic
	 *
	 * @return bool|int|void
	 */
	function noizzy_edge_get_sticky_header_height_of_complete_transparency() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'noizzy_edge_allow_sticky_header_behavior', $allow_sticky_behavior );
		
		if ( $allow_sticky_behavior ) {
			$stickyHeaderTransparent = noizzy_edge_options()->getOptionValue( 'sticky_header_background_color' ) !== '' && noizzy_edge_options()->getOptionValue( 'sticky_header_transparency' ) === '0';
			
			if ( $stickyHeaderTransparent ) {
				return 0;
			} else {
				$sticky_header_height = noizzy_edge_filter_px( noizzy_edge_options()->getOptionValue( 'sticky_header_height' ) );
				
				return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
			}
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'noizzy_edge_get_sticky_scroll_amount' ) ) {
	/**
	 * Returns top sticky scroll amount
	 *
	 * @return bool|int|void
	 */
	function noizzy_edge_get_sticky_scroll_amount() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'noizzy_edge_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = noizzy_edge_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu scroll amount
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$sticky_scroll_amount = noizzy_edge_filter_px( noizzy_edge_get_meta_field_intersect( 'scroll_amount_for_sticky' ) );
			
			return $sticky_scroll_amount !== '' ? intval( $sticky_scroll_amount ) : 0;
		} else {
			return 0;
		}
	}
}