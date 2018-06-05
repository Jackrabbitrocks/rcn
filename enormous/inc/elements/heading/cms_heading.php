<?php
vc_map(array(
    "name" => 'CMS Heading',
    "base" => "cms_heading",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'enormous'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Title', 'enormous' ),
            "param_name" => "hd_title",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'FontSize Title', 'enormous' ),
            "param_name" => "hd_fontsize_title",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Line Height Title', 'enormous' ),
            "param_name" => "hd_lineheight_title",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Letter Spacing Title', 'enormous' ),
            "param_name" => "hd_ls_title",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", 'enormous'),
            "param_name" => "hd_title_color",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Sub Title', 'enormous' ),
            "param_name" => "hd_subtitle",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'FontSize Sub Title', 'enormous' ),
            "param_name" => "hd_fontsize_subtitle",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Line Height Sub Title', 'enormous' ),
            "param_name" => "hd_lineheight_subtitle",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Font Weight Sub Title', 'enormous' ),
            "param_name" => "hd_fontweight_subtitle",
            "value" => '',
            "description" =>esc_html__("ex: 100,300,400,500,600,700,800...", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Sub Title Color", 'enormous'),
            "param_name" => "hd_subtitle_color",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Sub Title Padding Bottom', 'enormous' ),
            "param_name" => "hd_sub_title_padding_bottom",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout10.php",        
                )
            ),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Sub Title Bottom', 'enormous' ),
            "param_name" => "hd_subtitle_bottom",
            "value" => '',
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout8.php",        
                )
            ),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Title Padding Bottom', 'enormous' ),
            "param_name" => "hd_title_padding_bottom",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Title Margin Bottom', 'enormous' ),
            "param_name" => "hd_title_margin_bottom",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')    
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__ ( 'Description', 'enormous' ),
            "param_name" => "hd_description",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'enormous'),
        ),
        
        array(
            "type" => "textarea",
            "heading" => esc_html__ ( 'Description2', 'enormous' ),
            "param_name" => "hd_description2",
            "value" => '',
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout2.php",     
                    "cms_heading--layout7.php",     
                    "cms_heading--layout8.php",     
                )
            ),
            "group" => esc_html__("Heading Settings", 'enormous'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'FontSize Description', 'enormous' ),
            "param_name" => "hd_fontsize_description",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Line Height Description', 'enormous' ),
            "param_name" => "hd_lineheight_description",
            "value" => '',
            "description" =>esc_html__("ex: 10px", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Font Weight Description', 'enormous' ),
            "param_name" => "hd_fontweight_description",
            "value" => '',
            "description" =>esc_html__("ex: 100,300,400,500,600,700,800...", 'enormous'),
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Description Color", 'enormous'),
            "param_name" => "hd_description_color",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'enormous')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Text Align", 'enormous'),
            "param_name" => "text_align",
            "value" => array(
                "Left" => "left", 
                "Center" => "center",              
                "Right" => "right",              
            ),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",     
                    "cms_heading--layout1.php",             
                    "cms_heading--layout3.php",                  
                    "cms_heading--layout4.php",                  
                    "cms_heading--layout5.php",                  
                    "cms_heading--layout6.php",                  
                    "cms_heading--layout9.php",                  
                    "cms_heading--layout10.php",                  
                )
            ),
            "group" => esc_html__("Heading Settings", 'enormous'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__ ( 'Add Custom Class', 'enormous' ),
            "param_name" => "custom_class",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'enormous'),
        ),

        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_heading",
            "heading" => esc_html__("Shortcode Template", 'enormous'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'enormous'),   
        ),  
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", 'enormous'),
            "param_name" => "hd_style",
            "value" => array(
                "Style 1" => "style1", 
                "Style 2" => "style2",                         
                "Style 3" => "style3"                         
            ),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(           
                    "cms_heading--layout3.php",                                   
                    "cms_heading--layout5.php",                                   
                )
            ),
            "group" => esc_html__("Template", 'enormous'),
        ), 
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Hide Icon", 'enormous'),
            "param_name" => "hide_icon",
            "value" => array(
                    "No" => "",
                    "Yes" => "yes",
            ),
            "template" => array(
                "cms_heading--layout10.php", 
            ),
            "group" => esc_html__("Template", 'enormous'),
        ),    
        array(
            "type" => "attach_image",
            "heading" => __ ( 'Icon Image', 'enormous' ),
            "param_name" => "icon_url",
            "value" => '',
            "template" => array(
                "cms_heading--layout10.php", 
            ),
            "group" => esc_html__("Template", 'enormous'),
        ),
    )
));
class WPBakeryShortCode_cms_heading extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>