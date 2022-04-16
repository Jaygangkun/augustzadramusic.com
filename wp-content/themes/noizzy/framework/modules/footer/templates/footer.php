<?php do_action( 'noizzy_edge_before_footer_content' ); ?>
</div> <!-- close div.content_inner -->
	</div>  <!-- close div.content -->
		<?php if($display_footer && ($display_footer_top || $display_footer_bottom)) { ?>
			<footer class="edge-page-footer <?php echo esc_attr($holder_classes); ?>">
				<?php
					if($display_footer_top) {
						noizzy_edge_get_footer_top();
					}
					if($display_footer_bottom) {
						noizzy_edge_get_footer_bottom();
					}
				?>
			</footer>
		<?php } ?>
	</div> <!-- close div.edge-wrapper-inner  -->
</div> <!-- close div.edge-wrapper -->
<?php wp_footer(); ?>
</body>
</html>