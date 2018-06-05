<?php
    $taxonomy        = isset( $atts['our_menu_categories'] ) ? $atts['our_menu_categories'] : 'menu';
    $limit           = isset( $atts['limit_menu'] ) ? $atts['limit_menu'] : 6;
    $active          = isset( $atts['active_section_menu'] ) ? $atts['active_section_menu'] : 1;
    $terms           = isset( $atts[ $taxonomy ] ) ? explode( ',', $atts[ $taxonomy ] ) : array();
    $body            = array();
    
    $html_id         = cmsHtmlID( 'cms-menu-restaurant' );
    $atts['html_id'] = $html_id;
    
    if ( function_exists( 'fr_get_posts_by_tax' ) ):
        $data = fr_get_posts_by_tax( $taxonomy, $terms, $limit, 'seperate', 'date', 'asc' );
        $body        = $data['body'];
        $infor       = $data['infor'];
        $terms       = $infor['terms'];
        ?>
        <div class="cms-menu-restaurant-wrapper">
            <div class="cms-menu-restaurant-inner">
                <?php foreach ( $body as $day_data ):
                    $term_meta = $day_data['term_config'];
                    ?>
                    <div id="<?php echo esc_attr( $atts['html_id'] ); ?>"
                         class="cms-menu-carousel-1col cms-menu-restaurant cms-menu-restaurant-style2 cms-same clearfix">
                        <?php if ( isset( $day_data['posts'] ) ):
                            $posts = $day_data['posts'];
                            ?>
                                
                                    <?php foreach($posts as $stt => $post):
                                        ?>
                                        <div class="cms-menu-restaurant-item col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="cms-menu-restaurant-image cms-same-col cms-image-zoom">
                                                <a class="z-view" href="<?php echo get_the_post_thumbnail_url( $posts[ $stt ]->ID, 'full' ) ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url( $posts[ $stt ]->ID, 'full' ) ?>);"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </div>
                                            <div class="cms-menu-restaurant-holder cms-same-col">
                                                <span class="cms-menu-restaurant-price"><cite><?php echo get_post_meta( $posts[ $stt ]->ID, 'fs_currency', true ) ?></cite><?php echo get_post_meta( $posts[ $stt ]->ID, 'fr-menu-price', true ) ?></span>
                                                <h3 class="cms-menu-restaurant-title"><?php echo ''.$posts[ $stt ]->post_title ?></h3>
                                                <div class="cms-menu-restaurant-content">
                                                    <?php echo substr( strip_shortcodes( $posts[ $stt ]->post_content ), 0, 300 ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                
                            <?php //endfor; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>