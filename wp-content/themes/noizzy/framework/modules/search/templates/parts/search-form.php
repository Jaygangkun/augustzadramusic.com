<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="edge-search-page-form" method="get">
	<h2 class="edge-search-title"><?php esc_html_e( 'New search:', 'noizzy' ); ?></h2>
	<div class="edge-form-holder">
		<div class="edge-column-left">
			<input type="text" name="s" class="edge-search-field" autocomplete="off" value="" placeholder="<?php esc_attr_e( 'Type here', 'noizzy' ); ?>"/>
		</div>
		<div class="edge-column-right">
			<button type="submit" class="edge-search-submit"><span class="edge-icon-linear-icons lnr lnr-magnifier"></span></button>
		</div>
	</div>
	<div class="edge-search-label">
		<?php esc_html_e( 'If you are not happy with the results below please do another search', 'noizzy' ); ?>
	</div>
</form>