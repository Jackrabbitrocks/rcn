<?php
vc_map(array(
    "name" => 'CMS Video Popup',
    "base" => "cms_videopopup",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', "enormous"),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Video Url', "enormous" ),
            "param_name" => "video_url",
            "value" => '',
        ),
        array(
            "type" => "attach_image",
            "heading" => __ ( 'Video Intro', "enormous" ),
            "param_name" => "video_intro",
            "value" => '',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", 'enormous'),
            "param_name" => "video_bg_color",
            "value" => "",
        ), 
        array(
            "type" => "dropdown",
            "heading" => esc_html__("CMS Custom Style", 'enormous'),
            "param_name" => "el_class",
            "value" => array(
                'None' => 'no-overlay',  
                'Background Overlay' => 'bg-overlay',  
            ) ,         
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style Button Video", 'enormous'),
            "param_name" => "video_button",
            "value" => array(
                'Style 1' => 'style1',  
                'Style 2' => 'style2', 
                'Style 3' => 'style3',  
                'Style 4' => 'style4',    
            ),                
        ),
    )
));

class WPBakeryShortCode_cms_videopopup extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>