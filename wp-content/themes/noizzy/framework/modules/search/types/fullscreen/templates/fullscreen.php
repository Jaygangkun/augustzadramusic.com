<div class="edge-fullscreen-search-holder">
	<a <?php noizzy_edge_class_attribute( $search_close_icon_class ); ?> href="javascript:void(0)">
		<?php echo noizzy_edge_get_search_close_icon_html(); ?>
	</a>
	<div class="edge-fullscreen-search-table">
		<div class="edge-fullscreen-search-cell">
			<div class="edge-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="edge-fullscreen-search-form" method="get">
					<div class="edge-form-holder">
						<div class="edge-form-holder-inner">
							<div class="edge-field-holder">
								<input type="text" placeholder="<?php esc_attr_e( 'Search...', 'noizzy' ); ?>" name="s" class="edge-search-field" autocomplete="off"/>
							</div>
							<button type="submit" <?php noizzy_edge_class_attribute( $search_submit_icon_class ); ?>>
								<?php echo noizzy_edge_get_search_icon_html(); ?>
							</button>
							<div class="edge-line"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>