<?php
vc_map(array(
    "name" => 'CMS Button',
    "base" => "cms_button",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'enormous'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Text on the button', 'enormous' ),
            "param_name" => "button_text",
            "value" => 'button',
            "group" => esc_html__("Button Settings", 'enormous')
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button", 'enormous'),
            "param_name" => "link_button",
            "value" => '',
            "group" => esc_html__("Button Settings", 'enormous')
        ),
        /* Start Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'enormous' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'enormous' ) => 'fontawesome',
                esc_html__( 'Open Iconic', 'enormous' ) => 'openiconic',
                esc_html__( 'Typicons', 'enormous' ) => 'typicons',
                esc_html__( 'Entypo', 'enormous' ) => 'entypo',
                esc_html__( 'Linecons', 'enormous' ) => 'linecons',
                esc_html__( 'Pixel', 'enormous' ) => 'pixelicons',
                esc_html__( 'P7 Stroke', 'enormous' ) => 'pe7stroke',
                esc_html__( 'RT Icon', 'enormous' ) => 'rticon',
            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'enormous' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'fontawesome',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'enormous' ),
            'param_name' => 'icon_openiconic',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'enormous' ),
            'param_name' => 'icon_typicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'typicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'enormous' ),
            'param_name' => 'icon_entypo',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
            'description' => esc_html__( 'Select icon from library.', 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'enormous' ),
            'param_name' => 'icon_linecons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'enormous' ),
            'param_name' => 'icon_pixelicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pixelicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pixelicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'enormous' ),
            'param_name' => 'icon_pe7stroke',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pe7stroke',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pe7stroke',
            ),
            'description' => esc_html__( 'Select icon from library.', 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'enormous' ),
            'param_name' => 'icon_rticon',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'rticon',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'rticon',
            ),
            'description' => esc_html__( 'Select icon from library.', 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ),
        /* End Icon */
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Icon Align", 'enormous'),
            "admin_label" => true,
            "param_name" => "icon_align",
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            "group" => esc_html__("Button Settings", 'enormous'),
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
                'Button Primary Alt' => 'btn-primary-alt',            
                'Button Secondary' => 'btn-secondary',            
                'Button Secondary Alt' => 'btn-secondary-alt',            
                'Button No Style' => 'btn-no-style',           
                'Button No Style Alt' => 'btn-no-style-alt',                    
                'Button No Style White' => 'btn-no-style-white',           
                'Button No Style Primary' => 'btn-no-style-primary',           
            ),
            "group" => esc_html__("Button Settings", 'enormous'),
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
            "group" => esc_html__("Button Settings", 'enormous'),
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
            "group" => esc_html__("Button Settings", 'enormous'),
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( "Extra class name", 'enormous' ),
            "param_name" => "el_class",
            "description" => esc_html__ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'enormous' ),
            "group" => esc_html__("Button Settings", 'enormous'),
        ), 
         array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_button",
            "heading" => esc_html__("Shortcode Template", 'enormous'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'enormous'),   
        ),  
    )
));

class WPBakeryShortCode_cms_button extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>