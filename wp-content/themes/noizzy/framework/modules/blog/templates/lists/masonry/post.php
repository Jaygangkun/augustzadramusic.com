<?php
    $post_classes[] = 'edge-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edge-post-content">
        <div class="edge-post-heading">
            <?php noizzy_edge_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="edge-post-text">
            <div class="edge-post-text-inner">
                <div class="edge-post-text-main">
                    <?php noizzy_edge_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php noizzy_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php noizzy_edge_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php noizzy_edge_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>