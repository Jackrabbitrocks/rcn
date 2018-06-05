<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_fancybox_single",
		    "heading" => esc_html__("Shortcode Template", 'enormous'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'enormous'),
		),  
        array(
            "type" => "textfield",
            "heading" => esc_html__("Padding Item Body", "enormous"),
            "param_name" => "f_padding",
            "value" => "",
            "description" =>"ex: 10px",
            "template" => array(           
                "cms_fancybox_single--layout5.php",                         
            ),
            "group" => esc_html__("Template", "enormous"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Number", "enormous"),
            "param_name" => "f_number",
            "value" => "",
            "template" => array(           
                "cms_fancybox_single--layout5.php",             
                "cms_fancybox_single--layout7.php",             
                "cms_fancybox_single--layout8.php",             
            ),
            "group" => esc_html__("Template", "enormous"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Number Color", 'enormous'),
            "param_name" => "f_number_color",
            "value" => "",
            "template" => array(           
                "cms_fancybox_single--layout5.php",                         
            ),
            "group" => esc_html__("Template", 'enormous')
        ), 
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Content Background Color", 'enormous'),
            "param_name" => "content_bg_color",
            "value" => "",
            "template" => array(           
                "cms_fancybox_single--layout6.php",                         
            ),
            "group" => esc_html__("Template", 'enormous')
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Sub Title", "enormous"),
            "param_name" => "f_sub_title",
            "value" => "",
            "template" => array(
                "cms_fancybox_single--layout3.php",             
                "cms_fancybox_single--layout5.php",             
                "cms_fancybox_single--layout7.php",             
                "cms_fancybox_single--layout8.php",                             
                "cms_fancybox_single--layout12.php",                             
            ),
            "group" => esc_html__("Template", "enormous"),
        ), 
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Sub Title Color", 'enormous'),
            "param_name" => "f_sub_title_color",
            "value" => "",
            "template" => array(           
                "cms_fancybox_single--layout5.php",                         
            ),
            "group" => esc_html__("Template", 'enormous')
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title Font Size", "enormous"),
            "param_name" => "f_title_fontsize",
            "value" => "",
            "description" =>"ex: 10px",
            "group" => esc_html__("Template", "enormous"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title Font Weight", "enormous"),
            "param_name" => "f_title_fontweight",
            "value" => "",
            "description" =>"ex: 100,400,500,600,700,800",
            "template" => array(                            
                "cms_fancybox_single--layout12.php",                             
            ),
            "group" => esc_html__("Template", "enormous"),
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", 'enormous'),
            "param_name" => "f_title_color",
            "value" => "",
            "group" => esc_html__("Template", 'enormous')
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Space top title", 'enormous'),
            "param_name" => "space_top_title",
            "value" => "",
            "description" =>"ex: 10px",
            "group" => esc_html__("Template", 'enormous')
        ),
        array(
            "type" => "textfield",    
            "heading" => esc_html__("Space bottom title", 'enormous'),
            "param_name" => "space_bottom_title",
            "value" => "",
            "description" =>"ex: 10px",
            "group" => esc_html__("Template", 'enormous')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Content Color", 'enormous'),
            "param_name" => "f_content_color",
            "value" => "",
            "group" => esc_html__("Template", 'enormous')
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon Font Size", "enormous"),
            "param_name" => "f_icon_fontsize",
            "value" => "",
            "description" =>"ex: 10px",
            "group" => esc_html__("Template", "enormous"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Color", 'enormous'),
            "param_name" => "f_icon_color",
            "value" => "",
            "group" => esc_html__("Template", 'enormous')
        ),  
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Text Color", 'enormous'),
            "param_name" => "f_button_color",
            "value" => "",
            "group" => esc_html__("Template", 'enormous')
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Custom Icon -  Add Class Icon", "enormous"),
            "param_name" => "icon_custom",
            "value" => "",
            "description" => 'Please add class icon. Use the library <a href="https://elegantthemes.com" target="_blank">Elegant Icon Font</a>, <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
            "group" => esc_html__("Template", "enormous"),
        ), 
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", 'enormous'),
            "param_name" => "f_bg_color",
            "template" => array(            
                "cms_fancybox_single--layout5.php",                         
            ),
            "group" => esc_html__("Template", 'enormous')
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Background Image", 'enormous'),
            "param_name" => "f_bg_image",
            "template" => array(            
                "cms_fancybox_single--layout5.php",                         
            ),
            "group" => esc_html__("Template", 'enormous'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("CMS Custom Style", 'enormous'),
            "param_name" => "f_style_bg",
            "value" => array(
                'None' => 'no-overlay',  
                'Background Overlay' => 'bg-overlay',    
            ),   
            "template" => array(            
                "cms_fancybox_single--layout5.php",                         
            ),
            "group" => esc_html__("Template", 'enormous'),              
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", 'enormous'),
            "param_name" => "f_style",
            "value" => array(
                'Style 1' => 'style-1',  
                'Style 2' => 'style-2',    
                'Style 3' => 'style-3',    
            ),   
            "template" => array(            
                "cms_fancybox_single--layout2.php",             
                "cms_fancybox_single--layout4.php",             
                "cms_fancybox_single--layout5.php",             
                "cms_fancybox_single--layout6.php",                             
            ),
            "group" => esc_html__("Template", 'enormous'),              
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("CMS Style", 'enormous'),
            "param_name" => "cms_style",
            "value" => array(
                'Style Light' => 'style-light',  
                'Style Dark' => 'style-dark'       
            ),   
            "template" => array(            
                "cms_fancybox_single--layout1.php"                             
            ),
            "group" => esc_html__("Template", 'enormous'),              
        ),
	);
?>