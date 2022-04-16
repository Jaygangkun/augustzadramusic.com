<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$edge_sidebar_layout = noizzy_edge_sidebar_layout();

get_header();
noizzy_edge_get_title();
get_template_part( 'slider' );
do_action('noizzy_edge_before_main_content');

//Woocommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="edge-container">
		<div class="edge-container-inner clearfix">
			<div class="edge-grid-row">
				<div <?php echo noizzy_edge_get_content_sidebar_class(); ?>>
					<?php noizzy_edge_woocommerce_content(); ?>
				</div>
				<?php if ( $edge_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo noizzy_edge_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php 
		do_action( 'noizzy_edge_after_shop_loop_pagination' ); 
	?>
<?php } else { ?>
	<div class="edge-container">
		<div class="edge-container-inner clearfix">
			<?php noizzy_edge_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>