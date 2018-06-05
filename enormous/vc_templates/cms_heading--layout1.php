<?php
extract(shortcode_atts(array(       
    'hd_title' => '',      
    'hd_fontsize_title' => '',      
    'hd_lineheight_title' => '',      
    'hd_ls_title' => '',      
    'hd_title_color' => '',         
    'hd_title_padding_bottom' => '',         
    'hd_title_margin_bottom' => '',  
    'hd_subtitle' => '',            
    'hd_fontsize_subtitle' => '',            
    'hd_lineheight_subtitle' => '',            
    'hd_subtitle_color' => '',       
    'hd_fontweight_subtitle' => '',    
    'hd_description' => '',            
    'hd_fontweight_description' => '',             
    'hd_fontsize_description' => '',            
    'hd_lineheight_description' => '',            
    'hd_description_color' => '',            
    'text_align' => 'left',                                    
    'custom_class' => '',                        
), $atts));
?>
<div class="cms-heading-wrapper heading-layout1 <?php echo esc_attr($custom_class); ?>">
    <div class="cms-heading-content align-<?php echo esc_attr($text_align); ?>" style="text-align:<?php echo esc_attr($text_align); ?>;">
        <?php if (!empty($hd_subtitle)){ ?>    
            <div class="subtitle" style="color:<?php echo esc_attr($hd_subtitle_color); ?>;font-size:<?php echo esc_attr($hd_fontsize_subtitle); ?>; line-height:<?php echo esc_attr($hd_lineheight_subtitle); ?>;font-weight: <?php echo esc_attr($hd_fontweight_subtitle); ?>">
                <?php echo wp_kses_post($hd_subtitle); ?>
            </div>
        <?php }?> 
        <?php if (!empty($hd_title)){ ?>    
            <h3 class="title" style="color:<?php echo esc_attr($hd_title_color); ?>;font-size:<?php echo esc_attr($hd_fontsize_title); ?>; line-height:<?php echo esc_attr($hd_lineheight_title); ?>; letter-spacing: <?php echo esc_attr($hd_ls_title); ?>;padding-bottom: <?php echo esc_attr($hd_title_padding_bottom); ?>; margin-bottom: <?php echo esc_attr($hd_title_margin_bottom); ?>;">
                <?php echo wp_kses_post($hd_title); ?>
            </h3>
        <?php }?> 
        <?php if (!empty($hd_description)) { ?>
            <div class="description" style="color:<?php echo esc_attr($hd_description_color);  ?>; font-size:<?php echo esc_attr($hd_fontsize_description); ?>; line-height:<?php echo esc_attr($hd_lineheight_description); ?>; font-weight: <?php echo esc_attr($hd_fontweight_description); ?>">
                <?php echo apply_filters('the_content',$atts['hd_description']);?>
            </div>    
        <?php } ?>    
    </div>
</div>