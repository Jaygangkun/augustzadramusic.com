<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="edge-search-cover" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="edge-container">
		<div class="edge-container-inner clearfix">
	<?php } ?>
			<div class="edge-form-holder-outer">
				<div class="edge-form-holder">
					<div class="edge-form-holder-inner">
						<span class="edge-search-field-icon edge-icon-linear-icons lnr lnr-magnifier "></span>
						<input type="text" placeholder="<?php esc_attr_e( 'Type your search', 'noizzy' ); ?>" name="s" class="edge_search_field" autocomplete="off" />
						<a <?php noizzy_edge_class_attribute( $search_close_icon_class ); ?> href="#">
							<?php echo noizzy_edge_get_search_close_icon_html(); ?>
						</a>
					</div>
				</div>
			</div>
	<?php if ( $search_in_grid ) { ?>
		</div>
	</div>
	<?php } ?>
</form>