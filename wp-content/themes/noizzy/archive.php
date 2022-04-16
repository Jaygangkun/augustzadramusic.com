<?php
$edge_blog_type = noizzy_edge_get_archive_blog_list_layout();
noizzy_edge_include_blog_helper_functions( 'lists', $edge_blog_type );
$edge_holder_params = noizzy_edge_get_holder_params_blog();

get_header();
noizzy_edge_get_title();
do_action('noizzy_edge_before_main_content');
?>

<div class="<?php echo esc_attr( $edge_holder_params['holder'] ); ?>">
	<?php do_action( 'noizzy_edge_after_container_open' ); ?>
	
	<div class="<?php echo esc_attr( $edge_holder_params['inner'] ); ?>">
		<?php noizzy_edge_get_blog( $edge_blog_type ); ?>
	</div>
	
	<?php do_action( 'noizzy_edge_before_container_close' ); ?>
</div>

<?php do_action( 'noizzy_edge_blog_list_additional_tags' ); ?>
<?php get_footer(); ?>