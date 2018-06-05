<?php
/**
 * The template for displaying Archive Portfolio - Postype UI
 *
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

get_header(); 
?>
<div id="page-portfolio-archive">
    <div class="container">
        <div class="row">
            <?php
                echo apply_filters('the_content','[cms_grid col_xs="1" col_sm="3" col_md="3" col_lg="3" load_more="yes" source="size:9|order_by:date|post_type:portfolio" cms_template="cms_grid--layout-portfolio1.php"]');
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>