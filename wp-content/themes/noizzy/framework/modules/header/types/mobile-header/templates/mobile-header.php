<?php do_action('noizzy_edge_before_mobile_header'); ?>

<header class="edge-mobile-header">
	<?php do_action('noizzy_edge_after_mobile_header_html_open'); ?>
	
	<div class="edge-mobile-header-inner">
		<div class="edge-mobile-header-holder">
			<div class="edge-grid">
				<div class="edge-vertical-align-containers">
					<div class="edge-vertical-align-containers">
						<?php if($show_navigation_opener) : ?>
							<div <?php noizzy_edge_class_attribute( $mobile_icon_class ); ?>>
								<a href="javascript:void(0)">
									<span class="edge-mobile-menu-icon">
										<?php echo noizzy_edge_get_mobile_navigation_icon_html(); ?>
									</span>
									<?php if(!empty($mobile_menu_title)) { ?>
										<h5 class="edge-mobile-menu-text"><?php echo esc_attr($mobile_menu_title); ?></h5>
									<?php } ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="edge-position-center"><!--
						 --><div class="edge-position-center-inner">
								<?php noizzy_edge_get_mobile_logo(); ?>
							</div>
						</div>
						<div class="edge-position-right"><!--
						 --><div class="edge-position-right-inner">
								<?php if(is_active_sidebar('edge-right-from-mobile-logo')) {
									dynamic_sidebar('edge-right-from-mobile-logo');
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php noizzy_edge_get_mobile_nav(); ?>
	</div>
	
	<?php do_action('noizzy_edge_before_mobile_header_html_close'); ?>
</header>

<?php do_action('noizzy_edge_after_mobile_header'); ?>