<?php

if ( ! function_exists( 'noizzy_edge_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function noizzy_edge_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'NoizzyEdge\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'noizzy_edge_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function noizzy_edge_init_register_header_standard_type() {
		add_filter( 'noizzy_edge_register_header_type_class', 'noizzy_edge_register_header_standard_type' );
	}
	
	add_action( 'noizzy_edge_before_header_function_init', 'noizzy_edge_init_register_header_standard_type' );
}


if ( ! function_exists( 'noizzy_edge_register_header_vertical_widgets' ) ) {
    /**
     * Registers additional widget areas for this header type
     */
    function noizzy_edge_register_header_vertical_widgets() {

        register_sidebar(
            array(
                'id'            => 'edge-header-vertical-widget-area',
                'name'          => esc_html__( 'Header Vertical Widget Area', 'noizzy' ),
                'description'   => esc_html__( 'This widget area is rendered below vertical menu', 'noizzy' ),
                'before_widget' => '<div class="%2$s edge-vertical-header-widget">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="edge-widget-title">',
                'after_title'   => '</h5>'
            )
        );
    }

    if ( noizzy_edge_check_is_header_type_enabled( 'header-vertical' ) ) {
        add_action( 'widgets_init', 'noizzy_edge_register_header_vertical_widgets' );
    }
}