<?php
	$params = array(
 		array(
            "type" => "dropdown",
            "heading" => esc_html__("CMS Custom Style", 'enormous'),
            "param_name" => "style",
            "value" => array(
                'Style 1' => 'style-1',
                'Style 2' => 'style-2', 
                'Style 3' => 'style-3', 
                'Style 4' => 'style-4', 
                'Style 5' => 'style-5', 
            ),                  
        ),
	);
	vc_remove_param('cms_progressbar','cms_template');
	vc_remove_param('cms_progressbar','width');
	vc_remove_param('cms_progressbar','height');
	vc_remove_param('cms_progressbar','mode');
	vc_remove_param('cms_progressbar','border_radius');
	vc_remove_param('cms_progressbar','bg_color');    
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_progressbar",
	    "heading" => esc_html__("Shortcode Template", 'enormous'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'enormous'),
		);
	vc_add_param('cms_progressbar',$cms_template_attribute);
?>