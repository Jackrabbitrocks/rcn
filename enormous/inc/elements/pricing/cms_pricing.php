<?php
vc_map(array(
    "name" => 'Pricing Table',
    "base" => "cms_pricing",
    "icon" => "cs_icon_for_vc",
    "category" =>  esc_html__('CmsSuperheroes Shortcodes', 'enormous'),
    "params" => array(
        array(
            "type" => "img",
            "param_name" => "cms_template",
            "admin_label" => true,
            "heading" => esc_html__("Shortcode Template", 'enormous'),
            "group" => esc_html__("Template", 'enormous'),
            'value' => array(
                'pricing1' => get_template_directory_uri().'/vc_params/cms_pricing/cms_pricing--layout1.jpg',
                'pricing2' => get_template_directory_uri().'/vc_params/cms_pricing/cms_pricing--layout2.jpg',
                'pricing3' => get_template_directory_uri().'/vc_params/cms_pricing/cms_pricing--layout3.jpg',
            ),
        ),
        array(
            'type' => 'hidden',
            'param_name' => 'html_id',
            'value' => 'enormous-pricing',
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("CMS Custom Style", 'enormous'),
            "param_name" => "pr_style",
            "value" => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',           
                'Style 3' => 'style3',           
            ),  
            'dependency' => array(
                'element' => 'cms_template',
                'value' => 'pricing1',
            ),              
        ), 

        /* Pricing 1 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Pricing style 1', 'enormous' ),
            'param_name' => 'pricing1',
            'description' => esc_html__( 'Enter values for pricing item', 'enormous' ),
            'value' => urlencode(
                json_encode( array(
                        array(
                            'pr1_package_name' => 'Starter Plan',
                            'pr1_subtitle' => 'All plans are include , People Search, and A/B Testing Report.',
                            'pr1_price' => 50,
                            'pr1_currency' => '$',
                            'pr1_time' => 'Monthly',
                            'pr1_button' => 'Get Started Now',
                            'pr1_button_url' => '#',
                            'pr1_feature' => 'no-feature'
                        ),
                    ) 
                ) 
            ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Package name", 'enormous'),
                    "param_name" => "pr1_package_name",
                    'admin_label' => true,
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Sub Title", 'enormous'),
                    "param_name" => "pr1_subtitle",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Price", 'enormous'),
                    "param_name" => "pr1_price",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Currency", 'enormous'),
                    "param_name" => "pr1_currency",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Time", 'enormous'),
                    "param_name" => "pr1_time",
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( 'Text on the button', 'enormous' ),
                    "param_name" => "pr1_button",
                ),   
                array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => esc_html__("Link button", 'enormous'),
                    "param_name" => "pr1_button_url",
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => esc_html__("Background Color", 'enormous'),
                    "param_name" => "pr1_bg_color",
                    "value" => "",
                    "group" => esc_html__("Template", 'enormous')
                ), 
                array(
                    "type" => "textarea",
                    "heading" => esc_html__("Description", 'enormous'),
                    "param_name" => "pr1_description",
                    "value" => "",
                    "description" => esc_html__("Description Of Pricing - ex: <ul><li>content</li></ul>", 'enormous'),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Content Align", 'enormous'),
                    "param_name" => "pr1_content_align",
                    "value" => array(
                        "Default" => "default",
                        "Left" => "left",
                        "Right" => "right",
                        "Center" => "center"
                    ),
                ),   
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Show feature", 'enormous'),
                    "param_name" => "pr1_feature",
                    "value" => array(
                        "No" => "no-feature",
                        "Yes" => "is-feature",
                    ),    
                ),  
            ),
            'dependency' => array(
                'element' => 'cms_template',
                'value' => 'pricing1',
            ),      
        ),
        
        /* Pricing 2 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Pricing style 2', 'enormous' ),
            'param_name' => 'pricing2',
            'description' => esc_html__( 'Enter values for pricing item', 'enormous' ),
            'value' => urlencode(
                json_encode( array(
                        array(
                            'pr2_package_name' => 'Starter Plan',
                            'pr2_subtitle' => 'All plans are include , People Search, and A/B Testing Report.',
                            'pr2_price' => 50,
                            'pr2_currency' => '$',
                            'pr2_time' => 'Monthly',
                            'pr2_button' => 'Get Started Now',
                            'pr2_button_url' => '#',
                        ),
                    ) 
                ) 
            ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Package name", 'enormous'),
                    "param_name" => "pr2_package_name",
                    'admin_label' => true,
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Sub Title", 'enormous'),
                    "param_name" => "pr2_subtitle",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Price", 'enormous'),
                    "param_name" => "pr2_price",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Currency", 'enormous'),
                    "param_name" => "pr2_currency",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Time", 'enormous'),
                    "param_name" => "pr2_time",
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( 'Text on the button', 'enormous' ),
                    "param_name" => "pr2_button",
                ),       
                array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => esc_html__("Link button", 'enormous'),
                    "param_name" => "pr2_button_url",   
                ),
                array(
                    "type" => "textarea",
                    "heading" => esc_html__("Description", 'enormous'),
                    "param_name" => "pr2_description",
                    "value" => "",
                    "description" => esc_html__("Description Of Pricing - ex: <ul><li>content</li></ul>", 'enormous'),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Content Align", 'enormous'),
                    "param_name" => "pr2_content_align",
                    "value" => array(
                        "Default" => "default",
                        "Left" => "left",
                        "Right" => "right",
                        "Center" => "center"
                        ),
                ),  
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__('Background Image', 'enormous'),
                    "param_name" => "pr2_bg_image",
                    "value" => '',
                    "description" => esc_html__('Select image background for header pricing', 'enormous')
                ), 
                array(
                    "type" => "colorpicker",
                    "heading" => esc_html__("Background Overlay", 'enormous'),
                    "param_name" => "pr2_bg_overlay",
                    "value" => "",
                    "group" => esc_html__("Template", 'enormous')
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Show feature", 'enormous'),
                    "param_name" => "pr2_feature",
                    "value" => array(
                        "No" => "no-feature",
                        "Yes" => "is-feature",
                    ),    
                ),  
            ),
            'dependency' => array(
                'element' => 'cms_template',
                'value' => 'pricing2',
            ),      
        ),
        /* Pricing 3 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Pricing style 3', 'enormous' ),
            'param_name' => 'pricing3',
            'description' => esc_html__( 'Enter values for pricing item', 'enormous' ),
            'value' => urlencode(
                json_encode( array(
                    array(
                            'pr3_package_name' => 'Starter Plan',
                            'pr3_subtitle' => 'All plans are include , People Search, and A/B Testing Report.',
                            'pr3_price' => 50,
                            'pr3_currency' => '$',
                            'pr3_time' => 'Monthly',
                            'pr3_button' => 'Get Started Now',
                            'pr3_button_url' => '#',
                        ),                    ) 
                ) 
            ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Package name", 'enormous'),
                    "param_name" => "pr3_package_name",
                    'admin_label' => true,
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Sub Title", 'enormous'),
                    "param_name" => "pr3_subtitle",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Price", 'enormous'),
                    "param_name" => "pr3_price",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Currency", 'enormous'),
                    "param_name" => "pr3_currency",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Time", 'enormous'),
                    "param_name" => "pr3_time",
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( 'Text on the button', 'enormous' ),
                    "param_name" => "pr3_button",
                ),       
                array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => esc_html__("Link button", 'enormous'),
                    "param_name" => "pr3_button_url",   
                ),
                array(
                    "type" => "textarea",
                    "heading" => esc_html__("Description", 'enormous'),
                    "param_name" => "pr3_description",
                    "value" => "",
                    "description" => esc_html__("Description Of Pricing - ex: <ul><li>content</li></ul>", 'enormous'),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Content Align", 'enormous'),
                    "param_name" => "pr3_content_align",
                    "value" => array(
                        "Default" => "default",
                        "Left" => "left",
                        "Right" => "right",
                        "Center" => "center"
                        ),
                ),  
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__('Background Image', 'enormous'),
                    "param_name" => "pr3_bg_image",
                    "value" => '',
                    "description" => esc_html__('Select image background for header pricing', 'enormous')
                ), 
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Show feature", 'enormous'),
                    "param_name" => "pr3_feature",
                    "value" => array(
                        "No" => "no-feature",
                        "Yes" => "is-feature",
                    ),    
                ),  
            ),
            'dependency' => array(
                'element' => 'cms_template',
                'value' => 'pricing3',
            ),      
        ),
    )
));
class WPBakeryShortCode_cms_pricing extends CmsShortCode
{
    protected function content($atts, $content = null) {
        $atts_extra = shortcode_atts(array(
            'class' => '',
        ), $atts);
        $atts = array_merge($atts_extra, $atts);
        $html_id = cmsHtmlID('enormous-pricing');
        $class = $atts['class'];
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']).' '.$class;
        $atts['html_id'] = $html_id;

        return parent::content($atts, $content);
    }
}