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

    <div id="cshero-footer" class="cshero-footer cms-footer5">
        <div class="background-overlay"></div>
        <div id="footer-top">
            <div class="container">
                <div class="row">
                   <?php dynamic_sidebar( 'footer-fixed' ); ?>
                </div>
            </div>
        </div><!-- #footer-top -->

        <div id="footer-bottom">
            <div class="container">
                <div class="row">

                    <?php enormous_copyright(); ?>

                </div>
            </div>
        </div><!-- #footer-bottom -->
    </div>

