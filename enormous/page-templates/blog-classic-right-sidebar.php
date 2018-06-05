<?php
/**
 * Template Name: Blog Classic Right Sidebar
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */

get_header(); ?>

<section id="primary" class="container">
    <div id="page-content">
        <?php while ( have_posts() ) : the_post();
            the_content();
        endwhile; ?>
        <!-- page content. -->
    </div>
    <div id="blog-content" class="clearfix">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="content-padding">
                <main id="main" class="site-main" role="main">
                    <?php global $wp_query, $paged;
                
                    $wp_query->query('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged);
                    
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();

                            get_template_part( 'single-templates/content/content', get_post_format() );

                        endwhile; // end of the loop.

                        /* blog nav. */
                        enormous_paging_nav();

                        /* reset custom postdata. */
                        wp_reset_postdata();
                        
                    else :
                        /* content none. */
                        get_template_part( 'single-templates/content', 'none' );

                    endif; ?>
                    
                </main><!-- #content -->
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</section><!-- #primary -->

<?php get_footer(); ?>