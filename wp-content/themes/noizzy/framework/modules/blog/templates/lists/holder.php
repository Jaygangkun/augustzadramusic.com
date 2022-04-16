<div class="edge-grid-row <?php echo esc_attr($holder_classes); ?>">
	<div <?php echo noizzy_edge_get_content_sidebar_class(); ?>>
		<?php noizzy_edge_get_blog_type($blog_type); ?>
        <?php noizzy_edge_get_module_template_part( 'templates/parts/pagination/pagination', 'blog', '', $params ); ?>
	</div>
	<?php if($sidebar_layout !== 'no-sidebar') { ?>
		<div <?php echo noizzy_edge_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>