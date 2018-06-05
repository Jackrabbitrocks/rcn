<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
?>
<div id="cshero-header-inner" class="header-24 bg-trans no-header-top">
    <div id="cshero-header-wrapper">
        <div id="cshero-header" class="<?php enormous_header_class('cshero-main-header'); ?>">
            <div class="container">
                <div class="row">
                    <div id="cshero-header-logo" class="site-branding col-lg-3 col-md-3 col-sm-6 col-xs-6">

                        <?php enormous_header_logo_dark(); ?>

                    </div><!-- #site-logo -->
                    
                    <div class="menu-popup pull-right text-right col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <?php echo esc_html__('menu', 'enormous'); ?><i class="fa fa-navicon"></i>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>