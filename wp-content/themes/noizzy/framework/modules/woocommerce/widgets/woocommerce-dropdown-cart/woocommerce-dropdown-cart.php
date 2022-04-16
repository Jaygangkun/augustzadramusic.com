<?php

class NoizzyEdgeWoocommerceDropdownCart extends NoizzyEdgeWidget
{
    public function __construct() {
        parent::__construct(
            'edge_woocommerce_dropdown_cart',
            esc_html__('Noizzy Woocommerce Dropdown Cart', 'noizzy'),
            array('description' => esc_html__('Display a shop cart icon with a dropdown that shows products that are in the cart', 'noizzy'),)
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array(
            array(
                'type'        => 'textfield',
                'name'        => 'woocommerce_dropdown_cart_margin',
                'title'       => esc_html__('Icon Margin', 'noizzy'),
                'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'noizzy')
            )
        );
    }

    public function widget($args, $instance) {
        extract($args);

        global $woocommerce;

		$icon_styles = array();

        if ($instance['woocommerce_dropdown_cart_margin'] !== '') {
            $icon_styles[] = 'padding: ' . $instance['woocommerce_dropdown_cart_margin'];
        }

        $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;

        $dropdown_cart_icon_class = noizzy_edge_get_dropdown_cart_icon_class();
        ?>
        <div class="edge-shopping-cart-holder" <?php noizzy_edge_inline_style($icon_styles) ?>>
            <div class="edge-shopping-cart-inner">
                <a itemprop="url" <?php noizzy_edge_class_attribute($dropdown_cart_icon_class); ?>
                   href="<?php echo esc_url(wc_get_cart_url()); ?>">
                    <span class="edge-cart-icon">
                        <?php echo noizzy_edge_get_dropdown_cart_icon_html(); ?>
                        <span
                            class="edge-cart-number"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'noizzy'), WC()->cart->cart_contents_count); ?></span>
                    </span>
                </a>

                <div class="edge-shopping-cart-dropdown">
                    <ul>
                        <?php if (!$cart_is_empty) : ?>
                            <?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
                                $_product = $cart_item['data'];
                                // Only display if allowed
                                if (!$_product->exists() || $cart_item['quantity'] == 0) {
                                    continue;
                                }
                                // Get price
                                $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
                                ?>
                                <li>
                                    <div class="edge-item-image-holder">
                                        <a itemprop="url"
                                           href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
                                            <?php echo wp_kses($_product->get_image(), array(
                                                'img' => array(
                                                    'src'    => true,
                                                    'width'  => true,
                                                    'height' => true,
                                                    'class'  => true,
                                                    'alt'    => true,
                                                    'title'  => true,
                                                    'id'     => true
                                                )
                                            )); ?>
                                        </a>
                                    </div>
                                    <div class="edge-item-info-holder">
                                        <h6 itemprop="name" class="edge-product-title">
                                            <a itemprop="url"
                                               href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('noizzy_edge_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
                                        </h6>
                                        <?php if (apply_filters('noizzy_edge_woo_cart_enable_quantity', true)) { ?>
                                            <span class="edge-quantity">
                                            <?php echo esc_html($cart_item['quantity']); ?>
                                                <span class="edge-quantity-x">x</span>
                                                <?php echo apply_filters('noizzy_edge_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
                                            </span>
                                        <?php } ?>
                                        <?php echo apply_filters('noizzy_edge_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url(wc_get_cart_remove_url($cart_item_key)), esc_html__('Remove this item', 'noizzy')), $cart_item_key); ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <li class="edge-cart-bottom">
                                <div class="edge-subtotal-holder clearfix">
                                    <span class="edge-total"><?php esc_html_e('Total:', 'noizzy'); ?></span>
                                    <span class="edge-total-amount">
										<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                            'span' => array(
                                                'class' => true,
                                                'id'    => true
                                            )
                                        )); ?>
									</span>
                                </div>
                                <div class="edge-btn-holder clearfix">
                                    <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>"
                                       class="edge-view-cart"
                                       data-title="<?php esc_attr_e('View Cart', 'noizzy'); ?>"><span><?php esc_html_e('Cart', 'noizzy'); ?></span></a>
                                    <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>"
                                       class="edge-checkout"
                                       data-title="<?php esc_attr_e('Checkout', 'noizzy'); ?>"><span><?php esc_html_e('Checkout', 'noizzy'); ?></span></a>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="edge-empty-cart"><?php esc_html_e('No products in the cart.', 'noizzy'); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    }
}


add_filter('woocommerce_add_to_cart_fragments', 'noizzy_edge_woocommerce_header_add_to_cart_fragment');

function noizzy_edge_woocommerce_header_add_to_cart_fragment($fragments) {
    global $woocommerce;

    ob_start();

    $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;

    $dropdown_cart_icon_class = noizzy_edge_get_dropdown_cart_icon_class();

    ?>
    <div class="edge-shopping-cart-inner">
        <a itemprop="url" <?php noizzy_edge_class_attribute($dropdown_cart_icon_class); ?>
           href="<?php echo esc_url(wc_get_cart_url()); ?>">
            <span class="edge-cart-icon">
                <?php echo noizzy_edge_get_dropdown_cart_icon_html(); ?>
                <span
                    class="edge-cart-number"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'noizzy'), WC()->cart->cart_contents_count); ?></span>
            </span>

        </a>

        <div class="edge-shopping-cart-dropdown">
            <ul>
                <?php if (!$cart_is_empty) : ?>
                    <?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
                        $_product = $cart_item['data'];
                        // Only display if allowed
                        if (!$_product->exists() || $cart_item['quantity'] == 0) {
                            continue;
                        }
                        // Get price
                        $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
                        ?>
                        <li>
                            <div class="edge-item-image-holder">
                                <a itemprop="url"
                                   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
                                    <?php echo wp_kses($_product->get_image(), array(
                                        'img' => array(
                                            'src'    => true,
                                            'width'  => true,
                                            'height' => true,
                                            'class'  => true,
                                            'alt'    => true,
                                            'title'  => true,
                                            'id'     => true
                                        )
                                    )); ?>
                                </a>
                            </div>
                            <div class="edge-item-info-holder">
                                <h6 itemprop="name" class="edge-product-title">
                                    <a itemprop="url"
                                       href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('noizzy_edge_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
                                </h6>
                                <?php if (apply_filters('noizzy_edge_woo_cart_enable_quantity', true)) { ?>
                                    <span class="edge-quantity">
                                        <?php echo esc_html($cart_item['quantity']); ?>
                                        <span class="edge-quantity-x">x</span>
                                        <?php echo apply_filters('noizzy_edge_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
                                    </span>
                                <?php } ?>
                                <?php echo apply_filters('noizzy_edge_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url(wc_get_cart_remove_url($cart_item_key)), esc_html__('Remove this item', 'noizzy')), $cart_item_key); ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <li class="edge-cart-bottom">
                        <div class="edge-subtotal-holder clearfix">
                            <span class="edge-total"><?php esc_html_e('Total:', 'noizzy'); ?></span>
                            <span class="edge-total-amount">
								<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                    'span' => array(
                                        'class' => true,
                                        'id'    => true
                                    )
                                )); ?>
							</span>
                        </div>
                        <div class="edge-btn-holder clearfix">
                            <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>"
                               class="edge-view-cart"
                               data-title="<?php esc_attr_e('Cart', 'noizzy'); ?>">
                                <span><?php esc_html_e('View Cart', 'noizzy'); ?></span></a>
                            <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>"
                               class="edge-checkout"
                               data-title="<?php esc_attr_e('Checkout', 'noizzy'); ?>">
                                <span><?php esc_html_e('Checkout', 'noizzy'); ?></span></a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="edge-empty-cart"><?php esc_html_e('No products in the cart.', 'noizzy'); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <?php
    $fragments['div.edge-shopping-cart-inner'] = ob_get_clean();

    return $fragments;
}

?>