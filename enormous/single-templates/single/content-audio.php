<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @since 1.0.0
 */
global $opt_theme_options;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?>">
		<div class="entry-header clearfix">
		    <div class="entry-feature entry-feature-image">
		    	<?php enormous_post_audio(); ?>
		    	<?php enormous_archive_meta_icon(); ?>
		    </div>
		</div>
		<!-- .entry-header -->
		<div class="entry-content">
			<div class="entry-meta">

				<?php enormous_post_detail(); ?>

			</div><!-- .entry-meta -->

			<div class="entry-content-inner">
				<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'enormous' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'enormous' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>
			</div>
			<div class="post-share-buttons">
        		<span><?php echo esc_html__('Share This Article : ', 'enormous'); ?></span>
				<ul><?php enormous_cms_get_socials_share();?></ul>
			</div>
            
		</div>

		<?php enormous_post_nav(); ?>
		
		<?php if(!empty($opt_theme_options['box_author'])) : ?>
			<div class="entry-author">
				<h3 class="cms-title"><span><?php esc_html_e('About Author', "enormous"); ?></span></h3> 
				<div class="blog-admin-post clearfix">
					<div class="admin-avt">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
						</div>
					<div class="admin-info">
						<div class="admin-des">
							<?php the_author_meta( 'description' ); ?>
						</div>
						<?php enormous_cms_social();?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php  enormous_related_post();?>
	</div>
</article><!-- #post-## -->



