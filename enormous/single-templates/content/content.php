<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
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

				<?php enormous_archive_detail(); ?>

			</div><!-- .entry-meta -->
			<h1 class="entry-title">
				<?php
		    		if(is_sticky()){
		                echo "<i class='sticky fa fa-thumb-tack'></i>";
		            }
		    	?>
				<a href="<?php the_permalink(); ?>"><?php the_title() ; ?></a>
			</h1>
			<div class="entry-content-inner">
				<?php
					/* translators: %s: Name of current post */
					the_excerpt(); 

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'enormous' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
			<footer class="entry-footer">
				<a href="<?php the_permalink(); ?>" class="btn btn-secondary btn-md"><?php esc_html_e('Read More', 'enormous') ?></a>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-## -->  

