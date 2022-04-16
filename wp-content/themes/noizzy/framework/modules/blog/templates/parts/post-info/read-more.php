<?php if ( ! noizzy_edge_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="edge-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple',
				'size'         => 'small',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'noizzy' ),
                'icon_pack'    => "font_awesome",
                'fa_icon'      => "fa-angle-double-right"
			);

            echo noizzy_edge_execute_shortcode('edge_button', $button_params);
		?>
	</div>
<?php } ?>