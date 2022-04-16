<?php

if ( ! function_exists( 'noizzy_edge_map_woocommerce_meta' ) ) {
	function noizzy_edge_map_woocommerce_meta() {
		
		$woocommerce_meta_box = noizzy_edge_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'noizzy' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'        => 'edge_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'noizzy' ),
				'description' => esc_html__( 'Choose image layout when it appears in Edge Product List - Masonry layout shortcode', 'noizzy' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'noizzy' ),
					'small'              => esc_html__( 'Small', 'noizzy' ),
					'large-width'        => esc_html__( 'Large Width', 'noizzy' ),
					'large-height'       => esc_html__( 'Large Height', 'noizzy' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'noizzy' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'noizzy' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'noizzy' ),
				'options'       => noizzy_edge_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		noizzy_edge_create_meta_box_field(
			array(
				'name'          => 'edge_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'noizzy' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'noizzy_edge_meta_boxes_map', 'noizzy_edge_map_woocommerce_meta', 99 );
}