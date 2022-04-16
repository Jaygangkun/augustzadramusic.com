<?php
$title_tag    = isset( $title_tag ) ? $title_tag : 'h3';
$title_styles = isset( $this_object ) && isset( $params ) ? $this_object->getTitleStyles( $params ) : array();
$post_format  = isset( $post_format ) ? $post_format : '';

$twitter_format =  get_post_meta(get_the_ID(), 'edge_post_link_link_meta', true);

if ( $twitter_format !== '' ) {
	$post_link = $twitter_format;
} else {
	$post_link = get_the_permalink();
}
?>

<<?php echo esc_attr($title_tag);?> itemprop="name" class="entry-title edge-post-title" <?php noizzy_edge_inline_style($title_styles); ?>>
    <?php if(noizzy_edge_blog_item_has_link()) { ?>
        <a itemprop="url" href="<?php echo esc_url( $post_link ); ?>" title="<?php the_title_attribute(); ?>">
    <?php } ?>
        <?php the_title(); ?>
    <?php if(noizzy_edge_blog_item_has_link()) { ?>
        </a>
    <?php } ?>
</<?php echo esc_attr($title_tag);?>>