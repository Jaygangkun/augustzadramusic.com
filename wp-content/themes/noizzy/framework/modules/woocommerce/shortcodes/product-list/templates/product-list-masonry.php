<div class="edge-pl-holder <?php echo esc_attr( $holder_classes ) ?>">
	<div class="edge-pl-outer edge-outer-space">
		<div class="edge-pl-sizer"></div>
		<div class="edge-pl-gutter"></div>
		<?php if ( $query_result->have_posts() ): while ( $query_result->have_posts() ) : $query_result->the_post();
			echo noizzy_edge_get_woo_shortcode_module_template_part( 'templates/parts/' . $info_position, 'product-list', '', $params );
		endwhile;
		else:
			noizzy_edge_get_module_template_part( 'templates/parts/no-posts', 'woocommerce', '', $params );
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>