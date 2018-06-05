<?php
extract(shortcode_atts(array(         
    'video_url' => '',       
    'video_intro' => '',           
    'video_bg_color' => '',           
    'el_class' => '',           
    'video_button' => 'style1',           
), $atts));
$html_id = cmsHtmlID('cms-video-popup');
$atts['html_id'] = $html_id;

$image_url = '';
if (!empty($atts['video_intro'])) {
    $attachment_image = wp_get_attachment_image_src($atts['video_intro'], 'full');
    $image_url = $attachment_image[0];
}

?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-video-popup-wrapper <?php echo esc_attr($el_class); ?> <?php echo esc_attr($video_button); ?>" style="background-image: url(<?php echo esc_url($image_url); ?>); background-color: <?php echo esc_attr($video_bg_color); ?> ">
    <a class="cms-video-popup button-video" href="<?php echo esc_url($video_url); ?>"><i class="icon icon-Play"></i></a>
</div>