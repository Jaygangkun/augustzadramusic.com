<?php

if (!function_exists('noizzy_edge_side_area_slide_from_right_type_style')) {

    function noizzy_edge_side_area_slide_from_right_type_style() {

        if (noizzy_edge_options()->getOptionValue('side_area_type') == 'side-menu-slide-from-right') {

            if (noizzy_edge_options()->getOptionValue('side_area_width') !== '') {
                echo noizzy_edge_dynamic_css('.edge-side-menu-slide-from-right .edge-side-menu', array(
                    'right' => '-' . noizzy_edge_options()->getOptionValue('side_area_width'),
                    'width' => noizzy_edge_options()->getOptionValue('side_area_width')
                ));
            }

            if (noizzy_edge_options()->getOptionValue('side_area_content_overlay_color') !== '') {

                echo noizzy_edge_dynamic_css('.edge-side-menu-slide-from-right .edge-wrapper .edge-cover', array(
                    'background-color' => noizzy_edge_options()->getOptionValue('side_area_content_overlay_color')
                ));

            }

            if (noizzy_edge_options()->getOptionValue('side_area_content_overlay_opacity') !== '') {

                echo noizzy_edge_dynamic_css('.edge-side-menu-slide-from-right.edge-right-side-menu-opened .edge-wrapper .edge-cover', array(
                    'opacity' => noizzy_edge_options()->getOptionValue('side_area_content_overlay_opacity')
                ));

            }
        }

    }

    add_action('noizzy_edge_style_dynamic', 'noizzy_edge_side_area_slide_from_right_type_style');

}

if (!function_exists('noizzy_edge_side_area_slide_with_content_type_style')) {

    function noizzy_edge_side_area_slide_with_content_type_style() {

        if (noizzy_edge_options()->getOptionValue('side_area_type') == 'side-menu-slide-with-content') {

            if (noizzy_edge_options()->getOptionValue('side_area_width') !== '') {
                echo noizzy_edge_dynamic_css('.edge-side-menu-slide-with-content .edge-side-menu', array(
                    'right' => '-' . noizzy_edge_options()->getOptionValue('side_area_width'),
                    'width' => noizzy_edge_options()->getOptionValue('side_area_width')
                ));

                $side_menu_open_classes = array(
                    '.edge-side-menu-slide-with-content.edge-side-menu-open .edge-wrapper',
                    '.edge-side-menu-slide-with-content.edge-side-menu-open footer.uncover',
                    '.edge-side-menu-slide-with-content.edge-side-menu-open .edge-sticky-header',
                    '.edge-side-menu-slide-with-content.edge-side-menu-open .edge-fixed-wrapper',
                    '.edge-side-menu-slide-with-content.edge-side-menu-open .edge-mobile-header-inner',
                );

                echo noizzy_edge_dynamic_css($side_menu_open_classes, array(
                    'left' => '-' . noizzy_edge_options()->getOptionValue('side_area_width'),
                ));
            }

        }

    }

    add_action('noizzy_edge_style_dynamic', 'noizzy_edge_side_area_slide_with_content_type_style');

}

if (!function_exists('noizzy_edge_side_area_uncovered_from_content_type_style')) {

    function noizzy_edge_side_area_uncovered_from_content_type_style() {

        if (noizzy_edge_options()->getOptionValue('side_area_type') == 'side-area-uncovered-from-content') {

            if (noizzy_edge_options()->getOptionValue('side_area_width') !== '') {
                echo noizzy_edge_dynamic_css('.edge-side-area-uncovered-from-content .edge-side-menu', array(
                    'width' => noizzy_edge_options()->getOptionValue('side_area_width')
                ));

                $side_menu_open_classes = array(
                    '.edge-side-area-uncovered-from-content.edge-right-side-menu-opened .edge-wrapper',
                    '.edge-side-area-uncovered-from-content.edge-right-side-menu-opened footer.uncover',
                    '.edge-side-area-uncovered-from-content.edge-right-side-menu-opened .edge-sticky-header',
                    '.edge-side-area-uncovered-from-content.edge-right-side-menu-opened .edge-fixed-wrapper.fixed',
                    '.edge-side-area-uncovered-from-content.edge-right-side-menu-opened .edge-mobile-header-inner',
                    '.edge-side-area-uncovered-from-content.edge-right-side-menu-opened .mobile-header-appear .edge-mobile-header-inner',
                );

                echo noizzy_edge_dynamic_css($side_menu_open_classes, array(
                    'left' => '-' . noizzy_edge_options()->getOptionValue('side_area_width'),
                ));
            }

        }

    }

    add_action('noizzy_edge_style_dynamic', 'noizzy_edge_side_area_uncovered_from_content_type_style');

}

if (!function_exists('noizzy_edge_side_area_icon_color_styles')) {
    function noizzy_edge_side_area_icon_color_styles() {
        $icon_color = noizzy_edge_options()->getOptionValue('side_area_icon_color');
        $icon_hover_color = noizzy_edge_options()->getOptionValue('side_area_icon_hover_color');
        $close_icon_color = noizzy_edge_options()->getOptionValue('side_area_close_icon_color');
        $close_icon_hover_color = noizzy_edge_options()->getOptionValue('side_area_close_icon_hover_color');

        $icon_hover_selector = array(
            '.edge-side-menu-button-opener:hover',
            '.edge-side-menu-button-opener.opened'
        );

        if (!empty($icon_color)) {
            echo noizzy_edge_dynamic_css('.edge-side-menu-button-opener', array(
                'color' => $icon_color
            ));
        }

        if (!empty($icon_hover_color)) {
            echo noizzy_edge_dynamic_css($icon_hover_selector, array(
                'color' => $icon_hover_color
            ));
        }

        if (!empty($close_icon_color)) {
            echo noizzy_edge_dynamic_css('.edge-side-menu a.edge-close-side-menu', array(
                'color' => $close_icon_color
            ));
        }

        if (!empty($close_icon_hover_color)) {
            echo noizzy_edge_dynamic_css('.edge-side-menu a.edge-close-side-menu:hover', array(
                'color' => $close_icon_hover_color
            ));
        }
    }

    add_action('noizzy_edge_style_dynamic', 'noizzy_edge_side_area_icon_color_styles');
}

if (!function_exists('noizzy_edge_side_area_styles')) {
    function noizzy_edge_side_area_styles() {
        $side_area_styles = array();
        $background_image = noizzy_edge_options()->getOptionValue('side_area_background_image');
        $background_color = noizzy_edge_options()->getOptionValue('side_area_background_color');
        $padding = noizzy_edge_options()->getOptionValue('side_area_padding');
        $text_alignment = noizzy_edge_options()->getOptionValue('side_area_aligment');

        if ( ! empty( $background_image ) ) {
            $side_area_styles['background-image'] = 'url(' . $background_image . ')';
            $side_area_styles['background-position'] = 'center center';
            $side_area_styles['background-repeat'] = 'repeat';
        }

        if (!empty($background_color)) {
            $side_area_styles['background-color'] = $background_color;
        }

        if (!empty($padding)) {
            $side_area_styles['padding'] = esc_attr($padding);
        }

        if (!empty($text_alignment)) {
            $side_area_styles['text-align'] = $text_alignment;
        }

        if (!empty($side_area_styles)) {
            echo noizzy_edge_dynamic_css('.edge-side-menu', $side_area_styles);
        }

        if ($text_alignment === 'center') {
            echo noizzy_edge_dynamic_css('.edge-side-menu .widget img', array(
                'margin' => '0 auto'
            ));
        }
    }

    add_action('noizzy_edge_style_dynamic', 'noizzy_edge_side_area_styles');
}