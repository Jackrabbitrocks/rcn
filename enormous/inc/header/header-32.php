<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
?>
<div id="cshero-header-inner" class="header-16 no-trans m-style header-top header-custom-32">
    <div id="cshero-header-wrapper">
        <div id="cshero-header-top" class="hidden-xs hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="top-info col-lg-7 col-md-7 col-sm-12 col-xs-12 text-left">
                        <?php enormous_info_top(); ?>
                    </div>
                    <div class="cshero-social-top col-lg-5 col-md-5 col-sm-12 col-xs-12 text-right">
                        <?php esc_html_e('Don’t miss to follow us ', 'enormous'); ?><?php enormous_cms_social(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="cshero-header-minimal">
            <div class="container">
                <div class="row">
                    <div id="cshero-header-logo" class="site-branding col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center-md">

                        <?php enormous_header_logo_dark(); ?>

                    </div><!-- #site-logo -->
                </div>
            </div>
        </div>
        <div id="cshero-header" class="<?php enormous_header_class('cshero-main-header'); ?>">
            <div class="container">
                <div class="row">

                    <div id="cshero-header-navigation" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <nav id="site-navigation" class="main-navigation">    

                            <?php enormous_header_navigation(); ?>    

                        </nav><!-- #site-navigation -->

                        <div class="cshero-navigation-right hidden-xs hidden-sm">
                            <div class="nav-button-icon">  
                                <?php enormous_show_cart();?>

                                <?php enormous_show_icon_header();?>
                            </div>
                        </div>   

                    </div>
                    <div id="cshero-menu-mobile" class="collapse navbar-collapse">
                        <div class="nav-button-icon">
                            <i class="search fa fa-search"></i>
                        </div>
                        <i class="cms-icon-menu fa fa-bars"></i>
                    </div><!-- #menu-mobile --> 
                </div>
            </div>
        </div>
    </div>
</div>