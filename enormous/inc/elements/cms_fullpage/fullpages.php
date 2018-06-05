<?php
	/**
	 * Created by PhpStorm.
	 * User: Nic
	 * Date: 4/5/2017
	 * Time: 2:05 PM
	 */
	vc_map( array(
		"name"                    => 'CMS FullPages',
		"base"                    => "cms_fullpages",
		"icon"                    => "cs_icon_for_vc",
		"category"                => esc_html__( 'CmsSuperheroes Shortcodes', "enormous" ),
		"as_parent"               => array( 'except' => 'cms_fullpages' ),
		"js_view"                 => 'VcColumnView',
		"show_settings_on_create" => true,
		"content_element"         => true,
		"params"                  => array(
			
		)
	) );
	
	class WPBakeryShortCode_cms_fullpages extends WPBakeryShortCodesContainer {
		
		protected function content( $atts, $content = null ) {
			wp_enqueue_script( 'fullPage', get_template_directory_uri() . '/assets/js/jquery.fullPage.min.js', array( 'jquery' ), '2.9.4', true );
			wp_enqueue_script( 'CMSFullPage', get_template_directory_uri() . '/assets/js/cms-fullpage.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'fullPageStyle', get_template_directory_uri() . '/assets/css/jquery.fullPage.css', array(), '4.9.4' );
			return parent::content( $atts, $content );
		}
	}

?>