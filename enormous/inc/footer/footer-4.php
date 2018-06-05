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

    <div id="cshero-footer" class="cshero-footer cshero-footer4">
        <div class="background-overlay"></div>
        <?php enormous_info_footer(); ?>  
        <div id="footer-top">
            <div class="container">
                <div class="row">
                    <?php enormous_footer_top(); ?>
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

