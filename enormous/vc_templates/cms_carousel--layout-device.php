<?php 
    $taxo = 'carousels_categories';
    extract(shortcode_atts(array(
        'cms_style' => 'style-light',  
    ), $atts));
?>

<div class="carousel-device-wrapper">
    <div class="device-phone"></div>
    <div data-center="true" class="cms-carousel layout-carousel-device <?php echo esc_attr($cms_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>"> 
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>

            <div class="cms-carousel-item">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="cms-carousel-media '.esc_attr($class).'">'.$thumbnail.'</div>';
                ?>
            </div>    
            <?php
        }
        ?>
    </div>
</div>
