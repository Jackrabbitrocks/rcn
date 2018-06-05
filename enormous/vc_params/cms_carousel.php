<?php
	$params = array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("CMS Custom Style", 'enormous'),
            "param_name" => "cms_style",
            "value" => array(
                'Style Light' => 'style-light',
                'Style Light2' => 'style-light-2',
                'Style Dark' => 'style-dark',    
                'Style Dark2' => 'style-dark-2',    
            ),
            "template" => array(
                "cms_carousel.php",   
                "cms_carousel--layout-client.php",   
                "cms_carousel--layout-client2.php", 
                "cms_carousel--layout-testimonial1.php",          
                "cms_carousel--layout-testimonial3.php",          
                "cms_carousel--layout-latestnews.php",          
                "cms_carousel--layout-team1.php",          
            ),
            "group" => esc_html__("Template", 'enormous'),                  
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Space Description", 'enormous'),
            "param_name" => "space_description",
            "value" => "",
            "template" => array( 
                "cms_carousel--layout-testimonial1.php",          
            ),
            "group" => esc_html__("Template", 'enormous'),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image Icon Quote", 'enormous'),
            "param_name" => "image_icon_quote",
            "template" => array( 
                "cms_carousel--layout-testimonial3.php",          
            ), 
            "group" => esc_html__("Template", 'enormous'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Position Testimonial Color", 'enormous'),
            "param_name" => "position_testimonial_color",
            "value" => "",
            "template" => array( 
                "cms_carousel--layout-testimonial3.php",          
            ),
            "group" => esc_html__("Template", 'enormous')
        ), 

	);
    vc_remove_param('cms_carousel','l_icon_type');
    vc_remove_param('cms_carousel','l_icon_fontawesome');
    vc_remove_param('cms_carousel','l_icon_openiconic');
    vc_remove_param('cms_carousel','l_icon_typicons');
    vc_remove_param('cms_carousel','l_icon_entypo');
    vc_remove_param('cms_carousel','l_icon_glyphicons');
    vc_remove_param('cms_carousel','l_icon_rticon');
    vc_remove_param('cms_carousel','l_icon_pe7stroke');
    vc_remove_param('cms_carousel','l_icon_pixelicons');
    vc_remove_param('cms_carousel','l_icon_linecons');

    vc_remove_param('cms_carousel','r_icon_type');
    vc_remove_param('cms_carousel','r_icon_type');
    vc_remove_param('cms_carousel','r_icon_fontawesome');
    vc_remove_param('cms_carousel','r_icon_openiconic');
    vc_remove_param('cms_carousel','r_icon_typicons');
    vc_remove_param('cms_carousel','r_icon_entypo');
    vc_remove_param('cms_carousel','r_icon_glyphicons');
    vc_remove_param('cms_carousel','r_icon_rticon');
    vc_remove_param('cms_carousel','r_icon_pe7stroke');
    vc_remove_param('cms_carousel','r_icon_pixelicons');
    vc_remove_param('cms_carousel','r_icon_linecons');
	vc_remove_param('cms_carousel','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img', 
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_carousel",
	    "heading" => esc_html__("Shortcode Template", 'enormous'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'enormous'),
		);
	vc_add_param('cms_carousel',$cms_template_attribute);
?>