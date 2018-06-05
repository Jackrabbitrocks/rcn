<?php 
    /* get categories */
        $taxo = 'showcase_categories';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
?>
<div class="cms-carousel cms-carousel-showcase <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>" data-center="true">
    <?php
    $posts = $atts['posts'];
    $size = 'full';
    while($posts->have_posts()){
        $posts->the_post();
        global $opt_meta_options; 
        $showcase_custom_url = !empty($opt_meta_options['showcase_custom_url']) ? $opt_meta_options['showcase_custom_url']: '';
        $showcase_url = !empty($opt_meta_options['showcase_url']) ? $opt_meta_options['showcase_url']: '';
        $home_url = home_url().'/?page_id='.$showcase_url;
        ?>
            <div class="cms-carousel-item">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-feature-img';
                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                    else:
                        $class = ' no-feature-img';
                        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                    endif;
                ?>
                <a href="<?php if(!empty($showcase_custom_url)) { echo esc_url($showcase_custom_url); } else { echo esc_url($home_url); } ?>" target="_blank" title="<?php the_title();?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="" /></a>
            </div>

        <?php
    }
    ?>
</div>