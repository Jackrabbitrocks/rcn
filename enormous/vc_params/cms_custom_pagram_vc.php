<?php
/*
 * VC
 */
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("CMS Custom Style", 'enormous'),
    "param_name" => "el_class",
    "value" => array(
        'None' => 'no-overlay',  
        'Background Overlay' => 'bg-overlay',
        'Background Full Color Left With 2 Column' => 'bg-full-color-left',
        'Background Full Color Right With 2 Column' => 'bg-full-color-right',
        'Half Left Background' => 'half-left-background',
        'Half Right Background' => 'half-right-background',
        'Remove Overflow Hidden' => 'remove-overflow',
        'Row Container' => 'row-container',
        'Row Background Image Slider' => 'row-bg-slider bg-overlay',
        'Background Overlay Color RGBA 0.65' => 'bg-rgba-65 bg-overlay',
        'Background Overlay Color RGBA 0.85' => 'bg-rgba-85 bg-overlay',
        'Background Overlay Color RGBA 0.95' => 'bg-rgba-95 bg-overlay',
    ),   
    "description" => esc_html__("If choose style 'Background Full Color With 2 Column' then you must choose col-6", 'enormous'),  
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("Offset", 'enormous'),
    "param_name" => "data_offset",
    "description" => esc_html__("Offset for Onepage", 'enormous'),
    'group' => 'CMS Customs'
));

/*
 * vc_widget_sidebar
 */
vc_add_param("vc_widget_sidebar", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Widget Newletter Style", 'enormous'),
    "param_name" => "el_class",
    "value" => array(
        'Style Default' => 'style-default',
        'Style 1' => 'style1',
        'Style 2' => 'style2',
        'Style 3' => 'style3',
    ),
    "description" => ""
));
vc_add_param("vc_pie", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("CMS Custom Style", 'enormous'),
    "param_name" => "el_class",
    "value" => array(
        'Style 1' => 'style1',
        'Style 2' => 'style2', 
    ),                    
));

