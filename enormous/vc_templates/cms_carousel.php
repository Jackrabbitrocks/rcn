<?php 
    $taxo = 'carousels_categories';
    extract(shortcode_atts(array(
        'cms_style' => 'style-light',  
    ), $atts));
?>
<div class="cms-carousel layout-carousel-default <?php echo esc_attr($cms_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
            $groups[] = '"category-'.$category->slug.'"';
        }
        ?>
        <div class="cms-carousel-item">
            <div class="cms-carousel-content">
                <div class="cms-carousel-categories">
                    <?php echo get_the_term_list( get_the_ID(), 'carousels_categories', '', ', ', '' ); ?>
                </div>
                <h3 class="cms-carousel-title">
                    <a href="<?php the_permalink(); ?>"><?php echo wp_kses_post(the_title());?></a>      
                </h3>
                <div class="cms-carousel-description">
                    <?php echo get_the_content(); ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>