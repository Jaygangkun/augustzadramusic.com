<?php

if ( ! function_exists( 'noizzy_edge_register_widgets' ) ) {
    function noizzy_edge_register_widgets() {
        $widgets = apply_filters( 'noizzy_edge_register_widgets', $widgets = array() );

        if(noizzy_edge_core_plugin_installed()) {
            foreach ($widgets as $widget) {
                noizzy_edge_create_wp_widget($widget);
            }
        }
    }

    add_action( 'widgets_init', 'noizzy_edge_register_widgets' );
}