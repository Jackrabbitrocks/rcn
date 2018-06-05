<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
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

global $post;

if ( ! $post->post_excerpt ) {
	return;
}
global $post, $product;
$sku = $product->get_sku();
$tags = wc_get_product_tag_list($product->get_id());
?>
<div itemprop="description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>
<div class="other-info-product">
	<h3><?php echo esc_html__('Other Details :', 'enormous');?></h3>
	<div class="sg-product-category">
		<span><?php esc_html_e('Category : ', 'enormous'); ?></span>
		<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span>' . _n( '', '', count( $product->get_category_ids() ), 'enormous' ) . ' ', '</span>' ); ?>
	</div>
	<?php if(!empty($sku)) { ?>
		<div class="sg-product-sku"><span><?php esc_html_e('Code : ', 'enormous'); ?></span><?php echo esc_attr($sku); ?></div>
	<?php } ?>
	<?php if ( $product->is_in_stock() ) {?>
		<div class="sg-product-availabiltity"><span><?php esc_html_e('Availabiltity : ', 'enormous'); ?></span><?php esc_html_e('Available', 'enormous'); ?></div>
	<?php } else {?>
		<div class="sg-product-availabiltity"><span><?php esc_html_e('Availabiltity : ', 'enormous'); ?></span><?php esc_html_e('Unvailable', 'enormous'); ?></div>
	<?php } ?>
	<?php if(!empty($tags)) { ?>
		<div class="sg-product-tags"><span><?php esc_html_e('Tags : ', 'enormous'); ?><?php echo wp_kses_post($tags) ; ?></div>
	<?php } ?>

</div>