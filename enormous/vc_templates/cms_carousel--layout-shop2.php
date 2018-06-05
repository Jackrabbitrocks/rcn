<div class="cms-carousel layout-shop2" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $size = 'enormous_800X1000';
    global $product, $woocommerce;

    while($posts->have_posts()){
        $posts->the_post();
        ?>
            <div class="cms-carousel-item">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);   
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
                ?>
                <div class="cms-shop-content">
                    <div class="cms-shop-content-inner">
                        <div class="cms-shop-item">
                            <h3 class="entry-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <?php 
                                $product = new WC_Product( get_the_ID() );
                                $price_html = $product->get_price_html();
                            ?>
                            <span class="price">
                                <?php echo ''.$price_html; ?>
                            </span>
                        </div>
                        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                    </div>
                </div>
            </div>

        <?php
    }
    ?>
</div>