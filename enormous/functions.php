<?php
/**
 * Theme Framework functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
/* Add widgets */
require( get_template_directory() . '/inc/widgets/social.php' );
require( get_template_directory() . '/inc/widgets/recent-posts.php' );   

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;    
	
/**
 * CMS Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * CMS Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 1.0.0
 */
function enormous_setup() {

	// load language.
	load_theme_textdomain( 'enormous' , get_template_directory() . '/languages' );

	// Adds title tag
	add_theme_support( "title-tag" );
	
	// Add woocommerce
	add_theme_support('woocommerce');
	
	// Adds custom header
	add_theme_support( 'custom-header' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'audio' , 'gallery', 'quote') );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'enormous' ) );
	register_nav_menu( 'pr_menu_left', esc_html__( 'Main Menu Left', 'enormous' ) );
	register_nav_menu( 'pr_menu_right', esc_html__( 'Main Menu Right', 'enormous' ) );
	register_nav_menu( 'pr_menu_popup', esc_html__( 'Main Menu Popup', 'enormous' ) );
	register_nav_menu( 'pr_menu_top', esc_html__( 'Menu Top', 'enormous' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array('default-color' => 'e6e6e6',) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
	add_image_size('enormous_800X800', 800, 800, true);                                                      
	add_image_size('enormous_800X400', 800, 400, true);                                                      
	add_image_size('enormous_400X400', 400, 400, true);                                                        
	add_image_size('enormous_800X500', 800, 500, true);                                                          
	add_image_size('enormous_1600X500', 1600, 500, true);                                                                                                                   
	add_image_size('enormous_800X1000', 800, 1000, true);                                                          
	add_image_size('enormous_1110X720', 1110, 720, true);                                                          
	add_image_size('enormous_750X528', 750, 528, true);                                                                                                                    
	add_image_size('portfolio_570x415', 570, 415, true);
	add_image_size('portfolio_gallery_700x700', 700, 700, true);

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}

add_action( 'after_setup_theme', 'enormous_setup' );

/**
 * Add new elements for VC
 * 
 * @author FOX
 */

function enormous_vc_elements(){
    
    if(class_exists('CmsShortCode')) {
	    require_once( get_template_directory() . '/inc/elements/heading/cms_heading.php' );
	    require_once( get_template_directory() . '/inc/elements/cta/cms_cta.php' );
	    require_once( get_template_directory() . '/inc/elements/button/cms_button.php' );
	    require_once( get_template_directory() . '/inc/elements/googlemap/cms_googlemap.php' );
	    require_once( get_template_directory() . '/inc/elements/pricing/cms_pricing.php' );       
	    require_once( get_template_directory() . '/inc/elements/timeline/cms_timeline.php' );       
	    require_once( get_template_directory() . '/inc/elements/list/cms_list.php' );     
	    require_once( get_template_directory() . '/inc/elements/countdown/cms_countdown.php' );  
	    require_once( get_template_directory() . '/inc/elements/process/cms_process.php' );      
	    require_once( get_template_directory() . '/inc/elements/videopopup/cms_videopopup.php' );
	    require_once( get_template_directory() . '/inc/elements/dropcap/cms_dropcap.php' );
	    require_once( get_template_directory() . '/inc/elements/typingout/cms_typingout.php' );
	    require_once( get_template_directory() . '/inc/elements/alerts/cms_alerts.php' );   

	    require_once( get_template_directory() . '/inc/elements/cms_fullpage/fullpages.php' );
		require_once( get_template_directory() . '/inc/elements/cms_fullpage/fullpage_section.php' );

	    if ( class_exists( 'flexRestaurants' ) ) {
			require_once( get_template_directory() . '/inc/elements/menu_restaurant/cms_menu_restaurant.php' );
		}     
	}   

}
add_action('vc_before_init', 'enormous_vc_elements');    

function enormous_get_post_meta($post_id = 0){
	global $post;
	if(!$post_id) $post_id = $post->ID;

	$_post_meta = maybe_unserialize(get_post_meta($post_id, 'opt_meta_options', true));

	if($_post_meta) return $_post_meta;

	return null;
}

/* Add Custom Editor VC */
require( get_template_directory() . '/inc/tinymce/tinymce.php' );
/**
 * Custom params & remove VC Elements.
 * 
 * @author FOX
 */
add_action('vc_after_init', 'enormous_vc_after_init');

function enormous_vc_after_init(){
	require_once ( get_template_directory() . '/vc_params/cms_custom_pagram_vc.php' ); 
	require_once ( get_template_directory() . '/vc_params/vc_pie.php' ); 

    vc_remove_element( "cms_fancybox" );    
    vc_remove_element( "cms_counter" );    

    vc_remove_param( "cms_fancybox_single", "title" );
	vc_remove_param( "cms_fancybox_single", "description" );  
	vc_remove_param( "cms_counter_single", "title" );
	vc_remove_param( "cms_counter_single", "description" ); 
}

/* Include CMS Shortcode */

add_filter('cms-shorcode-list', 'enormous_shortcodes');
/**
 * support shortcodes
 * @return array
 */
function enormous_shortcodes(){
 return array(
  'cms_carousel',
  'cms_grid',
  'cms_fancybox_single',
  'cms_counter_single', 
  'cms_progressbar',  
 );
}

/* Include woocommerce */
/*woocomerce*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
add_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 10 );

if(class_exists('Woocommerce')){
	require( get_template_directory() . '/woocommerce/woocommerce-hook.php' );
}
/* Set Product per Page Shop */
if (class_exists('Woocommerce')) {
	add_filter('loop_shop_per_page', 'enormous_get_number_product');
}
function enormous_get_number_product(){
	global $opt_theme_options;
	$number_product = $opt_theme_options['product_per_page'];
	return $number_product;
}

add_action( 'after_setup_theme', 'enormous_pr_gallery' );
function enormous_pr_gallery() {
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}



/**
 * Enqueue scripts and styles for front-end.
 * @author Fox
 * @since CMS SuperHeroes 1.0
 */
function enormous_front_end_scripts() {
    
	global $wp_styles, $opt_meta_options;

	/* one page. */
	if(is_page() && isset($opt_meta_options['page_one_page']) && $opt_meta_options['page_one_page']) {
		wp_register_script('jquery.singlePageNav', get_template_directory_uri() . '/assets/js/jquery.singlePageNav.js', array('jquery'), '1.2.0');
		wp_localize_script('jquery.singlePageNav', 'one_page_options', array('filter' => '.is-one-page', 'speed' => $opt_meta_options['page_one_page_speed']));
		wp_enqueue_script('jquery.singlePageNav');
	}
	
	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.2');
		
	/* Add main.js */
	wp_enqueue_script('enormous-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
	
	/* Add menu.js */
	wp_enqueue_script('enormous-menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), '1.0.0', true);

	/* Magnific Popup */
    wp_enqueue_script('magnific-image', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.0', true);
    
	/* Comment */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Same Height */
    wp_enqueue_script('matchHeight', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script('sameheight', get_template_directory_uri() . '/assets/js/sameheight.js', array( 'jquery' ), '1.0.0', true);

    /* Masonry */
    //wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array( 'jquery' ), '1.0.0', true);

    /* animation column */
    wp_enqueue_script('animation-column', get_template_directory_uri() . '/assets/js/animation-column.js', array( 'jquery' ), '1.0.0', true);

	/** ----------------------------------------------------------------------------------- */
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');
	
	/* Loads Awesome font stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	/* Loads material-design-iconic font stylesheet. */
	wp_enqueue_style('material-design-iconic-font', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '');

	/* Loads Ionicons font stylesheet. */

	wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), '');   
	
	/* Loads Pe Icon. */
	wp_enqueue_style('cmssuperheroes-pe-icon', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.0.1'); 

	/* Loads Et Line font stylesheet. */
	wp_enqueue_style('et-line', get_template_directory_uri() . '/assets/css/et-line.min.css', array(), '');

	/* Olw Carousel */
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0.1');

	/* Slick */
	wp_register_style('cms-slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.1');
	wp_register_script('cms-slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('cms-slick-main', get_template_directory_uri(). '/assets/js/cms_testimonial.js', array(), '1.0');
	
	/* Style Scroll */
    wp_enqueue_script('scroll-bar', get_template_directory_uri() . '/assets/js/enscroll.js', array( 'jquery' ), '1.0.0', true);     
	/* Loads our main stylesheet. */
	wp_enqueue_style( 'enormous-style', get_stylesheet_uri(), array( 'bootstrap' ));

	/* Loads the Internet Explorer specific stylesheet. */
	wp_enqueue_style( 'enormous-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'enormous-style' ), '20121010' );
	
	/* ie */
	$wp_styles->add_data( 'enormous-ie', 'conditional', 'lt IE 9' );

	/* Loads fonts stylesheet. */
	wp_enqueue_style('cmssuperheroes-fonts', get_template_directory_uri() . '/assets/css/fonts.css');
	wp_enqueue_style( 'enormous-fonts', enormous_fonts_url(), array(), null );   
	
	/* Load static css*/
	wp_enqueue_style('enormous-static', get_template_directory_uri() . '/assets/css/static.css', array( 'enormous-style' ), '1.0.0');

	/* Popup Images Gallery */
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.1');

	/*pie chart*/
	wp_enqueue_script('progressCircle', get_template_directory_uri() . '/assets/js/process_cycle.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('vc_pie_custom', get_template_directory_uri() . '/assets/js/vc_pie_custom.js', array( 'jquery' ), '1.0.0', true);

	/* parallax*/
	wp_enqueue_script('parallax-js', get_template_directory_uri() . '/assets/js/parallax.min.js', array( 'jquery' ), '1.0.0', true);

	/* Loads animations stylesheet. */
	wp_enqueue_style('animations', get_template_directory_uri() . '/assets/css/animations.css');
}

add_action( 'wp_enqueue_scripts', 'enormous_front_end_scripts' );

/**
 * load admin scripts.
 * 
 * @author FOX
 */
function enormous_admin_scripts(){

	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	$screen = get_current_screen();

	/* load js for edit post. */
	if($screen->post_type == 'post'){
		/* post format select. */
		wp_enqueue_script('post-format', get_template_directory_uri() . '/assets/js/post-format.js', array(), '1.0.0', true);
	}
}

add_action( 'admin_enqueue_scripts', 'enormous_admin_scripts' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function enormous_widgets_init() {

	global $opt_theme_options;

	
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'enormous' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'enormous' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title"><span>',
		'after_title' => '</span></h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Newsletter', 'enormous' ),
		'id' => 'newsletter',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Service Sidebar', 'enormous' ),
		'id' => 'sidebar-service',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'enormous' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar(array(
        'name' => 'Woocommerce Sidebar',
        'id' => 'woocommerce-widget-area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title"><span>',
		'after_title' => '</span></h3>',
    ));

    register_sidebar( array(
		'name' => esc_html__( 'Shop Cart', 'enormous' ),
		'id' => 'shop-cart',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Hidden Sidebar', 'enormous' ),
		'id' => 'hidden-sidebar',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'enormous' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title"><span>',
		'after_title' => '</span></h3>',
	) );
	/* footer-top */
	if(!empty($opt_theme_options['footer-top-column'])) {

		for($i = 1 ; $i <= $opt_theme_options['footer-top-column'] ; $i++){
			register_sidebar(array(
				'name' => sprintf(esc_html__('Footer Top %s', 'enormous'), $i),
				'id' => 'sidebar-footer-top-' . $i,
				'description' => esc_html__('Appears on posts and pages except the optional Front Page template, which has its own widgets', 'enormous'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
		}
	}
	register_sidebar( array(
		'name' => esc_html__( 'Footer Fixed', 'enormous' ),
		'description' => esc_html__( 'Apply Footer layout 5.', 'enormous' ),
		'id' => 'footer-fixed',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Feature 1', 'enormous' ),
		'description' => esc_html__( 'Apply Footer layout 6.', 'enormous' ),
		'id' => 'footer-feature-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Feature 2', 'enormous' ),
		'description' => esc_html__( 'Apply Footer layout 6.', 'enormous' ),
		'id' => 'footer-feature-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Feature 3', 'enormous' ),
		'description' => esc_html__( 'Apply Footer layout 6.', 'enormous' ),
		'id' => 'footer-feature-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Bottom', 'enormous' ),
		'description' => esc_html__( 'Apply Footer layout 6.', 'enormous' ),
		'id' => 'footer-bottom',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

}

add_action( 'widgets_init', 'enormous_widgets_init' );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since 1.0.0
 */
function enormous_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}

add_filter( 'wp_page_menu_args', 'enormous_page_menu_args' );

/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function enormous_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'enormous' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'enormous' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'enormous' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function enormous_paging_nav() {
    // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
	) );

	if ( $links ) :

	?>
	<nav class="navigation cms-paging-navigation clearfix">
			<div class="pagination loop-pagination">
				<?php echo wp_kses_post($links); ?>
			</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function enormous_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
	<nav class="navigation post-navigation">
		<div class="nav-links row clearfix">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
			<?php $previousPost = get_previous_post(); $url_prev = wp_get_attachment_url( get_post_thumbnail_id($previousPost->ID));?>
				<div class="post-prev col-lg-6 col-md-6 col-sm-6 col-xs-12 <?php if(empty($url_prev)){echo 'no-image'; }?>">
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
						<img src="<?php echo esc_url($url_prev); ?>" />
						<div class="nav-inner">
				  			<span><?php echo esc_html_e('Previous Post', "enormous") ?></span>
					  		<h3><?php echo get_the_title( $prev_post->ID ); ?></h3>
					  	</div>
				  	</a>
				</div>
			<?php endif; ?>
			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) { ?>
			<?php $nextPost = get_next_post(); $url_next = wp_get_attachment_url( get_post_thumbnail_id($nextPost->ID), 'enormous_images-sm');?>
				<div class="post-next col-lg-6 col-md-6 col-sm-6 col-xs-12 <?php if(empty($url_next)){echo 'no-image'; }?>">
					<a href="<?php echo get_permalink( $next_post->ID ); ?>">
						<img src="<?php echo esc_url($url_next); ?>" />
						<div class="nav-inner">
				  			<span><?php echo esc_html_e('Next Post', "enormous") ?></span>
					  		<h3><?php echo get_the_title( $next_post->ID ); ?></h3>
					  	</div>
					</a>
				</div>
			<?php } ?>

			</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

function enormous_post_nav_portfolio() {
    global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation">

		<div class="nav-links clearfix">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
				<div class="prev">
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<div class="nav-inner hidden-xs">
				  			<span><?php echo esc_html_e('Previous Project', "enormous") ?></span>
					  		<h3><?php echo get_the_title( $prev_post->ID ); ?></h3>
					  	</div>
				  	</a>     

				</div>
			<?php endif; ?>
			<a class="all-portfolio" href="<?php echo esc_url(home_url('/')); ?>?post_type=portfolio"><i class="fa fa-th-large" aria-hidden="true"></i></a>
			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) { ?>   
				<div class="next">
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
						<div class="nav-inner hidden-xs">
				  			<span><?php echo esc_html_e('Previous Project', "enormous") ?></span>
					  		<h3><?php echo get_the_title( $prev_post->ID ); ?></h3>
					  	</div>
					  	<i class="fa fa-angle-right" aria-hidden="true"></i>
				  	</a> 

				</div>
			<?php } ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
function enormous_product_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation">

		<div class="nav-links clearfix">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
				<div class="prev">
					<a class="product-nav" href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
					</a>
				</div>
			<?php endif; ?>
			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) { ?>
				<div class="next">
					<a class="product-nav" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>

				</div>
			<?php } ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/* Add Custom Comment */
function enormous_comment($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-media">
    	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>
    <div class="comment-content">
    	<div class="comment-author vcard">
        	<?php printf( ( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
	    </div>
	    <?php if ( $comment->comment_approved == '0' ) : ?>
	         <em class="comment-awaiting-moderation"><?php esc_html__( 'Your comment is awaiting moderation.', 'enormous' ); ?></em>
	          <br />
	    <?php endif; ?>

	    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
	        <?php
	        /* translators: 1: date, 2: time */
	        printf( esc_html__('%1$s at %2$s', 'enormous'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'enormous' ), '  ', '' );
	        ?>
	    </div>
		
		<div class="comment-description"><?php comment_text(); ?></div>
	    

	    <div class="reply">
	        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	    </div>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}

/* core functions. */
require_once( get_template_directory() . '/inc/functions.php' );


/**
 * user custom fields.
 */
add_action( 'show_user_profile', 'enormous_user_fields' );
add_action( 'edit_user_profile', 'enormous_user_fields' );
function enormous_user_fields($user){

	$user_location = get_user_meta($user->ID, 'user_location', true);

	?>
	<h3><?php esc_html_e('User Location:', 'enormous'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_location"><?php esc_html_e('Location:', 'enormous'); ?></label></th>
            <td>
                <input id="user_location" name="user_location" type="text" value="<?php echo esc_attr(isset($user_location) ? $user_location : ''); ?>" />
                <span class="description"><?php esc_html_e('Please enter User Location.', 'enormous'); ?></span>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * save user custom fields.
 */
add_action( 'personal_options_update', 'enormous_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'enormous_save_user_custom_fields' );
function enormous_save_user_custom_fields( $user_id )   
{
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	if(isset($_POST['user_location']))
		update_user_meta( $user_id, 'user_location', $_POST['user_location'] );
}
/* Replace Stylesheet */
function enormous_validate_stylesheet($src) {
	if(strstr($src,'font-awesome-css')|| strstr($src,'cms-icon-rticon-css') || strstr($src,'mediaelement-css') || strstr($src,'wp-mediaelement-css') || strstr($src,'bootstrap-progressbar-css') ){
		return str_replace('rel', 'property="stylesheet" rel', $src);
	}
	else{
		return $src;
	}
}
add_filter('style_loader_tag', 'enormous_validate_stylesheet');

/**
 * custom widget title.
 * @param $title
 */
function enormous_widget_title($title){

	if(empty($title)) return $title;

	$_title = explode(',', $title);

	if(count($_title) != 2) return $title;

	$title = '<span>'.$_title[0].'</span>' . $_title[1];

	return $title;
}
add_filter('widget_title', 'enormous_widget_title');

/* Add Images Category */
add_action( 'woocommerce_archive_description', 'enormous_woocommerce_category_image', 2 );
function enormous_woocommerce_category_image() {     
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img class="woo-image-categries" src="' . esc_url($image) . '" alt="" />';
		}
	}
}


/* Body Class */

add_filter('body_class', 'enormous_body_class');   
function enormous_body_class($class) {

    global $opt_meta_options;   
    if(empty($opt_meta_options['body_custom_class'])) return $class;

    $class[] =  $opt_meta_options['body_custom_class'];
    return $class;
}

/* Header Class */

add_filter('body_class', 'enormous_headers_class');   
function enormous_headers_class($class_header) {

    global $opt_theme_options, $opt_meta_options;

    if(is_page() && !empty($opt_meta_options['custom_header'])) {
        $opt_theme_options['header_layout'] = $opt_meta_options['header_layout'];
    }

    if(empty($opt_theme_options['header_layout'])) return $class_header;

    $class_header[] =  'header-'.$opt_theme_options['header_layout'];
    return $class_header;
}

/**
 * Ajax update cart total number
 * */
add_filter( 'woocommerce_add_to_cart_fragments', 'enormous_woocommerce_header_add_to_cart_fragment' );
function enormous_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<span class="couter_items"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, "enormous" ), WC()->cart->cart_contents_count ); ?></span>
	<?php

	$fragments['span.couter_items'] = ob_get_clean();

	return $fragments;
}

/* Woo commerce function */
if(class_exists('WooCommerce')){
	/**
	 * Get current users preference
	 * @return int
	 */
	function enormous_products_per_page(){

		global $opt_theme_options, $woocommerce;

		$default = $opt_theme_options['product_per_page'];
		$count = $default;
		$options = enormous_products_per_page_options();

		// capture form data and store in session
		if(isset($_POST['enormous-woocommerce-products-per-page'])){

			// set products per page from dropdown
			$products_max = intval($_POST['enormous-woocommerce-products-per-page']);
			if($products_max != 0 && $products_max >= -1){

				if(is_user_logged_in()){

					$user_id = get_current_user_id();
					$limit = get_user_meta( $user_id, '_product_per_page', true );

					if(!$limit){
						add_user_meta( $user_id, '_product_per_page', $products_max);
					}else{
						update_user_meta( $user_id, '_product_per_page', $products_max, $limit);
					}
				}

				$woocommerce->session->enormous_product_per_page = $products_max;
				return $products_max;
			}
		}

		// load product limit from user meta
		if(is_user_logged_in() && !isset($woocommerce->session->enormous_product_per_page)){

			$user_id = get_current_user_id();
			$limit = get_user_meta( $user_id, '_product_per_page', true );

			if(array_key_exists($limit, $options)){
				$woocommerce->session->enormous_product_per_page = $limit;
				return $limit;
			}
		}

		// load product limit from session
		if(isset($woocommerce->session->enormous_product_per_page)){

			// set products per page from woo session
			$products_max = intval($woocommerce->session->enormous_product_per_page);
			if($products_max != 0 && $products_max >= -1){
				return $products_max;
			}
		}

		return $count;
	}
	add_filter('loop_shop_per_page','enormous_products_per_page');

	/**
	 * Fetch list of avaliable options
	 * @return array
	 */
	function enormous_products_per_page_options(){
		$cms_products_perpage = array(
			'9' => esc_html__('9 Products / page', 'enormous'),
			'12' => esc_html__('12 Products / page', 'enormous'),
			'16' => esc_html__('16 Products / page', 'enormous'),
			'20' => esc_html__('20 Products / page', 'enormous')
		);
		$options = apply_filters( 'enormous_products_per_page', $cms_products_perpage);
		return $options;
	}

	/**
	 * Display dropdown form to change amount of products displayed
	 * @return void
	 */
	function enormous_woocommerce_products_per_page(){
		global $wp_query;
		$paged    = max( 1, $wp_query->get( 'paged' ) );
		$total    = $wp_query->found_posts;
		$options = enormous_products_per_page_options();
		$current_value = enormous_products_per_page();
		?>
		<form action="" method="POST" class="woocommerce-products-per-page">
			<label><select name="enormous-woocommerce-products-per-page"  class="filter-products-per-page" onchange="this.form.submit()">
				<?php foreach($options as $value => $name):
					if ($value == $current_value){
						$label = $name;
					} else {
						$label = $name;
					}
					?>
					<?php if(ceil($total/$value) >= $paged): ?>
					<option value="<?php echo esc_attr($value); ?>" <?php selected($value, $current_value); ?>><?php echo esc_html($label); ?></option>
				<?php endif; ?>
				<?php endforeach; ?>
			</select></label>
		</form>
		<?php
	}
}

function enormous_quick_view(){
	if ( ! isset( $_REQUEST['product_id'] ) ) {
		die();
	}

	$product_id = intval( $_REQUEST['product_id'] );

	// set the main wp query for the product
	wp( 'p=' . $product_id . '&post_type=product' );
	ob_start();

	// load content template
	wc_get_template( 'quick-view-content.php', array(), '', get_template_directory() . '/woocommerce/' );

	echo ob_get_clean();     
	die();

}

if ( ! function_exists( 'enormous_fonts_url' ) ) :
/**
 * Register Google fonts for enormous.
 *
 * Create your own wp_arose_fonts_url() function to override in a child theme.
 *
 * @since enormous 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
function enormous_fonts_url()
{
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'enormous' ) )
    {
        $fonts[] = 'Poppins:300,400,500,600,700';
    }

    if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'enormous' ) )
    {
        $fonts[] = 'Raleway:100,300,400,500,600,700,800,900';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif; // enormous_fonts_url


remove_action('tgmpa_register', 'newsletter_register_required_plugins');

/**
 * Demo Data
 */
add_filter('ef3-theme-options-opt-name', 'enormous_set_demo_opt_name');

function enormous_set_demo_opt_name(){
	return 'opt_theme_options';
}

add_filter('ef3-replace-content', 'enormous_replace_content', 10 , 2);

function enormous_replace_content($replaces, $attachment){
	return array(
		'/tax_query:/' => 'remove_query:',
		'/categories:/' => 'remove_query:',
	);
}

add_filter('ef3-replace-theme-options', 'enormous_replace_theme_options');

function enormous_replace_theme_options(){    
	return array(
		'dev_mode' => 0,        
	);
}

add_filter('ef3-enable-create-demo', 'enormous_enable_create_demo');

function enormous_enable_create_demo(){
	return false;                 
}
 