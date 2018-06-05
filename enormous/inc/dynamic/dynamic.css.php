<?php

/**
 * Auto create css from Meta Options.
 * 
 * @author Fox
 * @version 1.0.0
 */
if(!function_exists('HexToRGB')){
    function HexToRGB($hex,$opacity = 1) {
        $hex = str_replace("#",null, $hex);
        $color = array();
        if(strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
            $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
            $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            $color['a'] = $opacity;
        }
        else if(strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
            $color['a'] = $opacity;
        }
        $color = "rgba(".implode(', ', $color).")";
        return $color;
    }
}
class CMSSuperHeroes_DynamicCss
{

    function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {

        wp_enqueue_style('custom-dynamic',get_template_directory_uri() . '/assets/css/custom-dynamic.css');

        $_dynamic_css = $this->css_render();

        wp_add_inline_style('custom-dynamic', $_dynamic_css);
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
   {
        global $opt_theme_options, $opt_meta_options;

        ob_start();
            if (is_page() && isset($opt_meta_options['general_background'])) {
                echo "body#cms-theme{
                    background-color:".$opt_meta_options['general_background']['background-color'].";    
                }";
            }
            if (is_page() && isset($opt_meta_options['general_background']['background-image'])) {
                echo "body#cms-theme{      
                    background-image: url(".esc_url($opt_meta_options['general_background']['background-image']).");           
                }";               
            }
            if (is_page() && isset($opt_meta_options['general_background']['background-size'])) {
                echo "body#cms-theme{      
                    background-size:".$opt_meta_options['general_background']['background-size'].";          
                }";               
            }
            if (is_page() && isset($opt_meta_options['general_background']['background-position'])) {
                echo "body#cms-theme{      
                    background-position:".$opt_meta_options['general_background']['background-position'].";          
                }";               
            }
            if (is_page() && isset($opt_meta_options['general_background']['background-attachment'])) {
                echo "body#cms-theme{      
                    background-attachment:".$opt_meta_options['general_background']['background-attachment'].";          
                }";               
            }
            if (is_page() && isset($opt_meta_options['general_background']['background-repeat'])) {
                echo "body#cms-theme{      
                    background-repeat:".$opt_meta_options['general_background']['background-repeat'].";          
                }";               
            }
            if (is_page() && isset($opt_meta_options['general_content_background'])) {
                echo "body .cs-boxed #content{
                    background-color:".$opt_meta_options['general_content_background']['background-color'].";    
                }";
            }
            if(!empty($opt_meta_options['body_padding'])) {
                echo 'body{padding-top:'.$opt_meta_options['body_padding']['padding-top'].';padding-bottom:'.$opt_meta_options['body_padding']['padding-bottom'].' !important;'.';padding-left:'.$opt_meta_options['body_padding']['padding-left'].' !important;'.';padding-right:'.$opt_meta_options['body_padding']['padding-right'].' !important;}';
             }
              if(!empty($opt_meta_options['body_padding']['padding-top'])) {
                echo '.header-trans #cshero-header {top: '.$opt_meta_options['body_padding']['padding-top'].';}';

             }
             if(!empty($opt_meta_options['body_padding']['padding-left'])) {
                echo '#cshero-header-inner #cshero-header.header-fixed {left: '.$opt_meta_options['body_padding']['padding-left'].';width:auto;}';
             }
              if(!empty($opt_meta_options['body_padding']['padding-right'])) {
                echo '#cshero-header-inner #cshero-header.header-fixed {right: '.$opt_meta_options['body_padding']['padding-right'].';width:auto}';
             }
              if(!empty($opt_meta_options['body_padding']['padding-top'])) {
             $admin_top=$opt_meta_options['body_padding']['padding-top']+ 32;
                echo '.admin-bar .header-trans #cshero-header:not(.header-fixed) {top: '. $admin_top.'px;}';

             }
             if(!empty($opt_meta_options['body_padding']['padding-left'])) {
                echo '.vc_row[data-vc-full-width] {border-left-width: '.$opt_meta_options['body_padding']['padding-left'].'; border-color: #fff; border-style: solid;}';   
             }
             if(!empty($opt_meta_options['body_padding']['padding-right'])) {
                echo '.vc_row[data-vc-full-width] {border-right-width: '.$opt_meta_options['body_padding']['padding-right'].'; border-color: #fff; border-style: solid;}';   
             }

            if (is_page() && !empty($opt_meta_options['page_title_background'])) {
                echo "body #page-title.page-title{
                    background-color:".$opt_meta_options['page_title_background']['background-color'].";    
                }";
            }
            if (is_page() && !empty($opt_meta_options['page_title_background']['background-image'])) {
                echo "#cms-theme #page-title.page-title{      
                    background-image: url(".esc_url($opt_meta_options['page_title_background']['background-image']).");           
                }";               
            }
            if (is_page() && !empty($opt_meta_options['page_title_background']['background-size'])) {
                echo "body #page-title.page-title{      
                    background-size:".$opt_meta_options['page_title_background']['background-size'].";          
                }";               
            }
            if (is_page() && !empty($opt_meta_options['page_title_background']['background-position'])) {
                echo "body #page-title.page-title{      
                    background-position:".$opt_meta_options['page_title_background']['background-position'].";          
                }";               
            }
            if (is_page() && !empty($opt_meta_options['page_title_background']['background-attachment'])) {
                echo "body #page-title.page-title{      
                    background-attachment:".$opt_meta_options['page_title_background']['background-attachment'].";          
                }";               
            }
            if (is_page() && !empty($opt_meta_options['page_title_background']['background-repeat'])) {
                echo "body #page-title.page-title{      
                    background-repeat:".$opt_meta_options['page_title_background']['background-repeat'].";          
                }";               
            }
            
            
            if (is_page() && !empty($opt_meta_options['background_overlay'])) {
                echo "body #page-title.page-title .background-overlay{
                    background-color:".$opt_meta_options['background_overlay']['rgba'].";    
                }";
            }
            if (is_page() && !empty($opt_meta_options['page_title_font_size'])) {
                echo "body #page-title.page-title #page-title-text h1{
                    font-size:".$opt_meta_options['page_title_font_size'].";             
                }";
            }
            if (is_page() && !empty($opt_meta_options['page_title_padding'])) {
                echo "body #page-title.page-title{
                    padding-top:".$opt_meta_options['page_title_padding']['padding-top'].";    
                    padding-bottom:".$opt_meta_options['page_title_padding']['padding-bottom'].";       
                }";
            }
            if (is_page() && !empty($opt_meta_options['breadcrumb_padding'])) {
                echo "body #page-title.page-title #breadcrumb-text ul.breadcrumbs{
                    padding-top:".$opt_meta_options['breadcrumb_padding']['padding-top'].";       
                    padding-bottom:".$opt_meta_options['breadcrumb_padding']['padding-bottom'].";       
                }";
            }

            if (is_page() && !empty($opt_meta_options['footer_background'])) {
                echo "body footer #cshero-footer{
                    background-color:".$opt_meta_options['footer_background']['background-color'].";    
                }";
            }
            if (is_page() && !empty($opt_meta_options['footer_background']['background-image'])) {
                echo "body footer #cshero-footer{      
                    background-image: url(".esc_url($opt_meta_options['footer_background']['background-image']).");           
                }";               
            }
            if (is_page() && !empty($opt_meta_options['footer_background']['background-size'])) {
                echo "body footer #cshero-footer{      
                    background-size:".$opt_meta_options['footer_background']['background-size'].";          
                }";               
            }
            if (is_page() && !empty($opt_meta_options['footer_background']['background-position'])) {
                echo "body footer #cshero-footer{      
                    background-position:".$opt_meta_options['footer_background']['background-position'].";          
                }";               
            }
            if (is_page() && !empty($opt_meta_options['footer_background']['background-attachment'])) {
                echo "body footer #cshero-footer{      
                    background-attachment:".$opt_meta_options['footer_background']['background-attachment'].";          
                }";               
            }
            if (is_page() && !empty($opt_meta_options['footer_background']['background-repeat'])) {
                echo "body footer #cshero-footer{      
                    background-repeat:".$opt_meta_options['footer_background']['background-repeat'].";          
                }";               
            }

        /* custom css. */
        ?>

        <?php
        
        return ob_get_clean();
    }
}

new CMSSuperHeroes_DynamicCss();