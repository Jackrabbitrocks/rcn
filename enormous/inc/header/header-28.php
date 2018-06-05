<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
?>
<div id="cshero-header-inner" class="header-1 bg-trans m-style header-28 no-header-top">
    <div id="cshero-header-wrapper">
        <div id="cshero-header" class="<?php enormous_header_class('cshero-main-header'); ?>">
            <div class="container">
                <div class="row">
                    <div id="cshero-header-logo" class="site-branding col-lg-3 col-md-3 col-sm-6 col-xs-6">

                        <?php enormous_header_logo(); ?>

                    </div><!-- #site-logo -->
                    
                    <div id="cshero-header-navigation" class="text-right col-lg-9 col-md-9 col-sm-12 col-xs-12">  
                        
                        <nav id="site-navigation" class="main-navigation menu-white">    

                            <?php enormous_header_navigation(); ?>    

                        </nav><!-- #site-navigation -->
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