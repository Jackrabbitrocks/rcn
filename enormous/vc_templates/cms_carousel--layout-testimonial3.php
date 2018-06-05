<?php
extract(shortcode_atts(array(
    'cms_style' => 'style-light',  
    'space_description' => '0',  
    'position_testimonial_color' => '#616161',  
), $atts));
    $img_icon_quote = '';
    if (!empty($atts['image_icon_quote'])) {
        $attachment_image = wp_get_attachment_image_src($atts['image_icon_quote'], 'full');
        $img_icon_quote = $attachment_image[0];
    }
?>
<div class="cms-carousel layout-testimonial layout-testimonial3 <?php echo esc_attr($cms_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $size = 'full';
        global $opt_meta_options; 
            $position_testimonial = !empty($opt_meta_options['position_testimonial']) ? $opt_meta_options['position_testimonial']: '';
        ?>
        <div class="cms-testimonial-item">
            <?php 
                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                endif;
                echo '<div class="cms-carousel-media '.esc_attr($class).'">'.$thumbnail.'</div>';
            ?>
            <div class="cms-testimonial-description" style="margin-bottom: <?php echo esc_attr($space_description); ?>">
                <?php echo get_the_content(); ?>   
            </div>
            <div class="cms-testimonial-icon" style="background-image: url(<?php echo esc_attr($img_icon_quote);?>)"></div>
            <div class="cms-testimonial-meta">
                <h3 class="cms-testimonial-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title();?></a>      
                </h3>   
                <?php if(!empty($position_testimonial)){?>
                    <div class="cms-testimonial-position" style="color: <?php echo esc_attr($position_testimonial_color);?>">
                        <?php echo esc_attr($opt_meta_options['position_testimonial']);?>
                    </div>
                <?php }?>
                
            </div>
        </div>
        <?php
    }
    ?>
</div>