<?php
class NoizzyEdgeStickySidebar extends NoizzyEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edge_sticky_sidebar',
			esc_html__('Noizzy Sticky Sidebar Widget', 'noizzy'),
			array( 'description' => esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'noizzy'))
		);
		
		$this->setParams();
	}
	
	protected function setParams() {}
	
	public function widget( $args, $instance ) {
		echo '<div class="widget edge-widget-sticky-sidebar"></div>';
	}
}
