<?php do_action('noizzy_edge_before_sticky_header'); ?>

<div class="edge-sticky-header">
    <?php do_action( 'noizzy_edge_after_sticky_menu_html_open' ); ?>
    <div class="edge-sticky-holder <?php echo esc_attr($menu_area_class); ?>">
        <?php if($sticky_header_in_grid) : ?>
        <div class="edge-grid">
            <?php endif; ?>
            <div class="edge-vertical-align-containers">
                <div class="edge-position-left"><!--
                 --><div class="edge-position-left-inner">
                        <?php if(!$hide_logo) {
                            noizzy_edge_get_logo('sticky');
                        } ?>
                        <?php if($menu_area_position === 'left') : ?>
                            <?php noizzy_edge_get_sticky_menu('edge-sticky-nav'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($menu_area_position === 'center') : ?>
                    <div class="edge-position-center"><!--
                     --><div class="edge-position-center-inner">
                            <?php noizzy_edge_get_sticky_menu('edge-sticky-nav'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="edge-position-right"><!--
                 --><div class="edge-position-right-inner">
                        <?php if($menu_area_position === 'right') : ?>
                            <?php noizzy_edge_get_sticky_menu('edge-sticky-nav'); ?>
                        <?php endif; ?>
                        <?php noizzy_edge_get_sticky_header_widget_menu_area(); ?>
                    </div>
                </div>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
	<?php do_action( 'noizzy_edge_before_sticky_menu_html_close' ); ?>
</div>

<?php do_action('noizzy_edge_after_sticky_header'); ?>