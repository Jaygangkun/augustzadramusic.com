<?php
$post_id = get_the_ID();
$post_classes[] = 'edge-item-space';
$video_type = get_post_meta($post_id, "edge_video_type_meta", true);
$video_link = $video_type == 'social_networks' ? get_post_meta($post_id, "edge_post_video_link_meta", true) : get_the_permalink();
$pretty_photo = $video_type == 'social_networks';
?>
<article id="post-<?php echo esc_attr($post_id); ?>" <?php post_class($post_classes); ?>>
    <div class="edge-post-content">
        <?php noizzy_edge_get_module_template_part('templates/parts/media', 'blog', 'standard', $part_params); ?>
        <a href="<?php echo esc_url($video_link); ?>" <?php if($pretty_photo) { ?> data-rel="prettyPhoto[<?php echo esc_attr($post_id); ?>]" <?php } ?>>
        	<span class="edge-video-play-button">
				<span class="fa fa-play"></span>
			</span>
		</a>
    </div>
</article>