<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edge-post-content">
        <div class="edge-post-heading">
            <?php noizzy_edge_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
            <?php noizzy_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
        </div>
        <div class="edge-post-text">
            <div class="edge-post-text-inner">
                <div class="edge-post-info-top">
                    <?php
                    if (noizzy_edge_options()->getOptionValue('show_tags_area_blog') === 'yes') {
                        noizzy_edge_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params);
                    } ?>
                </div>
                <div class="edge-post-text-main">
                    <?php noizzy_edge_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php noizzy_edge_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('noizzy_edge_single_link_pages'); ?>
                </div>
                <div class="edge-post-info-bottom clearfix">
                    <div class="edge-post-info-bottom-left">
                        <?php noizzy_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php noizzy_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                        <?php noizzy_edge_get_module_template_part('templates/parts/post-info/category', 'tags', '', $part_params); ?>
                    </div>
                    <div class="edge-post-info-bottom-right">
                        <?php noizzy_edge_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>