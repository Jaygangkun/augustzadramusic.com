<?php
$post_classes[] = 'edge-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edge-post-content">
        <div class="edge-post-heading">
            <?php noizzy_edge_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
    </div>
</article>