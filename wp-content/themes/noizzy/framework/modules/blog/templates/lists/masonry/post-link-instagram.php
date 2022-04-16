<?php
$post_classes[] = 'edge-item-space';
$post_link_meta = get_post_meta(get_the_ID(), "edge_post_link_link_meta", true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edge-post-content">
        <a class="edge-post-link-instagram" itemprop="url" href="<?php echo esc_url( $post_link_meta ); ?>" >
            <i class="edge-instagram-post-icon edge-icon-font-awesome fa fa-instagram edge-icon-element" style=""></i>
            <img src="<?php echo esc_url($instagram_params[0]['thumbnail_url']); ?>" alt="<?php the_title(); ?>"/>
        </a>
    </div>

</article>