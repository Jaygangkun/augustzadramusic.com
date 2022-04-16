<?php do_action('noizzy_edge_before_page_header'); ?>

<header class="edge-page-header">
    <?php do_action('noizzy_edge_after_page_header_html_open'); ?>

    <?php if ($show_fixed_wrapper) : ?>
    <div class="edge-fixed-wrapper">
        <?php endif; ?>

        <div class="edge-menu-area">
            <?php do_action('noizzy_edge_after_header_menu_area_html_open'); ?>

            <?php if ($menu_area_in_grid) : ?>
            <div class="edge-grid">
                <?php endif; ?>

                <div class="edge-vertical-align-containers">
                    <div class="edge-position-left"><!--
				 --><div class="edge-position-left-inner">
                            <?php if (!$hide_logo) {
                                noizzy_edge_get_logo();
                            } ?>
                        </div>
                    </div>
                    <?php if (noizzy_edge_is_active_header_minimal_widget_area()) { ?>
                        <div class="edge-position-center"><!--
				 --><div class="edge-position-center-inner">
                                <a href="javascript:void(0)" <?php noizzy_edge_class_attribute($fullscreen_menu_icon_class); ?>>
							<span class="edge-fullscreen-menu-close-icon">
								<?php echo noizzy_edge_get_fullscreen_menu_close_icon_html(); ?>
							</span>
							<span class="edge-fullscreen-menu-opener-icon">
								<?php noizzy_edge_menu_icon(); ?>
							</span>
                                </a>
                            </div>
                        </div>
                        <div class="edge-position-right"><!--
				 --><div class="edge-position-right-inner">
                                <?php noizzy_edge_get_header_minimal_widget_area(); ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="edge-position-right"><!--
				 --><div class="edge-position-right-inner">
                                <a href="javascript:void(0)" <?php noizzy_edge_class_attribute($fullscreen_menu_icon_class); ?>>
							<span class="edge-fullscreen-menu-close-icon">
								<?php echo noizzy_edge_get_fullscreen_menu_close_icon_html(); ?>
							</span>
							<span class="edge-fullscreen-menu-opener-icon">
								<?php noizzy_edge_menu_icon(); ?>
							</span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <?php if ($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>

        <?php if ($show_fixed_wrapper) { ?>
    </div>
<?php } ?>

    <?php if ($show_sticky) {
        noizzy_edge_get_sticky_header('minimal', 'header/types/header-minimal');
    } ?>

    <?php do_action('noizzy_edge_before_page_header_html_close'); ?>
</header>