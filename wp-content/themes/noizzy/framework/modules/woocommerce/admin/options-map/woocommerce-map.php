<?php

if ( ! function_exists( 'noizzy_edge_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function noizzy_edge_woocommerce_options_map() {
		
		noizzy_edge_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'noizzy' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = noizzy_edge_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'noizzy' )
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edge_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'noizzy' ),
				'default_value' => 'edge-woocommerce-columns-3',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'noizzy' ),
				'options'       => array(
                    'edge-woocommerce-columns-2' => esc_html__( '2 Columns', 'noizzy' ),
					'edge-woocommerce-columns-3' => esc_html__( '3 Columns', 'noizzy' ),
					'edge-woocommerce-columns-4' => esc_html__( '4 Columns', 'noizzy' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edge_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'noizzy' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'noizzy' ),
				'default_value' => 'normal',
				'options'       => noizzy_edge_get_space_between_items_array(false, true, true, true),
				'parent'        => $panel_product_list,
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edge_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'noizzy' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'noizzy' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'noizzy' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'noizzy' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'edge_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'noizzy' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'noizzy' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edge_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'noizzy' ),
				'default_value' => 'h6',
				'options'       => noizzy_edge_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'woo_enable_percent_sign_value',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Percent Sign', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show percent value mark instead of sale label on products', 'noizzy' ),
				'parent'        => $panel_product_list
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = noizzy_edge_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'noizzy' )
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'noizzy' ),
				'parent'        => $panel_single_product,
				'options'       => noizzy_edge_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edge_single_product_title_tag',
				'default_value' => 'h2',
				'label'         => esc_html__( 'Single Product Title Tag', 'noizzy' ),
				'options'       => noizzy_edge_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '3',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'noizzy' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'noizzy' ),
					'3' => esc_html__( 'Three', 'noizzy' ),
					'2' => esc_html__( 'Two', 'noizzy' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'noizzy' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'noizzy' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'noizzy' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'noizzy' ),
				'parent'        => $panel_single_product,
				'options'       => noizzy_edge_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'noizzy' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'noizzy' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'noizzy' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edge_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'noizzy' ),
				'default_value' => 'edge-woocommerce-columns-3',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'noizzy' ),
				'options'       => array(
					'edge-woocommerce-columns-3' => esc_html__( '3 Columns', 'noizzy' ),
					'edge-woocommerce-columns-4' => esc_html__( '4 Columns', 'noizzy' )
				),
				'parent'        => $panel_single_product,
			)
		);

		do_action('noizzy_edge_woocommerce_additional_options_map');
	}
	
	add_action( 'noizzy_edge_options_map', 'noizzy_edge_woocommerce_options_map', 21 );
}