<?php
/**
 * Meta box config file
 */
if (! class_exists('MetaFramework')) {
    return;
}
add_action('admin_head', 'wp_starta_metabox');

function wp_starta_metabox() {
  wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');
}

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => apply_filters('opt_meta', 'opt_meta_options'),
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Allow you to start the panel in an expanded way initially.
    'open_expanded' => false,
    // Disable the save warning when a user changes a field
    'disable_save_warn' => true,
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => false,

    'output' => false,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => false,
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => false,
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => false,
    // save meta to multiple keys.
    'meta_mode' => 'multiple'
);

// -> Set Option To Panel.
MetaFramework::setArgs($args);

add_action('admin_init', 'enormous_meta_boxs');

MetaFramework::init();

function enormous_meta_boxs()
{

    /** page options */
    MetaFramework::setMetabox(array(
        'id' => '_page_main_options',
        'label' => esc_html__('Page Setting', 'enormous'),
        'post_type' => 'page',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' => esc_html__('Header', 'enormous'),
                'id' => 'tab-page-header',
                'icon' => 'el el-credit-card',
                'fields' => array(
                    array(
                        'id' => 'custom_header',
                        'title' => esc_html__('Custom Header Layout', 'enormous'),
                        'type' => 'switch',
                        'default' => false,
                    ),
                    array(
                        'id' => 'header_layout',
                        'title' => esc_html__('Layouts', 'enormous'),
                        'subtitle' => esc_html__('select a layout for header', 'enormous'),
                        'type' => 'image_select',
                        'options' => array(
                            '1' => get_template_directory_uri().'/assets/images/header/h-style-1.jpg',
                            '2' => get_template_directory_uri().'/assets/images/header/h-style-2.jpg',
                            '3' => get_template_directory_uri().'/assets/images/header/h-style-3.jpg',
                            '4' => get_template_directory_uri().'/assets/images/header/h-style-4.jpg',
                            '5' => get_template_directory_uri().'/assets/images/header/h-style-5.jpg',
                            '6' => get_template_directory_uri().'/assets/images/header/h-style-6.jpg',
                            '7' => get_template_directory_uri().'/assets/images/header/h-style-7.jpg',
                            '8' => get_template_directory_uri().'/assets/images/header/h-style-8.jpg',
                            '9' => get_template_directory_uri().'/assets/images/header/h-style-9.jpg',
                            '10' => get_template_directory_uri().'/assets/images/header/h-style-10.jpg',
                            '11' => get_template_directory_uri().'/assets/images/header/h-style-11.jpg',
                            '12' => get_template_directory_uri().'/assets/images/header/h-style-12.jpg',
                            '13' => get_template_directory_uri().'/assets/images/header/h-style-13.jpg',
                            '14' => get_template_directory_uri().'/assets/images/header/h-style-14.jpg',
                            '15' => get_template_directory_uri().'/assets/images/header/h-style-15.jpg',
                            '16' => get_template_directory_uri().'/assets/images/header/h-style-16.jpg',
                            '17' => get_template_directory_uri().'/assets/images/header/h-style-17.jpg',
                            '18' => get_template_directory_uri().'/assets/images/header/h-style-18.jpg',
                            '19' => get_template_directory_uri().'/assets/images/header/h-style-19.jpg',
                            '20' => get_template_directory_uri().'/assets/images/header/h-style-20.jpg',
                            '21' => get_template_directory_uri().'/assets/images/header/h-style-21.jpg',
                            '22' => get_template_directory_uri().'/assets/images/header/h-style-22.jpg',
                            '23' => get_template_directory_uri().'/assets/images/header/h-style-23.jpg',
                            '24' => get_template_directory_uri().'/assets/images/header/h-style-24.jpg',
                            '25' => get_template_directory_uri().'/assets/images/header/h-style-25.jpg',
                            '26' => get_template_directory_uri().'/assets/images/header/h-style-26.jpg',
                            '27' => get_template_directory_uri().'/assets/images/header/h-style-27.jpg',    
                            '28' => get_template_directory_uri().'/assets/images/header/h-style-28.jpg',    
                            '29' => get_template_directory_uri().'/assets/images/header/h-style-29.jpg',    
                            '30' => get_template_directory_uri().'/assets/images/header/h-style-30.jpg',        
                            '31' => get_template_directory_uri().'/assets/images/header/h-style-31.jpg',        
                            '32' => get_template_directory_uri().'/assets/images/header/h-style-32.jpg',        
                        ),   
                        'required' => array( 'custom_header', '=', '1' )     
                    ),
                    array(
                        'title'             => esc_html__('Logo Light', 'enormous'),
                        'id'                => 'main_logo',
                        'type'              => 'media',
                        'url'               => true,
                        'required' => array( 'custom_header', '=', '1' )  
                    ),
                    array(
                        'title'             => esc_html__('Logo Dark', 'enormous'),
                        'id'                => 'main_logo_dark',
                        'type'              => 'media',
                        'url'               => true,
                        'required' => array( 'custom_header', '=', '1' )  
                    ),
                    array(
                        'title'             => esc_html__('Logo Sticky', 'enormous'),
                        'id'                => 'sticky_logo',
                        'type'              => 'media',
                        'url'               => true,
                        'required' => array( 'custom_header', '=', '1' )  
                    ),
                    array(
                        'subtitle'          => esc_html__('Set max height for logo.', 'enormous'),
                        'id'                => 'logo_max_height',
                        'type'              => 'dimensions',
                        'units'             => array('px'),
                        'width'             => false,
                        'title'             => esc_html__('Logo Height', 'enormous'),
                        'required' => array( 'custom_header', '=', '1' )  
                    ),
                    array(
                        'id' => 'header_menu',
                        'type' => 'select',
                        'title' => esc_html__('Select Menu', 'enormous'),
                        'subtitle' => esc_html__('custom menu for current page', 'enormous'),
                        'options' => enormous_get_nav_menu(),
                        'default' => '',
                        'required' => array( 'custom_header', '=', '1' )  
                    ),
                )
            ),
            array(
                'title' => esc_html__('Body', 'enormous'),
                'id' => 'tab-body',
                'icon' => 'el-icon-picture',
                'fields' => array(
                    array(
                        'title'             => esc_html__('Layout', 'enormous'),
                        'subtitle'          => esc_html__('Full width / Boxed.', 'enormous'),
                        'id'                => 'general_layout',
                        'type'              => 'button_set',
                        'options'           => array(
                                                    1 => esc_html__('Full width', 'enormous'),
                                                    0 => esc_html__('Boxed', 'enormous')
                                                ),
                        'default'           => 1
                    ),
                    array(
                        'title'             => esc_html__('Body Background', 'enormous'),
                        'subtitle'          => esc_html__('Body background.', 'enormous'),
                        'id'                => 'general_background_fullwidth',
                        'type'              => 'background',
                        'output'            => array( 'body' ),
                        'required'          => array( 'general_layout', '=', 1 )
                    ),
                    array(
                        'title'             => esc_html__('Body Background', 'enormous'),
                        'subtitle'          => esc_html__('Body background.', 'enormous'),
                        'id'                => 'general_background',
                        'type'              => 'background',
                        'output'            => array( 'body' ),
                        'required'          => array( 'general_layout', '=', 0 )
                    ),
                    array(
                        'title'             => esc_html__('Content Background', 'enormous'),
                        'subtitle'          => esc_html__('Content background.', 'enormous'),
                        'id'                => 'general_content_background',
                        'type'              => 'background',
                        'output'            => array( 'body .cs-boxed #content' ),
                        'required'          => array( 'general_layout', '=', 0 )
                    ),
                    array(
                        'id' => 'custom_preset_color',
                        'title' => esc_html__('Custom Preset Color', 'enormous'),
                        'type' => 'switch',
                        'options' => array(
                            'on' => '1', 
                            'off' => '', 
                         ), 
                        'default' => '',     
                    ),
                    array(
                        'id' => 'page_primary_color',
                        'title' => esc_html__('Primary Color', 'enormous'),
                        'type' => 'color',
                        'required' => array( 'custom_preset_color', '=', '1' )
                    ),
                    array(
                        'id' => 'page_secondary_color',
                        'title' => esc_html__('Secondary Color', 'enormous'),
                        'type' => 'color',
                        'required' => array( 'custom_preset_color', '=', '1' )
                    ),
                    array(
                        'id' => 'body_custom_class',
                        'title' => esc_html__('Custom Body Class', 'enormous'),
                        'type' => 'text', 
                    ),
                    array(
                        'title'             => esc_html__('Body Padding', 'enormous'),
                        'id'                => 'body_padding',
                        'type'              => 'spacing',
                        'mode'              => 'padding',
                        'units'             => array( 'px'),
                    ),
                )
            ),
            array(
                'title' => esc_html__('Footer', 'enormous'),
                'id' => 'tab-page-footer',
                'icon' => 'el el-website',
                'fields' => array(
                    array(
                        'id' => 'custom_footer',
                        'title' => esc_html__('Custom Footer Layout', 'enormous'),
                        'type' => 'switch',
                        'default' => false,
                    ),
                    array(
                        'id'                => 'footer_layout',
                        'title'             => esc_html__('Layouts', 'enormous'),
                        'subtitle'          => esc_html__('select a layout for footer', 'enormous'),
                        'type'              => 'image_select',
                        'options'           => array(
                                                    '0' => get_template_directory_uri().'/assets/images/footer/f-no-style.png',
                                                    '1' => get_template_directory_uri().'/assets/images/footer/f-style-1.png',
                                                    '2' => get_template_directory_uri().'/assets/images/footer/f-style-2.png',
                                                    '3' => get_template_directory_uri().'/assets/images/footer/f-style-3.png',   
                                                    '4' => get_template_directory_uri().'/assets/images/footer/f-style-4.png',   
                                                    '5' => get_template_directory_uri().'/assets/images/footer/f-style-5.jpg',   
                                                    '6' => get_template_directory_uri().'/assets/images/footer/f-style-6.jpg',   
                                                ),
                        'required' => array( 'custom_footer', '=', '1' ) 
                    ),
                    array(
                        'title'             => esc_html__('Background', 'enormous'),
                        'subtitle'          => esc_html__('Footer Background.', 'enormous'),
                        'id'                => 'footer_background',
                        'type'              => 'background',
                    ),   
                    array(
                        'title' => esc_html__('Background Overlay', 'enormous'),
                        'id' => 'footer_background_overlay',
                        'type' => 'color_rgba', 
                    ),
                )
            ),
            array(
                'title' => esc_html__('Page', 'enormous'),
                'id' => 'tab-page-bc',
                'icon' => 'el el-photo',
                'fields' => array(
                    array(
                        'id' => 'page_space_content',
                        'title' => esc_html__('At moment, main content got padding top and bottom is 110px', 'enormous'),
                        'type' => 'info',
                        'style' => 'success',
                    ),
                    array(
                        'id' => 'page_space_content_top',
                        'title' => esc_html__('Remove space content top', 'enormous'),
                        'desc' => esc_html__('Enable this option to set padding top of main content is 0px ', 'enormous'),
                        'type' => 'switch',
                        'default' => false,
                    ),
                    array(
                        'id' => 'page_space_content_bottom',
                        'title' => esc_html__('Remove space content bottom', 'enormous'),
                        'desc' => esc_html__('Enable this option to set padding bottom of main content is 0px ', 'enormous'),
                        'type' => 'switch',
                        'default' => false,
                    ),
                )
            ),
            array(
                'title' => esc_html__('Page Title & BC', 'enormous'),
                'id' => 'tab-page-title-bc',
                'icon' => 'el el-map-marker',
                'fields' => array(
                    array(
                        'id' => 'custom_page_title',
                        'title' => esc_html__('Custom Page Title Layout', 'enormous'),     
                        'type' => 'switch',
                        'default' => false,
                    ),
                    array(
                        'id' => 'page_title_layout',
                        'title' => esc_html__('Layouts', 'enormous'),
                        'subtitle' => esc_html__('select a layout for page title', 'enormous'),
                        'default' => '',
                        'type' => 'image_select',
                        'options' => array(
                            '' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-0.png',
                            '1' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-1.png',
                            '2' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-2.png',
                            '3' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-3.png',
                            '4' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-4.png',
                            '5' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-5.png',
                            '6' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-6.png',
                            '7' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-7.png',
                            '8' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-8.png',
                            '9' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-9.png',
                        ),
                        'required' => array( 'custom_page_title', '=', '1' )
                    ),
                    array(
                        'id' => 'page_title_text',
                        'type' => 'text',
                        'title' => esc_html__('Custom Title', 'enormous'),
                        'subtitle' => esc_html__('Custom current page title.', 'enormous'),
                    ),
                    array(
                        'id' => 'page_title_font_size',
                        'type' => 'text',
                        'title' => esc_html__('Custom Font Size Title', 'enormous'),
                        'desc'    => 'Enter: ..px',
                    ),
                    array(
                        'id' => 'page_title_subtext',
                        'type' => 'text',
                        'title' => esc_html__('Sub Title', 'enormous'),
                    ),
                    array(
                        'title'             => esc_html__('Background', 'enormous'),
                        'subtitle'          => esc_html__('Page title background.', 'enormous'),
                        'id'                => 'page_title_background',
                        'type'              => 'background',
                    ),   
                    array(
                        'title' => esc_html__('Background Overlay', 'enormous'),
                        'id' => 'background_overlay',
                        'type' => 'color_rgba', 
                    ),
                    array(
                        'id'       => 'page_title_bg_overlay_primary',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Background Overlay Primary ', 'enormous' ),
                        'default'    => 'no',
                        'options'  => array(
                            'no' => esc_html__('No', 'enormous' ),
                            'yes' => esc_html__('Yes', 'enormous' ),
                        ),
                    ), 
                    array(
                        'id'       => 'page_title_bg_gradient_style',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Background Gradient Style ', 'enormous' ),
                        'subtitle' => esc_html__( 'Select style for gradient - Apply for page title layout 4 & 7', 'enormous' ),
                        'default'    => '',
                        'options'  => array(
                            '' => esc_html__('Default', 'enormous' ),
                            'style-horizontal' => esc_html__('Style Horizontal', 'enormous' ),
                            'style-vertical' => esc_html__('Style Vertical', 'enormous' ),
                        ),
                    ), 
                    array(
                        'title'             => esc_html__('Padding Page Title', 'enormous'),
                        'subtitle'          => esc_html__('Page title padding (top/bottom).', 'enormous'),
                        'id'                => 'page_title_padding',
                        'type'              => 'spacing',
                        'mode'              => 'padding',
                        'units'             => array( 'em', 'px', '%' ),
                        'top'               => true,
                        'right'             => false,
                        'bottom'            => true,
                        'left'              => false,
                    ),
                    array(
                        'title'             => esc_html__('Padding Breadcrumb', 'enormous'),
                        'subtitle'          => esc_html__('Breadcrumb padding (top/bottom).', 'enormous'),
                        'id'                => 'breadcrumb_padding',
                        'type'              => 'spacing',
                        'mode'              => 'padding',
                        'units'             => array( 'em', 'px', '%' ),
                        'top'               => true,
                        'right'             => false,
                        'bottom'            => true,
                        'left'              => false,
                    ),
                )
            ),
            array(
                'title' => esc_html__('One Page', 'enormous'),
                'id' => 'tab-one-page',
                'icon' => 'el el-download-alt',
                'fields' => array(
                    array(
                        'subtitle' => esc_html__('Enable one page mode for current page.', 'enormous'),
                        'id' => 'page_one_page',
                        'type' => 'switch',
                        'title' => esc_html__('Enable', 'enormous'),
                        'default' => false,
                    ),
                    array(
                        'id'            => 'page_one_page_speed',
                        'type'          => 'slider',
                        'title'         => esc_attr__( 'Speed', 'enormous' ),
                        'default'       => 1000,
                        'min'           => 500,
                        'step'          => 100,
                        'max'           => 5000,
                        'display_value' => 'text',
                        'required' => array('page_one_page', '=', 1)
                    ),
                )
            )
        )
    ));

    /** post options */   
    MetaFramework::setMetabox(array(
        'id' => '_post_options',
        'label' => esc_html__('Post Settings', 'enormous'),
        'post_type' => 'post',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => true,
        'sections' => array(
            array(
                'title' => '',
                'id' => 'color-Color',
                'icon' => 'el el-laptop',
                'fields' => array(
                    array(
                        'id' => 'post_icon',
                        'type' => 'text',
                        'title' => esc_html__('Custom Icon Class', 'enormous'),
                        'desc'    => 'Ex: fa fa-home',    
                    ), 
                    array(
                        'id'                => 'single_layout',
                        'title'             => esc_html__('Layouts', 'enormous'),
                        'subtitle'          => esc_html__('select a layout for single...', 'enormous'),
                        'type'              => 'image_select',
                        'options'           => array(
                                                    'left' => get_template_directory_uri().'/assets/images/content/right.png',
                                                    'full' => get_template_directory_uri().'/assets/images/content/full.png',
                                                    'right' => get_template_directory_uri().'/assets/images/content/left.png',
                                                )
                    ),
                )
            )   
        )
    ));     
    MetaFramework::setMetabox(array(
        'id' => '_page_post_format_options',
        'label' => esc_html__('Post Format', 'enormous'),
        'post_type' => 'post',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => true,
        'sections' => array(
            array(
                'title' => '',
                'id' => 'color-Color',
                'icon' => 'el el-laptop',
                'fields' => array(
                    array(
                        'id' => 'opt-video-type',
                        'type' => 'select',
                        'title' => esc_html__('Select Video Type', 'enormous'),
                        'subtitle' => esc_html__('Local video, Youtube, Vimeo', 'enormous'),
                        'options' => array(
                            'local' => esc_html__('Upload', 'enormous'),
                            'youtube' => esc_html__('Youtube', 'enormous'),
                            'vimeo' => esc_html__('Vimeo', 'enormous'),
                        )
                    ),
                    array(
                        'id' => 'otp-video-local',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Local Video', 'enormous'),
                        'subtitle' => esc_html__('Upload video media using the WordPress native uploader', 'enormous'),
                        'required' => array('opt-video-type', '=', 'local')
                    ),
                    array(
                        'id' => 'opt-video-youtube',
                        'type' => 'text',
                        'title' => esc_html__('Youtube', 'enormous'),
                        'subtitle' => esc_html__('Load video from Youtube.', 'enormous'),
                        'placeholder' => esc_html__('https://youtu.be/iNJdPyoqt8U', 'enormous'),
                        'required' => array('opt-video-type', '=', 'youtube')
                    ),
                    array(
                        'id' => 'opt-video-vimeo',
                        'type' => 'text',
                        'title' => esc_html__('Vimeo', 'enormous'),
                        'subtitle' => esc_html__('Load video from Vimeo.', 'enormous'),
                        'placeholder' => esc_html__('https://vimeo.com/155673893', 'enormous'),
                        'required' => array('opt-video-type', '=', 'vimeo')
                    ),
                    array(
                        'id' => 'otp-video-thumb',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Video Thumb', 'enormous'),
                        'subtitle' => esc_html__('Upload thumb media using the WordPress native uploader', 'enormous'),
                        'required' => array('opt-video-type', '=', 'local')
                    ),
                    array(
                        'id' => 'otp-audio',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Audio Media', 'enormous'),
                        'subtitle' => esc_html__('Upload audio media using the WordPress native uploader', 'enormous'),
                    ),
                    array(
                        'id' => 'opt-gallery',
                        'type' => 'gallery',
                        'title' => esc_html__('Add/Edit Gallery', 'enormous'),
                        'subtitle' => esc_html__('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'enormous'),
                    ),
                    array(
                        'id' => 'opt-quote-title',
                        'type' => 'text',
                        'title' => esc_html__('Quote Title', 'enormous'),
                        'subtitle' => esc_html__('Quote title or quote name...', 'enormous'),
                    ),
                    array(
                        'id' => 'opt-quote-content',
                        'type' => 'textarea',
                        'title' => esc_html__('Quote Content', 'enormous'),
                    ),
                )
            ),
        )
    ));
    /** Team options */
    MetaFramework::setMetabox(array(
        'id' => '_team_options',
        'label' => esc_html__('Team Setting', 'enormous'),
        'post_type' => 'team',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' => esc_html__('Team', 'enormous'),
                'id' => 'tab-page-team',
                'fields' => array(
                    array(
                        "type" => "text",
                        "title" => esc_html__("Position", 'enormous'),
                        "id" => "position_team",
                        "value" => "",
                    ),
                    array(
                        "type" => "text",
                        "title" => esc_html__("Phone", 'enormous'),
                        "id" => "phone_team",
                        "value" => "",
                    ),
                    array(
                        "type" => "text",
                        "title" => esc_html__("Email", 'enormous'),
                        "id" => "email_team",
                        "value" => "",
                    ),
                    array(
                        "type" => "textarea",
                        "title" => esc_html__("Certifications", 'enormous'),
                        "id" => "certifications_team",
                        "value" => "",
                    ),
                )
            ),
            array(
                'title' => esc_html__('Team Social', 'enormous'),
                'id' => 'tab-page-team',
                'icon' => '',
                'fields' => array(
                    array(
                        'title' => esc_html__('Social', 'enormous'),
                        'id'      => 'cms_team_social',
                        'type'    => 'sorter',
                        'desc'    => 'Choose which social networks are displayed and edit where they link to.',
                        'options' => array(
                            'enabled'  => array(
                                'facebook'  => 'Facebook', 
                                'twitter'   => 'Twitter', 
                                'google'    => 'Google',
                                'skype'     => 'Skype', 
                                'youtube'   => 'Youtube',     
                            ),
                            'disabled' => array(       
                                'vimeo'     => 'Vimeo', 
                                'tumblr'    => 'Tumblr', 
                                'linkedin'  => 'inkedin',
                                'rss'       => 'RSS', 
                                'pinterest' => 'Pinterest',
                                'instagram' => 'Instagram',
                            )
                        ),
                    ), 
                )   
            ), 
            array(
                'title' => esc_html__('Team Social Link', 'enormous'),
                'id' => 'tab-page-team',
                'icon' => '',
                'fields' => array(
                    array(
                        'id' => 'social_facebook_url',
                        'type' => 'text',
                        'title' => esc_html__('Facebook URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_twitter_url',
                        'type' => 'text',
                        'title' => esc_html__('Twitter URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_inkedin_url',
                        'type' => 'text',
                        'title' => esc_html__('Inkedin URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_rss_url',
                        'type' => 'text',
                        'title' => esc_html__('Rss URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_instagram_url',
                        'type' => 'text',
                        'title' => esc_html__('Instagram URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_google_url',
                        'type' => 'text',
                        'title' => esc_html__('Google URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_skype_url',
                        'type' => 'text',
                        'title' => esc_html__('Skype URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_pinterest_url',
                        'type' => 'text',
                        'title' => esc_html__('Pinterest URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_vimeo_url',
                        'type' => 'text',
                        'title' => esc_html__('Vimeo URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_youtube_url',
                        'type' => 'text',
                        'title' => esc_html__('Youtube URL', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'social_tumblr_url',
                        'type' => 'text',
                        'title' => esc_html__('Tumblr URL', 'enormous'),
                        'default' => '',
                    ),
                )
            ),
        )
    ));   
    /** client options */
    MetaFramework::setMetabox(array(
        'id' => '_client_options',
        'label' => esc_html__('Client Setting', 'enormous'),
        'post_type' => 'client',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' => esc_html__('Client', 'enormous'),
                'id' => 'tab-page-client',
                'icon' => '',
                'fields' => array(
                    array(
                        "type" => "text",
                        "title" => esc_html__("URL Client", 'enormous'),
                        "id" => "url_client",
                        "value" => "",   
                    ),   
                )
            ),   
            
        )
    ));
    /** Testimonial options */
    MetaFramework::setMetabox(array(
        'id' => '_testimonial_options',
        'label' => esc_html__('Testimonial Setting', 'enormous'),
        'post_type' => 'testimonial',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' => esc_html__('Testimonial', 'enormous'),
                'id' => 'tab-page-testimonial',
                'fields' => array(
                    array(
                        "type" => "text",
                        "title" => esc_html__("Position", 'enormous'),
                        "id" => "position_testimonial",
                        "value" => "",
                    ),
                )
            ),   
        )
    ));

    /** Portfolio Options */
    MetaFramework::setMetabox(array(
        'id' => '_portfolio_options',
        'label' => esc_html__('Portfolio Setting', 'enormous'),
        'post_type' => 'portfolio',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' => esc_html__('General', 'enormous'),
                'id' => 'tab-page-header',
                'icon' => 'el el-credit-card',
                'fields' => array(
                    array(
                        'id'       => 'portfolio_layout_show',
                        'type'     => 'button_set',
                        'title'    => esc_html__('Select Layout', 'enormous'),
                        'subtitle' => esc_html__('', 'enormous'),
                        'options' => array(
                            '1' => 'Yes', 
                            '' => 'No',
                         ), 
                        'default' => ''
                    ),

                    array(
                        'id'       => 'single_portfolio_layout',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Layout', 'enormous' ),
                        'options'  => array(
                            'layout1' => 'Layout 1 (Default)',
                            'layout2' => 'Layout 2 (Samll Images)',
                            'layout3' => 'Layout 3 (Small Slider)',
                            'layout4' => 'Layout 4 (Big Slider)',
                            'layout5' => 'Layout 5 (Gallery)',
                            'layout6' => 'Layout 6 (Small Masonry)',
                            'layout7' => 'Layout 7 (Big Masonry)',
                            'layout8' => 'Layout 8 (Small Pinterest)',
                            'layout9' => 'Layout 9 (Big Pinterest)',
                        ),
                        'default' => 'layout1',
                        'required' => array( 'portfolio_layout_show', '=', '1' )
                    ),

                    array(
                        'id'       => 'single_portfolio_gallery',
                        'type'     => 'gallery',
                        'title'    => esc_html__( 'Gallery', 'enormous' ),
                    ),

                    array(
                        'id'       => 'width_item',
                        'type'     => 'button_set',
                        'title'    => esc_html__('Custom Width Item', 'enormous'),
                        'options' => array( 
                            'w_default' => 'Default', 
                            'w75' => '75%', 
                            'w50' => '50%', 
                            'w33' => '33%', 
                            'w25' => '25%', 
                         ), 
                        'default' => '',
                        'description' => 'Apply layout CMS Grid - Portfolio Masonry'
                    ),
                    array(
                        'title' => esc_html__('Featured Image', 'enormous'),
                        'id' => 'portfolio_featured_image',
                        'type' => 'media',
                        'url' => false,
                        'default' => '',
                        'description' => 'Apply layout CMS Grid - Portfolio Masonry'
                    ),
                )
            ),
            array(
                'title' => esc_html__('About', 'enormous'),
                'id' => 'tab-page-header',
                'icon' => 'el el-adult',
                'fields' => array(
                    array(
                        'id' => 'portfolio_client',
                        'type' => 'text',
                        'title' => esc_html__('Client', 'enormous'),
                        'default' => '',
                    ),
                    array(
                        'id' => 'portfolio_location',
                        'type' => 'text',
                        'title' => esc_html__('Location', 'enormous'),
                        'default' => '',
                    ),
                )
            ),
        )
    ));
    /** shop options */
    MetaFramework::setMetabox(array(
        'id' => '_product_main_options',
        'label' => esc_html__('Product Setting', 'enormous'),
        'post_type' => 'product',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' =>esc_html__('Product Setting', 'enormous'),
                'id' => 'tab-service-bc',
                'icon' => 'el el-photo',
                'fields' => array(
                    array(
                        'id'       => 'product_thumb_size',
                        'type'     => 'select',
                        'title'    =>esc_html__('Select size of thumbnail image', 'enormous'),
                        'options'  => array(   
                            ''=>'Images size',
                            '2x'=>'2 Width',
                            '2x2y'=>'2 width and 2 Height ',
                            'xy'=>'Width Equal Height',
                        ),
                    ),
                )
            ),


        )
    ));

    /** Demo Options */
    MetaFramework::setMetabox(array(
        'id' => '_demo_options',
        'label' => esc_html__('Demo Setting', 'enormous'),
        'post_type' => 'demo',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' => esc_html__('Demo', 'enormous'),
                'id' => 'tab-page-header',
                'icon' => 'el el-adult',
                'fields' => array(
                    array(
                        "type" => "text",
                        "title" => esc_html__("Custom Url", 'enormous'),
                        "id" => "demo_custom_url",
                        "value" => "",   
                    ), 
                    array(
                        'id'    => 'demo_url',
                        'type'  => 'select',
                        'title' => __( 'Select Page Demo', 'enormous' ), 
                        'data'  => 'page',
                        'args'  => array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'orderby'        => 'title',
                            'order'          => 'ASC',
                        )
                    )
                )
            ),
        )
    ));

    /** Showcase Options */
    MetaFramework::setMetabox(array(
        'id' => '_showcase_options',
        'label' => esc_html__('Showcase Setting', 'enormous'),
        'post_type' => 'showcase',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' => esc_html__('Showcase', 'enormous'),
                'id' => 'tab-page-header',
                'icon' => 'el el-adult',
                'fields' => array(
                    array(
                        "type" => "text",
                        "title" => esc_html__("Custom Url", 'enormous'),
                        "id" => "showcase_custom_url",
                        "value" => "",   
                    ), 
                    array(
                        'id'    => 'showcase_url',
                        'type'  => 'select',
                        'title' => __( 'Select Page Showcase', 'enormous' ), 
                        'data'  => 'page',
                        'args'  => array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'orderby'        => 'title',
                            'order'          => 'ASC',
                        )
                    )
                )
            ),
        )
    ));
    
}