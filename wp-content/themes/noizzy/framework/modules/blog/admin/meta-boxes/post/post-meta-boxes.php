<?php

/*** Post Settings ***/

if (!function_exists('noizzy_edge_map_post_meta')) {
    function noizzy_edge_map_post_meta() {

        $post_meta_box = noizzy_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Post', 'noizzy'),
                'name'  => 'post-meta'
            )
        );

        noizzy_edge_create_meta_box_field(
            array(
                'name'          => 'edge_blog_single_sidebar_layout_meta',
                'type'          => 'select',
                'label'         => esc_html__('Sidebar Layout', 'noizzy'),
                'description'   => esc_html__('Choose a sidebar layout for Blog single page', 'noizzy'),
                'default_value' => '',
                'parent'        => $post_meta_box,
                'options'       => noizzy_edge_get_custom_sidebars_options(true)
            )
        );

        $noizzy_custom_sidebars = noizzy_edge_get_custom_sidebars();
        if (count($noizzy_custom_sidebars) > 0) {
            noizzy_edge_create_meta_box_field(array(
                'name'        => 'edge_blog_single_custom_sidebar_area_meta',
                'type'        => 'selectblank',
                'label'       => esc_html__('Sidebar to Display', 'noizzy'),
                'description' => esc_html__('Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'noizzy'),
                'parent'      => $post_meta_box,
                'options'     => noizzy_edge_get_custom_sidebars(),
                'args'        => array(
                    'select2' => true
                )
            ));
        }

        noizzy_edge_create_meta_box_field(
            array(
                'name'        => 'edge_blog_single_show_featured_image_meta',
                'type'        => 'select',
                'label'       => esc_html__('Show Post Featured Image', 'noizzy'),
                'description' => esc_html__('Choose if you want to show featured image for this post. Can be used in case to hide embeded audio post\'s featured image', 'noizzy'),
                'parent'      => $post_meta_box,
                'options'     => noizzy_edge_get_yes_no_select_array(false, true)
            )
        );

        noizzy_edge_create_meta_box_field(
            array(
                'name'        => 'edge_blog_list_featured_image_meta',
                'type'        => 'image',
                'label'       => esc_html__('Blog List Image', 'noizzy'),
                'description' => esc_html__('Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'noizzy'),
                'parent'      => $post_meta_box
            )
        );

        noizzy_edge_create_meta_box_field(
            array(
                'name'          => 'edge_blog_masonry_gallery_fixed_dimensions_meta',
                'type'          => 'select',
                'label'         => esc_html__('Dimensions for Fixed Proportion', 'noizzy'),
                'description'   => esc_html__('Choose image layout when it appears in Masonry lists in fixed proportion', 'noizzy'),
                'default_value' => 'small',
                'parent'        => $post_meta_box,
                'options'       => array(
                    'small'              => esc_html__('Small', 'noizzy'),
                    'large-width'        => esc_html__('Large Width', 'noizzy'),
                    'large-height'       => esc_html__('Large Height', 'noizzy'),
                    'large-width-height' => esc_html__('Large Width/Height', 'noizzy')
                )
            )
        );

        noizzy_edge_create_meta_box_field(
            array(
                'name'          => 'edge_blog_masonry_gallery_original_dimensions_meta',
                'type'          => 'select',
                'label'         => esc_html__('Dimensions for Original Proportion', 'noizzy'),
                'description'   => esc_html__('Choose image layout when it appears in Masonry lists in original proportion', 'noizzy'),
                'default_value' => 'default',
                'parent'        => $post_meta_box,
                'options'       => array(
                    'default'     => esc_html__('Default', 'noizzy'),
                    'large-width' => esc_html__('Large Width', 'noizzy')
                )
            )
        );

        noizzy_edge_create_meta_box_field(
            array(
                'name'          => 'edge_show_title_area_blog_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'noizzy'),
                'description'   => esc_html__('Enabling this option will show title area on your single post page', 'noizzy'),
                'parent'        => $post_meta_box,
                'options'       => noizzy_edge_get_yes_no_select_array()
            )
        );

        do_action('noizzy_edge_blog_post_meta', $post_meta_box);
    }

    add_action('noizzy_edge_meta_boxes_map', 'noizzy_edge_map_post_meta', 20);
}
