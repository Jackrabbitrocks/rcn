<div class="cms-carousel layout-team layout-team4 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $counter = 0;
    $rows = 2;
    while($posts->have_posts()){
        $posts->the_post();
        $size = 'enormous_540X540'; 
        global $opt_meta_options; 
            $position_team = !empty($opt_meta_options['position_team']) ? $opt_meta_options['position_team']: '';

            $counter++;

            if($rows == 1){
                echo '<div class="cs-carousel-item-wrap">';
            }else{
                if($counter % $rows == 1){
                    echo '<div class="cs-carousel-item-wrap">';
                }
            }
        ?>    
        <div class="cms-carousel-item cms-team-item">
            <div class="cms-team-image">
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
                <?php enormous_cms_team_social(); ?> 
            </div>
            <div class="cms-team-content">
                <h3 class="cms-team-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title();?></a>      
                </h3>
                <?php if(!empty($position_team)){?>
                <div class="cms-team-position">
                    <?php echo esc_attr($opt_meta_options['position_team']);?>
                </div>
                <?php }?>    
            </div>
        </div>
        <?php
        if($rows == 1){
            echo '</div>';
        }else{
            if($counter % $rows == 0){
                echo '</div>';
            }
        }
        ?>
    <?php
    }
    ?>
</div>