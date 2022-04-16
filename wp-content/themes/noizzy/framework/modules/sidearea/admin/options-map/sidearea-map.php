<?php

if (!function_exists('noizzy_edge_sidearea_options_map')) {
    function noizzy_edge_sidearea_options_map() {

        noizzy_edge_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'noizzy'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = noizzy_edge_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'noizzy'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'noizzy'),
                'description'   => esc_html__('Choose a type of Side Area', 'noizzy'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'noizzy'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'noizzy'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'noizzy'),
                ),
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'noizzy'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 500px.', 'noizzy'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = noizzy_edge_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'noizzy'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'noizzy'),
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'noizzy'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'noizzy'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'noizzy'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'noizzy'),
                'options'       => noizzy_edge_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = noizzy_edge_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'noizzy'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'noizzy'),
                'options'       => noizzy_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = noizzy_edge_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'noizzy'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'noizzy'),
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'noizzy'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'noizzy'),
            )
        );

        $side_area_icon_style_group = noizzy_edge_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'noizzy'),
                'description' => esc_html__('Define styles for Side Area icon', 'noizzy')
            )
        );

        $side_area_icon_style_row1 = noizzy_edge_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'noizzy')
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'noizzy')
            )
        );

        $side_area_icon_style_row2 = noizzy_edge_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'noizzy')
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'noizzy')
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'image',
                'name'        => 'side_area_background_image',
                'label'       => esc_html__('Background Image', 'noizzy'),
                'description' => esc_html__('Choose a background image for Side Area', 'noizzy')
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'noizzy'),
                'description' => esc_html__('Choose a background color for Side Area', 'noizzy')
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'noizzy'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'noizzy'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        noizzy_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'noizzy'),
                'description'   => esc_html__('Choose text alignment for side area', 'noizzy'),
                'options'       => array(
                    ''       => esc_html__('Default', 'noizzy'),
                    'left'   => esc_html__('Left', 'noizzy'),
                    'center' => esc_html__('Center', 'noizzy'),
                    'right'  => esc_html__('Right', 'noizzy')
                )
            )
        );
    }

    add_action('noizzy_edge_options_map', 'noizzy_edge_sidearea_options_map', 15);
}