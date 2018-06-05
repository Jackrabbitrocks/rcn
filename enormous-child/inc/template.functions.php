<?php
/**
 * Add page class
 * 
 * @author Fox
 * @since 1.0.0
 */
function enormous_page_class(){
    global $opt_theme_options, $opt_meta_options;

    $page_class = '';
    /* check boxed layout */
    if(isset($opt_meta_options['general_layout']) && $opt_meta_options['general_layout'] == '0') {
        $opt_theme_options['general_layout'] = $opt_meta_options['general_layout'];
    }
    if($opt_theme_options['general_layout'] == '0'){
        $page_class = 'cs-boxed';
    } else {
        $page_class = 'cs-wide';
    }
    
    echo apply_filters('enormous_page_class', $page_class);
}

/**
 * get header layout.
 */
function enormous_header(){
    global $opt_theme_options, $opt_meta_options;

    if(!isset($opt_theme_options)){
        get_template_part('inc/header/header', '25');
        return;
    }

    if(is_page() && !empty($opt_meta_options['custom_header'])) {
        $opt_theme_options['header_layout'] = $opt_meta_options['header_layout'];
    }
    if (is_singular('portfolio')){
        $opt_theme_options['header_layout']= $opt_theme_options['portfolio_layout_header'];
    }
    /* load custom header template. */
    get_template_part('inc/header/header', $opt_theme_options['header_layout']);
}
/**
 * Get Footer Layout.
 * 
 * @author Fox
 */
function enormous_footer(){
    global $opt_theme_options, $opt_meta_options;
    /* footer for page */
    if(!isset($opt_theme_options)){
        get_template_part('inc/footer/footer', '7');
        return;
    }

    if(is_page() && !empty($opt_meta_options['custom_footer'])) {
        $opt_theme_options['footer_layout'] = $opt_meta_options['footer_layout'];
    }

    if(is_404()) {
        return;
    }
    /* load custom header template. */
    get_template_part('inc/footer/footer', $opt_theme_options['footer_layout']);    
}

/**
 * footer layout
 */
function enormous_footer_top(){
    global $opt_theme_options;

    /* footer-top */
    if(empty($opt_theme_options['footer-top-column']))
        return;

    $_class = "";

    switch ($opt_theme_options['footer-top-column']){
        case '1':
            $_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
            break;
        case '2':
            $_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
            break;
        case '3':
            $_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';     
            break;
        case '4':
            $_class = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
            break;
    }

    for($i = 1 ; $i <= $opt_theme_options['footer-top-column'] ; $i++){  
        if ( is_active_sidebar( 'sidebar-footer-top-' . $i ) ){
            echo '<div class="footer-top-item ' . esc_html($_class) . '"><div class="footer-top-item-inner">';
                dynamic_sidebar( 'sidebar-footer-top-' . $i );
            echo "</div></div>";
        }
    }
}

/**
 * Loading.
 * 
 * @author Fox
 */
function enormous_get_page_loading() {    
    global $opt_theme_options;
    if($opt_theme_options['general_page_loading'] == '1'){
        echo '<div id="cms-loadding"><div class="cms-loader"></div></div>';
    }
}

/**
 * get theme logo.
 */
function enormous_header_logo(){
    global $opt_theme_options, $opt_meta_options;

    echo '<div class="main_logo">';

        if(!empty($opt_meta_options['custom_header']) && !empty($opt_meta_options['main_logo']['url'])) {
            $opt_theme_options['main_logo']['url'] = $opt_meta_options['main_logo']['url'];
        }

        if(isset($opt_theme_options)) {
            echo '<a href="' . esc_url(home_url('/')) . '"><img alt="' .  get_bloginfo( "name" ) . '" src="' . esc_url($opt_theme_options['main_logo']['url']) . '"></a>';
        } else {
            echo '<a href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Main Logo', 'enormous') . '" src="' . esc_url(get_template_directory_uri().'/assets/images/logo.png') . '"></a>';
        }


    echo '</div>';

    enormous_header_sticky_logo();
}
function enormous_header_logo_left(){
    global $opt_theme_options, $opt_meta_options;

    echo '<div class="main_logo">';

    if(!empty($opt_meta_options['custom_header']) &&  !empty($opt_meta_options['main_logo']['url'])) {
        $opt_theme_options['main_logo']['url'] = $opt_meta_options['main_logo']['url'];
    }

    if(!empty($opt_theme_options['main_logo']['url'])) {
        echo '<a href="' . esc_url(home_url('/')) . '"><img alt="' .  get_bloginfo( "name" ) . '" src="' . esc_url($opt_theme_options['main_logo']['url']) . '"></a>';
    }

    echo '</div>';

}
function enormous_header_logo_dark(){
    global $opt_theme_options, $opt_meta_options;

    echo '<div class="main_logo">'; 
        if(!empty($opt_meta_options['main_logo_dark']['url']) && !empty($opt_meta_options['custom_header'])) {
            $opt_theme_options['main_logo_dark']['url'] = $opt_meta_options['main_logo_dark']['url'];
        }

        if(isset($opt_theme_options)) {
            echo '<a href="' . esc_url(home_url('/')) . '"><img alt="' .  get_bloginfo( "name" ) . '" src="' . esc_url($opt_theme_options['main_logo_dark']['url']) . '"></a>';
        } else {
            echo '<a class="main-logo" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Logo', 'enormous') . '" src="' . esc_url(get_template_directory_uri().'/assets/images/logo-dark.png') . '"></a>';
        }
    echo '</div>';

    enormous_header_sticky_logo();
}

/**
 * get theme logo.
 */
function enormous_header_sticky_logo(){
    global $opt_theme_options, $opt_meta_options;

    /* sticky off. */
    if(isset($opt_theme_options) && !isset($opt_theme_options['menu_sticky']) || isset($opt_theme_options) && !$opt_theme_options['menu_sticky'])
        return;

    /* default logo. */
    if(!empty($opt_meta_options['custom_header']) &&  !empty($opt_meta_options['sticky_logo']['url'])) {
        $opt_theme_options['sticky_logo']['url'] = $opt_meta_options['sticky_logo']['url'];
    }

    echo '<div class="sticky_logo">';

    if(isset($opt_theme_options)) {
        echo '<a href="' . esc_url(home_url('/')) . '"><img alt="' .  get_bloginfo( "name" ) . '" src="' . esc_url($opt_theme_options['sticky_logo']['url']) . '"></a>';
    } else {
        echo '<a href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Main Logo', 'enormous') . '" src="' . esc_url(get_template_directory_uri().'/assets/images/logo-dark.png') . '"></a>';
    }

    echo '</div>';  
}
/**
 * get header class.
 */
function enormous_header_class($class = ''){
    global $opt_theme_options;

    if(!isset($opt_theme_options)){
        echo esc_attr($class);
        return;
    }

    if($opt_theme_options['menu_sticky'])
        $class .= ' sticky-desktop';

    echo esc_attr($class);
}

/**
 * main navigation.
 */
function enormous_header_navigation(){

    global $opt_meta_options;

    $attr = array(
        'menu_class' => 'nav-menu menu-main-menu',
        'theme_location' => 'primary'
    );

    if(is_page() && !empty($opt_meta_options['header_menu']))
        $attr['menu'] = $opt_meta_options['header_menu'];

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }
    $locations = get_nav_menu_locations();

    if(empty($locations[ 'primary' ]))
        return;
    /* main nav. */
    wp_nav_menu( $attr );
}
/**
 * Main navigation - Left
 */
function enormous_header_navigation_left (){

    global $opt_meta_options;

    $attr = array(
        'menu_class' => 'nav-menu menu-main-menu nav-menu-left',
        'theme_location' => 'pr_menu_left'
    );

    if(is_page() && !empty($opt_meta_options['header_menu']))
        $attr['menu'] = $opt_meta_options['header_menu'];

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

    /* main nav. */
    wp_nav_menu( $attr );
}

/**
 * Main navigation - Right
 */
function enormous_header_navigation_right (){

    global $opt_meta_options;

    $attr = array(
        'menu_class' => 'nav-menu menu-main-menu nav-menu-right',
        'theme_location' => 'pr_menu_right'
    );

    if(is_page() && !empty($opt_meta_options['header_menu']))
        $attr['menu'] = $opt_meta_options['header_menu'];

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

    /* main nav. */
    wp_nav_menu( $attr );    
}
/**
 * Main navigation - Popup
 */
function enormous_header_navigation_popup(){

    global $opt_meta_options;

    $attr = array(
        'menu_class' => 'nav-menu menu-main-menu',
        'theme_location' => 'pr_menu_popup'
    );

    if(is_page() && !empty($opt_meta_options['header_menu']))
        $attr['menu'] = $opt_meta_options['header_menu'];

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }
    $locations = get_nav_menu_locations();

    if(empty($locations[ 'primary' ]))
        return;
    /* main nav. */
    wp_nav_menu( $attr );
}
/**
 * Menu Top
 */
function enormous_header_menu_top(){

    global $opt_meta_options;

    $attr = array(
        'menu_class' => 'menu-top',
        'theme_location' => 'pr_menu_top'
    );

    if(is_page() && !empty($opt_meta_options['header_menu']))
        $attr['menu'] = $opt_meta_options['header_menu'];

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

    /* main nav. */
    wp_nav_menu( $attr ); 
}

function enormous_info_top(){
    global $opt_theme_options;
    ?>
        <ul class="info-top">
            <li>
                <i class="fa fa-map-marker"></i>
                <?php if(isset($opt_theme_options['top_address'])) {
                    echo esc_attr($opt_theme_options['top_address']); 
                } else {
                    esc_html_e('Tanta AlGharbia, Egypt.', 'enormous');
                } ?>
                
            </li>   
            <li>
                <i class="fa fa-envelope"></i>
                <?php if(isset($opt_theme_options['top_email'])) {
                   ?><a href="mailto:<?php echo esc_attr($opt_theme_options['top_email']); ?>"><?php echo esc_attr($opt_theme_options['top_email']); ?></a><?php   
                } else {
                    esc_html_e('7oroof@7oroof.com', 'enormous');
                } ?>
            </li>
            <li>
                <i class="fa fa-phone"></i>
                <?php if(isset($opt_theme_options['top_phone'])) {
                    echo esc_attr($opt_theme_options['top_phone']); 
                } else {
                    esc_html_e('002 01065370701', 'enormous');
                } ?>
                
            </li>
        </ul>
    <?php
}
function enormous_info_footer(){
    global $opt_theme_options;
    ?>
        <div class="footer-info-top container">
            <div class="row">
                <div class="footer-address col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="item sameheight">
                        <i class="lnr-map-marker"></i>
                        <div class="item-content">
                            <?php if(isset($opt_theme_options['footer_address'])) {
                                echo esc_attr($opt_theme_options['footer_address']); 
                            } else {
                                esc_html_e('Alnahas Building, 2 AlBahr St, Tanta, AlGharbia, Egypt.', 'enormous');
                            } ?>
                        </div>
                    </div>
                    
                </div>   
                <div class="footer-email col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="item sameheight">
                        <i class="lnr-envelope"></i>
                        <div class="item-content">
                            <ul>
                                <li>
                                    <?php esc_html_e('Email: ', 'enormous');?>
                                    <?php if(isset($opt_theme_options['footer_email'])) {
                                       ?><a href="mailto:<?php echo esc_attr($opt_theme_options['footer_email']); ?>"><?php echo esc_attr($opt_theme_options['footer_email']); ?></a><?php   
                                    } else {
                                        esc_html_e('7oroof@7oroof.com', 'enormous');
                                    } ?>
                                </li>
                                <li>
                                    <?php esc_html_e('Phone: ', 'enormous');?>
                                    <?php if(isset($opt_theme_options['footer_phone'])) {
                                       ?><?php echo esc_attr($opt_theme_options['footer_phone']); ?><?php   
                                    } else {
                                        esc_html_e('002 01065370701', 'enormous');
                                    } ?>
                                </li>
                            </ul>
                        </div>
                    </div>  
                </div> 
                <div class="footer-support col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="item sameheight">
                        <i class="lnr-users"></i>
                        <div class="item-content">
                            <?php esc_html_e('Main Support: ', 'enormous');?><br/>
                            <?php if(isset($opt_theme_options['footer_support'])) {
                               ?><a href="mailto:<?php echo esc_attr($opt_theme_options['footer_support']); ?>"><?php echo esc_attr($opt_theme_options['footer_support']); ?></a><?php   
                            } else {
                                esc_html_e('7oroof@7oroof.com', 'enormous');
                            } ?> 
                        </div>
                    </div> 
                </div>
            </div> 
        </div>
    <?php
}

/* Show Header Icon */

function enormous_show_icon_header(){
    global $opt_theme_options;

    if($opt_theme_options['show_search_icon'] == '1'){ ?>
        <i class="search fa fa-search"></i>
    <?php } ?>
    
    <?php if ( is_active_sidebar( 'hidden-sidebar' ) ) { ?>
        <span class="hidden-wrapper">
            <i class="hidden-sidebar fa fa-bars"></i>
         </span>    
    <?php }
    
}
function enormous_show_cart(){
    global $opt_theme_options;

    if($opt_theme_options['show_cart_icon'] == '1'){ ?>
         <span class="shopping-cart-wrapper">
            <?php if ( is_active_sidebar( 'shop-cart' ) ) { ?>
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="couter_items-wrap"><span class="couter_items"><?php echo  sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'enormous' ), WC()->cart->cart_contents_count ); ?></span></span>
            <?php } ?>
        </span>
        <?php if ( class_exists( 'WC_Widget_Cart' ) ): ?>
            <div class="widget_shopping_cart">
                <div class="widget_shopping_cart_content">
                    <?php woocommerce_mini_cart(); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php }
    
}

function enormous_copyright(){
    global $opt_theme_options;
    ?>
        <div class="cms-copy-right">
            <?php if(isset($opt_theme_options['footer_copyright'])) { ?>
               <?php echo wp_kses_post($opt_theme_options['footer_copyright']); ?>  
            <?php } else {
                esc_html_e('© 2017 Enormous, by 7oroof.com', 'enormous');
            } ?>
        </div>
    <?php
}
/**
 * get page title layout
 */
function enormous_page_title(){
    global $opt_theme_options, $opt_meta_options;

    /* default. */
    $layout = '1';

    if (function_exists('is_woocommerce')){
        if (!empty($opt_theme_options['background_shop_title']['url'])) {
            $opt_theme_options['page_title_background']['url'] = $opt_theme_options['background_shop_title']['url'];
        }    
        if (!empty($opt_theme_options['background_overlay_shop'])) {
            $opt_theme_options['background_overlay'] = $opt_theme_options['background_overlay_shop'];     
        }         
    }
    if(is_page() && !empty($opt_meta_options['custom_page_title'])) {
        $opt_theme_options['page_title_layout'] = $opt_meta_options['page_title_layout'];
    }

    /* get theme options */
    if(isset($opt_theme_options['page_title_layout']))
        $layout = $opt_theme_options['page_title_layout'];

    /* custom layout from page. */
    if(is_page() && !empty($opt_meta_options['page_title_bg_gradient_style'])) {
        $opt_theme_options['page_title_bg_gradient_style'] = $opt_meta_options['page_title_bg_gradient_style'];
    }
    if(is_404()) {
        return;
    }
    if (is_singular('portfolio')){
        $layout= $opt_theme_options['portfolio_layout_pagetitle'];
    }    

    if( class_exists('Woocommerce') && is_shop() || class_exists('Woocommerce') && is_cart() || class_exists('Woocommerce') && is_checkout() || class_exists('Woocommerce') && is_singular('product')) { ?>
        <div id="page-title" class="page-title" style="background-image: url(<?php echo esc_url($opt_theme_options['page_title_background']['url']); ?>);">
            <div class="background-overlay" style="background-color: <?php echo esc_attr($opt_theme_options['background_overlay']['rgba'])?> "></div>     
            <div class="container">
                <div class="row">
                    <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php enormous_get_page_title(); ?></h1></div>
                    <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                </div>
            </div>
        </div>
    <?php } else { ?> 

       
    <?php switch ($layout){
            case '1':         
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay <?php if($opt_meta_options['page_title_bg_overlay_primary'] == 'yes') {echo ' bg-overlay-primary';} ?>"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '2':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '3':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title --> 
            <?php
            break;
            case '4':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay bg-gradient <?php echo esc_attr($opt_theme_options['page_title_bg_gradient_style']);?>"></div>   
                <div class="container">
                    <div class="row">
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '5':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '6':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left-md">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right-md"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '7':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay bg-gradient <?php echo esc_attr($opt_theme_options['page_title_bg_gradient_style']);?>"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '8':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;
            case '9':      
            ?>
            <div id="page-title" class="page-title layout-<?php echo esc_attr($layout); ?>">
                <div class="background-overlay"></div>  
                <div class="container">
                    <div class="row">
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php enormous_get_bread_crumb(); ?></div>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="reset-fontsize-xs"><?php enormous_get_page_title(); ?></h1>
                            <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
                                <div class="page-title-subtitle">
                                    <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
                                </div> 
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
           <!-- #page-title -->
            <?php
            break;

    } ?>
    <?php }
}

/**
 * page title
 */
function enormous_get_page_title(){

    global $opt_meta_options;

    if (!is_archive()){
        /* page. */
        if(is_page()) :
            /* custom title. */
            if(!empty($opt_meta_options['page_title_text'])):
                echo wp_kses_post($opt_meta_options['page_title_text']);
            else :
                the_title();
            endif;
        elseif (is_front_page()):
            esc_html_e('Blog', 'enormous');
        /* search */
        elseif (is_search()):
            printf( esc_html__( 'Search Results for: %s', 'enormous' ), '<span>' . get_search_query() . '</span>' );
        /* 404 */
        elseif (is_404()):
            esc_html_e( '404 Error', 'enormous');
        //elseif (is_singular('post')):
            //esc_html_e( 'SINGLE POST', 'enormous');
        elseif (is_singular('portfolio')):
            esc_html_e( 'Single Portfolio', 'enormous');
        elseif (is_singular('product')):
            esc_html_e( 'Single Product', 'enormous');     
        /* other */
        else :
            the_title();   
        endif;
    } else {
        /* category. */
        if ( is_category() ) :
            single_cat_title();
        elseif ( is_tag() ) :
            /* tag. */
            single_tag_title();
        /* author. */
        elseif ( is_author() ) :
            printf( esc_html__( 'Author: %s', 'enormous' ), '<span class="vcard">' . get_the_author() . '</span>' );
        /* date */
        elseif ( is_day() ) :
            printf( esc_html__( 'Day: %s', 'enormous' ), '<span>' . get_the_date() . '</span>' );
        elseif ( is_month() ) :
            printf( esc_html__( 'Month: %s', 'enormous' ), '<span>' . get_the_date() . '</span>' );
        elseif ( is_year() ) :
            printf( esc_html__( 'Year: %s', 'enormous' ), '<span>' . get_the_date() . '</span>' );
        /* post format */
        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
            esc_html_e( 'Asides', 'enormous' );
        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
            esc_html_e( 'Galleries', 'enormous');
        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
            esc_html_e( 'Images', 'enormous');
        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
            esc_html_e( 'Videos', 'enormous' );
        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
            esc_html_e( 'Quotes', 'enormous' );
        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
            esc_html_e( 'Links', 'enormous' );
        elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
            esc_html_e( 'Statuses', 'enormous' );
        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
            esc_html_e( 'Audios', 'enormous' );
        elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
            esc_html_e( 'Chats', 'enormous' );
        /* woocommerce */
        elseif (function_exists('is_woocommerce') && is_woocommerce()):
            woocommerce_page_title();
        else :
            /* other */
            the_title();
        endif;
    }
}

/**
 * Breadcrumb
 *
 * @since 1.0.0
 */
function enormous_get_bread_crumb($separator = '') {
    global $opt_theme_options, $post;

    echo '<ul class="breadcrumbs">';
    /* not front_page */
    if ( !is_front_page() ) {
        echo '<li><a href="';
        echo esc_url(home_url('/'));
        echo '">';
        echo isset($opt_theme_options['breacrumb_home_prefix']) ? esc_html($opt_theme_options['breacrumb_home_prefix']) : esc_html__('Home', 'enormous');
        echo "</a></li>";
    }

    $params['link_none'] = '';

    /* category */
    if (is_category()) {
        $category = get_the_category();
        $ID = $category[0]->cat_ID;
        echo is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<li>'.wp_kses_post($cat_parents).'</li>';
    }
    /* tax */
    if (is_tax()) {
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
        $link = get_term_link( $term );

        if ( is_wp_error( $link ) ) {
            echo sprintf('<li>%s</li>', $term->name );
        } else {
            echo sprintf('<li><a href="%s" title="%s">%s</a></li>', $link, $term->name, $term->name );
        }
    }
    /* home */

    /* page not front_page */
    if(is_page() && !is_front_page()) {
        $parents = array();
        $parent_id = $post->post_parent;
        while ( $parent_id ) :
            $page = get_page( $parent_id );
            if ( $params["link_none"] )
                $parents[]  = get_the_title( $page->ID );
            else
                $parents[]  = '<li><a href="' . esc_url(get_permalink( $page->ID )) . '" title="' . esc_attr(get_the_title( $page->ID )) . '">' . esc_html(get_the_title( $page->ID )) . '</a></li>' . $separator;
            $parent_id  = $page->post_parent;
        endwhile;
        $parents = array_reverse( $parents );
        echo join( '', $parents );
        echo '<li>'.esc_html(get_the_title()).'</li>';
    }
    /* single */
    if(is_single()) {
        $categories_1 = get_the_category($post->ID);
        if($categories_1):
            foreach($categories_1 as $cat_1):
                $cat_1_ids[] = $cat_1->term_id;
            endforeach;
            $cat_1_line = implode(',', $cat_1_ids);
        endif;
        if( isset( $cat_1_line ) && $cat_1_line ) {
            $categories = get_categories(array(
                'include' => $cat_1_line,
                'orderby' => 'id'
            ));
            if ( $categories ) :
                foreach ( $categories as $cat ) :
                    $cats[] = '<li><a href="' . esc_url(get_category_link( $cat->term_id )) . '" title="' . esc_attr($cat->name) . '">' . esc_html($cat->name) . '</a></li>';
                endforeach;
                echo join( '', $cats );
            endif;
        }
        echo '<li>'.get_the_title().'</li>';
    }
    /* tag */
    if( is_tag() ){ echo '<li>'."Tag: ".single_tag_title('',FALSE).'</li>'; }
    /* search */
    if( is_search() ){ echo '<li>'.esc_html__("Search", 'enormous').'</li>'; }
    /* date */
    if( is_year() ){ echo '<li>'.get_the_time().'</li>'; }
    /* 404 */
    if( is_404() ) {
        echo '<li>'.esc_html__("404", 'enormous').'</li>';
    }
    /* archive */
    if( is_archive() && is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
        echo '<li>'. esc_html($title) .'</li>';
    }
    echo "</ul>";
}

/**
 * Page Space Content
**/
function enormous_set_padding_class() {
    global $opt_meta_options;
    $main_content_class = array();
    $main_content_class[] = 'page-space-content';

    if(is_page()){

        $main_content_class[] = (!empty($opt_meta_options['page_space_content_top'])) ? 'pt-0' : '';
        $main_content_class[] = (!empty($opt_meta_options['page_space_content_bottom'])) ? 'pb-0' : '';
    }

    return implode(' ', $main_content_class);
}


/**
 * Display an optional post video.
 */
function enormous_post_video() {

    global $opt_meta_options, $wp_embed;

    /* no video. */
    if(empty($opt_meta_options['opt-video-type'])) {
       enormous_post_thumbnail ();
        return;
    }

    if($opt_meta_options['opt-video-type'] == 'local' && !empty($opt_meta_options['otp-video-local']['id'])){

        $video = wp_get_attachment_metadata($opt_meta_options['otp-video-local']['id']);

        echo do_shortcode('[video width="'.esc_attr($opt_meta_options['otp-video-local']['width']).'" height="'.esc_attr($opt_meta_options['otp-video-local']['height']).'" '.$video['fileformat'].'="'.esc_url($opt_meta_options['otp-video-local']['url']).'" poster="'.esc_url($opt_meta_options['otp-video-thumb']['url']).'"][/video]');

    } elseif($opt_meta_options['opt-video-type'] == 'youtube' && !empty($opt_meta_options['opt-video-youtube'])) {

        echo do_shortcode($wp_embed->run_shortcode('[embed]'.esc_url($opt_meta_options['opt-video-youtube']).'[/embed]'));

    } elseif($opt_meta_options['opt-video-type'] == 'vimeo' && !empty($opt_meta_options['opt-video-vimeo'])) {

        echo do_shortcode($wp_embed->run_shortcode('[embed]'.esc_url($opt_meta_options['opt-video-vimeo']).'[/embed]'));

    }
}

/**
 * Display an optional post audio.
 */
function enormous_post_audio() {
    global $opt_meta_options;

    /* no audio. */
    if(empty($opt_meta_options['otp-audio']['id'])) {
        enormous_post_thumbnail ();
        return;
    }

    $audio = wp_get_attachment_metadata($opt_meta_options['otp-audio']['id']);

    echo do_shortcode('[audio '.$audio['fileformat'].'="'.esc_url($opt_meta_options['otp-audio']['url']).'"][/audio]');
}

/**
 * Display an optional post gallery.
 */
function enormous_post_gallery(){
    global $opt_meta_options;
    if(empty($opt_meta_options['opt-gallery'])) {
        enormous_post_thumbnail();
        return;
    }

    $array_id = explode(",", $opt_meta_options['opt-gallery']);

    ?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $i = 0; ?>
            <?php foreach ($array_id as $image_id): ?>
                <?php
                $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                if($attachment_image[0] != ''):?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo esc_attr($i);?>" class="<?php if( $i == 0 ){ echo 'active'; } ?>"></li>
                    <?php $i++; endif; ?>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
            <?php $i = 0; ?>
            <?php foreach ($array_id as $image_id): ?>
                <?php
                $attachment_image = wp_get_attachment_image_src($image_id, '', false);
                if($attachment_image[0] != ''):?>
                    <div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                        <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                    </div>
                <?php $i++; endif; ?>
            <?php endforeach; ?>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="fa fa-angle-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="fa fa-angle-right"></span>
        </a>

    </div>   
    <?php
}

/**
 * Display an optional post quote.
 */
function enormous_post_quote() {
    global $opt_meta_options;

    if(empty($opt_meta_options['opt-quote-content'])){
        enormous_post_thumbnail ();
        return;   
    }

    $opt_meta_options['opt-quote-title'] = !empty($opt_meta_options['opt-quote-title']) ? '<span>'.esc_html($opt_meta_options['opt-quote-title']).'</span>' : '' ;

    echo '<blockquote><span>'.esc_html($opt_meta_options['opt-quote-content']).wp_kses_post($opt_meta_options['opt-quote-title']).'</span></blockquote>';
}  


/**
 * Display an optional post status.
 */
function enormous_post_status() {
    global $opt_meta_options;

    if(!empty($opt_meta_options['opt-status-images']['thumbnail'])){
        echo '<img src="'.($opt_meta_options['opt-status-images']['thumbnail']).'" />' ;
    }
}  


/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 */
function enormous_post_thumbnail () {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    echo '<div class="post-thumbnail">';

            the_post_thumbnail('');

    echo '</div>';
}

function enormous_post_sidebar(){
    global $opt_theme_options, $opt_meta_options;   

    $_sidebar = 'right';

    if(isset($opt_meta_options['single_layout']))
        $opt_theme_options['single_layout'] = $opt_meta_options['single_layout'];
        $_sidebar = $opt_theme_options['single_layout'];

    return 'is-sidebar-' . esc_attr($_sidebar);
}

function enormous_post_class(){
    global $opt_theme_options, $opt_meta_options;   

    $_class = "col-xs-12 col-sm-12 col-md-8 col-lg-8";
    if(isset($opt_meta_options['single_layout']))
        $opt_theme_options['single_layout'] = $opt_meta_options['single_layout'];
    
    if(isset($opt_meta_options['single_layout']) && $opt_meta_options['single_layout'] == 'full')
        $_class = "col-xs-12 col-sm-12 col-md-12 col-lg-12";
      
    echo esc_attr($_class);
}


/**
 * Display an optional archive detail.
 */
function enormous_archive_detail(){
    global $opt_theme_options;

    ?>
    <ul class="archive_detail">
        <?php edit_post_link('<li><i class="fa fa-pencil-square-o" aria-hidden="true"></i></li>'); ?>

        <?php if(!isset($opt_theme_options['archive_author']) || (isset($opt_theme_options['archive_author']) && $opt_theme_options['archive_author'])): ?>

            <li class="detail-author">
                <div class="admin-avt">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
                </div>    
                <?php esc_html_e('by: ', 'enormous'); ?> <?php the_author_posts_link(); ?>
            </li>
        <?php endif; ?>
        <?php if(!isset($opt_theme_options['archive_date']) || (isset($opt_theme_options['archive_date']) && $opt_theme_options['archive_date'])): ?>
            <li class="detail-date">
                <a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d'));?>">
                    <?php echo get_the_date(); ?>
                </a>
            </li>
        <?php endif; ?>  

        <?php if(!isset($opt_theme_options['archive_comment']) || (isset($opt_theme_options['archive_comment']) && $opt_theme_options['archive_comment'])): ?>

            <li class="detail-comment"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Comments: ', 'enormous'); ?> <span><?php echo esc_html(comments_number('0','1','%')); ?></span></a></li>

        <?php endif; ?>

        <?php if(has_category() && (!isset($opt_theme_options['archive_categories']) || (isset($opt_theme_options['archive_categories']) && $opt_theme_options['archive_categories']))): ?>
            <li class="detail-terms">
                <?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
            </li>
        <?php endif; ?>

        <?php if(has_tag() && (!isset($opt_theme_options['archive_tag']) || (isset($opt_theme_options['archive_tag']) && $opt_theme_options['archive_tag']))): ?>

            <li class="detail-tags"><?php the_tags('', ', ' ); ?></li>

        <?php endif; ?>

    </ul>
    <?php
}

/**
 * Display an optional post detail.
 */
function enormous_post_detail(){
    global $opt_theme_options;

    ?>
    <ul class="single_detail">
        
        <?php if(!isset($opt_theme_options['single_author']) || (isset($opt_theme_options['single_author']) && $opt_theme_options['single_author'])): ?>

            <li class="detail-author">
                <div class="admin-avt">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
                </div>    
                <?php esc_html_e('by: ', 'enormous'); ?> <?php the_author_posts_link(); ?>
            </li>

        <?php endif; ?>

        <?php if(!isset($opt_theme_options['single_date']) || (isset($opt_theme_options['single_date']) && $opt_theme_options['single_date'])): ?>

            <li class="detail-date"><a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d'));?>"><?php echo get_the_date(); ?>
            </a></li>

        <?php endif; ?>
        <?php if(!isset($opt_theme_options['single_comment']) || (isset($opt_theme_options['single_comment']) && $opt_theme_options['single_comment'])): ?>

            <li class="detail-comment"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Comments: ', 'enormous'); ?> <span><?php echo esc_html(comments_number('0','1','%')); ?></span></a></li>

        <?php endif; ?>
        <?php if(has_category() && (!isset($opt_theme_options['single_categories']) || (isset($opt_theme_options['single_categories']) && $opt_theme_options['single_categories']))): ?>
            <li class="detail-terms">
                <?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
            </li>
        <?php endif; ?>

        <?php if(has_tag() && (!isset($opt_theme_options['single_tag']) || (isset($opt_theme_options['single_tag']) && $opt_theme_options['single_tag']))): ?>

            <li class="detail-tags"><?php the_tags('', ', ' ); ?></li>

        <?php endif; ?>

    </ul>
    <?php
}

function enormous_archive_meta_icon(){
    global $opt_meta_options;
    ?>
    <?php if(isset($opt_meta_options['post_icon'])){ ?>
        <div class="blog-icon"><i class="<?php echo esc_attr($opt_meta_options['post_icon']); ?>"></i></div>
    <?php }
}
function enormous_archive_sidebar(){
    global $opt_theme_options;

    $_sidebar = 'right';

    if(isset($opt_theme_options['archive_layout']))
        $_sidebar = $opt_theme_options['archive_layout'];

    return 'is-sidebar-' . esc_attr($_sidebar);
}

function enormous_archive_class(){
    global $opt_theme_options;

    $_class = "col-xs-12 col-sm-12 col-md-8 col-lg-8";

    if(isset($opt_theme_options['archive_layout']) && $opt_theme_options['archive_layout'] == 'full')
        $_class = "col-xs-12 col-sm-12 col-md-12 col-lg-12";

    echo esc_attr($_class);
}

//convert dates to readable format
if (!function_exists('tp_relative_time')) {

    function tp_relative_time($a) {
        //get current timestampt
        $b = strtotime("now");
        //get timestamp when tweet created
        $c = strtotime($a);
        //get difference
        $d = $b - $c;
        //calculate different time values
        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $week = $day * 7;

        if (is_numeric($d) && $d > 0) {
            //if less then 3 seconds
            if ($d < 3)
                return "right now";
            //if less then minute
            if ($d < $minute)
                return floor($d) . " seconds ago";
            //if less then 2 minutes
            if ($d < $minute * 2)
                return "about 1 minute ago";
            //if less then hour
            if ($d < $hour)
                return floor($d / $minute) . " minutes ago";
            //if less then 2 hours
            if ($d < $hour * 2)
                return "about 1 hour ago";
            //if less then day
            if ($d < $day)
                return floor($d / $hour) . " hours ago";
            //if more then day, but less then 2 days
            if ($d > $day && $d < $day * 2)
                return "yesterday";
            //if less then year
            if ($d < $day * 365)
                return floor($d / $day) . " days ago";
            //else return more than a year
            return "over a year ago";
        }
    }

}


function enormous_footer_back_to_top(){
    global $opt_theme_options;

    $_back_to_top = true;

    if(isset($opt_theme_options['general_back_to_top']))
        $_back_to_top = $opt_theme_options['general_back_to_top'];

    if($_back_to_top)
        echo '<div class="ef3-back-to-top"><i class="fa fa-angle-up"></i></div>';
}
/**
 * Get Post Meta
**/

function enormous_get_meta_options() { 
    global $opt_meta_options;      
    return $opt_meta_options;
}

/**
 * Header Social
**/
function enormous_cms_social() {

    global $opt_theme_options;
    $cms_header_social = '';
    if($opt_theme_options) {
        $cms_social =  $opt_theme_options['cms_social']['enabled'];
        ?>
        <ul class="cms-social">
            <?php
                if ($cms_social): foreach ($cms_social as $key=>$value) {
                    switch($key) {
                 
                        case 'facebook': echo '<li class="facebook"><a href="'.esc_url($opt_theme_options['social_facebook_url']).'"><i class="fa fa-facebook"></i></a></li>';
                        break;
                 
                        case 'twitter': echo '<li class="twitter"><a href="'.esc_url($opt_theme_options['social_twitter_url']).'"><i class="fa fa-twitter"></i></a></li>';
                        break;
                 
                        case 'linkedin': echo '<li class="linkedin"><a href="'.esc_url($opt_theme_options['social_inkedin_url']).'"><i class="fa fa-linkedin"></i></a></li>';
                        break;         
                  
                        case 'rss': echo '<li class="rss"><a href="'.esc_url($opt_theme_options['social_rss_url']).'"><i class="fa fa-rss"></i></a></li>';    
                        break;  
                        
                        case 'instagram': echo '<li class="instagram"><a href="'.esc_url($opt_theme_options['social_instagram_url']).'"><i class="fa fa-instagram"></i></a></li>';    
                        break;

                        case 'google': echo '<li class="google"><a href="'.esc_url($opt_theme_options['social_google_url']).'"><i class="fa fa-google-plus"></i></a></li>';    
                        break;

                        case 'skype': echo '<li class="skype"><a href="'.esc_url($opt_theme_options['social_skype_url']).'"><i class="fa fa-skype"></i></a></li>';    
                        break;

                        case 'pinterest': echo '<li class="pinterest"><a href="'.esc_url($opt_theme_options['social_pinterest_url']).'"><i class="fa fa-pinterest"></i></a></li>';    
                        break;

                        case 'vimeo': echo '<li class="vimeo"><a href="'.esc_url($opt_theme_options['social_vimeo_url']).'"><i class="fa fa-vimeo"></i></a></li>';    
                        break;

                        case 'youtube': echo '<li class="youtube"><a href="'.esc_url($opt_theme_options['social_youtube_url']).'"><i class="fa fa-youtube-play"></i></a></li>';    
                        break;

                        case 'tumblr': echo '<li class="tumblr"><a href="'.esc_url($opt_theme_options['social_tumblr_url']).'"><i class="fa fa-tumblr"></i></a></li>';    
                        break;

                    }    
                }
                endif;
            ?>
        </ul>
    <?php } 
}
/**
 * Header Contact
**/

/**
* Share social
*
* @since 1.0.0
*/
function enormous_cms_get_socials_share(){
    ?>
    
        <li><a title="Facebook" data-placement="top" data-rel="tooltip" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a></li>

        <li><a title="Twitter" data-placement="top" data-rel="tooltip" target="_blank" href="https://twitter.com/home?status=<?php echo urlencode(esc_html('Check out this article', 'enormous'));?>:%20<?php echo urlencode(get_the_title());?>%20-%20<?php echo urlencode(get_the_permalink());?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a></li>
        <li><a target="_blank" href="https://plus.google.com/pin/create/button/?url=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a></li>
        <li><a target="_blank" href="https://dribbble.com/tags/share_button/?url=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-dribbble"></i></span></a></li>
 
    <?php
}

function enormous_cms_contact_top() {

    global $opt_theme_options;
       if($opt_theme_options['top_button_text']) { ?>
            <div class="top-media">
                <a class="top-button" href="<?php echo esc_url($opt_theme_options['top_button_link']); ?>"><?php echo esc_attr($opt_theme_options['top_button_text']); ?></a>
            </div>
        <?php } 
}

/* Menu Popup [Apply Header Layout 9] */
function enormous_menu_popup() {
    global $opt_theme_options;
    /* default. */
    $layout_popup = 'style-dark1';

    /* get theme options */
    if(isset($opt_theme_options['popup_style']))
        $layout_popup = $opt_theme_options['popup_style'];

    /* custom layout from page. */
    if(is_page() && !empty($opt_meta_options['popup_style']))
        $layout_popup = $opt_meta_options['popup_style'];

    if(is_page() && !empty($opt_meta_options['custom_header'])) {
        $opt_theme_options['header_layout'] = $opt_meta_options['header_layout'];
    }
    if ($opt_theme_options['header_layout'] == '9' || $opt_theme_options['header_layout'] == '11' || $opt_theme_options['header_layout'] == '12' || $opt_theme_options['header_layout'] == '15' || $opt_theme_options['header_layout'] == '21' || $opt_theme_options['header_layout'] == '24') {
        switch ($layout_popup){
            case 'style-dark1':      
                ?>
                <div class="cshero-popup-menu <?php echo esc_attr($layout_popup); ?>">
                    <div class="cshero-popup-menu-inner text-center">
                        <div class="cshero-popup-menu-inner-wrapper">
                            <div class="menu-popup-close">
                                <span><?php echo esc_html__('close', 'enormous'); ?></span><i class="fa fa-close"></i>
                            </div>
                               
                            <div id="cshero-header-logo" class="col-xs-12">
                                <?php enormous_header_logo(); ?>
                            </div><!-- #site-logo -->
                            <div id="cshero-header-navigation" class="col-xs-12">
                                <div class="cshero-header-navigation-inner">
                                    <nav id="site-navigation" class="main-navigation">
                                        <?php enormous_header_navigation_popup(); ?>
                                    </nav><!-- #site-navigation -->
                                </div>
                            </div>
                            <div class="cs-hero-bottom">
                                <?php enormous_cms_social(); ?>
                                <?php enormous_copyright(); ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php
                break;
                case 'style-dark2':      
                ?>
                <div class="cshero-popup-menu <?php echo esc_attr($layout_popup); ?>">
                    <div class="cshero-popup-menu-inner text-center">
                        <div class="cshero-popup-menu-inner-wrapper">
                            <div class="menu-popup-close">
                                <span><?php echo esc_html__('close', 'enormous'); ?></span><i class="fa fa-close"></i>
                            </div>
                                  
                            <div id="cshero-header-logo" class="col-xs-12">
                                <?php enormous_header_logo(); ?>
                            </div><!-- #site-logo -->
                            <div id="cshero-header-navigation" class="col-xs-12">
                                <div class="cshero-header-navigation-inner">
                                    <nav id="site-navigation" class="main-navigation">
                                        <?php enormous_header_navigation_popup(); ?>
                                    </nav><!-- #site-navigation -->
                                </div>
                            </div>
                            <div class="cs-hero-bottom">
                                <?php enormous_cms_social(); ?>
                                <?php enormous_copyright(); ?>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <?php
                break;
                case 'style-light1':      
                ?>
                <div class="cshero-popup-menu <?php echo esc_attr($layout_popup); ?>">
                    <div class="cshero-popup-menu-inner text-center">       
                        <div class="cshero-popup-menu-inner-wrapper">
                            <div class="menu-popup-close col-lg-3 text-right">
                                <span><?php echo esc_html__('close', 'enormous'); ?></span><i class="fa fa-close"></i>
                            </div>     
                            <div id="cshero-header-logo" class="col-xs-12">
                                <?php enormous_header_logo_dark(); ?>
                            </div><!-- #site-logo -->
                            <div id="cshero-header-navigation" class="col-xs-12">
                                <div class="cshero-header-navigation-inner">
                                    <nav id="site-navigation" class="main-navigation">
                                        <?php enormous_header_navigation_popup(); ?>
                                    </nav><!-- #site-navigation -->
                                </div>
                            </div>
                            <div class="cs-hero-bottom">
                                <?php enormous_cms_social(); ?>
                                <?php enormous_copyright(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
                case 'style-light2':          
                ?>
                <div class="cshero-popup-menu <?php echo esc_attr($layout_popup); ?>">
                    <div class="cshero-popup-menu-inner container text-center">
                        <div class="cshero-popup-menu-inner-wrapper">
                            <div class="menu-popup-close col-lg-3 text-right">
                                <span><?php echo esc_html__('close', 'enormous'); ?></span><i class="fa fa-close"></i>
                            </div>
                               
                            <div id="cshero-header-logo" class="col-xs-12">
                                <?php enormous_header_logo_dark(); ?>
                            </div><!-- #site-logo -->
                            <div id="cshero-header-navigation" class="col-xs-12">
                                <div class="cshero-header-navigation-inner">
                                    <nav id="site-navigation" class="main-navigation">
                                        <?php enormous_header_navigation_popup(); ?>
                                    </nav><!-- #site-navigation -->
                                </div>
                            </div>
                            <div class="cs-hero-bottom">
                                <?php enormous_cms_social(); ?>
                                <?php enormous_copyright(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
        } 
    }
}
/**
 * Team Social
**/
function enormous_cms_team_social() {

    global $opt_meta_options;
    $cms_team_social = '';
    if($opt_meta_options) {
        $cms_team_social =  $opt_meta_options['cms_team_social']['enabled'];
        ?>
        <ul class="cms-team-social">
            <?php
                if ($cms_team_social): foreach ($cms_team_social as $key=>$value) {
                    switch($key) {
                 
                        case 'facebook': echo '<li class="facebook"><a href="'.esc_url($opt_meta_options['social_facebook_url']).'"><i class="fa fa-facebook"></i></a></li>';
                        break;
                 
                        case 'twitter': echo '<li class="twitter"><a href="'.esc_url($opt_meta_options['social_twitter_url']).'"><i class="fa fa-twitter"></i></a></li>';
                        break;

                        case 'rss': echo '<li class="rss"><a href="'.esc_url($opt_meta_options['social_rss_url']).'"><i class="fa fa-rss"></i></a></li>';    
                        break;  
                        
                        case 'instagram': echo '<li class="instagram"><a href="'.esc_url($opt_meta_options['social_instagram_url']).'"><i class="fa fa-instagram"></i></a></li>';    
                        break;

                        case 'linkedin': echo '<li class="linkedin"><a href="'.esc_url($opt_meta_options['social_inkedin_url']).'"><i class="fa fa-linkedin"></i></a></li>';
                        break; 

                        case 'google': echo '<li class="google"><a href="'.esc_url($opt_meta_options['social_google_url']).'"><i class="fa fa-google-plus"></i></a></li>';    
                        break;

                        case 'skype': echo '<li class="skype"><a href="'.esc_url($opt_meta_options['social_skype_url']).'"><i class="fa fa-skype"></i></a></li>';    
                        break;

                        case 'pinterest': echo '<li class="pinterest"><a href="'.esc_url($opt_meta_options['social_pinterest_url']).'"><i class="fa fa-pinterest"></i></a></li>';    
                        break;

                        case 'vimeo': echo '<li class="vimeo"><a href="'.esc_url($opt_meta_options['social_vimeo_url']).'"><i class="fa fa-vimeo"></i></a></li>';    
                        break;

                        case 'youtube': echo '<li class="youtube"><a href="'.esc_url($opt_meta_options['social_youtube_url']).'"><i class="fa fa-youtube-play"></i></a></li>';    
                        break;

                        case 'tumblr': echo '<li class="tumblr"><a href="'.esc_url($opt_meta_options['social_tumblr_url']).'"><i class="fa fa-tumblr"></i></a></li>';    
                        break;   

                    }
                }
                endif;
            ?>
        </ul>
    <?php } 
}

/* RevSlider */
function enormous_build_shortcode_rev_slider()
{
    if (class_exists('RevSlider')) {

        $slider = new RevSlider();
        $arrSliders = $slider->getArrSliders();

        $revsliders = array(''=>'');
        if ($arrSliders) {
            foreach ($arrSliders as $slider) {
                /* @var $slider RevSlider */
                $revsliders[$slider->getAlias()] = $slider->getTitle();
            }
        } else {
            $revsliders[__('No sliders found', 'enormous')] = 0;
        }
    return $revsliders;
    }
}

function enormous_blog_query(){
    global $paged;
    return new WP_Query('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged);
}

/* Related Post */
function enormous_related_post() {
    global $post;

    $posttags = get_the_category($post->ID);

    if(empty($posttags)) return ;

    $tags = array();

    foreach ($posttags as $tag) {

        $tags[] = $tag->term_id;
    }

    $query = new WP_Query(array('posts_per_page'=> 3, 'post_type' => 'post', 'post_status'=> 'publish', 'category__in'=>$tags));

    if($query->have_posts()){
        ?>
        <div class="cms-related-post clearfix">
            <h3 class="cms-title"><span><?php echo esc_html_e('Related Posts', "enormous") ?></span></h3>
            <div id="related-post" class="cms-related-post-inner row">
                <?php
                while ($query->have_posts()): $query->the_post();
                $size = 'enormous_750X528';
                    ?>
                        <div class="item <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?> col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="cms-grid-item-inner">
                                <?php 
                                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                                        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                                        echo '<div class="cms-carousel-media">'.$thumbnail.'</div>';
                                    endif;
                                ?>
                                <div class="cms-grid-content">
                                    <h3 class="cms-grid-title">
                                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>      
                                    </h3>
                                    <div class="cms-grid-date">
                                        <?php echo get_the_date(); ?> 
                                    </div>
                                </div>
                            </div> 
                        </div>
                    <?php
                endwhile;
                ?> </div></div> <?php   
    }

    wp_reset_postdata();       
}

/* Portfolio Layout */

function enormous_portfolio_layout() {
    global $opt_theme_options, $opt_meta_options;

    $portfolio_layout = '';

    if(!empty($opt_meta_options['portfolio_layout_show'])) {
        $opt_theme_options['theme_portfolio_layout'] = $opt_meta_options['single_portfolio_layout']; 
    }

    if(!empty($opt_theme_options['theme_portfolio_layout'])) {
        $portfolio_layout = $opt_theme_options['theme_portfolio_layout'];
    } else {
        $portfolio_layout = 'layout1';
    }

    return $portfolio_layout;
}

function enormous_portfolio_meta(){
    global $opt_meta_options;
    ?>
        <ul class="cms-portfolio-meta">
            <?php if(isset($opt_meta_options['client_portfolio'])) { ?>
            <li>
                <strong><?php esc_html_e('Client: ', 'enormous'); ?></strong><?php echo wp_kses_post($opt_meta_options['client_portfolio']); ?>
            </li>
            <?php } ?>
            <?php if(isset($opt_meta_options['location_portfolio'])) { ?>
            <li>
                <strong><?php esc_html_e('Location: ', 'enormous'); ?></strong><?php echo wp_kses_post($opt_meta_options['location_portfolio']); ?>
            </li>
            <?php } ?>
            <li>
                <strong><?php esc_html_e('Date: ', 'enormous'); ?></strong>
                <?php echo get_the_date(); ?>         
            </li> 
            <li>
                <strong><?php esc_html_e('Category: ', 'enormous'); ?></strong> <?php echo get_the_term_list( get_the_ID(), 'portfolio_categories', '', ', ', '' ); ?>
            </li>
        </ul>
    <?php
}

/**
 * Buy Theme.
 * 
 * @author Fox
 */
function enormous_buy_theme() { ?>
    <div id="cms-buy-button-fixed" class="cms-buy-button hidden-xs">
        <a href="https://goo.gl/3k77Ct" target="_blank" title="Purchase Enormous">
            <span class="cms-buy-button-content-wrapper cms-buy-button-top">
                <svg height="15px" id="cms-buy-button-cart-icon" version="1.1" viewBox="0 0 20 20" width="15px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#fff" id="Core" transform="translate(-212.000000, -422.000000)"><g id="shopping-cart" transform="translate(212.000000, 422.000000)"><path d="M6,16 C4.9,16 4,16.9 4,18 C4,19.1 4.9,20 6,20 C7.1,20 8,19.1 8,18 C8,16.9 7.1,16 6,16 L6,16 Z M0,0 L0,2 L2,2 L5.6,9.6 L4.2,12 C4.1,12.3 4,12.7 4,13 C4,14.1 4.9,15 6,15 L18,15 L18,13 L6.4,13 C6.3,13 6.2,12.9 6.2,12.8 L6.2,12.7 L7.1,11 L14.5,11 C15.3,11 15.9,10.6 16.2,10 L19.8,3.5 C20,3.3 20,3.2 20,3 C20,2.4 19.6,2 19,2 L4.2,2 L3.3,0 L0,0 L0,0 Z M16,16 C14.9,16 14,16.9 14,18 C14,19.1 14.9,20 16,20 C17.1,20 18,19.1 18,18 C18,16.9 17.1,16 16,16 L16,16 Z" id="Shape"/></g></g></g></svg>
                <span class="decorated">only 59$,</span>
                <span>buy on</span>
                <svg viewBox="0 0 110 29" id="cms-buy-button-envato-logo" width="65px" height="15px"><path class="leaf" d="M14.8 4.7c-.6-.3-2.2-.1-4.1.5-3.4 2.3-6.2 5.7-6.4 11.2-.1.1-.3 0-.4-.1-1-1.8-1.3-3.6-.6-6.3.2-.2-.3-.5-.4-.4s-.8.9-1.3 1.7c-2.3 4-.8 9.1 3.2 11.3 4.1 2.2 9.1.8 11.3-3.2 2.6-4.7.2-13.9-1.3-14.7"/> <path class="text" d="M29.2 9.5c2.6 0 4.3 1.7 4.3 4.3h-9.2c.3-2.4 2.3-4.3 4.9-4.3m0-2.6c-4.7 0-8.2 3.6-8.2 8.4s3.4 8.4 8.4 8.4c2.5 0 4.5-.8 6-2.4.5-.5.5-1 .5-1.2 0-.8-.6-1.4-1.4-1.4-.4 0-.8.1-1.1.5-.8.8-2 1.7-4 1.7-2.7 0-4.9-2-5-4.6h10.8c1.2 0 1.7-.6 1.7-1.7 0-.3 0-.6-.1-1-.7-4.3-3.5-6.7-7.6-6.7m17.8 0c-2.2 0-4.3 1.3-5.2 3v-1c0-1.7-1.3-1.7-1.5-1.7-.8 0-1.6.5-1.6 1.7v12.8c0 1.7 1.4 1.8 1.6 1.8.3 0 1.6-.1 1.6-1.8v-6.9c0-3 1.7-5.1 4.1-5.1 2.4 0 3.5 1.5 3.5 4.7v7.3c0 1.7 1.4 1.8 1.6 1.8.3 0 1.6-.1 1.6-1.8v-8.4c.3-3.1-1.3-6.4-5.7-6.4m20.9.1c-.8 0-1.3.4-1.6 1.3l-4.5 11.2-4.6-11.1c-.3-.9-.9-1.3-1.7-1.3-.9 0-1.6.7-1.6 1.6 0 .2 0 .5.2.9l5.2 12.1c.6 1.5 1.6 1.7 2.4 1.7s1.7-.3 2.4-1.7l5.2-12.2c.2-.4.2-.8.2-.9 0-.9-.7-1.6-1.6-1.6m12.3 8.7h.7v.8c0 2.8-1.7 4.5-4.5 4.5-.8 0-3.1-.1-3.1-2.4-.1-2.6 3.9-2.9 6.9-2.9m-2.9-8.8c-2.1 0-4.1.6-5.5 1.7-.5.3-.7.8-.7 1.3 0 .7.6 1.3 1.3 1.3.3 0 .6-.1 1-.3 1.2-.9 2.4-1.2 3.7-1.2 2.4 0 3.8 1.3 3.8 3.3v.3c-5.4 0-11 .6-11 5.4 0 3.4 2.9 4.9 5.8 4.9 2.3 0 4.1-.9 5.3-2.6v.8c0 1.3.8 1.7 1.5 1.7.1 0 1.5-.1 1.5-1.7V13c0-3.8-2.5-6.1-6.7-6.1M92.6 10c1.5 0 1.5-1.1 1.5-1.3 0-.6-.4-1.4-1.5-1.4h-2.9v-3c0-1.3-.8-1.8-1.6-1.8-.3 0-1.6.1-1.6 1.8v14.1c0 3.3 1.6 5 4.7 5 .8 0 1.5-.1 2.1-.3.6-.3.9-.8.9-1.3 0-.8-.6-1.3-1.3-1.3-.1 0-.3.1-.6.1-.3.1-.5.1-.7.1-1.3 0-1.8-.8-1.8-2.6v-8l2.8-.1zm10.8 10.8c-3.4 0-5.2-2.9-5.2-5.6 0-3.8 2.7-5.6 5.2-5.6s5.2 1.7 5.2 5.6-2.8 5.6-5.2 5.6m0-13.9c-5 0-8.5 3.5-8.5 8.4 0 2.4.8 4.5 2.4 6.1 1.5 1.5 3.7 2.4 6.1 2.4 4.9 0 8.6-3.6 8.6-8.4 0-5-3.6-8.5-8.6-8.5"/></svg>
            </span>
        </a>
        <i class="btn-buy-close fa fa-close"></i>
    </div>
<?php }
