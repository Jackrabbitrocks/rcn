<?php
vc_map(array(
    "name" => 'CMS Timeline',
    "base" => "cms_timeline",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'enormous'),
    "params" => array( 
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Timeline', 'enormous' ),
            'param_name' => 'cms_timeline',
            'description' => esc_html__( 'Enter values for timeline item', 'enormous' ),
            'value' => urlencode(
                json_encode( array(
                        array(
                            'cms_timeline_title' => '', 
                            'cms_timeline_time' => '', 
                            'cms_timeline_des' => '', 
                        ),
                    ) 
                ) 
            ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Title", 'enormous'),
                    "param_name" => "cms_timeline_title",
                    'admin_label' => true,
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Time", 'enormous'),
                    "param_name" => "cms_timeline_time",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Description", 'enormous'),
                    "param_name" => "cms_timeline_des",
                ),
            ),
        ),
    )
));

class WPBakeryShortCode_cms_timeline extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>
