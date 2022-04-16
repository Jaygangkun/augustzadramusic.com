<?php

if ( ! function_exists( 'noizzy_edge_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function noizzy_edge_reset_options_map() {
		
		noizzy_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'noizzy' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = noizzy_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'noizzy' )
			)
		);
		
		noizzy_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'noizzy' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'noizzy' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'noizzy_edge_options_map', 'noizzy_edge_reset_options_map', 100 );
}