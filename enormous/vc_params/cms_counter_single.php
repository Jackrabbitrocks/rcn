<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_counter_single",
		    "heading" => esc_html__("Shortcode Template", 'enormous'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'enormous'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Icon -  Add Class Icon", 'enormous'),
			"param_name" => "icon_custom",
			"value" => "",
			"group" => esc_html__("Template", 'enormous'),
		),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("Image Icon", 'enormous'),
            "param_name" => "image_icon",
            "group" => esc_html__("Template", 'enormous'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("CMS Custom Style", 'enormous'),
            "param_name" => "el_class",
            "value" => array(
                'Style 1' => 'style-1',
                'Style 2' => 'style-2',  
                'Style 3' => 'style-3',     
                'Style 4' => 'style-4',     
            ),               
        ),
	);
?>