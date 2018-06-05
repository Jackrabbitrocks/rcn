<?php
vc_map(array(
    "name" => 'CMS Process',
    "base" => "cms_process",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'enormous'),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'enormous'),
            "param_name" => "process_title1",
            "group" => esc_html__("Item 1", 'enormous'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'enormous'),
            "param_name" => "process_description1",
            "group" => esc_html__("Item 1", 'enormous'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'enormous'),
            "param_name" => "process_title2",
            "group" => esc_html__("Item 2", 'enormous'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'enormous'),
            "param_name" => "process_description2",
            "group" => esc_html__("Item 2", 'enormous'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'enormous'),
            "param_name" => "process_title3",
            "group" => esc_html__("Item 3", 'enormous'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'enormous'),
            "param_name" => "process_description3",
            "group" => esc_html__("Item 3", 'enormous'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'enormous'),
            "param_name" => "process_title4",
            "group" => esc_html__("Item 4", 'enormous'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'enormous'),
            "param_name" => "process_description4",
            "group" => esc_html__("Item 4", 'enormous'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("CMS Custom Style", 'enormous'),
            "param_name" => "el_class",
            "value" => array(
                'Style 1' => 'style-1',
                'Style 2' => 'style-2',       
            ),   
            "group" => esc_html__("Template", 'enormous'),              
        ),
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_process",
            "heading" => esc_html__("Select Template", 'enormous'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'enormous'),
        ),
    )
));

class WPBakeryShortCode_cms_process extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>