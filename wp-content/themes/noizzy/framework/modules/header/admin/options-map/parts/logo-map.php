<?php

if ( ! function_exists( 'noizzy_edge_logo_options_map' ) ) {
	function noizzy_edge_logo_options_map() {
		
		noizzy_edge_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'noizzy' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = noizzy_edge_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'noizzy' )
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'noizzy' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'noizzy' )
			)
		);
		
		$hide_logo_container = noizzy_edge_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'noizzy' ),
				'parent'        => $hide_logo_container
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'noizzy' ),
				'parent'        => $hide_logo_container
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'noizzy' ),
				'parent'        => $hide_logo_container
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'noizzy' ),
				'parent'        => $hide_logo_container
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo_mobile.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'noizzy' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'noizzy_edge_options_map', 'noizzy_edge_logo_options_map', 2 );
}