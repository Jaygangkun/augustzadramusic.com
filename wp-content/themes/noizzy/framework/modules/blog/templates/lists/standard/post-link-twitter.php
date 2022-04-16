<?php
$post_classes[] = 'edge-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edge-post-content">

        <div class="edge-post-link-twitter">
            <h6 class="edge-post-link-twitter-author">
                <?php echo esc_html($twitter_params[0]['author']) ?>
            </h6>
            <?php noizzy_edge_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
            <p class="edge-post-link-twitter-text">
                <?php echo esc_html($twitter_params[0]['text']) ?>
            </p>
            <?php noizzy_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
        </div>

    </div>
</article>