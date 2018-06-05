<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

?>

    <div id="cshero-footer" class="cshero-footer cshero-footer6">
        <div class="background-overlay"></div> 
        <div id="footer-top">
            <div class="container">
                <div class="row">
                    <div class="footer-top-item col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="footer-top-item-inner">
                            <?php dynamic_sidebar( 'footer-feature-1' ); ?>
                        </div>
                    </div>
                    <div class="footer-top-item col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="footer-top-item-inner">
                            <?php dynamic_sidebar( 'footer-feature-2' ); ?>
                        </div>
                    </div>
                    <div class="footer-top-item col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="footer-top-item-inner">
                            <?php dynamic_sidebar( 'footer-feature-3' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- #footer-top -->
        <div id="footer-bottom-holder" class="text-center">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-bottom' ); ?>
                </div>
            </div>
        </div>
        <div id="footer-bottom">
            <div class="container">
                <div class="row">

                    <?php enormous_copyright(); ?>

                </div>
            </div>
        </div><!-- #footer-bottom -->
    </div>
