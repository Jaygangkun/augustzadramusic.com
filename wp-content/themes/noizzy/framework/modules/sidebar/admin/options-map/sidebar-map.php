<?php

if ( ! function_exists( 'noizzy_edge_sidebar_options_map' ) ) {
	function noizzy_edge_sidebar_options_map() {
		
		noizzy_edge_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'noizzy' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = noizzy_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'noizzy' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		noizzy_edge_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'noizzy' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'noizzy' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => noizzy_edge_get_custom_sidebars_options()
		) );
		
		$noizzy_custom_sidebars = noizzy_edge_get_custom_sidebars();
		if ( count( $noizzy_custom_sidebars ) > 0 ) {
			noizzy_edge_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'noizzy' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'noizzy' ),
				'parent'      => $sidebar_panel,
				'options'     => $noizzy_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'noizzy_edge_options_map', 'noizzy_edge_sidebar_options_map', 9 );
}