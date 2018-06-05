<?php
extract(shortcode_atts(array(
    'icon_type' => 'fontawesome',
    'button_text'  => 'Button',
    'link_button'  => '#',
    'button_style'  => 'btn-default',
    'button_size'  => '',
    'button_shape'  => '',
    'button_color'  => '',
    'button_text_color'  => '',
    'button_border_color'  => '',
    'button_hover'  => '',
    'icon_align'  => 'left',
    'icon_custom'  => '',
    'el_class'  => ''
), $atts));
 
    $icon_name = "icon_" . $icon_type;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $link = vc_build_link($link_button);
    $a_href = '';
    $a_title = '';
    if ( strlen( $link['title'] ) > 0 ) {
        $a_title = $link['title'];
    }
if ( strlen( $link['url'] ) > 0 ) {
        $a_href = $link['url'];
    }
?>
<div class="cms-button-wrapper <?php echo esc_attr($el_class); ?>">

    <a href="<?php echo esc_url($a_href);?>" title="<?php echo esc_attr($a_title);?>" class="btn <?php echo esc_attr($button_style); ?> <?php echo esc_attr($button_size); ?> <?php echo esc_attr($button_shape); ?> <?php echo esc_attr($button_hover); ?> <?php if (!empty($button_color)){ echo 'btn_color';}; ?>" style="background:<?php echo esc_attr($button_color); ?>;color:<?php echo esc_attr($button_text_color); ?>;border-color:<?php echo esc_attr($button_border_color); ?>">
        <?php
        switch ($icon_align) {
            case 'right':
                ?>
                    <span><?php echo esc_attr($button_text); ?></span>
                    <?php
                        if (!empty($icon_custom)){?>
                            <i class="<?php echo esc_attr($icon_custom);?>" style="padding-left: 10px;"></i>
                       <?php }
                        else{
                            if(!empty($iconClass)):?>
                                <i class="<?php echo esc_attr($iconClass);?>" style="padding-left: 10px;"></i>
                            <?php endif;
                        }
                break;
            case 'left':
            default:
                ?>
                    <?php
                        if (!empty($icon_custom)){?>
                            <i class="<?php echo esc_attr($icon_custom);?>" style="padding-right: 10px;"></i>
                       <?php }
                        else{
                            if(!empty($iconClass)):?>
                                <i class="<?php echo esc_attr($iconClass);?>" style="padding-right: 10px;"></i>
                            <?php endif;
                        }?>
                    <span><?php echo esc_attr($button_text); ?></span>
                <?php
                break;
        }?>
    </a>
</div>