<?php
if($show_header_top) {
	do_action('noizzy_edge_before_header_top');
	?>
	
	<?php if($show_header_top_background_div){ ?>
		<div class="edge-top-bar-background"></div>
	<?php } ?>
	
	<div class="edge-top-bar">
		<?php do_action( 'noizzy_edge_after_header_top_html_open' ); ?>
		
		<?php if($top_bar_in_grid) : ?>
			<div class="edge-grid">
		<?php endif; ?>
				
			<div class="edge-vertical-align-containers">
				<div class="edge-position-left"><!--
				 --><div class="edge-position-left-inner">
						<?php if(is_active_sidebar('edge-top-bar-left')) : ?>
							<?php dynamic_sidebar('edge-top-bar-left'); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="edge-position-right"><!--
				 --><div class="edge-position-right-inner">
						<?php if(is_active_sidebar('edge-top-bar-right')) : ?>
							<?php dynamic_sidebar('edge-top-bar-right'); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
				
		<?php if($top_bar_in_grid) : ?>
			</div>
		<?php endif; ?>
		
		<?php do_action( 'noizzy_edge_before_header_top_html_close' ); ?>
	</div>
	
	<?php do_action('noizzy_edge_after_header_top');
}