<div class="edge-grid-row">
	<div <?php echo noizzy_edge_get_content_sidebar_class(); ?>>
		<div class="edge-search-page-holder">
			<?php noizzy_edge_get_search_page_layout(); ?>
		</div>
		<?php do_action( 'noizzy_edge_page_after_content' ); ?>
	</div>
	<?php if ( $sidebar_layout !== 'no-sidebar' ) { ?>
		<div <?php echo noizzy_edge_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>