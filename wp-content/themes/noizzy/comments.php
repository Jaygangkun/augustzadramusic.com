<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="edge-comment-holder clearfix" id="comments">
		<?php if ( have_comments() ) { ?>
			<div class="edge-comment-holder-inner">
				<div class="edge-comments-title">
					<h5><?php esc_html_e( 'Comments', 'noizzy' ); ?></h5>
				</div>
				<div class="edge-comments">
					<ul class="edge-comment-list">
						<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'noizzy_edge_comment' ), apply_filters( 'noizzy_edge_comments_callback', array() ) ) ) ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'noizzy' ); ?></p>
		<?php } ?>
	</div>
	<?php
		$edge_commenter = wp_get_current_commenter();
		$edge_req       = get_option( 'require_name_email' );
		$edge_aria_req  = ( $edge_req ? " aria-required='true'" : '' );
        $edge_consent  = empty( $edge_commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		
		$edge_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit_comment',
			'title_reply'          => esc_html__( 'Post a Comment', 'noizzy' ),
			'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h5>',
			'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'noizzy' ),
			'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'noizzy' ),
			'label_submit'         => esc_html__( 'Submit', 'noizzy' ),
			'comment_field'        => apply_filters( 'noizzy_edge_comment_form_textarea_field', '<textarea id="comment" placeholder="' . esc_attr__( 'Your comment', 'noizzy' ) . '" name="comment" cols="45" rows="1" aria-required="true"></textarea>' ),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
            'fields'               => apply_filters( 'sekko_select_filter_comment_form_default_fields', array(
                'author' => '<div class="edge-two-columns-50-50 clearfix"><div class="edge-two-columns-50-50-inner clearfix"><div class="edge-column"><div class="edge-column-inner"><input id="author" name="author" placeholder="' . esc_attr__( 'Your Name', 'noizzy' ) . '" type="text" value="' . esc_attr( $edge_commenter['comment_author'] ) . '"' . $edge_aria_req . ' /></div></div>',
                'email'  => '<div class="edge-column"><div class="edge-column-inner"><input id="email" name="email" placeholder="' . esc_attr__( 'Your Email', 'noizzy' ) . '" type="text" value="' . esc_attr( $edge_commenter['comment_author_email'] ) . '"' . $edge_aria_req . ' /></div></div></div></div>',
                'url'    => '<input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'noizzy' ) . '" type="text" value="' . esc_attr( $edge_commenter['comment_author_url'] ) . '" size="30" maxlength="200" />',
                'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $edge_consent . ' />' .
                    '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'noizzy' ) . '</label></p>',
            ) ),
            'submit_button'         => '<button name="%1$s" type="submit" id="%2$s" class="%3$s " value="%4$s"><span class="edge-btn-text">%4$s</span><i class="edge-icon-font-awesome fa fa-angle-double-right "></i></button>',
            'class_submit'          => 'edge-btn edge-btn-medium edge-btn-solid edge-btn-icon',
		);

	$edge_args = apply_filters( 'noizzy_edge_comment_form_final_fields', $edge_args );
		
	if ( get_comment_pages_count() > 1 ) { ?>
		<div class="edge-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

    <?php
    $edge_show_comment_form = apply_filters('noizzy_edge_show_comment_form_filter', true);
    if($edge_show_comment_form) {
    ?>
        <div class="edge-comment-form">
            <div class="edge-comment-form-inner">
                <?php comment_form( $edge_args ); ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>	