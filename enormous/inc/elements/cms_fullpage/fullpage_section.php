<?php
	/**
	 * Created by PhpStorm.
	 * User: Nic
	 * Date: 4/5/2017
	 * Time: 2:05 PM
	 */
	
	vc_map( array(
		"name"                    => 'CMS FullPage Section',
		"base"                    => "cms_fullpage_section",
		"icon"                    => "cs_icon_for_vc",
		"category"                => esc_html__( 'CmsSuperheroes Shortcodes', "enormous" ),
		"as_parent"               => array( 'except' => 'cms_fullpage_section' ),
		"content_element"         => true,
		"js_view"                 => 'VcColumnView',
		"show_settings_on_create" => true,
		"params"                  => array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( "Background Image", "enormous" ),
				'param_name' => 'section_background',
				'value'      => ''
			),
			array(
	            "type" => "colorpicker",
	            "heading" => esc_html__("Background Color Overlay", 'enormous'),
	            "param_name" => "section_background_overlay_color",
	            "value" => "",
	        ),
	        array(
	            "type" => "dropdown",
	            "class" => "",
	            "heading" => esc_html__("Content Type", 'enormous'),
	            "admin_label" => true,
	            "param_name" => "section_type",
	            "value" => array(
	                "Boxed" => "section-boxed",
	                "Wide" => "section-wide"
	            ),
	        ),
	        array(
	            "type" => "dropdown",
	            "class" => "",
	            "heading" => esc_html__("Remove Padding Columns", 'enormous'),
	            "admin_label" => true,
	            "param_name" => "remove_column_padding",
	            "value" => array(
	                "No" => "col-padding-default",
	                "Yes" => "reomve-col-padding-default"
	            ),
	        ),
		)
	) );
	
	class WPBakeryShortCode_cms_fullpage_section extends WPBakeryShortCodesContainer {
		
		protected function content( $atts, $content = null ) {
			return parent::content( $atts, $content );
		}
	}
