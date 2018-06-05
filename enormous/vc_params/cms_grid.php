<?php
	$params = array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable Load More ", 'enormous'),
            "param_name" => "load_more",
            "value" => array(
                    "No" => "",
                    "Yes" => "yes",
            ),
            "template" => array(
                "cms_grid--layout-blog1.php",
                "cms_grid--layout-blog2.php",
                "cms_grid--layout-shop.php",
                "cms_grid--layout-shop2.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable Paging Navigation", 'enormous'),
            "param_name" => "paging_navigation",
            "value" => array(
                    "No" => "",
                    "Yes" => "yes",
            ),
            "template" => array(
                "cms_grid--layout-blog1.php",
                "cms_grid--layout-blog2.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("CMS Filter Style", 'enormous'),
            "param_name" => "cms_filter_style",
            "value" => array(
                'Style Light' => 'style-light',
                'Style Dark' => 'style-dark' 
            ),
            "group" => esc_html__("Template", 'enormous'),                  
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Text Align", 'enormous'),
            "param_name" => "text_align",
            "value" => array(
                "Left" => "left", 
                "Center" => "center",              
                "Right" => "right",              
            ),
            "template" => array(
                "cms_grid.php",
            ),
            "group" => esc_html__("Heading Settings", 'enormous'),
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Image Crop", 'enormous'),
            "admin_label" => true,
            "param_name" => "image_crop",
            "value" => array(
                "No" => "no",
                "Yes" => "yes",
            ),
            "group" => esc_html__("Template", 'enormous'),
            "template" => array(
                "cms_grid--portfolio-standard.php",
                "cms_grid--portfolio-grid.php",
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Item Space","enormous"),
            "param_name" => "item_space",
            "value" => "",
            "description" => "Default: 15px",
            "group" => esc_html__("Template", 'enormous'),
            "template" => array(
                "cms_grid--portfolio-grid.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Paging Nav Show/Hide", 'enormous'),
            "admin_label" => true,
            "param_name" => "nav_show_hide",
            "value" => array(
                "Show" => "show",
                "Hidden" => "hiden",
            ),
            "group" => esc_html__("Template", 'enormous'),
            "template" => array(
                "cms_grid--portfolio-standard.php",
                "cms_grid--portfolio-grid.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Paging Nav Style", 'enormous'),
            "admin_label" => true,
            "param_name" => "nav_style",
            "value" => array(
                "Default" => "nav",
                "Load More" => "loadmore",
            ),
            "group" => esc_html__("Template", 'enormous'),
            "template" => array(
                "cms_grid--portfolio-standard.php",
                "cms_grid--portfolio-grid.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Button Loadmore Style", 'enormous'),
            "admin_label" => true,
            "param_name" => "btn_load_style",
            "value" => array(
                "Outline" => "outline",
                "Only Text" => "btn-text",
            ),
            "group" => esc_html__("Template", 'enormous'),
            "template" => array(
                "cms_grid--portfolio-standard.php",
                "cms_grid--portfolio-grid.php",
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Overlay Color - Box Hover", 'enormous'),
            "param_name" => "overlay_color",
            "value" => "",
            "template" => array(           
                "cms_grid--portfolio-grid.php",                         
            ),
            "group" => esc_html__("Template", 'enormous')
        ), 
    );
	vc_remove_param('cms_grid','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_grid",
	    "heading" => esc_html__("Shortcode Template", 'enormous'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'enormous'),
		);
	vc_add_param('cms_grid',$cms_template_attribute);
?>