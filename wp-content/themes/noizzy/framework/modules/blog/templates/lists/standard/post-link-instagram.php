<?php
$post_classes[] = 'edge-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edge-post-content">

        <div class="edge-post-link-instagram">
            <i class="edge-instagram-post-icon edge-icon-font-awesome fa fa-instagram edge-icon-element" style=""></i>
            <img src="<?php echo esc_url($instagram_params[0]['thumbnail_url']); ?>" alt="<?php the_title(); ?>"/>
        </div>

    </div>
</article>