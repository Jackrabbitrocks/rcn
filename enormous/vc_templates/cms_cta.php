<?php
extract(shortcode_atts(array(
    'button_text'  => 'Button',
    'link_button'  => '#',
    'button_style'  => 'btn',
    'button_size'  => 'size-default',
    'button_shape'  => '',
    'button_duplicated'  => '',
    'button_text_duplicated'  => '',
    'link_button_duplicated'  => '',
    'button_style_duplicated'  => '',
    'cta_text'  => '',
    'cta_space'  => '',
    'cta_text_color'  => '',
    'el_class'  => '',          
    'cta_style'  => 'style1',          
), $atts));
    $a_href='';
    if(!empty($link_button)){
        $link = vc_build_link($link_button);
        $link_duplicated = vc_build_link($link_button_duplicated);
        if ( strlen( $link['url'] ) > 0 ) {
            $a_href = $link['url'];
        }

        if ( strlen( $link_duplicated['url'] ) > 0 ) {
            $a_href_d = $link_duplicated['url'];
        }
    }
?>
<div class="cms-cta-wrapper cms-cta-default clearfix <?php echo esc_attr($el_class); ?> <?php echo esc_attr($cta_style); ?>">
    <div class="row">
        <div class="cms-cta-text text-left-md col-lg-9 col-md-9 col-sm-12 col-xs-12">   
            <?php if (!empty($cta_text) && $cta_text) { ?>
            <div class="text" style="color: <?php echo esc_attr($cta_text_color); ?>; margin-bottom: <?php echo esc_attr($cta_space); ?> ">
                <?php echo esc_attr($cta_text); ?>
            </div>
            <?php } ?>
        </div>

        <?php if (!empty($button_text) && $button_text) { ?>
            <div class="cms-cta-button text-right-md col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right text-center-xs">
                
                <a href="<?php echo esc_url($a_href);?>" class="<?php echo esc_attr($el_class); ?> btn <?php echo esc_attr($button_style); ?> <?php echo esc_attr($button_size); ?> <?php echo esc_attr($button_shape); ?>">
                    <?php echo esc_attr($button_text); ?>
                </a>
                <?php if($button_duplicated == 'yes') { ?>
                    <a href="<?php echo esc_url($a_href_d);?>" class="btn <?php echo esc_attr($button_style_duplicated); ?> <?php echo esc_attr($button_size); ?> ">
                         <?php echo esc_attr($button_text_duplicated); ?>
                    </a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>