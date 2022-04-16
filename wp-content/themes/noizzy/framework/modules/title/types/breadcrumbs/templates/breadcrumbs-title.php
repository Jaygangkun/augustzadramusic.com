<?php do_action('noizzy_edge_before_page_title'); ?>

<div class="edge-title-holder <?php echo esc_attr($holder_classes); ?>" <?php noizzy_edge_inline_style($holder_styles); ?> <?php echo noizzy_edge_get_inline_attrs($holder_data); ?>>
	<?php if(!empty($title_image)) { ?>
		<div class="edge-title-image">
			<img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>" />
		</div>
	<?php } ?>
	<div class="edge-title-wrapper" <?php noizzy_edge_inline_style($wrapper_styles); ?>>
		<div class="edge-title-inner">
			<div class="edge-grid">
				<?php noizzy_edge_custom_breadcrumbs(); ?>
			</div>
	    </div>
	</div>
</div>

<?php do_action('noizzy_edge_after_page_title'); ?>
