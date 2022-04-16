<?php
/*
Template Name: Coming Soon Page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * noizzy_edge_header_meta hook
	 *
	 * @see noizzy_edge_header_meta() - hooked with 10
	 * @see noizzy_edge_user_scalable_meta() - hooked with 10
	 * @see noizzy_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'noizzy_edge_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * noizzy_edge_after_body_tag hook
	 *
	 * @see noizzy_edge_get_side_area() - hooked with 10
	 * @see noizzy_edge_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'noizzy_edge_after_body_tag' ); ?>

	<div class="edge-wrapper">
		<div class="edge-wrapper-inner">
			<div class="edge-content">
				<div class="edge-content-inner">
					<?php get_template_part( 'slider' ); ?>
					<div class="edge-full-width">
						<div class="edge-full-width-inner">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>