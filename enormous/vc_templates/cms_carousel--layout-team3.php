<div data-padding="0" class="cms-carousel layout-team layout-team3 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $size = 'enormous_800X800';
        global $opt_meta_options; 
            $position_team = !empty($opt_meta_options['position_team']) ? $opt_meta_options['position_team']: '';
        ?>    
        <div class="cms-team-item">
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
            <div class="cms-team-overlay"></div>   
            <div class="cms-team-content">
                <h3 class="cms-team-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title();?></a>      
                </h3>
                <?php if(!empty($position_team)){?>
                <div class="cms-team-position">
                    <?php echo esc_attr($opt_meta_options['position_team']);?>
                </div>
                <?php }?>
                <?php enormous_cms_team_social(); ?>     
            </div>
        </div>
        <?php
    }
    ?>
</div>