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
 
function rcn_shortcodes_init()
{
    add_shortcode('rcn', 'rcn_shortcode');
}
 
add_action('init', 'rcn_shortcodes_init');