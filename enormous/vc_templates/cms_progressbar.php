<?php
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';  
    $style = isset($atts['style']) ? $atts['style'] : '';     
?>
<div class="cms-progress-wraper cms-progress-layout1 <?php echo esc_attr($style);?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class=" cms-progress-body">
        <?php
            $item_class = 'cms-progress-item-wrap';
            $item_title     = $atts['item_title'];
            $show_value     = ($atts['show_value']=='true')?true:false;
            $color          = $atts['color'];
            $value          = $atts['value'];
            $value_suffix   = $atts['value_suffix'];
            ?>    
            <div class="<?php echo esc_attr($item_class);?>">
                <?php if($item_title):?>
                    <div class="cms-progress-title">
                        <?php echo apply_filters('the_title',$item_title);?>
                    </div>
                <?php endif;?>  
                <span class="progress-couter">
                    <?php if($show_value): ?>
                        <?php echo esc_attr($value.$value_suffix);?>
                    <?php endif; ?>
                </span>
                <?php if(!empty($iconClass)):?>
                    <i class="<?php echo esc_attr($iconClass);?>" style="padding-left: 6px;"></i>
                <?php endif;?>      
                <div class="cms-progress progress">
                    <div id="item-<?php echo esc_attr($atts['html_id']); ?>" class="progress-bar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($value); ?>" style="background-color:<?php echo esc_attr($color);?>; border-color:<?php echo esc_attr($color);?>;">

                    </div>
                    
                </div>

            </div>
    </div>
</div>
