<?php

if ( ! function_exists( 'noizzy_edge_set_search_fullscreen_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function noizzy_edge_set_search_fullscreen_global_option( $search_type_options ) {
        $search_type_options['fullscreen'] = esc_html__( 'Fullscreen', 'noizzy' );

        return $search_type_options;
    }

    add_filter( 'noizzy_edge_search_type_global_option', 'noizzy_edge_set_search_fullscreen_global_option' );
}