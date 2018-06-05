<div class="cms-carousel layout-testimonial layout-testimonial2 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $size = 'full';
        global $opt_meta_options; 
            $position_testimonial = !empty($opt_meta_options['position_testimonial']) ? $opt_meta_options['position_testimonial']: '';
        ?>
        <div class="cms-testimonial-item">
            <div class="cms-testimonial-icon"></div>
            <div class="cms-testimonial-description">
                 <?php echo wp_trim_words(strip_tags(strip_shortcodes(get_the_content())),20); ?>  
            </div>
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
            <div class="cms-testimonial-meta">
                <h3 class="cms-testimonial-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title();?></a>      
                </h3>   
                <?php if(!empty($position_testimonial)){?>
                    <div class="cms-testimonial-position">
                        <?php echo esc_attr($opt_meta_options['position_testimonial']);?>
                    </div>
                <?php }?>
                
            </div>
        </div>
        <?php
    }
    ?>
</div>