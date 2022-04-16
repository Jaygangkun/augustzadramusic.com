<?php do_action('noizzy_edge_before_page_header'); ?>

<header class="edge-page-header">
	<?php do_action('noizzy_edge_after_page_header_html_open'); ?>
	
	<?php if($show_fixed_wrapper) : ?>
		<div class="edge-fixed-wrapper">
	<?php endif; ?>
			
	<div class="edge-menu-area <?php echo esc_attr($menu_area_position_class); ?>">
		<?php do_action('noizzy_edge_after_header_menu_area_html_open') ?>
		
		<?php if($menu_area_in_grid) : ?>
			<div class="edge-grid">
		<?php endif; ?>
				
			<div class="edge-vertical-align-containers">
				<div class="edge-position-left"><!--
				 --><div class="edge-position-left-inner">
						<?php if(!$hide_logo) {
							noizzy_edge_get_logo();
						} ?>
						<?php if($menu_area_position === 'left') : ?>
							<?php noizzy_edge_get_main_menu(); ?>
						<?php endif; ?>
					</div>
				</div>
				<?php if($menu_area_position === 'center') : ?>
					<div class="edge-position-center"><!--
					 --><div class="edge-position-center-inner">
							<?php noizzy_edge_get_main_menu(); ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="edge-position-right"><!--
				 --><div class="edge-position-right-inner">
						<?php if($menu_area_position === 'right') : ?>
							<?php noizzy_edge_get_main_menu(); ?>
						<?php endif; ?>
						<?php noizzy_edge_get_header_widget_menu_area(); ?>
					</div>
				</div>
			</div>
			
		<?php if($menu_area_in_grid) : ?>
			</div>
		<?php endif; ?>
	</div>
			
	<?php if($show_fixed_wrapper) { ?>
		</div>
	<?php } ?>
	
	<?php if($show_sticky) {
		noizzy_edge_get_sticky_header();
	} ?>
	
	<?php do_action('noizzy_edge_before_page_header_html_close'); ?>
</header>

<?php do_action('noizzy_edge_after_page_header'); ?>