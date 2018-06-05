<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	
	<?php if ( have_comments() ) : ?>
		
		<div class="comment-list-wrap box-blog">
			<h4 class="cms-title">
				<span><?php comments_number(__('Comments', "enormous"),__('1 Comment', "enormous"),__('Comments (%)', "enormous")); ?></span>
			</h4>

			<?php enormous_comment_nav(); ?>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
						'callback'   => 'enormous_comment'
					) );
				?>
			</ol><!-- .comment-list -->

			<?php enormous_comment_nav(); ?>
		</div>

	<?php endif; // have_comments() ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'enormous' ); ?></p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name__mail' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'title_reply'       => esc_html__( 'Leave A Reply', "enormous"), 
			'title_reply_to'    => esc_html__( 'Leave A Reply To ', 'enormous') . '%s',
			'cancel_reply_link' => esc_html__( 'Cancel Reply', 'enormous'),
			'label_submit'      => esc_html__( 'Post Your Commentt', 'enormous'),
			'comment_notes_before' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(

					'first-name' =>
					'<p class="comment-form-first-name col-lg-6 col-md-6 col-sm-12 col-xs-12">'.
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req .' placeholder="'.esc_html__('First Name:', 'enormous').'"/></p>',

					'last-name' =>
					'<p class="comment-form-last-name col-lg-6 col-md-6 col-sm-12 col-xs-12">'.
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req .' placeholder="'.esc_html__('Last Name:', 'enormous').'"/></p>',

					'email' =>
					'<p class="comment-form-email col-lg-6 col-md-6 col-sm-12 col-xs-12">'.
					'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' placeholder="'.esc_html__('Email:', 'enormous').'"/></p>',

					'website' =>
					'<p class="comment-form-wbsite col-lg-6 col-md-6 col-sm-12 col-xs-12">'.
					'<input id="website" name="website" type="text" value="" size="30"' . $aria_req . ' placeholder="'.esc_html__('Website:', 'enormous').'"/></p>',
			)
			),
			'comment_field' =>  '<p class="comment-form-comment col-lg-12 col-md-12 col-sm-12 col-xs-12"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_html__('Comment', 'enormous').'" aria-required="true">' .
			'</textarea></p>',
	);
	   
	comment_form($args); ?>


</div><!-- .comments-area -->
