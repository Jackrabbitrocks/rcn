<?php
vc_map(array(
    "name" => 'CMS Call To Action',
    "base" => "cms_cta",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'enormous'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Call to action Sub Title', 'enormous' ),
            "param_name" => "cta_subtitle",
            "value" => '',
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta--layout2.php",     
                )
            ),
            "group" => esc_html__("Settings", 'enormous')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Call to action Sub Title color", 'enormous'),
            "param_name" => "cta_subtitle_color",
            "value" => "",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta--layout2.php",     
                )
            ),
            "group" => esc_html__("Settings", 'enormous')
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__( 'Call to action Title', 'enormous' ),
            "param_name" => "cta_text",
            "value" => '',
            "group" => esc_html__("Settings", 'enormous')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Call to action Title color", 'enormous'),
            "param_name" => "cta_text_color",
            "value" => "",
            "group" => esc_html__("Settings", 'enormous'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Call to action Space', 'enormous' ),
            "param_name" => "cta_space",
            "value" => '',
            "group" => esc_html__("Settings", 'enormous'),
            "description" => esc_html__("ex: 10px", 'enormous'),
        ),
        
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Text on the button', 'enormous' ),
            "param_name" => "button_text",
            "value" => 'button',
            "group" => esc_html__("Settings", 'enormous')
        ),   
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button", 'enormous'),
            "param_name" => "link_button",
            "value" => '',
            "group" => esc_html__("Settings", 'enormous')
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", 'enormous'),
            'param_name' => 'button_style',
            'value' => array(
                'Theme Default' => 'btn-default',                         
                'Button White' => 'btn-white',     
                'Button White Alt' => 'btn-white-alt',   
                'Button Primary' => 'btn-primary',            
                'Button Secondary' => 'btn-secondary',            
                'Button Secondary Alt' => 'btn-secondary-alt',            
                'Button No Style' => 'btn-no-style',           
                'Button No Style Alt' => 'btn-no-style-alt',                    
                'Button No Style White' => 'btn-no-style-white',           
                'Button No Style Primary' => 'btn-no-style-primary',            
            ),
            "group" => esc_html__("Settings", 'enormous'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Size", 'enormous'),
            'param_name' => 'button_size',
            'value' => array(
                'Default' => 'size-default',        
                'Large' => 'btn-lg',               
                'Medium' => 'btn-md',        
                'Medium2' => 'btn-md2',        
                'Mini' => 'btn-xs',        
            ),
            "group" => esc_html__("Settings", 'enormous'),
        ),  
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Button Shape", 'enormous'),
            'param_name' => 'button_shape',
            'value' => array(
                'Default' => '',
                'Square' => 'btn-square',
                'Rounded' => 'btn-rounded',

            ),
            "group" => esc_html__("Settings", 'enormous'),
        ), 
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Duplicated", 'enormous'),
            'param_name' => 'button_duplicated',
            'value' => array(
                'No' => 'no',        
                'Yes' => 'yes',      
            ),
            "group" => esc_html__("Settings", 'enormous'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Content Align", 'enormous'),
            'param_name' => 'content_align',
            'value' => array(
                'Right' => 'cta-right',   
                'Left' => 'cta-left',        
                'Center' => 'cta-center',          
            ),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta--layout2.php",     
                )
            ),
            "group" => esc_html__("Settings", 'enormous'),
        ),   
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Text on the button', 'enormous' ),
            "param_name" => "button_text_duplicated",
            "value" => '',
            "group" => esc_html__("Button Duplicated", 'enormous'),
            'dependency' => array(
                "element"=>"button_duplicated",
                "value"=>array(
                    "yes"
                )
            ),
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button", 'enormous'),
            "param_name" => "link_button_duplicated",
            "value" => '',
            "group" => esc_html__("Button Duplicated", 'enormous'),
            'dependency' => array(
                "element"=>"button_duplicated",
                "value"=>array(
                    "yes"
                )
            ),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", 'enormous'),
            'param_name' => 'button_style_duplicated',
            'value' => array(
                'Theme Default' => 'btn-default',                         
                'Button White' => 'btn-white',     
                'Button White Alt' => 'btn-white-alt',   
                'Button Primary' => 'btn-primary',            
                'Button Secondary' => 'btn-secondary',            
                'Button Secondary Alt' => 'btn-secondary-alt',            
                'Button No Style' => 'btn-no-style',           
                'Button No Style Alt' => 'btn-no-style-alt',                    
                'Button No Style White' => 'btn-no-style-white',           
                'Button No Style Primary' => 'btn-no-style-primary',          
            ),
            "group" => esc_html__("Button Duplicated", 'enormous'),
            'dependency' => array(
                "element"=>"button_duplicated",
                "value"=>array(
                    "yes"
                )
            ),
        ),  
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Extra class name", 'enormous' ),
            "param_name" => "el_class",
            "description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'enormous' ),
            "group" => esc_html__("Settings", 'enormous'),
        ), 
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_cta",
            "heading" => esc_html__("Shortcode Template", 'enormous'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'enormous'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", 'enormous'),
            "param_name" => "cta_style",
            "value" => array(
                "Style 1" => "style1", 
                "Style 2" => "style2"                                                
            ),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(           
                    "cms_cta--layout2.php",                                   
                )
            ),
            "group" => esc_html__("Template", 'enormous'),
        ), 
    )
));

class WPBakeryShortCode_cms_cta extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>