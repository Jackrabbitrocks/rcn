<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="cs-product-wrap clearfix">
		<div class="row">
			<div class="cshero-product-images-wrap col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
				/**
				 * woocommerce_before_single_product_summary hook
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
				?>

			</div>

			<div class="entry-summary col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="entry-summary-inner">
					<?php
					/**
					 * woocommerce_single_product_summary hook
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					do_action( 'woocommerce_single_product_summary' );
					?>


				</div>
				<div class="sg-product-share">
					<label><?php echo esc_html__('Share Product :', 'enormous');?></label>
					<div class="item-share">
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a>
						<a target="_blank" href="https://twitter.com/home?status=<?php esc_html_e('Check out this article', 'enormous');?>:%20<?php the_title();?>%20-%20<?php the_permalink();?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a>
						<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a>
						<a target="_blank" href="https://pinterest.com/pin/create/button/??u=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a>
					</div>

				</div>
				<?php
				/**
				 * woocommerce_after_single_product_summary hook
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				do_action( 'woocommerce_after_single_product_summary' );
				?>

			</div><!-- .summary -->
		</div>

	</div>


</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
