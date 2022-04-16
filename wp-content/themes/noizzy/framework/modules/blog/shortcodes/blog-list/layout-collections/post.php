<li class="edge-bl-item edge-item-space clearfix">
	<div class="edge-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
            $image_size = isset($image_size) ? $image_size : 'full';
            $image_meta = get_post_meta(get_the_ID(), 'edge_blog_list_featured_image_meta', true);
            $has_featured = !empty($image_meta) || has_post_thumbnail();
            $show_featured = get_post_meta(get_the_ID(), 'edge_blog_single_show_featured_image_meta', true) != 'no';
            $blog_list_image_id = !empty($image_meta) && noizzy_edge_blog_item_has_link() ? noizzy_edge_get_attachment_id_from_url($image_meta) : '';
        ?>
        <?php if ($has_featured && $show_featured) { ?>
        <div class="edge-post-image">
            <?php  if ( $post_info_date == 'yes' ) {
                noizzy_edge_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
            } ?>
            <?php if (noizzy_edge_blog_item_has_link()) { ?>
            <a itemprop="url" href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php } ?>
                <?php if (!empty($blog_list_image_id)) {
                    echo wp_get_attachment_image($blog_list_image_id, $image_size);
                } else {
                    the_post_thumbnail($image_size);
                } ?>
                <?php if (noizzy_edge_blog_item_has_link()) { ?>
            </a>
        <?php } ?>
            <?php do_action('noizzy_edge_action_blog_inside_image_tag') ?>
        </div>
        <?php }
		} ?>
        <div class="edge-bli-content">
            <?php if ($post_info_section == 'yes') { ?>
                <div class="edge-bli-info">
	                <?php
		                if ( $post_info_category == 'yes' ) {
			                noizzy_edge_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
		                }
		                if ( $post_info_author == 'yes' ) {
			                noizzy_edge_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
		                }
		                if ( $post_info_comments == 'yes' ) {
			                noizzy_edge_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		                }
		                if ( $post_info_like == 'yes' ) {
			                noizzy_edge_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
		                }
		                if ( $post_info_share == 'yes' ) {
			                noizzy_edge_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
		                }
	                ?>
                </div>
            <?php } ?>
             <?php noizzy_edge_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
	
	        <div class="edge-bli-excerpt">
                <?php  if ( $post_info_excerpt == 'yes' ) {
                    noizzy_edge_get_module_template_part('templates/parts/excerpt', 'blog', '', $params);
                } ?>
		        <?php noizzy_edge_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
	        </div>
        </div>
	</div>
</li>