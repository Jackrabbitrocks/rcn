<?php
/**
 * The Template for displaying all single posts
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */  

get_header(); ?>
<div id="primary" class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <main id="main" class="site-main">

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    // Include the single content template.
                    get_template_part( 'single-templates/single-service/content', get_post_format() );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                
                    // End the loop.
                endwhile;
                ?>

            </main>
        </div><!-- #main -->

    </div>
</div><!-- #primary -->

<?php get_footer(); ?>