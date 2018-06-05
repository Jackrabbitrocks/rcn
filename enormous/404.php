<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="primary">
	<main id="main" class="site-main">
		<div class="error-404-layout2">
        <div class="bg-overlay"></div>  
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1><?php esc_html_e( '404', 'enormous' ); ?></h1>
                </header><!-- .page-header -->   

                <div class="page-content">
                    <p><?php esc_html_e( 'Enormous impresses you with fully responsiveness and highly customization. We did it in combination of very clean and flexible design.', 'enormous' ); ?></p>

                    <a class="btn btn-white-alt  btn-md2 btn-rounded" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back To Home', 'enormous'); ?></a>
                </div><!-- .page-content -->

            </section><!-- .error-404 -->
        </div>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>