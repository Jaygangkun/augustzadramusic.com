<?php

class NoizzyEdgeSideAreaOpener extends NoizzyEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edge_side_area_opener',
			esc_html__( 'Noizzy Side Area Opener', 'noizzy' ),
			array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'noizzy' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'colorpicker',
				'name'        => 'icon_color',
				'title'       => esc_html__( 'Side Area Opener Color', 'noizzy' ),
				'description' => esc_html__( 'Define color for side area opener', 'noizzy' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'icon_hover_color',
				'title'       => esc_html__( 'Side Area Opener Hover Color', 'noizzy' ),
				'description' => esc_html__( 'Define hover color for side area opener', 'noizzy' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'widget_margin',
				'title'       => esc_html__( 'Side Area Opener Margin', 'noizzy' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'noizzy' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Side Area Opener Title', 'noizzy' )
			)
		);
	}
	
	public function widget( $args, $instance ) {

		$side_area_icon_source 	 	= noizzy_edge_options()->getOptionValue( 'side_area_icon_source' );
		$side_area_icon_pack 		= noizzy_edge_options()->getOptionValue( 'side_area_icon_pack' );
		$side_area_icon_svg_path 	= noizzy_edge_options()->getOptionValue( 'side_area_icon_svg_path' );

		$side_area_icon_class_array = array(
			'edge-side-menu-button-opener',
			'edge-icon-has-hover'
		);
	
		$side_area_icon_class_array[]  = $side_area_icon_source == 'icon_pack' ? 'edge-side-menu-button-opener-icon-pack' : 'edge-side-menu-button-opener-svg-path';

		$holder_styles = array();
		
		if ( ! empty( $instance['icon_color'] ) ) {
			$holder_styles[] = 'color: ' . $instance['icon_color'] . ';';
		}
		if ( ! empty( $instance['widget_margin'] ) ) {
			$holder_styles[] = 'margin: ' . $instance['widget_margin'];
		}

		?>
		
		<a <?php noizzy_edge_class_attribute( $side_area_icon_class_array ); ?> <?php echo noizzy_edge_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?> href="javascript:void(0)" <?php noizzy_edge_inline_style( $holder_styles ); ?>>
			<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
				<h5 class="edge-side-menu-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
			<?php } ?>
			<span class="edge-side-menu-icon">
				<?php  if ( ( $side_area_icon_source == 'icon_pack' ) && isset( $side_area_icon_pack ) ) {
                    noizzy_edge_menu_icon();
	        	} else if ( isset( $side_area_icon_svg_path ) ) {
	            	print noizzy_edge_options()->getOptionValue( 'side_area_icon_svg_path' );
	            }?>
            </span>
		</a>
	<?php }
}