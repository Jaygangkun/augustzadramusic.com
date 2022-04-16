<?php do_action('noizzy_edge_before_mobile_header'); ?>

<header class="edge-mobile-header">
	<?php do_action('noizzy_edge_after_mobile_header_html_open'); ?>
	
	<div class="edge-mobile-header-inner">
		<div class="edge-mobile-header-holder">
			<div class="edge-grid">
				<div class="edge-vertical-align-containers">
					<div class="edge-position-left"><!--
					 --><div class="edge-position-left-inner">
							<?php noizzy_edge_get_mobile_logo(); ?>
						</div>
					</div>
					<div class="edge-position-right"><!--
					 --><div class="edge-position-right-inner">
							<a href="javascript:void(0)" <?php noizzy_edge_class_attribute( $fullscreen_menu_icon_class ); ?>>
								<span class="edge-fullscreen-menu-close-icon">
									<?php echo noizzy_edge_get_fullscreen_menu_close_icon_html(); ?>
								</span>
								<span class="edge-fullscreen-menu-opener-icon">
									<?php echo noizzy_edge_get_fullscreen_menu_icon_html(); ?>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php do_action('noizzy_edge_before_mobile_header_html_close'); ?>
</header>

<?php do_action('noizzy_edge_after_mobile_header'); ?>