<?php
add_action('widgets_init', 'cs_recent_post');

function cs_recent_post() {
    register_widget('CS_Recent_Post');
}

class CS_Recent_Post extends WP_Widget {

    function __construct() {
        parent::__construct(
                'cs_recent_post', esc_html__('CMS Recent Post', 'enormous'), array('description' => esc_html__('Recent Posts Widget', 'enormous'),)
        );
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Recent Posts', 'enormous' ) : $instance['title'], $instance, $this->id_base);
        $show_date = (int) $instance['show_date'];
        $show_decs = (int) $instance['show_decs'];
        $number = (int) $instance['number'];

        //echo balanceTags($before_widget);
        $ramdomID = uniqid();
        echo '<aside id="cms-recent-post-'.$ramdomID.'" class="cms-recent-post-wrapper">';
            if($title) {
                echo balanceTags($before_title.$title.$after_title);
            }

            $sticky = get_option('sticky_posts');
            $args = array(
                'posts_per_page' => $number,
                'post_type' => 'post',
                'post_status' => 'publish',
                'post__not_in'  => $sticky,
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => 1
            );

            $wp_query = new WP_Query($args);
            $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";

            // no 'class' attribute - add one with the value of width
            if( strpos($before_widget, 'class') === false ) {
                $before_widget = str_replace('>', 'class="'. $extra_class . '"', $before_widget);
            }
            // there is 'class' attribute - append width value to it
            else {
                $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
            }
            ?>
            <?php if ($wp_query->have_posts()){ ?>
                <div class="cms-recent-post">
                    <ul class="cms-recent-post-wrapper wg-menu-item">
                        <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                            <li class="item clearfix">
                                <div class="cms-recent-media">  
                                   <div class="image">
                                       <a class="post-featured-img" href="<?php the_permalink(); ?>">
                                            <?php 
                                                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail', false)):
                                                    $class = ' has-thumbnail';
                                                    $thumbnail = get_the_post_thumbnail(get_the_ID(),'thumbnail');
                                                else:
                                                    $class = ' no-image';
                                                    $thumbnail = '<img src="' .esc_url(get_template_directory_uri()). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                                                endif;
                                                echo ''. $thumbnail .'';
                                            ?>
                                       </a>
                                    </div>     
                                </div>
                                <div class="cms-recent-details <?php if(has_post_thumbnail() == '') {echo 'no-image';} ?>">
                                    <div class="cms-recent-title"><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0,30); ?></a></div>
                                    <div class="cms-recent-date">
                                        <?php echo get_the_date(); ?>
                                    </div>  
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php } else { ?>
                <span class="notfound">No post found!</span>
            <?php
            }
        echo '</aside>';
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];
        $instance['show_date'] = $new_instance['show_date'];
        $instance['show_decs'] = $new_instance['show_decs'];
        $instance['number'] = (int) $new_instance['number'];
        $instance['extra_class'] = $new_instance['extra_class'];    

        return $instance;
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $show_date = isset($instance['show_date']) ? esc_attr($instance['show_date']) : '';
        $show_decs = isset($instance['show_decs']) ? esc_attr($instance['show_decs']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
                     $number = 5;
        ?>
        <p>
            <label for="<?php echo ''.$this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'enormous' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('extra_class'); ?>">Extra Class:</label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id('extra_class'); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php if(isset($instance['extra_class'])){echo esc_attr($instance['extra_class']);} ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('number'); ?>"><?php esc_html_e( 'Number of post to show:', 'enormous' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>
        <?php
    }
}
?>