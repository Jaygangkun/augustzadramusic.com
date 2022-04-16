<?php get_header(); ?>
				<div class="edge-page-not-found">
					<?php
					$edge_title_image_404 = noizzy_edge_options()->getOptionValue( '404_page_title_image' );
					$edge_title_404       = noizzy_edge_options()->getOptionValue( '404_title' );
					$edge_subtitle_404    = noizzy_edge_options()->getOptionValue( '404_subtitle' );
					$edge_text_404        = noizzy_edge_options()->getOptionValue( '404_text' );
					$edge_button_label    = noizzy_edge_options()->getOptionValue( '404_back_to_home' );
					$edge_button_style    = noizzy_edge_options()->getOptionValue( '404_button_style' );
					
					if ( ! empty( $edge_title_image_404 ) ) { ?>
						<div class="edge-404-title-image">
							<img src="<?php echo esc_url( $edge_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'noizzy' ); ?>" />
						</div>
					<?php } ?>
					
					<h1 class="edge-404-title">
						<?php if ( ! empty( $edge_title_404 ) ) {
							echo esc_html( $edge_title_404 );
						} else {
							esc_html_e( '404', 'noizzy' );
						} ?>
					</h1>
					
					<h3 class="edge-404-subtitle">
						<?php if ( ! empty( $edge_subtitle_404 ) ) {
							echo esc_html( $edge_subtitle_404 );
						} else {
							esc_html_e( 'Page not found', 'noizzy' );
						} ?>
					</h3>
					
					<p class="edge-404-text">
						<?php if ( ! empty( $edge_text_404 ) ) {
							echo esc_html( $edge_text_404 );
						} else {
							esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'noizzy' );
						} ?>
					</p>
					
					<?php
						$button_params = array(
							'link' => esc_url( home_url( '/' ) ),
							'text' => ! empty( $edge_button_label ) ? $edge_button_label : esc_html__( 'Back to home', 'noizzy' )
						);
					
						if ( $edge_button_style == 'light-style' ) {
							$button_params['custom_class'] = 'edge-btn-light-style';
						}

                        $button_params['icon_pack'] = "font_awesome";
                        $button_params['fa_icon'] = "fa-angle-double-right";

                        if( noizzy_edge_core_plugin_installed() ) {
                            echo noizzy_edge_get_button_html($button_params);
                        } else {
                            $homeLink  = esc_url( home_url( '/' ) );
                            $backHomeText      = esc_html__( 'Back to home', 'noizzy' );

                            $fallback_button  = '<a itemprop="url" href="'. $homeLink .'"' . 'target="_self" class="edge-btn edge-btn-medium edge-btn-solid edge-btn-icon">';
                            $fallback_button .= '<span class="edge-btn-text">'. $backHomeText .'</span>';
                            $fallback_button .= '<i class="edge-icon-font-awesome fa fa-angle-double-right "></i>';
                            $fallback_button .= '</a>';

                            echo esc_html($fallback_button);
                        } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>