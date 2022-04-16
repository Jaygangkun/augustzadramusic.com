<?php do_action('noizzy_edge_before_top_navigation'); ?>
<div class="edge-vertical-menu-outer">
	<nav class="edge-vertical-menu <?php echo esc_attr($opening_class);?>">
		<?php
			wp_nav_menu(array(
				'theme_location'  => 'vertical-navigation',
				'container'       => '',
				'container_class' => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'fallback_cb'     => 'top_navigation_fallback',
				'link_before'     => '<span>',
				'link_after'      => '</span>',
				'walker'          => new NoizzyEdgeTopNavigationWalker()
			));
		?>
	</nav>
</div>
<?php do_action('noizzy_edge_after_top_navigation'); ?>