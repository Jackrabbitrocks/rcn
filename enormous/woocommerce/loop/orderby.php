<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wp_query;
if ( ! woocommerce_products_will_display() )
	return;

if(isset($_REQUEST['mode'])){
	$mode = $_REQUEST['mode'];
} else {
	$mode = 'grid';
}
switch ($mode) {
	case 'list':
		$class_grid = '';
		$class_list = 'active';
		break;

	default:
		$class_grid = 'active';
		$class_list = '';
		break;
}
global $opt_theme_options;
$shop_layout = (isset($_GET['shop-layout'])) ? trim($_GET['shop-layout']) : $opt_theme_options['shop_layout'];
$shop_column = (isset($_GET['shop-column'])) ? trim($_GET['shop-column']) : $opt_theme_options['shop_column'];
?>
<div class="meta_product_archive">
	<div class="">
		<div class="sort left">
			<label><?php echo esc_html__('Sort by:', 'enormous');?></label>
			<form class="woocommerce-ordering" method="get">
				<label><select name="orderby" class="orderby">
						<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
							<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
						<?php endforeach; ?>
					</select>
				</label>
				<?php
				// Keep query string vars intact
				foreach ( $_GET as $key => $val ) {
					if ( 'orderby' === $key || 'submit' === $key ) {
						continue;
					}
					if ( is_array( $val ) ) {
						foreach( $val as $innerVal ) {
							echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
						}
					} else {
						echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
					}
				}
				?>
			</form>
		</div>
		<div class="woocommerce-result-count form-effect select-arrow">
			<label><?php esc_html_e('Show: ', 'enormous'); ?></label><?php echo enormous_woocommerce_products_per_page(); ?>
		</div>
		<div class="cms-product-layout">
			<label><?php esc_html_e('View as: ', 'enormous'); ?></label>
			<a href="?post_type=product&shop-layout=<?php echo ''.$shop_layout; ?>&shop-column=<?php echo ''.$shop_column; ?>&mode=grid" class="<?php echo esc_attr($class_grid); ?>" ><span class="cms-product-column active"><i class="fa fa-th-large" aria-hidden="true"></i></span></a>
			<a href="?post_type=product&shop-layout=<?php echo ''.$shop_layout; ?>&shop-column=<?php echo ''.$shop_column; ?>&mode=list" class="<?php echo esc_attr($class_list); ?>" ><span class="cms-product-list"><i class="fa fa-list" aria-hidden="true"></i></span></a>
		</div>
	</div>
</div>

