<?php 
    $image_icon= (!empty($atts['image_icon']))?$atts['image_icon']:'';
    $img_icon = '';
    if (!empty($atts['image_icon'])) {
        $attachment_image = wp_get_attachment_image_src($atts['image_icon'], 'full');
        $img_icon = $attachment_image[0];
    }  
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $icon_custom = isset($atts['icon_custom']) ? $atts['icon_custom'] : '';
    $el_class = isset($atts['el_class']) ? $atts['el_class'] : 'style-1';
?>
<div class="cms-counter-wraper cms-counter-default <?php echo esc_attr($el_class)?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="cms-counter-body clearfix">
        <div class="cms-counter-content">
            <?php if($img_icon):?>
                <div class="cms-counter-icon-image">
                    <img src="<?php echo esc_attr($img_icon);?>" alt="" />
                </div>
            <?php else:?>
                <div class="cms-counter-icon">
                    <?php if( $icon_custom ): ?>
                        <i class="<?php echo esc_attr($icon_custom); ?>"></i>
                        <?php else: if( $iconClass ): ?>
                            <i class="<?php echo esc_attr($iconClass); ?>"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif;?>
            <div id="counter_<?php echo esc_attr($atts['html_id']);?>" class="cms-counter <?php echo esc_attr(strtolower($atts['type']));?>" data-suffix="<?php echo esc_attr($atts['suffix']);?>" data-prefix="<?php echo esc_attr($atts['prefix']);?>" data-type="<?php echo esc_attr(strtolower($atts['type']));?>" data-digit="<?php echo esc_attr($atts['digit']);?>">
            </div>
        </div>

        <?php if($atts['c_title']):?>
            <div class="cms-counter-title">
                <?php echo apply_filters('the_title',$atts['c_title']);?>
            </div>
        <?php endif;?>   
    </div>    
</div>