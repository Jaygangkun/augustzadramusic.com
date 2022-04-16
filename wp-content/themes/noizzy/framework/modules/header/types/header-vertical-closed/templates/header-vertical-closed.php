<?php do_action('noizzy_edge_before_page_header'); ?>

<aside class="edge-vertical-menu-area <?php echo esc_attr($holder_class); ?>">
    <?php if(!$hide_logo) {
        noizzy_edge_get_logo();
    } ?>
    <a href="javascript:void(0)" id="edge-vert-close" <?php noizzy_edge_class_attribute( $vertical_closed_icon_class ); ?>>
			<span class="edge-vertical-area-close-icon">
				<?php echo noizzy_edge_get_icon_sources_html( 'vertical_closed', true ); ?>
			</span>
    </a>
    <div class="edge-vertical-menu-area-inner">
        <div class="edge-vertical-area-background"></div>
		<a href="javascript:void(0)" <?php noizzy_edge_class_attribute( $vertical_closed_icon_class ); ?>>
			<span class="edge-vertical-area-opener-icon">
				<?php noizzy_edge_menu_icon(); ?>
			</span>
		</a>
        <?php noizzy_edge_get_header_vertical_closed_main_menu(); ?>
    </div>
    <div class="edge-vertical-area-bottom-logo">
        <div class="edge-vertical-area-bottom-logo-inner">
            <div class="edge-vertical-area-widget-holder">
                <?php noizzy_edge_get_header_vertical_closed_widget_area(); ?>
            </div>
        </div>
    </div>
</aside>

<?php do_action('noizzy_edge_after_page_header'); ?>