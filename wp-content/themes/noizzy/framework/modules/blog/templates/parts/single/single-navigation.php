<?php
$blog_single_navigation = noizzy_edge_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = noizzy_edge_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="edge-blog-single-navigation edge-container">
		<div class="edge-blog-single-navigation-inner clearfix">
			<?php
				/* Single navigation section - SETTING PARAMS */
				$post_navigation = array(
					'prev' => array(
						'label' => '<span class="edge-blog-single-nav-label">'.esc_html__('Prev Post', 'noizzy').'</span>',
                        'mark'  => '<span class="fa fa-angle-double-left"></span>'
					),
					'next' => array(
						'label' => '<span class="edge-blog-single-nav-label">'.esc_html__('Next Post', 'noizzy').'</span>',
                        'mark'  => '<span class="fa fa-angle-double-right"></span>'
					)
				);
			
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
					}
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);
					}
				} else {
					if(get_previous_post() !== ""){
						$post_navigation['prev']['post'] = get_previous_post();
					}
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
					}
				}

				/* Single navigation section - RENDERING */

                if (isset($post_navigation['prev']['post'])) { ?>
                    <a itemprop="url" class="edge-blog-single-prev" href="<?php echo get_permalink($post_navigation['prev']['post']->ID); ?>">
                        <?php echo wp_kses($post_navigation['prev']['mark'], array('span' => array('class' => true))); ?>
                        <?php echo wp_kses($post_navigation['prev']['label'], array('span' => array('class' => true))); ?>
                    </a>
                <?php } ?>
                <?php if (isset($post_navigation['next']['post'])) { ?>
                    <a itemprop="url" class="edge-blog-single-next" href="<?php echo get_permalink($post_navigation['next']['post']->ID); ?>">
                        <?php echo wp_kses($post_navigation['next']['label'], array('span' => array('class' => true))); ?>
                        <?php echo wp_kses($post_navigation['next']['mark'], array('span' => array('class' => true))); ?>
                    </a>
                <?php } ?>
		</div>
	</div>
<?php } ?>