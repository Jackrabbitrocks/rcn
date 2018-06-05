<div class="cms-carousel layout-testimonial layout-testimonial4" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        ?>
        <div class="cms-testimonial-item">
            <div class="cms-testimonial-description">
                <span>“</span><?php echo strip_shortcodes(get_the_content()); ?><span>”</span>
            </div>
            <h3 class="cms-testimonial-title">
                <span>- <?php the_title();?></span>
            </h3>  
        </div>
        <?php
    }
    ?>
</div>