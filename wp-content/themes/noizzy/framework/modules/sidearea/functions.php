<?php
if (!function_exists('noizzy_edge_register_side_area_sidebar')) {
    /**
     * Register side area sidebar
     */
    function noizzy_edge_register_side_area_sidebar() {
        register_sidebar(
            array(
                'id'            => 'sidearea',
                'name'          => esc_html__('Side Area', 'noizzy'),
                'description'   => esc_html__('Side Area', 'noizzy'),
                'before_widget' => '<div id="%1$s" class="widget edge-sidearea %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="edge-widget-title-holder"><h4 class="edge-widget-title">',
                'after_title'   => '</h4></div>'
            )
        );
    }

    add_action('widgets_init', 'noizzy_edge_register_side_area_sidebar');
}

if (!function_exists('noizzy_edge_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function noizzy_edge_side_menu_body_class($classes) {

        if (is_active_widget(false, false, 'edge_side_area_opener')) {

            if (noizzy_edge_options()->getOptionValue('side_area_type')) {

                $classes[] = 'edge-' . noizzy_edge_options()->getOptionValue('side_area_type');

            }

        }

        return $classes;
    }

    add_filter('body_class', 'noizzy_edge_side_menu_body_class');
}

if (!function_exists('noizzy_edge_get_side_area')) {
    /**
     * Loads side area HTML
     */
    function noizzy_edge_get_side_area() {

        if (is_active_widget(false, false, 'edge_side_area_opener')) {

            $parameters = array(
                'side_area_close_icon_class' => noizzy_edge_get_side_area_close_icon_class()
            );

            noizzy_edge_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);
        }
    }

    add_action('noizzy_edge_after_body_tag', 'noizzy_edge_get_side_area', 10);
}

if (!function_exists('noizzy_edge_get_side_area_close_class')) {
    /**
     * Loads side area close icon class
     */
    function noizzy_edge_get_side_area_close_icon_class() {

        $side_area_icon_source = noizzy_edge_options()->getOptionValue('side_area_icon_source');

        $side_area_close_icon_class_array = array(
            'edge-close-side-menu'
        );

        $side_area_close_icon_class_array[] = $side_area_icon_source == 'icon_pack' ? 'edge-close-side-menu-icon-pack' : 'edge-close-side-menu-svg-path';

        return $side_area_close_icon_class_array;
    }
}

if (!function_exists('noizzy_edge_get_side_area_close_icon_html')) {
    /**
     * Loads side area close icon HTML
     */
    function noizzy_edge_get_side_area_close_icon_html() {

        $side_area_icon_source = noizzy_edge_options()->getOptionValue('side_area_icon_source');
        $side_area_icon_pack = noizzy_edge_options()->getOptionValue('side_area_icon_pack');
        $side_area_close_icon_svg_path = noizzy_edge_options()->getOptionValue('side_area_close_icon_svg_path');

        $side_area_close_icon_html = '';

        if (($side_area_icon_source == 'icon_pack') && isset($side_area_icon_pack)) {
            $side_area_close_icon_html .= noizzy_edge_icon_collections()->getMenuCloseIcon($side_area_icon_pack);
        } else if (isset($side_area_close_icon_svg_path)) {
            $side_area_close_icon_html .= $side_area_close_icon_svg_path;
        }

        return $side_area_close_icon_html;
    }
}