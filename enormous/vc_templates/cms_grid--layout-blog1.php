<?php 
    /* get categories */
    $taxo = 'category';
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

    /*ajax media*/
        wp_enqueue_style('wp-mediaelement');
        wp_enqueue_script('wp-mediaelement');
        /* js, css for load more */
        wp_register_script('cms-loadmore-js', get_template_directory_uri() . '/assets/js/cms_loadmore_grid.js', array('jquery'), '1.0', true);
        // What page are we on? And what is the pages limit?
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $limit = $atts['limit'];
        $paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;

        // Add some parameters for the JS.
        $current_id = str_replace('-', '_', $atts['html_id']);
        wp_localize_script(
            'cms-loadmore-js',
            'cms_more_obj' . $current_id,
            array(
                'startPage' => $paged,
                'maxPages' => $max,
                'total' => $wp_query->found_posts,
                'perpage' => $limit,
                'nextLink' => next_posts($max, false),
                'masonry' => $atts['layout']
            )
        );
        wp_enqueue_script('cms-loadmore-js');
        $load_more = isset($atts['load_more']) ? $atts['load_more'] : '';
        $paging_navigation = isset($atts['paging_navigation']) ? $atts['paging_navigation'] : '';
        $cms_filter_style = isset($atts['cms_filter_style']) ? $atts['cms_filter_style'] : 'style-light';
?>
<div class="cms-grid-wraper cms-grid-blog-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter">
            <ul class="cms-filter-category list-unstyled list-inline <?php echo esc_attr($atts['cms_filter_style']);?>">
                <li><a class="active" href="#" data-group="all">All</a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_html($term->name);?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = 'enormous_1110X720';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="cms-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-blog-inner">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                            $class = ' has-thumbnail';
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                        else:
                            $class = ' no-image';
                            $thumbnail = '<img src="'.esc_url(CMS_IMAGES).'no-image.jpg" alt="'.get_the_title().'" />';
                        endif;
                        echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
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
    <?php if(!empty($paging_navigation)) { ?>
        <?php enormous_paging_nav(); ?>
    <?php } ?>

    <?php if(!empty($load_more)) { ?>
    <div class="cms_pagination text-center outline"></div>
    <?php } ?>
</div>