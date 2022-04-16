<?php

if ( ! function_exists( 'noizzy_edge_header_skin_class' ) ) {
	/**
	 * Function that adds header style class to body tag
	 */
	function noizzy_edge_header_skin_class( $classes ) {
		$header_style     = noizzy_edge_get_meta_field_intersect( 'header_style', noizzy_edge_get_page_id() );
		$header_style_404 = noizzy_edge_options()->getOptionValue( '404_header_style' );
		
		if ( is_404() && ! empty( $header_style_404 ) ) {
			$classes[] = 'edge-' . $header_style_404;
		} else if ( ! empty( $header_style ) ) {
			$classes[] = 'edge-' . $header_style;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'noizzy_edge_header_skin_class' );
}

if ( ! function_exists( 'noizzy_edge_sticky_header_skin_class' ) ) {
	/**
	 * Function that adds header style class to body tag
	 */
	function noizzy_edge_sticky_header_skin_class( $classes ) {
		$sticky_header_skin     = noizzy_edge_get_meta_field_intersect( 'sticky_header_skin', noizzy_edge_get_page_id() );
		
		if ( ! empty( $sticky_header_skin ) ) {
			$classes[] = 'edge-' . $sticky_header_skin;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'noizzy_edge_sticky_header_skin_class' );
}

if ( ! function_exists( 'noizzy_edge_sticky_header_behaviour_class' ) ) {
	/**
	 * Function that adds header behavior class to body tag
	 */
	function noizzy_edge_sticky_header_behaviour_class( $classes ) {
		$header_behavior = noizzy_edge_get_meta_field_intersect( 'header_behaviour', noizzy_edge_get_page_id() );
		
		if ( ! empty( $header_behavior ) ) {
			$classes[] = 'edge-' . $header_behavior;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'noizzy_edge_sticky_header_behaviour_class' );
}

if ( ! function_exists( 'noizzy_edge_menu_dropdown_appearance' ) ) {
	/**
	 * Function that adds menu dropdown appearance class to body tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added menu dropdown appearance class
	 */
	function noizzy_edge_menu_dropdown_appearance( $classes ) {
		$dropdown_menu_appearance = noizzy_edge_options()->getOptionValue( 'menu_dropdown_appearance' );
		
		if ( $dropdown_menu_appearance !== 'default' ) {
			$classes[] = 'edge-' . $dropdown_menu_appearance;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'noizzy_edge_menu_dropdown_appearance' );
}

if ( ! function_exists( 'noizzy_edge_header_class' ) ) {
	/**
	 * Function that adds class to header based on theme options
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added header class
	 */
	function noizzy_edge_header_class( $classes ) {
		$id = noizzy_edge_get_page_id();
		
		$header_type = noizzy_edge_get_meta_field_intersect( 'header_type', $id );
		
		$classes[] = 'edge-' . $header_type;
		
		$disable_menu_area_shadow = noizzy_edge_get_meta_field_intersect( 'menu_area_shadow', $id ) == 'no';
		if ( $disable_menu_area_shadow ) {
			$classes[] = 'edge-menu-area-shadow-disable';
		}
		
		$disable_menu_area_grid_shadow = noizzy_edge_get_meta_field_intersect( 'menu_area_in_grid_shadow', $id ) == 'no';
		if ( $disable_menu_area_grid_shadow ) {
			$classes[] = 'edge-menu-area-in-grid-shadow-disable';
		}
		
		$disable_menu_area_border = noizzy_edge_get_meta_field_intersect( 'menu_area_border', $id ) == 'no';
		if ( $disable_menu_area_border ) {
			$classes[] = 'edge-menu-area-border-disable';
		}
		
		$disable_menu_area_grid_border = noizzy_edge_get_meta_field_intersect( 'menu_area_in_grid_border', $id ) == 'no';
		if ( $disable_menu_area_grid_border ) {
			$classes[] = 'edge-menu-area-in-grid-border-disable';
		}
		
		if ( noizzy_edge_get_meta_field_intersect( 'menu_area_in_grid', $id ) == 'yes' &&
		     noizzy_edge_get_meta_field_intersect( 'menu_area_grid_background_color', $id ) !== '' &&
		     noizzy_edge_get_meta_field_intersect( 'menu_area_grid_background_transparency', $id ) !== '0'
		) {
			$classes[] = 'edge-header-menu-area-in-grid-padding';
		}
		
		$disable_logo_area_border = noizzy_edge_get_meta_field_intersect( 'logo_area_border', $id ) == 'no';
		if ( $disable_logo_area_border ) {
			$classes[] = 'edge-logo-area-border-disable';
		}
		
		$disable_logo_area_grid_border = noizzy_edge_get_meta_field_intersect( 'logo_area_in_grid_border', $id ) == 'no';
		if ( $disable_logo_area_grid_border ) {
			$classes[] = 'edge-logo-area-in-grid-border-disable';
		}
		
		if ( noizzy_edge_get_meta_field_intersect( 'logo_area_in_grid', $id ) == 'yes' &&
		     noizzy_edge_get_meta_field_intersect( 'logo_area_grid_background_color', $id ) !== '' &&
		     noizzy_edge_get_meta_field_intersect( 'logo_area_grid_background_transparency', $id ) !== '0'
		) {
			$classes[] = 'edge-header-logo-area-in-grid-padding';
		}
		
		$disable_shadow_vertical = noizzy_edge_get_meta_field_intersect( 'vertical_header_shadow', $id ) == 'no';
		if ( $disable_shadow_vertical ) {
			$classes[] = 'edge-header-vertical-shadow-disable';
		}
		
		$disable_border_vertical = noizzy_edge_get_meta_field_intersect( 'vertical_header_border', $id ) == 'no';
		if ( $disable_border_vertical ) {
			$classes[] = 'edge-header-vertical-border-disable';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'noizzy_edge_header_class' );
}

if ( ! function_exists( 'noizzy_edge_header_area_style' ) ) {
	/**
	 * Function that return styles for header area
	 */
	function noizzy_edge_header_area_style( $style ) {
		$page_id      = noizzy_edge_get_page_id();
		$class_prefix = noizzy_edge_get_unique_page_class( $page_id, true );
		
		$current_style = '';
		
		$menu_area_style              = array();
		$menu_area_grid_style         = array();
		$menu_area_enable_border      = get_post_meta( $page_id, 'edge_menu_area_border_meta', true ) == 'yes';
		$menu_area_enable_grid_border = get_post_meta( $page_id, 'edge_menu_area_in_grid_border_meta', true ) == 'yes';
		$menu_area_enable_shadow      = get_post_meta( $page_id, 'edge_menu_area_shadow_meta', true ) == 'yes';
		$menu_area_enable_grid_shadow = get_post_meta( $page_id, 'edge_menu_area_in_grid_shadow_meta', true ) == 'yes';
		
		$menu_area_selector      = array( $class_prefix . ' .edge-page-header .edge-menu-area' );
		$menu_area_grid_selector = array( $class_prefix . ' .edge-page-header .edge-menu-area .edge-grid .edge-vertical-align-containers' );
		
		/* menu area style - start */
		
		$menu_area_background_color        = get_post_meta( $page_id, 'edge_menu_area_background_color_meta', true );
		$menu_area_background_transparency = get_post_meta( $page_id, 'edge_menu_area_background_transparency_meta', true );
		
		if ( $menu_area_background_transparency === '' ) {
			$menu_area_background_transparency = 1;
		}
		
		$menu_area_background_color_rgba = noizzy_edge_rgba_color( $menu_area_background_color, $menu_area_background_transparency );
		
		if ( ! empty( $menu_area_background_color_rgba ) ) {
			$menu_area_style['background-color'] = $menu_area_background_color_rgba;
		}
		
		if ( $menu_area_enable_shadow ) {
			$menu_area_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
		}
		
		if ( $menu_area_enable_border ) {
			$header_border_color = get_post_meta( $page_id, 'edge_menu_area_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$menu_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		
		$menu_container_selector = array(
			$class_prefix . ' .edge-page-header .edge-vertical-align-containers',
			$class_prefix . ' .edge-top-bar .edge-vertical-align-containers'
		);
		$menu_container_styles   = array();
		$container_side_padding  = get_post_meta( $page_id, 'edge_menu_area_side_padding_meta', true );
		
		if ( $container_side_padding !== '' ) {
			if ( noizzy_edge_string_ends_with( $container_side_padding, 'px' ) || noizzy_edge_string_ends_with( $container_side_padding, '%' ) ) {
				$menu_container_styles['padding-left']  = $container_side_padding;
				$menu_container_styles['padding-right'] = $container_side_padding;
			} else {
				$menu_container_styles['padding-left']  = noizzy_edge_filter_px( $container_side_padding ) . 'px';
				$menu_container_styles['padding-right'] = noizzy_edge_filter_px( $container_side_padding ) . 'px';
			}
			
			$current_style .= noizzy_edge_dynamic_css( $menu_container_selector, $menu_container_styles );
		}
		
		/* menu area style - end */
		
		/* menu area in grid style - start */
		
		if ( $menu_area_enable_grid_shadow ) {
			$menu_area_grid_style['box-shadow'] = '0 1px 3px rgba(0,0,0,0.15)';
		}
		
		if ( $menu_area_enable_grid_border ) {
			$header_grid_border_color = get_post_meta( $page_id, 'edge_menu_area_in_grid_border_color_meta', true );
			
			if ( $header_grid_border_color !== '' ) {
				$menu_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$menu_area_grid_background_color        = get_post_meta( $page_id, 'edge_menu_area_grid_background_color_meta', true );
		$menu_area_grid_background_transparency = get_post_meta( $page_id, 'edge_menu_area_grid_background_transparency_meta', true );
		
		if ( $menu_area_grid_background_transparency === '' ) {
			$menu_area_grid_background_transparency = 1;
		}
		
		$menu_area_grid_background_color_rgba = noizzy_edge_rgba_color( $menu_area_grid_background_color, $menu_area_grid_background_transparency );
		
		if ( ! empty( $menu_area_grid_background_color_rgba ) ) {
			$menu_area_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
		}
		
		$current_style .= noizzy_edge_dynamic_css( $menu_area_selector, $menu_area_style );
		$current_style .= noizzy_edge_dynamic_css( $menu_area_grid_selector, $menu_area_grid_style );
		
		/* menu area in grid style - end */
		
		/* main menu dropdown area style - start */
		
		$dropdown_top_position = get_post_meta( $page_id, 'edge_dropdown_top_position_meta', true );
		
		$dropdown_styles = array();
		if ( $dropdown_top_position !== '' ) {
			$dropdown_styles['top'] = noizzy_edge_filter_suffix( $dropdown_top_position, '%' ) . '%';
		}
		
		$dropdown_selector = array( $class_prefix . ' .edge-page-header .edge-drop-down .second' );
		
		$current_style .= noizzy_edge_dynamic_css( $dropdown_selector, $dropdown_styles );
		
		/* main menu dropdown area style - end */
		
		/* logo area style - start */
		
		$logo_area_style              = array();
		$logo_area_grid_style         = array();
		$logo_area_enable_border      = get_post_meta( $page_id, 'edge_logo_area_border_meta', true ) == 'yes';
		$logo_area_enable_grid_border = get_post_meta( $page_id, 'edge_logo_area_in_grid_border_meta', true ) == 'yes';
		
		$logo_area_selector      = array( $class_prefix . ' .edge-page-header .edge-logo-area' );
		$logo_area_grid_selector = array( $class_prefix . ' .edge-page-header .edge-logo-area .edge-grid .edge-vertical-align-containers' );
		
		$logo_area_background_color        = get_post_meta( $page_id, 'edge_logo_area_background_color_meta', true );
		$logo_area_background_transparency = get_post_meta( $page_id, 'edge_logo_area_background_transparency_meta', true );
		
		if ( $logo_area_background_transparency === '' ) {
			$logo_area_background_transparency = 1;
		}
		
		$logo_area_background_color_rgba = noizzy_edge_rgba_color( $logo_area_background_color, $logo_area_background_transparency );
		
		if ( ! empty( $logo_area_background_color_rgba ) ) {
			$logo_area_style['background-color'] = $logo_area_background_color_rgba;
		}
		
		if ( $logo_area_enable_border ) {
			$header_border_color = get_post_meta( $page_id, 'edge_logo_area_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$logo_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		/* logo area style - end */
		
		/* logo area in grid style - start */
		
		if ( $logo_area_enable_grid_border ) {
			$header_grid_border_color = get_post_meta( $page_id, 'edge_logo_area_in_grid_border_color_meta', true );
			
			if ( $header_grid_border_color !== '' ) {
				$logo_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$logo_area_grid_background_color        = get_post_meta( $page_id, 'edge_logo_area_grid_background_color_meta', true );
		$logo_area_grid_background_transparency = get_post_meta( $page_id, 'edge_logo_area_grid_background_transparency_meta', true );
		
		if ( $logo_area_grid_background_transparency === '' ) {
			$logo_area_grid_background_transparency = 1;
		}
		
		$logo_area_grid_background_color_rgba = noizzy_edge_rgba_color( $logo_area_grid_background_color, $logo_area_grid_background_transparency );
		
		if ( ! empty( $logo_area_grid_background_color_rgba ) ) {
			$logo_area_grid_style['background-color'] = $logo_area_grid_background_color_rgba;
		}
		
		/* logo area in grid style - end */
		
		if ( ! empty( $logo_area_style ) ) {
			$current_style .= noizzy_edge_dynamic_css( $logo_area_selector, $logo_area_style );
		}
		
		if ( ! empty( $logo_area_grid_style ) ) {
			$current_style .= noizzy_edge_dynamic_css( $logo_area_grid_selector, $logo_area_grid_style );
		}
		
		$current_style = apply_filters( 'noizzy_edge_add_header_page_custom_style', $current_style, $class_prefix, $page_id ) . $style;
		
		return $current_style;
	}
	
	add_filter( 'noizzy_edge_add_page_custom_style', 'noizzy_edge_header_area_style' );
}

if ( ! function_exists( 'noizzy_edge_menu_icon' ) ) {

    function noizzy_edge_menu_icon( ) {
        ?>
        <svg class="edge-menu-opener-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="42.141px" height="42.125px" viewBox="0 0 42.141 42.125" enable-background="new 0 0 42.141 42.125" xml:space="preserve">
        <circle fill="none" stroke="currentColor" stroke-width="3" stroke-miterlimit="10" cx="21.07" cy="21.063" r="19.528"/>
                    <circle fill="currentColor" cx="21.07" cy="21.063" r="3"/>
        </svg>
        <?php
    }
}