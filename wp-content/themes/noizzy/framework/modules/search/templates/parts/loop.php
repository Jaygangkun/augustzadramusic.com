<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="edge-post-content">
	        <?php if ( has_post_thumbnail() ) { ?>
		        <div class="edge-post-image">
			        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				        <?php the_post_thumbnail( 'thumbnail' ); ?>
			        </a>
		        </div>
	        <?php } ?>
	        <div class="edge-post-title-area <?php if ( ! has_post_thumbnail() ) { echo esc_attr( 'edge-no-thumbnail' ); } ?>">
		        <div class="edge-post-title-area-inner">
			        <h5 itemprop="name" class="edge-post-title entry-title">
				        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			        </h5>
			        <?php
			        $edge_my_excerpt = get_the_excerpt();
			        
			        if ( ! empty( $edge_my_excerpt ) ) { ?>
				        <p itemprop="description" class="edge-post-excerpt"><?php echo wp_trim_words( esc_html( $edge_my_excerpt ), 30 ); ?></p>
			        <?php } ?>
		        </div>
	        </div>
        </div>
    </article>
<?php endwhile; ?>
<?php else: ?>
	<p class="edge-blog-no-posts"><?php esc_html_e( 'No posts were found.', 'noizzy' ); ?></p>
<?php endif; ?>