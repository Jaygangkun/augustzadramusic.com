<?php if($max_num_pages > 1) { ?>
	<div class="edge-blog-pag-loading">
		<div class="edge-blog-pag-bounce1"></div>
		<div class="edge-blog-pag-bounce2"></div>
		<div class="edge-blog-pag-bounce3"></div>
	</div>
	<div class="edge-blog-pag-load-more">
		<?php
			$button_params = array(
				'link' => 'javascript: void(0)',
				'text' => esc_html__( 'Load More', 'noizzy' )
			);
			
			echo noizzy_edge_return_button_html( $button_params );
		?>
	</div>
<?php
	$unique_id = rand( 1000, 9999 );
	wp_nonce_field( 'qodef_blog_load_more_nonce_' . $unique_id, 'qodef_blog_load_more_nonce_' . $unique_id );
}