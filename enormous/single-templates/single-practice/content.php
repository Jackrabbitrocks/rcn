<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?>">
		<div class="entry-header clearfix">
		    <div class="entry-feature entry-feature-image">
		    	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
		    	<?php enormous_archive_meta_icon(); ?>
		    </div>
		</div>
		<!-- .entry-header -->
		<div class="entry-content">
			<div class="entry-meta">

				<?php enormous_post_detail(); ?>

			</div><!-- .entry-meta -->

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

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
            
		</div>
		
	</div>
</article><!-- #post-## -->
