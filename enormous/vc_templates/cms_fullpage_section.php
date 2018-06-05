<?php
	/**
	 * Created by PhpStorm.
	 * User: Nic
	 * Date: 5/5/2017
	 * Time: 9:26 PM
	 */
	$atts = array_merge( array(
		'section_background'  => '',
		'section_background_overlay_color'  => '',
		'section_type'  => 'section-boxed',
		'remove_column_padding'  => 'col-padding-default',
	), $atts );
	global $fullpage_id, $tabs_data, $active_section;
	$active               = ( $active_section == ++ $fullpage_id ) ? 'active' : '';
	$active_content       = ( $active_section == $fullpage_id ) ? 'in active' : '';
	$id                   = 'fullpage-' . $fullpage_id . '-' . md5( time() );
	$tabs_data[ $fullpage_id ] = '<div id="' . $id . '" class="section '.$atts['remove_column_padding'].' '.$atts['section_type'].'" style="background-color: '.$atts['section_background_overlay_color'].';background-image: url('.esc_url(wp_get_attachment_image_url($atts['section_background'], 'full')).');">' . do_shortcode( $content ) . '</div>';
	
?>