<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
?>
<div id="cshero-header-inner" class="header-2 bg-trans no-header-top">
    <div id="cshero-header-wrapper">
        <div id="cshero-header" class="<?php enormous_header_class('cshero-main-header'); ?>">
            <div class="container">
                <div class="row">
                    <div id="cshero-header-logo" class="site-branding col-lg-3 col-md-3 col-sm-6 col-xs-6">

                        <?php enormous_header_logo(); ?>

                    </div><!-- #site-logo -->
                    
                    <div id="cshero-header-navigation" class="col-lg-9 col-md-9 col-sm-12 col-xs-12"> 
                        <div class="cshero-social-top hidden-sm hidden-xs">
                            <?php enormous_cms_contact_top(); ?>
                            <?php enormous_cms_social(); ?>
                        </div> 
                        <div class="cshero-navigation-bottom">
                            <div class="cshero-navigation-right icon-white hidden-xs hidden-sm">
                                <div class="nav-button-icon">
                                    <?php enormous_show_cart();?>

                                    <?php enormous_show_icon_header();?>
                                </div>
                            </div>   
                            <nav id="site-navigation" class="main-navigation pull-right menu-white">    

                                <?php enormous_header_navigation(); ?>    

                            </nav><!-- #site-navigation -->
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