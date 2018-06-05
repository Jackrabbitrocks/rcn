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
    </div><!-- .site-content -->
    <footer id="colophon" class="site-footer">
        <?php enormous_footer(); ?>

    </footer><!-- .site-footer -->

</div><!-- .site -->
<div class="cshero-popup-search">
    <div class="cshero-search-inner container">    
        <?php get_search_form() ;?>
    </div>                    
</div>
<div class="cshero-hidden-sidebar">
    <?php if ( is_active_sidebar( 'hidden-sidebar' ) ) { ?>
        <i class="sidebar-close ion-close-round"></i>
        <div class="sidebar-inner">
            <?php dynamic_sidebar('hidden-sidebar'); ?>
        </div>
    <?php } ?>    
</div>
<?php 
    enormous_menu_popup();
?>
<?php enormous_footer_back_to_top(); ?>
<?php wp_footer(); ?>
</body>
</html>