<form role="search" method="get" class="searchform" id="searchform-<?php echo esc_attr(rand(0, 1000)); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search', 'noizzy' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search', 'noizzy' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'noizzy' ); ?>"/>
		<button type="submit" class="edge-search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
</form>