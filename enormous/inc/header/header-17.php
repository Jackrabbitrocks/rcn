<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
?>
<div id="cshero-header-inner" class="header-17 no-trans m-style no-header-top">
    <div id="cshero-header-wrapper">
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