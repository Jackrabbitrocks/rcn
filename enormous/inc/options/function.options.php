<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (! class_exists('Redux')) {
    return;
}

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('opt_name', 'opt_theme_options');

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => $theme->get('Name'),
    'page_title' => $theme->get('Name'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => true,
    // Use a asynchronous font on the front end or font string
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-smiley',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    // 'open_expanded' => true, // Allow you to start the panel in an expanded way initially.
    // 'disable_save_warn' => true, // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => 'dashicons-dashboard',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'dashicons-smiley',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit' => '', // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => ''
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right'
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover'
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave'
            )
        )
    )
);

Redux::setArgs($opt_name, $args);

/**
 * General Options.
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'enormous'),
    'icon' => 'el-icon-adjust-alt',
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
            'subtitle'          => esc_html__('Enable page loading.', 'enormous'),
            'id'                => 'general_page_loading',
            'type'              => 'switch',
            'title'             => esc_html__('Page Loading', 'enormous'),
            'default'           => false,
        ),
        array(
            'subtitle'          => esc_html__('Enable back to top button.', 'enormous'),
            'id'                => 'general_back_to_top',
            'type'              => 'switch',
            'title'             => esc_html__('Back To Top', 'enormous'),
            'default'           => true,
        )
    )
));

/**
 * Header Options
 * 
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'enormous'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id'                => 'header_layout',
            'title'             => esc_html__('Layouts', 'enormous'),
            'subtitle'          => esc_html__('select a layout for header', 'enormous'),
            'default'           => '4',
            'type'              => 'image_select',
            'options'           => array(
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
            )    
        ),
        
        array(
            'title'             => esc_html__('Background', 'enormous'),
            'subtitle'          => esc_html__('Header background - Apply for header layout 6,7,13,14,15,16,17,19,20', 'enormous'),
            'id'                => 'header_background',
            'type'              => 'background',
            'output'            => array( '#cshero-header-inner #cshero-header' )
        ),
        array(
            'id'                => 'header_text_color',
            'type'              => 'color',
            'title'             => esc_html__( 'Text Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select text color for header', 'enormous' ),
            'output'            => array( '#cshero-header' ),
        ),
        array(
            'id'                => 'header_link_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Links Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select links color for header', 'enormous' ),
            'regular'           => true,
            'hover'             => true,
            'active'            => false,
            'visited'           => false,
            'output'            => array( '#cshero-header a,#cshero-header-inner .cshero-social-top .top-button' ),     
        ),
        array(
            'id' => 'show_search_icon',
            'type' => 'switch',
            'title' => esc_html__('Show Search Icon', 'enormous'),
            'default' => true,
        ),
        array(
            'id' => 'show_cart_icon',
            'type' => 'switch',
            'title' => esc_html__('Show Cart Icon', 'enormous'),
            'default' => true,
        ),
    )
));
/* Logo */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Logo', 'enormous'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title'             => esc_html__('Select Logo Light', 'enormous'),
            'id'                => 'main_logo',
            'type'              => 'media',
            'default'           => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            ),
        ),
        array(
            'title'             => esc_html__('Select Logo Dark', 'enormous'),
            'id'                => 'main_logo_dark',
            'type'              => 'media',
            'default'           => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            ),
        ),

        array(
            'subtitle'          => esc_html__('Set max height for logo.', 'enormous'),
            'id'                => 'logo_max_height',
            'type'              => 'dimensions',
            'units'             => array('px'),
            'title'             => esc_html__('Logo Height', 'enormous'),
        ),
    )
));
/* header top. */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header Top', 'enormous'),
    'icon' => 'el el-resize-horizontal',
    'subsection' => true,
    'fields' => array(   
        array(
            'title'             => esc_html__('Background', 'enormous'),
            'subtitle'          => esc_html__('Header Top Background.', 'enormous'),
            'id'                => 'header_top_background',
            'type'              => 'background',
            'output'            => array( '#cshero-header-top' )
        ),
        array(
            'id'                => 'header_top_text_color',
            'type'              => 'color',
            'title'             => esc_html__( 'Text Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select text color for header top', 'enormous' ),
            'output'            => array( '#cshero-header-top' ),
        ),
        array(
            'id'                => 'header_top_link_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Links Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select links color for header top', 'enormous' ),
            'regular'           => true,
            'hover'             => true,
            'active'            => false,
            'visited'           => false,
            'output'            => array( '#cshero-header-top a' ),     
        ),
        array(
            'title' => esc_html__('Button Top', 'enormous'),
            'subtitle'          => esc_html__('Apply for header layout 2', 'enormous'),
            'type'  => 'section',
            'id' => 'section-start3',
            'indent' => true,
        ),
        array(
            'id'                => 'top_button_text',
            'type'              => 'text',
            'title'             => esc_html__('Button Text', 'enormous'),
            'default'           => esc_html__('Contact Us', 'enormous'),
        ),
        array(
            'id'                => 'top_button_link',
            'type'              => 'text',
            'title'             => esc_html__('Button - URL', 'enormous'),
        ),
        array(
            'title' => esc_html__('Info Top', 'enormous'),
            'subtitle'          => esc_html__('Apply for header layout 7 & 14 & 16', 'enormous'),
            'type'  => 'section',
            'id' => 'section-start4',
            'indent' => true,
        ),
        array(
            'id'                => 'top_address',
            'type'              => 'text',
            'title'             => esc_html__('Address', 'enormous'),
            'default'           => esc_html__('Tanta AlGharbia, Egypt.', 'enormous'),
        ),   
        array(
            'id'                => 'top_email',
            'type'              => 'text',
            'title'             => esc_html__('Email', 'enormous'),
            'default'           => esc_html__('7oroof@7oroof.com', 'enormous'),
        ),
        array(
            'id'                => 'top_phone',
            'type'              => 'text',
            'title'             => esc_html__('Phone', 'enormous'),
            'default'           => esc_html__('002 01065370701', 'enormous'),
        ),
    )
));
/* Menu */
Redux::setSection($opt_name, array(
    'icon' => 'el-icon-minus',
    'title' => esc_html__('Menu', 'enormous'),
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Main Menu', 'enormous'),
            'type'  => 'section',
            'id' => 'section-start',
            'indent' => true,
        ),
        array(
            'id' => 'font_menu',
            'type' => 'typography',
            'title' => esc_html__('Menu Font', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'color' => false,
            'line-height' => false,     
            'text-align' => false,     
            'all_styles' => true,
            'output'  => array('body #cshero-header-navigation #site-navigation.main-navigation .menu-main-menu > ul > li > a, body  #cshero-header-navigation #site-navigation.main-navigation .menu-main-menu > li > a,.menu-popup'),
            'units' => 'px',
            'subtitle' => esc_html__('Select menu font', 'enormous')         
        ),
        array(
            'id'                => 'menu_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Menu Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select menu color', 'enormous' ),
            'regular'           => true,
            'hover'             => true,
            'active'            => false,
            'visited'           => false,
            'output'            => array( 'body #cshero-header-navigation #site-navigation.main-navigation .menu-main-menu > ul > li > a, body #cshero-header-navigation  #site-navigation.main-navigation .menu-main-menu > li > a,header #cshero-header-inner #cshero-header .cshero-navigation-right .nav-button-icon i,.menu-popup' ),     
        ),
        array(
            'title' => esc_html__('Menu Sticky', 'enormous'),
            'type'  => 'section',
            'id' => 'section-start1',
            'indent' => true,
        ),
        array(
            'subtitle'          => esc_html__('enable sticky mode for menu.', 'enormous'),
            'id'                => 'menu_sticky',
            'type'              => 'switch',
            'title'             => esc_html__('Sticky Header', 'enormous'),
            'default'           => true,
        ),
        array(
            'title'             => esc_html__('Select Logo', 'enormous'),
            'subtitle'          => esc_html__('Select an image file for your logo.', 'enormous'),
            'id'                => 'sticky_logo',
            'type'              => 'media',
            'url'               => true,
            'default'           => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            ),
        ),
        array(
            'title'             => esc_html__('Background', 'enormous'),
            'subtitle'          => esc_html__('Header Sticky Background.', 'enormous'),
            'id'                => 'sticky_header_background',
            'type'              => 'background',
            'output'            => array( '#cshero-header-inner #cshero-header.header-fixed' ),
            'required'          => array( 'menu_sticky', '=', 1 )
        ),
        array(
            'id'                => 'sticky_header_menu_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Menu Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select menu color in header sticky', 'enormous' ),
            'regular'           => true,
            'hover'             => true,
            'active'            => false,
            'visited'           => false,
            'output'            => array( 'header #cshero-header-inner #cshero-header.header-fixed #cshero-header-navigation .menu-main-menu > ul > li > a, header #cshero-header-inner #cshero-header.header-fixed #cshero-header-navigation .menu-main-menu > li > a,header #cshero-header-inner #cshero-header.header-fixed .cshero-navigation-right .nav-button-icon i,header #cshero-header-inner #cshero-header.header-fixed .menu-popup' ),  
            'required'          => array( 'menu_sticky', '=', 1 )      
        ),  
        array(
            'title' => esc_html__('Style Popup Menu', 'enormous'),
            'subtitle'          => esc_html__('Apply for header layout 9,11,12,15', 'enormous'),
            'type'  => 'section',
            'id' => 'section-start2',
            'indent' => true
        ),
        array(
            'id' => 'popup_style',
            'type' => 'select',
            'title' => esc_html__('Style', 'enormous'),
            'options' => array(
                'style-dark1' => esc_html__('Style Dark 1', 'enormous'),
                'style-dark2' => esc_html__('Style Dark 2', 'enormous'),
                'style-light1' => esc_html__('Style Light 1', 'enormous'),
                'style-light2' => esc_html__('Style Light 2', 'enormous'),
            ),
            'default' => 'style-dark1'   
        ),
        array(
            'subtitle'          => esc_html__('Enable mega menu.', 'enormous'),
            'id'                => 'mega_menu',
            'type'              => 'switch',
            'title'             => esc_html__('Mega Menu', 'enormous'),
            'default'           => false,
        ),   
    )
));
/* Social */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Social', 'enormous'),
    'icon' => 'el el-smiley',
    'subsection' => false,
    'fields' => array(
        array(
            'title' => esc_html__('Social', 'enormous'),
            'id'      => 'cms_social',
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
));
/**
 * Social Link
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Social Link', 'enormous'),
    'icon' => 'el el-smiley',
    'subsection' => false,
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
));

/**
 * Page Title
 *
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Page Title & BC', 'enormous'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id'                => 'page_title_layout',
            'title'             => esc_html__('Layouts', 'enormous'),
            'subtitle'          => esc_html__('select a layout for page title', 'enormous'),
            'default'           => '1',
            'type'              => 'image_select',
            'options'           => array(
                                    '1' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-1.png',
                                    '2' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-2.png',
                                    '3' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-3.png',
                                    '4' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-4.png',
                                    '5' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-5.png',
                                    '6' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-6.png',
                                    '7' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-7.png',
                                    '8' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-8.png',
                                    '9' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-9.png',
                                )
        ),
        array(
            'title'             => esc_html__('Background', 'enormous'),
            'subtitle'          => esc_html__('Page title background.', 'enormous'),
            'id'                => 'page_title_background',
            'type'              => 'background',
            'output'            => array( '#page-title' ),
            'default' => array(
                'background-image'=>get_template_directory_uri().'/assets/images/bg-page-title.jpg'
            )
        ),   
        array(
            'title' => esc_html__('Background Overlay', 'enormous'),
            'id' => 'background_overlay',
            'type' => 'color_rgba', 
            'output' => array('background-color' => '#page-title .background-overlay'),
        ), 
        array(
            'id'       => 'page_title_bg_gradient_style',
            'type'     => 'select',
            'title'    => esc_html__( 'Background Gradient Style', 'enormous' ),
            'subtitle' => esc_html__( 'Select style for gradient - Apply for page title layout 4 & 7', 'enormous' ),
            'default'    => 'style-horizontal',
            'options'  => array(
                'style-horizontal' => esc_html__('Style Horizontal', 'enormous' ),
                'style-vertical' => esc_html__('Style Vertical', 'enormous' ),
            ),
        ), 
        array(
            'title'             => esc_html__('Typography', 'enormous'),
            'subtitle'          => esc_html__('Page title typography.', 'enormous'),
            'id'                => 'page_title_typography',
            'type'              => 'typography',
            'google'            => true,
            'text-align'            => false,
            'output'            => array( '#page-title.page-title #page-title-text h1' )
        ),
        array(
            'title'             => esc_html__('Padding', 'enormous'),
            'subtitle'          => esc_html__('Page title padding (top/bottom).', 'enormous'),
            'id'                => 'page_title_padding',
            'type'              => 'spacing',
            'mode'              => 'padding',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => true,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( '#page-title' )
        ),
    )
));  

/* Breadcrumb */
Redux::setSection($opt_name, array(
    'icon' => 'el-icon-random',
    'title' => esc_html__('Breadcrumb', 'enormous'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle'          => esc_html__('The text before the breadcrumb home.', 'enormous'),
            'id'                => 'breacrumb_home_prefix',
            'type'              => 'text',
            'title'             => esc_html__('Breadcrumb Home Prefix', 'enormous'),
            'default'           => esc_html__('Home', 'enormous')
        ),
        array(
            'title'             => esc_html__('Typography', 'enormous'),
            'subtitle'          => esc_html__('Breadcrumb typography.', 'enormous'),
            'id'                => 'breadcrumb_typography',
            'type'              => 'typography',
            'google'            => true,
            'color'            => true,
            'text-align'            => false,
            'output'            => array( 'body #page-title.page-title #breadcrumb-text ul.breadcrumbs li' )
        ),
        array(
            'id'                => 'breadcrumb_link_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Link Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select link color in breadcrumb', 'enormous' ),
            'regular'           => true,
            'hover'             => true,   
            'active'            => false,   
            'visited'           => false,
            'output'            => array( 'body #page-title.page-title #breadcrumb-text ul.breadcrumbs li a' ),
        ),
        array(
            'title'             => esc_html__('Padding', 'enormous'),
            'subtitle'          => esc_html__('Breadcrumb padding (top/bottom).', 'enormous'),
            'id'                => 'breadcrumb_padding',
            'type'              => 'spacing',
            'mode'              => 'padding',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => true,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( 'body #page-title.page-title #breadcrumb-text ul.breadcrumbs' )
        ),
    )
));

/**
 * Blog
 *
 * css color.
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'enormous'),
    'icon' => 'el-icon-pencil',
    'fields' => array(
    )
));

/* archive */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Archive', 'enormous'),
    'icon' => 'el-icon-list',
    'subsection' => true,
    'fields' => array(
        array(
            'id'                => 'archive_layout',
            'title'             => esc_html__('Layouts', 'enormous'),
            'subtitle'          => esc_html__('select a layout for archive, search, index...', 'enormous'),
            'default'           => 'right',
            'type'              => 'image_select',
            'options'           => array(
                                        'left' => get_template_directory_uri().'/assets/images/content/right.png',
                                        'full' => get_template_directory_uri().'/assets/images/content/full.png',
                                        'right' => get_template_directory_uri().'/assets/images/content/left.png',
                                    )
        ),
        array(
            'subtitle'          => esc_html__('Show author.', 'enormous'),
            'id'                => 'archive_author',
            'type'              => 'switch',
            'title'             => esc_html__('Author', 'enormous'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show categories.', 'enormous'),
            'id'                => 'archive_categories',
            'type'              => 'switch',
            'title'             => esc_html__('Categories', 'enormous'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show tags.', 'enormous'),
            'id'                => 'archive_tag',
            'type'              => 'switch',
            'title'             => esc_html__('Tags', 'enormous'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show comment count.', 'enormous'),
            'id'                => 'archive_comment',
            'type'              => 'switch',
            'title'             => esc_html__('Comment', 'enormous'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show date time.', 'enormous'),
            'id'                => 'archive_date',
            'type'              => 'switch',
            'title'             => esc_html__('Date', 'enormous'),
            'default'           => true,
        )
    )
));

/* Single */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'enormous'),
    'icon' => 'el-icon-file-edit',
    'subsection' => true,
    'fields' => array(
        array(
            'id'                => 'single_layout',
            'title'             => esc_html__('Layouts', 'enormous'),
            'subtitle'          => esc_html__('select a layout for single...', 'enormous'),
            'default'           => 'right',
            'type'              => 'image_select',
            'options'           => array(
                                        'left' => get_template_directory_uri().'/assets/images/content/right.png',
                                        'full' => get_template_directory_uri().'/assets/images/content/full.png',
                                        'right' => get_template_directory_uri().'/assets/images/content/left.png',
                                    )
        ),
        array(
            'subtitle'          => esc_html__('Show author.', 'enormous'),
            'id'                => 'single_author',
            'type'              => 'switch',
            'title'             => esc_html__('Author', 'enormous'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show categories.', 'enormous'),
            'id'                => 'single_categories',
            'type'              => 'switch',
            'title'             => esc_html__('Categories', 'enormous'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show tags.', 'enormous'),
            'id'                => 'single_tag',
            'type'              => 'switch',
            'title'             => esc_html__('Tags', 'enormous'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show comment count.', 'enormous'),
            'id'                => 'single_comment',
            'type'              => 'switch',
            'title'             => esc_html__('Comment', 'enormous'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show date time.', 'enormous'),
            'id'                => 'single_date',
            'type'              => 'switch',
            'title'             => esc_html__('Date', 'enormous'),
            'default'           => true,
        ), 
        array(
            'id'                => 'box_author',
            'type'              => 'switch',
            'title'             => esc_html__('Box Content Author', 'enormous'),
            'default'           => false,
        ),
    )
));

/* Single portfolio*/
Redux::setSection($opt_name, array(
    'title' => esc_html__('Single Portfolio', 'enormous'),
    'icon' => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'       => 'portfolio_layout_header',
            'type'     => 'select',
            'title'    =>esc_html__('Select Layout Header', 'enormous'),
            'options'  => array(
                'default'  =>  'default',
                '1'  => 'header1',
                '2'  => 'header2',
                '3'  => 'header3',
                '4'  => 'header4',
                '5'  => 'header5',
                '6'  => 'header6',
                '7'  => 'header7',
                '8'  => 'header8',
                '9'  => 'header9',
                '10' => 'header10',
                '11' => 'header11',
                '12' => 'header12',
                '13' => 'header13',
                '14' => 'header14',
                '15' => 'header15',
                '16' => 'header16',
                '17' => 'header17',
                '18' => 'header18',
                '19' => 'header19',
                '20' => 'header20',
                '21' => 'header21',
                '22' => 'header22',
            ),
            'default'  => '6',
        ),
        array(
            'id'       => 'portfolio_layout_pagetitle',
            'type'     => 'select',
            'title'    =>esc_html__('Select Layout Page Title', 'enormous'),
            'options'  => array(
                '' => 'Layout default',
                '1' => 'Layout 1',
                '2' => 'Layout 2',
                '3' => 'Layout 3',
                '4' => 'Layout 4',
                '5' => 'Layout 5',
                '6' => 'Layout 6',
                '7' => 'Layout 7',
                '8' => 'Layout 8',
                '9' => 'Layout 9',
            ),
            'default'  => '8',
        ),
        array(
            'id'       => 'theme_portfolio_layout',
            'type'     => 'select',
            'title'    => esc_html__( 'Select Layout Content', 'enormous' ),
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
            'default' => 'layout1'
        ),
        array(
            'title'             => esc_html__('Background', 'enormous'),
            'subtitle'          => esc_html__('Page title background.', 'enormous'),
            'id'                => 'page_title_background_portfolio',
            'type'              => 'background',
            'output'            => array( '.single-portfolio #page-title' )
            
        ),
        array(
            'title' => esc_html__('Background Overlay', 'enormous'),
            'id' => 'background_overlay_portfolio',
            'type' => 'color_rgba', 
            'output'            => array( '.single-portfolio #page-title' )
        ), 
    )
));
/**
 * Styling
 * 
 * css color.
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Styling', 'enormous'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set color main color.', 'enormous'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'enormous'),
            'default' => '#0cb4ce'
        ),
        array(
            'subtitle' => esc_html__('Set color secondary color.', 'enormous'),
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'enormous'),
            'default' => '#e27871'
        ),
        array(
            'id'       => 'link_color',
            'type'     => 'link_color',
            'title'    => __('Links Color Option', 'enormous'),
            'default'  => array(
                'regular'  => '#0cb4ce',
                'hover'    => '#e27871',
                'active'   => '#e27871',
                'visited'  => '#e27871',
            ),
            'output'  => array('a'),
        )

    )
));
/**
 * Typography
 * 
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'enormous'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'enormous')
        ),
        array(
            'title'             => esc_html__('Margin', 'enormous'),
            'subtitle'          => esc_html__('Margin bottom of p', 'enormous'),
            'id'                => 'p_margin_bottom',
            'type'              => 'spacing',
            'mode'              => 'margin',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => false,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( 'p' )
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h1'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'enormous')
        ),
        array(
            'title'             => esc_html__('Margin', 'enormous'),
            'subtitle'          => esc_html__('Margin bottom of h1', 'enormous'),
            'id'                => 'h1_margin_bottom',
            'type'              => 'spacing',
            'mode'              => 'margin',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => false,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( 'h1' )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h2'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'enormous')
        ),
        array(
            'title'             => esc_html__('Margin', 'enormous'),
            'subtitle'          => esc_html__('Margin bottom of h2', 'enormous'),
            'id'                => 'h2_margin_bottom',
            'type'              => 'spacing',
            'mode'              => 'margin',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => false,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( 'body h2' )      
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h3'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'enormous')
        ),
        array(
            'title'             => esc_html__('Margin', 'enormous'),
            'subtitle'          => esc_html__('Margin bottom of h3', 'enormous'),
            'id'                => 'h3_margin_bottom',
            'type'              => 'spacing',
            'mode'              => 'margin',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => false,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( 'h3' )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h4'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'enormous')
        ),
        array(
            'title'             => esc_html__('Margin', 'enormous'),
            'subtitle'          => esc_html__('Margin bottom of h4', 'enormous'),
            'id'                => 'h4_margin_bottom',
            'type'              => 'spacing',
            'mode'              => 'margin',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => false,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( 'h4' )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h5'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'enormous')
        ),
        array(
            'title'             => esc_html__('Margin', 'enormous'),
            'subtitle'          => esc_html__('Margin bottom of h5', 'enormous'),
            'id'                => 'h5_margin_bottom',
            'type'              => 'spacing',
            'mode'              => 'margin',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => false,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( 'h5' )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h6'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'enormous')
        ),
        array(
            'title'             => esc_html__('Margin', 'enormous'),
            'subtitle'          => esc_html__('Margin bottom of h6', 'enormous'),
            'id'                => 'h6_margin_bottom',
            'type'              => 'spacing',
            'mode'              => 'margin',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => false,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( 'h6' )
        )
    )
));

/* extra font. */
$custom_font_1 = Redux::getOption($opt_name, 'google-font-selector-1');
$custom_font_1 = !empty($custom_font_1) ? explode(',', $custom_font_1) : array();
$custom_font_2 = Redux::getOption($opt_name, 'google-font-selector-2');
$custom_font_2 = !empty($custom_font_2) ? explode(',', $custom_font_2) : array();

Redux::setSection($opt_name, array(
    'title' => esc_html__('Extra Fonts', 'enormous'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Custom Font 1', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  =>  $custom_font_1,
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'enormous'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'enormous'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'enormous'),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => esc_html__('Custom Font 2', 'enormous'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  =>  $custom_font_2,
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'enormous'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => esc_html__('Selector 2', 'enormous'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'enormous'),
            'validate' => 'no_html',
            'default' => '',
        )
    )
));

/**
 * Footer
 *
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'enormous'),
    'icon' => 'el el-website',
    'fields' => array(
            array(
                'id'                => 'footer_layout',
                'title'             => esc_html__('Layouts', 'enormous'),
                'subtitle'          => esc_html__('select a layout for footer', 'enormous'),
                'default'           => '7',
                'type'              => 'image_select',
                'options'           => array(
                    '1' => get_template_directory_uri().'/assets/images/footer/f-style-1.png',
                    '2' => get_template_directory_uri().'/assets/images/footer/f-style-2.png',
                    '3' => get_template_directory_uri().'/assets/images/footer/f-style-3.png',   
                    '4' => get_template_directory_uri().'/assets/images/footer/f-style-4.png',   
                    '5' => get_template_directory_uri().'/assets/images/footer/f-style-5.jpg',   
                    '6' => get_template_directory_uri().'/assets/images/footer/f-style-6.jpg',   
                    '7' => get_template_directory_uri().'/assets/images/footer/f-style-7.jpg',   
                )
            ),
            array(
                'title'             => esc_html__('Background', 'enormous'),
                'subtitle'          => esc_html__('Footer background.', 'enormous'),
                'id'                => 'footer_background',
                'type'              => 'background',
                'output'            => array( 'footer #cshero-footer.cshero-footer' )
            ),   
            array(
                'title' => esc_html__('Background Overlay', 'enormous'),
                'id' => 'footer_background_overlay',
                'type' => 'color_rgba', 
                'output' => array('background-color' => 'footer .background-overlay'),   
            ),
            array(
                'title' => esc_html__('Info Footer', 'enormous'),
                'subtitle'          => esc_html__('Apply for footer layout 4', 'enormous'),
                'type'  => 'section',
                'id' => 'section-start4-footer',
                'indent' => true,
            ),
            array(
                'id'                => 'footer_address',
                'type'              => 'text',
                'title'             => esc_html__('Address', 'enormous'),
                'default'           => esc_html__('Alnahas Building, 2 AlBahr St, Tanta, AlGharbia, Egypt.', 'enormous'),
            ),   
            array(
                'id'                => 'footer_email',
                'type'              => 'text',
                'title'             => esc_html__('Email', 'enormous'),
                'default'           => esc_html__('7oroof@7oroof.com', 'enormous'),
            ),
            array(
                'id'                => 'footer_phone',
                'type'              => 'text',
                'title'             => esc_html__('Phone', 'enormous'),
                'default'           => esc_html__('002 01065370701', 'enormous'),
            ),
            array(
                'id'                => 'footer_support',
                'type'              => 'text',
                'title'             => esc_html__('Main Support', 'enormous'),
                'default'           => esc_html__('7oroof@7oroof.com', 'enormous'),
            ),
        )
));

/* footer top. */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Top', 'enormous'),
    'icon' => 'el el-minus',
    'subsection' => true,
    'fields' => array(  
        array(
            'id'       => 'footer-top-column',
            'type'     => 'select',
            'title'    => esc_html__( 'Column', 'enormous' ),
            'subtitle' => esc_html__( 'Select Footer Top Column', 'enormous' ),
            'default'    => 4,
            'options'  => array(
                1 => esc_html__('1', 'enormous' ),
                2 => esc_html__('2', 'enormous' ),
                3 => esc_html__('3', 'enormous' ),
                4 => esc_html__('4', 'enormous' ),
            )
        ),     
        array(
            'title'             => esc_html__('Padding', 'enormous'),
            'subtitle'          => esc_html__('Footer top padding (top/bottom).', 'enormous'),
            'id'                => 'footer_top_padding',
            'type'              => 'spacing',
            'mode'              => 'padding',
            'units'             => array('px'),
            'right'             => false,
            'left'              => false,
            'output'            => array( 'footer #cshero-footer #footer-top' )
        ),
        array(
            'id'                => 'footer_top_title_widget_color',
            'type'              => 'color',
            'title'             => esc_html__( 'Title Widget Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select title widget color for footer top', 'enormous' ),
            'output'            => array( 'footer #cshero-footer #footer-top .wg-title' ),
        ),
        array(
            'id'                => 'footer_top_text_color',
            'type'              => 'color',
            'title'             => esc_html__( 'Text Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select text color for footer top', 'enormous' ),
            'output'            => array( 'footer #cshero-footer #footer-top' ),
        ),
        array(
            'id'                => 'footer_top_link_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Links Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select links color for footer top', 'enormous' ),     
            'regular'           => true,
            'hover'             => true,
            'active'            => false,
            'visited'           => false,
            'output'            => array( 'footer #cshero-footer #footer-top a' ),
        ),
    )
));

/* footer bottom. */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Bottom', 'enormous'),
    'icon' => 'el el-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'id'                => 'footer_copyright',  
            'type'              => 'text',
            'title'             => esc_html__('Copyright', 'enormous'),
            'default'           => esc_html__('© 2017 Enormous, With Love by 7oroof.com', 'enormous'),
        ), 
        array(
            'title'             => esc_html__('Padding', 'enormous'),
            'subtitle'          => esc_html__('Footer bottom padding (top/bottom).', 'enormous'),
            'id'                => 'footer_bottom_padding',
            'type'              => 'spacing',
            'mode'              => 'padding',
            'units'             => array('px'),
            'right'             => false,
            'left'              => false,
            'output'            => array( 'footer #cshero-footer #footer-bottom' )
        ),
        array(
            'id'                => 'footer_bottom_text_color',
            'type'              => 'color',
            'title'             => esc_html__( 'Text Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select text color for footer bottom', 'enormous' ),
            'output'            => array( 'footer #cshero-footer #footer-bottom' ),
        ),
        array(
            'id'                => 'footer_bottom_link_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Links Color', 'enormous' ),
            'subtitle'          => esc_html__( 'Select links color for footer bottom', 'enormous' ),
            'regular'           => true,
            'hover'             => true,
            'active'            => false,
            'visited'           => false,
            'output'            => array( 'footer #cshero-footer #footer-bottom a' ),
        ),     
    )
));
/** 
 * Shop Option
 *
 * css color.
 * 
 * @author CMS
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Shop', 'enormous'),
    'icon' => 'el el-shopping-cart',
    'fields' => array(
        array(
            'title'             => esc_html__('Background for page title', 'enormous'),
            'id'                => 'background_shop_title',
            'type'              => 'media',
        ),
        array(
            'title' => esc_html__('Background Overlay', 'enormous'),
            'id' => 'background_overlay_shop',
            'type' => 'color_rgba', 
        ), 
        array(
            'id'       => 'shop_layout',
            'type'     => 'button_set',
            'title'    => esc_html__('Shop Category Layout', 'enormous'),
            'subtitle' => esc_html__('Shop Category Layout', 'enormous'),
            'options' => array(
                'fullwidth' => 'Full width',
                'sidebar_left' => 'Sidebar Left',
                'sidebar_right' => 'Sidebar Right',
            ),
            'default' => 'fullwidth',
        ),
        array(
            'title' => esc_html__('Products displayed per page', 'enormous'),
            'id' => 'product_per_page',
            'type' => 'slider',
            'subtitle' => esc_html__('Number product to show', 'enormous'),
            'default' => 9,
            'min'  => 6,
            'step' => 1,
            'max' => 50,
        ),
        array(
            'id'       => 'shop_column',
            'type'     => 'button_set',
            'title'    => esc_html__('Shop Column', 'enormous'),
            'subtitle' => esc_html__('', 'enormous'),
            'options' => array(
                '3column' => '3 Column (Default)',
                '4column' => '4 Column',
            ),
            'default' => '3column'
        )
    )
));

/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Optimal Core', 'enormous'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'enormous'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'enormous'),
            'default' => false
        )
    )
));