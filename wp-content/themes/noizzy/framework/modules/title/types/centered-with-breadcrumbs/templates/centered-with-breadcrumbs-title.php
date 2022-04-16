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
				<?php if(!empty($title)) { ?>
					<<?php echo esc_attr($title_tag); ?> class="edge-page-title entry-title" <?php noizzy_edge_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
				<?php } ?>
				<?php if(!empty($subtitle)){ ?>
					<<?php echo esc_attr($subtitle_tag); ?> class="edge-page-subtitle" <?php noizzy_edge_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
				<?php } ?>
                <div class="edge-breadcrumbs-info">
                    <?php noizzy_edge_custom_breadcrumbs(); ?>
                </div>
			</div>
	    </div>
	</div>
</div>

<?php do_action('noizzy_edge_after_page_title'); ?>
