<section class="edge-side-menu">
	<a <?php noizzy_edge_class_attribute( $side_area_close_icon_class ); ?> href="#">
		<span class="edge-side-close-wrap"></span>
	</a>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>