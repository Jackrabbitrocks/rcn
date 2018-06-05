<div class="cms-carousel cms-carousel-blog <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $size = 'enormous_1110X720';
        ?>
        <div class="cms-carousel-item">
            <div class="cms-blog-inner sameheight">   
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
                <div class="entry-blog">
                    <div class="entry-header">
                        <ul class="blog-detail">
                            <li class="detail-date">
                                <a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d'));?>">
                                    <?php echo get_the_date(); ?>
                                </a>
                            </li>
                            <li class="detail-category">
                                <?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <h3 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title();?></a>  
                        </h3>
                        <div class="entry-content-inner-grid">
                            <?php echo substr(get_the_excerpt(), 0,150); ?>      
                        </div>
                        <div class="detail-author">
                            <div class="admin-avt">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
                            </div>
                            <?php esc_html_e('by: ', 'enormous'); ?><?php the_author_posts_link(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>