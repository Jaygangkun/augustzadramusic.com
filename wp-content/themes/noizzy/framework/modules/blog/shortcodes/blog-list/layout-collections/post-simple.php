<li class="edge-bl-item edge-item-space clearfix">
	<div class="edge-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			noizzy_edge_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
		<div class="edge-bli-content">
			<?php noizzy_edge_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
			<?php noizzy_edge_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params ); ?>
		</div>
	</div>
</li>