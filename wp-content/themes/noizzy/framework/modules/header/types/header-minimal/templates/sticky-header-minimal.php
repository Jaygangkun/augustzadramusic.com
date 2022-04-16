<?php do_action('noizzy_edge_after_sticky_header'); ?>

<div class="edge-sticky-header">
    <?php do_action('noizzy_edge_after_sticky_menu_html_open'); ?>
    <div class="edge-sticky-holder">
        <?php if ($sticky_header_in_grid && noizzy_edge_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ) : ?>
        <div class="edge-grid">
            <?php endif; ?>
            <div class=" edge-vertical-align-containers">
                <div class="edge-position-left"><!--
                 --><div class="edge-position-left-inner">
                        <?php if (!$hide_logo) {
                            noizzy_edge_get_logo('sticky');
                        } ?>
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
            <?php if ($sticky_header_in_grid) : ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php do_action('noizzy_edge_after_sticky_header'); ?>
