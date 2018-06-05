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
    $f_number = isset($atts['f_number']) ? $atts['f_number'] : '';
    $f_number_color = isset($atts['f_number_color']) ? $atts['f_number_color'] : '';
    $f_sub_title = isset($atts['f_sub_title']) ? $atts['f_sub_title'] : '';
    $f_sub_title_color = isset($atts['f_sub_title_color']) ? $atts['f_sub_title_color'] : '';
    $f_bg_color = isset($atts['f_bg_color']) ? $atts['f_bg_color'] : '';
    $f_bg_image = isset($atts['f_bg_image']) ? $atts['f_bg_image'] : '';
    $f_style_bg = isset($atts['f_style_bg']) ? $atts['f_style_bg'] : '';
    $f_padding = isset($atts['f_padding']) ? $atts['f_padding'] : '';
    $f_style = isset($atts['f_style']) ? $atts['f_style'] : '';

    $f_bg_image_url = '';
        if (!empty($atts['f_bg_image'])) {
            $attachment_image = wp_get_attachment_image_src($atts['f_bg_image'], 'full');
            $f_bg_image_url = $attachment_image[0];
        }
?>
<div class="cms-fancyboxes-wraper fancyboxes-layout5 <?php echo esc_attr($f_style_bg); ?> <?php echo esc_attr($f_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>" style="background-color: <?php echo esc_attr($f_bg_color); ?>; background-image: url(<?php echo esc_attr($f_bg_image_url);?>)">    
    <div class="cms-fancyboxes-body" style="padding: <?php echo esc_attr($f_padding); ?>">     
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
                <div class="cms-fancybox-number">
                    <?php if (!empty($atts['f_number'])):?>
                        <span  style="color: <?php echo esc_attr($f_number_color); ?>"><?php echo esc_attr($f_number); ?></span>
                    <?php endif;?>
                    <?php if (!empty($atts['f_sub_title'])):?>
                        <div class="sub-title" style="color: <?php echo esc_attr($f_sub_title_color); ?>"><?php echo esc_attr($f_sub_title); ?></div>
                    <?php endif;?>
                </div>
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