<?php
$item_classes           = $this_object->getItemClasses( $params );
$shader_styles          = $this_object->getShaderStyles( $params );
$text_wrapper_styles    = $this_object->getTextWrapperStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="edge-pli edge-item-space <?php echo esc_attr( $item_classes ); ?>">
	<div class="edge-pli-inner">
		<div class="edge-pli-image">
			<?php noizzy_edge_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
		</div>
		<div class="edge-pli-text" <?php echo noizzy_edge_get_inline_style( $shader_styles ); ?>>
			<div class="edge-pli-text-outer">
				<div class="edge-pli-text-inner">
					<?php noizzy_edge_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); ?>
				</div>
			</div>
		</div>
		<a class="edge-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
	<div class="edge-pli-text-wrapper" <?php echo noizzy_edge_get_inline_style( $text_wrapper_styles ); ?>>
        <div class="edge-pli-title-wrapper">
            <?php noizzy_edge_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>

            <?php noizzy_edge_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
        </div>
		
		<?php noizzy_edge_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
		
		<?php noizzy_edge_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>
		
		<?php noizzy_edge_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>

	</div>
</div>