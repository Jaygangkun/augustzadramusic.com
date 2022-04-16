<?php

class NoizzyEdgeButtonWidget extends NoizzyEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edge_button_widget',
			esc_html__( 'Noizzy Button Widget', 'noizzy' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'noizzy' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'noizzy' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'noizzy' ),
					'outline' => esc_html__( 'Outline', 'noizzy' ),
					'simple'  => esc_html__( 'Simple', 'noizzy' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'noizzy' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'noizzy' ),
					'medium' => esc_html__( 'Medium', 'noizzy' ),
					'large'  => esc_html__( 'Large', 'noizzy' ),
					'huge'   => esc_html__( 'Huge', 'noizzy' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'noizzy' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'noizzy' ),
				'default' => esc_html__( 'Button Text', 'noizzy' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'noizzy' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'noizzy' ),
				'options' => noizzy_edge_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'noizzy' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'noizzy' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'noizzy' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'noizzy' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'noizzy' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'noizzy' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'noizzy' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'noizzy' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'noizzy' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'noizzy' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'noizzy' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'noizzy' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget edge-button-widget">';
			echo do_shortcode( "[edge_button $params]" ); // XSS OK
		echo '</div>';
	}
}