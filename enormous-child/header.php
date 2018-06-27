<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1, width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body id="cms-theme" <?php body_class(); ?>>
<?php 
	enormous_get_page_loading(); 
	$page_class_space = enormous_set_padding_class();
?>

<div id="page" class="hfeed site <?php enormous_page_class(); ?>">
	<header id="masthead" class="site-header">
		<?php enormous_header(); ?>
	</header><!-- #masthead -->
    <?php rot8tor_page_title(); ?><!-- #page-title -->
    
	<div id="content" class="site-content <?php echo esc_attr($page_class_space); ?>">
		<div id="page-title-text">
		    <h3 class="reset-fontsize-xs"><?php single_post_title(); ?></h3>
		    <?php if(!empty($opt_meta_options['page_title_subtext'])){?>
		        <div class="page-title-subtitle">
		            <?php echo wp_kses_post($opt_meta_options['page_title_subtext']); ?>  
		        </div> 
		    <?php }?>
		</div>