<?php

/**
 * add child styles.
 * 
 * @author FOX
 * @since 1.0.0
 */
function theme_enqueue_styles()
{
    $parent_style = 'cmssuperheroes-style';
    
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(
        $parent_style
    ));
    wp_enqueue_style('rs_calendar_style', get_stylesheet_directory_uri() . '/assets/css/rs_calendar_style.css', array(
        $parent_style
    ));
    wp_enqueue_style('rs_searchbox', get_stylesheet_directory_uri() . '/assets/css/rs_searchbox.css', array(
        $parent_style
    ));
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css', array(
        $parent_style
    ));
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function wpb_adding_scripts() {
 
	wp_register_script('searchbox', 'http://secure.rezserver.com/public/js/searchbox/searchbox.min.js', array('jquery'));
	wp_register_script('rcn', get_stylesheet_directory_uri() . '/assets/js/rcn.js', array('jquery'));
	 
	wp_enqueue_script('searchbox');
	wp_enqueue_script('rcn');
}
  
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' ); 

/**
 * load vc template dir.
 * 
 * @author FOX
 * @since 1.0.0
 */
if (function_exists("vc_set_shortcodes_templates_dir")) {
    vc_set_shortcodes_templates_dir(get_stylesheet_directory() . "/vc_templates/");
}

/* load template functions */
require_once( get_template_directory() . '/inc/template.functions.php' );

// register shortcode
// function rcn_shortcode($atts = [], $content = null)
// {
//     // do something to $content
//     $content = '<h1>' . $content . '</h1>';
//     // always return
//     return $content;
// }
// add_shortcode('rcn', 'rcn_shortcode');

function rcn_shortcode($atts = [], $content = null, $tag = '')
{
    $formHTML = file_get_contents(get_stylesheet_directory() . "/inc/inc-test.php");
    // normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);
 
    // override default attributes with user attributes
    $rcn_atts = shortcode_atts([
                                     'location' => 'Pick-Up Location',
                                 ], $atts, $tag);
 
    // start output
    $o = '';
 
    // start box
    $o .= '<div class="rcn-box">';
 
    // title
    $o .=  str_replace("Pick-Up Location", esc_html__($rcn_atts['location'], 'rcn'), $formHTML) ;

    // $o .= $formHTML;
 
    // enclosing tags
    if (!is_null($content)) {
        // secure output by executing the_content filter hook on $content
        $o .= apply_filters('the_content', $content);
 
        // run shortcode parser recursively
        $o .= do_shortcode($content);
    }
 
    // end box
    $o .= '</div>';
 
    // return output
    return $o;
}

function rcn_location_hint()
{
    $formHTML = file_get_contents(get_stylesheet_directory() . "/inc/inc-test.php");
    $theTitle = get_the_title();

    //     $theLocation = get_field('location') ?? "Pick Up Location"; 
 
    // start output
    $o = '';
 
    // start box
    $o .= '<div class="rcn-box">';
 
    // title
    $o .=  str_replace("Pick-Up Location", $theTitle, $formHTML) ;
    // $o .=  str_replace("Pick-Up Location", $theLocation, $formHTML) ;
 
    // end box
    $o .= '</div>';
    echo $o;
    // return output
    // return $o;
}
 
function rcn_shortcodes_init()
{
    add_shortcode('rcn', 'rcn_shortcode');
}
 
add_action('init', 'rcn_shortcodes_init');


// THIS REPLACES THE enormous_page_title function in header.php since it isn't modular
function rot8tor_page_title(){
    global $opt_theme_options, $opt_meta_options;    

    /* default. */
    $layout = '1';

    if (function_exists('is_woocommerce')){
        if (!empty($opt_theme_options['background_shop_title']['url'])) {
            $opt_theme_options['page_title_background']['url'] = $opt_theme_options['background_shop_title']['url'];
        }    
        if (!empty($opt_theme_options['background_overlay_shop'])) {
            $opt_theme_options['background_overlay'] = $opt_theme_options['background_overlay_shop'];     
        }         
    }
    if(is_page() && !empty($opt_meta_options['custom_page_title'])) {
        $opt_theme_options['page_title_layout'] = $opt_meta_options['page_title_layout'];
    }

    /* get theme options */
    if(isset($opt_theme_options['page_title_layout']))
        $layout = $opt_theme_options['page_title_layout'];

    /* custom layout from page. */
    if(is_page() && !empty($opt_meta_options['page_title_bg_gradient_style'])) {
        $opt_theme_options['page_title_bg_gradient_style'] = $opt_meta_options['page_title_bg_gradient_style'];
    }
    if(is_404()) {
        return;
    }
    if (is_singular('portfolio')){
        $layout= $opt_theme_options['portfolio_layout_pagetitle'];
    }    

    if( class_exists('Woocommerce') && is_shop() || class_exists('Woocommerce') && is_cart() || class_exists('Woocommerce') && is_checkout() || class_exists('Woocommerce') && is_singular('product')) { ?>
        <div id="page-title" class="page-title" style="background-image: url(<?php echo esc_url($opt_theme_options['page_title_background']['url']); ?>);">
            <div class="background-overlay" style="background-color: <?php echo esc_attr($opt_theme_options['background_overlay']['rgba'])?> "></div>     
            <div class="container">
                <div class="row">
                    <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php enormous_get_page_title(); ?></h1></div>
                    <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                </div>
            </div>
        </div>
    <?php } else { ?> 

       
    <?php switch ($layout){
            case '1':         
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay <?php if($opt_meta_options['page_title_bg_overlay_primary'] == 'yes') {echo ' bg-overlay-primary';} ?>"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php include get_stylesheet_directory_uri() . '/inc/inc-test.php'; ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '2':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '3':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title --> 
            <?php
            break;
            case '4':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay bg-gradient <?php echo esc_attr($opt_theme_options['page_title_bg_gradient_style']);?>"></div>   
                <div class="container">
                    <div class="row">
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '5':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '6':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left-md">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right-md"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '7':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay bg-gradient <?php echo esc_attr($opt_theme_options['page_title_bg_gradient_style']);?>"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '8':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '9':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php rcn_location_hint(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;

    } ?>
    <?php }
}