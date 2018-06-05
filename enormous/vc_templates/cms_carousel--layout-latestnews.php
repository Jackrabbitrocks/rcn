<?php
extract(shortcode_atts(array(
    'cms_style' => 'style-light',  
), $atts));
?>
<div class="cms-carousel layout-latestnews <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($cms_style); ?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        ?>
        <div class="cms-carousel-item">
            <div class="cms-latestnews-content">
                <ul class="cms-latestnews-meta">
                    <li class="detail-date">
                        <a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d'));?>">
                            <?php echo get_the_date(); ?>
                        </a>
                    </li>
                    <li class="detail-category">
                        <?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                    </li>
                </ul>
                <h3 class="cms-latestnews-title">
                     <a href="<?php the_permalink(); ?>"><?php the_title();?></a>  
                </h3>
                <div class="cms-latestnews-description">
                    <?php echo wp_trim_words(strip_tags(strip_shortcodes(get_the_content())),28); ?>
                </div>
                <div class="detail-author">
                    <div class="admin-avt">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
                    </div>
                    <?php esc_html_e('by: ', 'enormous'); ?><?php the_author_posts_link(); ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>