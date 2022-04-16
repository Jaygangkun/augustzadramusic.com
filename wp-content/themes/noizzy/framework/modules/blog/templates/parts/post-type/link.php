<?php
$title_tag = isset($link_tag) ? $link_tag : 'h5';
$post_link_meta = get_post_meta(get_the_ID(), "edge_post_link_link_meta", true);

?>

<div class="edge-post-link-holder">
    <div class="edge-post-link-holder-inner">
        <<?php echo esc_attr($title_tag); ?> itemprop="name" class="edge-link-title edge-post-title">
            <?php if (isset($post_link_meta) && $post_link_meta != '') { ?>
                <a itemprop="url" href="<?php echo esc_url($post_link_meta); ?>" title="<?php the_title_attribute(); ?>"
                   target="_blank">
                    <?php echo esc_url($post_link_meta); ?>
                </a>
            <?php } ?>
        </<?php echo esc_attr($title_tag); ?>>
    </div>
</div>