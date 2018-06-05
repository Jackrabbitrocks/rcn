<?php
extract(shortcode_atts(array(
    'cms_style' => 'style-light',  
), $atts));
?>
<div class="cms-carousel layout-client <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($cms_style); ?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $counter = 0;
    $rows = 2;
    while ($posts->have_posts()) {

        $posts->the_post();
        global $opt_meta_options; 
            $url_client = !empty($opt_meta_options['url_client']) ? $opt_meta_options['url_client']: '';

        $counter++;

        if($rows == 1){
            echo '<div class="cs-carousel-item-wrap">';
        }else{
            if($counter % $rows == 1){
                echo '<div class="cs-carousel-item-wrap">';
            }
        }
        ?>
        <div class="cms-carousel-item">
            <a href="<?php echo esc_attr($opt_meta_options['url_client']);?>" title="<?php the_title(); ?>">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'medium');
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                    endif;
                    echo '<span class="cms-carousel-media '.esc_attr($class).'">'.$thumbnail.'</span>';
                ?>
            </a>
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