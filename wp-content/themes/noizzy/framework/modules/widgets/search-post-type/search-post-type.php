<?php

class NoizzyEdgeSearchPostType extends NoizzyEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edge_search_post_type',
			esc_html__( 'Noizzy Search Post Type', 'noizzy' ),
			array( 'description' => esc_html__( 'Select post type that you want to be searched for', 'noizzy' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$post_types = apply_filters( 'noizzy_edge_search_post_type_widget_params_post_type', array( 'post' => esc_html__( 'Post', 'noizzy' ) ) );
		
		$this->params = array(
			array(
				'type'        => 'dropdown',
				'name'        => 'post_type',
				'title'       => esc_html__( 'Post Type', 'noizzy' ),
				'description' => esc_html__( 'Choose post type that you want to be searched for', 'noizzy' ),
				'options'     => $post_types
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$search_type_class = 'edge-search-post-type';
		$post_type         = $instance['post_type'];
		?>
		
		<div class="widget edge-search-post-type-widget">
			<div data-post-type="<?php echo esc_attr( $post_type ); ?>" <?php noizzy_edge_class_attribute( $search_type_class ); ?>>
				<input class="edge-post-type-search-field" value="" placeholder="<?php esc_attr_e( 'Search', 'noizzy' ) ?>">
				<i class="edge-search-icon edge-icon-linear-icons lnr lnr-magnifier" aria-hidden="true"></i>
				<i class="edge-search-loading fa fa-spinner fa-spin edge-hidden" aria-hidden="true"></i>
				<?php wp_nonce_field( 'qodef_search_post_types_nonce', 'qodef_search_post_types_nonce' ); ?>
			</div>
			<div class="edge-post-type-search-results"></div>
		</div>
	<?php }
}