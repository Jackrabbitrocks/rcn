<?php 
    /* get categories */
        $taxo = 'team_categories';
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
        $cms_filter_style = isset($atts['cms_filter_style']) ? $atts['cms_filter_style'] : 'style-light';
?>
<div class="cms-grid-wraper layout-team layout-grid-team2 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
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
    <div class="row cms-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'thumbnail':'medium';
        while($posts->have_posts()){
            $posts->the_post();
            $size = 'enormous_540X540';
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            global $opt_meta_options; 
                $position_team = !empty($opt_meta_options['position_team']) ? $opt_meta_options['position_team']: '';
            ?>
            <div class="cms-team-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-team-image">
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
                    <div class="cms-team-overlay">
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
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>