<?php
/*
Template Name: Full Width Template
*/
?>
<?php
$edge_sidebar_layout = noizzy_edge_sidebar_layout();

get_header();
noizzy_edge_get_title();
get_template_part( 'slider' );
do_action('noizzy_edge_before_main_content');
?>

<div class="edge-full-width">
    <?php do_action( 'noizzy_edge_after_container_open' ); ?>
	<div class="edge-full-width-inner">
        <?php do_action( 'noizzy_edge_after_container_inner_open' ); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="edge-grid-row">
				<div <?php echo noizzy_edge_get_content_sidebar_class(); ?>>
					<?php
						the_content();
						do_action( 'noizzy_edge_page_after_content' );
					?>
				</div>
				<?php if ( $edge_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo noizzy_edge_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
        <?php do_action( 'noizzy_edge_before_container_inner_close' ); ?>
	</div>

    <?php do_action( 'noizzy_edge_before_container_close' ); ?>
</div>

<?php get_footer(); ?>