<?php

if ( ! function_exists( 'noizzy_edge_content_responsive_styles' ) ) {
	/**
	 * Generates content responsive custom styles
	 */
	function noizzy_edge_content_responsive_styles() {
		$content_style = array();
		
		$padding_mobile = noizzy_edge_options()->getOptionValue( 'content_padding_mobile' );
		if ( $padding_mobile !== '' ) {
			$content_style['padding'] = $padding_mobile;
		}
		
		$content_selector = array(
			'.edge-content .edge-content-inner > .edge-container > .edge-container-inner',
			'.edge-content .edge-content-inner > .edge-full-width > .edge-full-width-inner',
		);
		
		echo noizzy_edge_dynamic_css( $content_selector, $content_style );
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_1024', 'noizzy_edge_content_responsive_styles' );
}

if ( ! function_exists( 'noizzy_edge_h1_responsive_styles3' ) ) {
	function noizzy_edge_h1_responsive_styles3() {
		$selector = array(
			'h1'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h1_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_768_1024', 'noizzy_edge_h1_responsive_styles3' );
}

if ( ! function_exists( 'noizzy_edge_h2_responsive_styles3' ) ) {
	function noizzy_edge_h2_responsive_styles3() {
		$selector = array(
			'h2'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h2_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_768_1024', 'noizzy_edge_h2_responsive_styles3' );
}

if ( ! function_exists( 'noizzy_edge_h3_responsive_styles3' ) ) {
	function noizzy_edge_h3_responsive_styles3() {
		$selector = array(
			'h3'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h3_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_768_1024', 'noizzy_edge_h3_responsive_styles3' );
}

if ( ! function_exists( 'noizzy_edge_h4_responsive_styles3' ) ) {
	function noizzy_edge_h4_responsive_styles3() {
		$selector = array(
			'h4'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h4_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_768_1024', 'noizzy_edge_h4_responsive_styles3' );
}

if ( ! function_exists( 'noizzy_edge_h5_responsive_styles3' ) ) {
	function noizzy_edge_h5_responsive_styles3() {
		$selector = array(
			'h5'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h5_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_768_1024', 'noizzy_edge_h5_responsive_styles3' );
}

if ( ! function_exists( 'noizzy_edge_h6_responsive_styles3' ) ) {
	function noizzy_edge_h6_responsive_styles3() {
		$selector = array(
			'h6'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h6_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_768_1024', 'noizzy_edge_h6_responsive_styles3' );
}

if ( ! function_exists( 'noizzy_edge_h1_responsive_styles' ) ) {
	function noizzy_edge_h1_responsive_styles() {
		$selector = array(
			'h1'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h1_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680_768', 'noizzy_edge_h1_responsive_styles' );
}

if ( ! function_exists( 'noizzy_edge_h2_responsive_styles' ) ) {
	function noizzy_edge_h2_responsive_styles() {
		$selector = array(
			'h2'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h2_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680_768', 'noizzy_edge_h2_responsive_styles' );
}

if ( ! function_exists( 'noizzy_edge_h3_responsive_styles' ) ) {
	function noizzy_edge_h3_responsive_styles() {
		$selector = array(
			'h3'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h3_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680_768', 'noizzy_edge_h3_responsive_styles' );
}

if ( ! function_exists( 'noizzy_edge_h4_responsive_styles' ) ) {
	function noizzy_edge_h4_responsive_styles() {
		$selector = array(
			'h4'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h4_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680_768', 'noizzy_edge_h4_responsive_styles' );
}

if ( ! function_exists( 'noizzy_edge_h5_responsive_styles' ) ) {
	function noizzy_edge_h5_responsive_styles() {
		$selector = array(
			'h5'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h5_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680_768', 'noizzy_edge_h5_responsive_styles' );
}

if ( ! function_exists( 'noizzy_edge_h6_responsive_styles' ) ) {
	function noizzy_edge_h6_responsive_styles() {
		$selector = array(
			'h6'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h6_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680_768', 'noizzy_edge_h6_responsive_styles' );
}

if ( ! function_exists( 'noizzy_edge_text_responsive_styles' ) ) {
	function noizzy_edge_text_responsive_styles() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'text', '_res1' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680_768', 'noizzy_edge_text_responsive_styles' );
}

if ( ! function_exists( 'noizzy_edge_h1_responsive_styles2' ) ) {
	function noizzy_edge_h1_responsive_styles2() {
		$selector = array(
			'h1'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h1_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680', 'noizzy_edge_h1_responsive_styles2' );
}

if ( ! function_exists( 'noizzy_edge_h2_responsive_styles2' ) ) {
	function noizzy_edge_h2_responsive_styles2() {
		$selector = array(
			'h2'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h2_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680', 'noizzy_edge_h2_responsive_styles2' );
}

if ( ! function_exists( 'noizzy_edge_h3_responsive_styles2' ) ) {
	function noizzy_edge_h3_responsive_styles2() {
		$selector = array(
			'h3'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h3_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680', 'noizzy_edge_h3_responsive_styles2' );
}

if ( ! function_exists( 'noizzy_edge_h4_responsive_styles2' ) ) {
	function noizzy_edge_h4_responsive_styles2() {
		$selector = array(
			'h4'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h4_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680', 'noizzy_edge_h4_responsive_styles2' );
}

if ( ! function_exists( 'noizzy_edge_h5_responsive_styles2' ) ) {
	function noizzy_edge_h5_responsive_styles2() {
		$selector = array(
			'h5'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h5_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680', 'noizzy_edge_h5_responsive_styles2' );
}

if ( ! function_exists( 'noizzy_edge_h6_responsive_styles2' ) ) {
	function noizzy_edge_h6_responsive_styles2() {
		$selector = array(
			'h6'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'h6_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680', 'noizzy_edge_h6_responsive_styles2' );
}

if ( ! function_exists( 'noizzy_edge_text_responsive_styles2' ) ) {
	function noizzy_edge_text_responsive_styles2() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = noizzy_edge_get_responsive_typography_styles( 'text', '_res2' );
		
		if ( ! empty( $styles ) ) {
			echo noizzy_edge_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'noizzy_edge_style_dynamic_responsive_680', 'noizzy_edge_text_responsive_styles2' );
}