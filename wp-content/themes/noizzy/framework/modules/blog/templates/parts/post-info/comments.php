<?php if(comments_open()) { ?>
	<div class="edge-post-info-comments-holder">
		<a itemprop="url" class="edge-post-info-comments" href="<?php comments_link(); ?>">
			<?php comments_number('0 ' . esc_html__('Comments','noizzy'), '1 '.esc_html__('Comment','noizzy'), '% '.esc_html__('Comments','noizzy') ); ?>
		</a>
	</div>
<?php } ?>