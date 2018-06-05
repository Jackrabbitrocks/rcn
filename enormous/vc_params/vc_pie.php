<?php
/**
 * Add row params
 * 
 * @author Fox
 * @since 1.0.0
 */

vc_add_param("vc_pie", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => esc_html__('Title Color', 'enormous'),
    "param_name" => "title_color",
    "description" => ''
));

vc_remove_param("vc_pie", "color");
vc_remove_param("vc_pie", "label_value");
vc_remove_param("vc_pie", "units");
vc_add_param("vc_pie", array(
    "type" => "textfield",
    "heading" => esc_html__("border", 'enormous'),
    "param_name" => "pie_border",
    "description" => esc_html__("ex: 1", 'enormous'),
));
vc_add_param("vc_pie", array(
    'type' => 'colorpicker',
    'heading' => esc_html__('Pie color progress', 'enormous'),
    'param_name' => 'color',
    'value' => '#efbd0e', // $pie_colors,
    'description' => esc_html__('Select pie chart color.', 'enormous'),
    'admin_label' => true,
    'param_holder_class' => 'vc-colored-dropdown',
));
vc_add_param("vc_pie", array(
    'type' => 'colorpicker',
    'heading' => esc_html__('Pie border color', 'enormous'),
    'param_name' => 'pie_border_color',
    'value' => '#bdbdbd',
    'admin_label' => true,  
));
vc_add_param("vc_pie", array(
    "type" => "textfield",
    "heading" => esc_html__("Custom Icon", 'enormous'),
    "param_name" => "pie_custom_icon",
    'dependency' => array(
        'element' => 'el_class',
        'value' => 'style2'
    ),
));
