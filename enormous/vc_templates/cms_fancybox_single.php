<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $icon_custom = isset($atts['icon_custom']) ? $atts['icon_custom'] : '';
    $f_title_fontsize = isset($atts['f_title_fontsize']) ? $atts['f_title_fontsize'] : '';
    $f_title_color = isset($atts['f_title_color']) ? $atts['f_title_color'] : '';
    $space_top_title = isset($atts['space_top_title']) ? $atts['space_top_title'] : '';
    $space_bottom_title = isset($atts['space_bottom_title']) ? $atts['space_bottom_title'] : '';
    $f_content_color = isset($atts['f_content_color']) ? $atts['f_content_color'] : '';
    $f_icon_fontsize = isset($atts['f_icon_fontsize']) ? $atts['f_icon_fontsize'] : '';
    $f_icon_color = isset($atts['f_icon_color']) ? $atts['f_icon_color'] : '';
    $f_button_color = isset($atts['f_button_color']) ? $atts['f_button_color'] : '';
?>
<div class="cms-fancyboxes-wraper fancyboxes-default <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">    
    <div class="cms-fancyboxes-body">
        <div class="cms-fancybox-item">
            <?php 
                $image_url = '';
                if (!empty($atts['image'])) {
                    $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
                    $image_url = $attachment_image[0];
                }
            ?>
            
            <div class="cms-fancybox-icon">
                <?php if($image_url):?>
                    <div class="fancy-box-image">
                        <img src="<?php echo esc_attr($image_url);?>" alt="" />
                    </div>  
                    
                <?php else:?>
                <?php if( $icon_custom ): ?>
                    <span class="fancy-box-icon"><i class="<?php echo esc_attr($icon_custom); ?>" style="color:<?php echo esc_attr($f_icon_color); ?>; font-size: <?php echo esc_attr($f_icon_fontsize); ?> "></i></span>
                        <?php else: if( $iconClass ): ?>
                            <span class="fancy-box-icon"><i class="<?php echo esc_attr($iconClass); ?>" style="color:<?php echo esc_attr($f_icon_color); ?>; font-size: <?php echo esc_attr($f_icon_fontsize); ?>"></i></span>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif;?>
            </div>
            <div class="cms-fancybox-content">
                <?php if($atts['title_item']):?>
                <h4 class="fancy-box-title" style="font-size: <?php echo esc_attr($f_title_fontsize);?>;color: <?php echo esc_attr($f_title_color);?>; margin-bottom: <?php echo esc_attr($space_bottom_title);?>; margin-top: <?php echo esc_attr($space_top_title);?>">
                    <?php echo apply_filters('the_title',$atts['title_item']);?>
                </h4>
                <?php endif;?>
                <?php if($atts['description_item']): ?>
                <div class="fancy-box-content" style="color: <?php echo esc_attr($f_content_color);?>">
                    <?php echo apply_filters('the_content',$atts['description_item']);?>
                </div>
                <?php endif; ?>
                <?php if($atts['button_text']!=''):?>
                    <div class="cms-fancyboxes-foot">
                        <?php
                        $class_btn = ($atts['button_type']=='button')?'':'';
                        ?>
                        <a href="<?php echo esc_url($atts['button_link']);?>" class="<?php echo esc_attr($class_btn);?>" style="color: <?php echo esc_attr($f_button_color);?>"><?php echo esc_attr($atts['button_text']);?></a>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>