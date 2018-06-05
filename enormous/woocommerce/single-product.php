<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>
<div class="single_product">
	<div class="container">
		<div class="row">
			<div id="main_content_product" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
				<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>

				<div id="product-nav">
					<?php enormous_product_nav(); ?>   
				</div>

				<div id="related-product">
					<h2 class="title">
						<?php _e( 'Related Products', 'enormous' ); ?>
					</h2>
					<?php wc_get_template( 'single-product/related.php' ); ?>
				</div>
			</div>

			<?php if ( is_active_sidebar( 'woocommerce-widget-area' ) ) : ?>
				<div class="main-sidebar col-xs-12 col-sm-4 col-md-3 col-lg-3" role="complementary">
					<div id="sidebar">
						<?php dynamic_sidebar( 'woocommerce-widget-area' ); ?>
					</div><!-- #secondary -->
				</div><!-- #secondary -->
			<?php endif; ?>

		</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
