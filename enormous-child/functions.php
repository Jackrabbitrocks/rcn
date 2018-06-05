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
    wp_enqueue_style('mobile_search', get_stylesheet_directory_uri() . '/assets/css/mobile_search.css', array(
        $parent_style
    ));
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css', array(
        $parent_style
    ));
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function wpb_adding_scripts() {
 
	wp_register_script('searchbox', 'http://secure.rezserver.com/public/js/searchbox/searchbox.min.js', array('jquery'));
	 
	wp_enqueue_script('searchbox');
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