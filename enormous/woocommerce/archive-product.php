<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $breadcrumb, $pagetitle, $opt_theme_options;
global $wp_query;
if(isset($_REQUEST['mode'])){
	$mode = $_REQUEST['mode'];
} else {
	$mode = 'grid';
}
$primary_column = $sidebar_column = $shop_layout = '';
$layout_class = '';

$shop_layout = (isset($_GET['shop-layout'])) ? trim($_GET['shop-layout']) : $opt_theme_options['shop_layout'];
if (($shop_layout == 'fullwidth') || !is_active_sidebar( 'woocommerce-widget-area' ) ) {
	$primary_column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
} elseif ($shop_layout == 'sidebar_left'){
	$layout_class = 'shop-sidebar shop-sidebar-left';
	$primary_column = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
	$sidebar_column = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
} else {
	$layout_class = 'shop-sidebar shop-sidebar-right';
	$primary_column = 'col-xs-12 col-sm-8 col-md-9 col-lg-9';
	$sidebar_column = 'col-xs-12 col-sm-4 col-md-3 col-lg-3';
}

$column_class = '';
$shop_column = (isset($_GET['shop-column'])) ? trim($_GET['shop-column']) : $opt_theme_options['shop_column'];
if ($shop_column == '3column') {
	$column_class = 'shop-3column';
} else{
	$column_class = 'shop-4column';
}

get_header( 'shop' ); ?>
<section id="primary" class="content-area <?php echo esc_attr($layout_class); ?> <?php echo esc_attr($column_class); ?>">
	<div class="container">
		<div class="row">
			<div class="pr-content <?php echo esc_attr($primary_column); ?>">
				<?php
				/**
				 * woocommerce_before_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' );
				?>

				<?php do_action( 'woocommerce_archive_description' ); ?>

				<?php if ( have_posts() ) : ?>

					<?php
					/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
					?>

					<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						switch ($mode) {
							case 'list':
								wc_get_template_part( 'content', 'product-list' );
								break;

							default:
								wc_get_template_part( 'content', 'product' );
								break;
						}
						?>

					<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

					<?php
					/**
					 * woocommerce_after_shop_loop hook
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>

				<?php
				/**
				 * woocommerce_after_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
				?>
			</div>
			<?php if ($shop_layout == 'sidebar_left' || $shop_layout == 'sidebar_right') : ?>
				<div class="sidebar-wrap <?php echo esc_attr($sidebar_column); ?>">
					<?php if ( is_active_sidebar( 'woocommerce-widget-area' ) ) : ?>
						<div id="sidebar" class="widget-area woocommerce-widget" role="complementary">
							<?php dynamic_sidebar( 'woocommerce-widget-area' ); ?>
						</div><!-- #secondary -->
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section><!-- #primary -->
<?php get_footer( 'shop' ); ?>
