<div class="cms-carousel cms-carousel-services <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $size = 'enormous_1110X720';
        ?>
        <div class="cms-carousel-item">
            <div class="cms-services-inner">   
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.esc_url(CMS_IMAGES).'no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="cms-carousel-media '.esc_attr($class).'">'.$thumbnail.'</div>';
                ?>
                <div class="cms-services-content">
                    <h3 class="cms-services-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title();?></a>  
                    </h3>
                    <div class="cms-services-des">
                        <?php echo substr(get_the_excerpt(), 0,150); ?>     
                    </div>
                    <div class="cms-services-readmore">
                        <a href="<?php the_permalink(); ?>" class="btn btn-no-style"><?php esc_html_e('Learn More', 'enormous'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>