<?php
vc_map(array(
    "name" => 'CMS Lists',
    "base" => "cms_list",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'enormous'),
    "params" => array(

        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("List Style", 'enormous'),
            'param_name' => 'list_style',
            'value' => array(
                'List Style 1' => 'list-style1',                  
                'List Style 2' => 'list-style2',                  
                'List Style 3' => 'list-style3',                  
                'List Style 4' => 'list-style4',                  
                'List Style 5' => 'list-style5',                  
                'List Style 6' => 'list-style6',                  
                'List Style 7' => 'list-style7',                  
                'List Style 8' => 'list-style8',                  
            ),
        ),  
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Font Size", 'enormous'),
            "param_name" => "cms_list_fontsize",
            'value' => '',
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Line Height", 'enormous'),
            "param_name" => "cms_list_lineheight",
            'value' => '',
        ),
        array(
            "type" => "colorpicker",
            "heading" =>esc_html__("List item Color", 'enormous'),
            "param_name" => "cms_list_color",
            'value' => '',
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Lists', 'enormous' ),
            'param_name' => 'cms_list',
            'description' => esc_html__( 'Enter values for list item', 'enormous' ),
            'value' => urlencode(
                json_encode( array(
                        array(
                            'cms_list_item' => '', 
                        ),
                    ) 
                ) 
            ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("List item", 'enormous'),
                    "param_name" => "cms_list_item",
                    'admin_label' => true,
                ), 
            ),
        ),
    )
));

class WPBakeryShortCode_cms_list extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>