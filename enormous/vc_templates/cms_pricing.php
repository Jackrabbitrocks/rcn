<?php
extract(shortcode_atts(array(       
    'pr_style' => 'style1',                                  
), $atts));
$cms_template = $css = $el_class = '';
$classes = array();
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$pricing_lists1 = array();
$pricing_lists2 = array();
$pricing_lists3 = array();
$pricing_lists4 = array();
$classes[] = $el_class;
$classes[] = vc_shortcode_custom_css_class($css);
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $classes ) ), $this->settings['base'], $atts ) );

switch ($cms_template) {
	default:
		$pricing_lists1 = (array) vc_param_group_parse_atts($pricing1);
		$pr_class = $pr_intro_class = '';
		$pr_count = count($pricing_lists1);

		switch ($pr_count) {
			case '2':
				$pr_intro_class = 'col-md-6 col-sm-6 col-xs-12 pricing-choose';
				$pr_class = 'col-md-6 col-sm-6 col-xs-12 pricing-plan';
				break;
			case '3':
				$pr_intro_class = 'col-md-4 col-sm-12 col-xs-12 pricing-choose';
				$pr_class = 'col-md-4 col-sm-12 col-xs-12 pricing-plan';
				break;
			case '4':
				$pr_intro_class = 'col-md-3 col-sm-6 col-xs-12 pricing-choose';
				$pr_class = 'col-md-3 col-sm-6 col-xs-12 pricing-plan';
				break;
			default:
				$pr_intro_class = 'col-md-12 col-sm-12 col-xs-12 pricing-choose';
				$pr_class = 'col-md-12 col-sm-12 col-xs-12 pricing-plan';
				break;
		}
		?>
			<div class="pricing-wrap pricing-layout1 clearfix <?php echo esc_attr($css_class); ?> <?php echo esc_attr($pr_style); ?>">
				<?php foreach ($pricing_lists1 as $key => $value) { ?>
					<div class="pricing-item-wrap <?php echo esc_attr($pr_class); ?> <?php if (!empty($value['pr1_feature'])) { echo esc_html($value['pr1_feature']); } ?>">    
						<div class="pricing-item-inner">    
							<div class="pricing-head clearfix" <?php if (!empty($value['pr1_bg_color'])) : ?> style="background-color: <?php echo esc_html($value['pr1_bg_color']); ?>" <?php endif; ?>>
								<div class="pricing-head-wrap">
									<?php if (!empty($value['pr1_package_name'])) {?>
			                        	<h3 class="cms-pricing-title"><?php echo esc_html($value['pr1_package_name']); ?></h3>    
			                        <?php }?>  
			                        <?php if (!empty($value['pr1_price'])) {?>
			                        <div class="pricing-price">   
			                            <span class="cms-pricing-price"><span><?php echo esc_html($value['pr1_currency']); ?></span><?php echo esc_html($value['pr1_price']); ?></span>  
			                            <span class="cms-pricing-time">/ <?php echo esc_html($value['pr1_time']); ?></span>
			                        </div>  
			                        <?php }?>   
			                        <?php if (!empty($value['pr1_subtitle'])) {?>
			                        <div class="cms-pricing-subtitle"><?php echo esc_html($value['pr1_subtitle']); ?></div> 
			                        <?php }?>   
			                    </div>
		                    </div>
		                    <?php if (!empty($value['pr1_description'])) {?>
		                    <div class="pricing-content content-<?php echo esc_html($value['pr1_content_align']); ?>">
		                        <?php echo wp_kses_post($value['pr1_description']); ?>
		                    </div>
		                    <?php }?>  
							<?php if (!empty($value['pr1_button'])) {?>
							<div class="pricing-footer">
			                    <a class="btn btn-secondary" href="<?php echo esc_html($value['pr1_button_url']); ?>"><span><?php echo esc_html($value['pr1_button']); ?></span></a>
			                </div>   
			                <?php }?>  
			            </div>
					</div>
				<?php } /* End foreach */?>
			</div>
		<?php
		break;
	
	case 'pricing2' : 
		$pricing_lists2 = (array) vc_param_group_parse_atts($pricing2);
		$pr2_class = $pr2_intro_class = '';
		$pr2_count = count($pricing_lists2);
		switch ($pr2_count) {
			case '2':
				$pr2_intro_class = 'col-md-6 col-sm-6 col-xs-12 pricing-choose';
				$pr2_class = 'col-md-6 col-sm-6 col-xs-12 pricing-plan';
				break;
			case '3':
				$pr2_intro_class = 'col-md-4 col-sm-12 col-xs-12 pricing-choose';
				$pr2_class = 'col-md-4 col-sm-12 col-xs-12 pricing-plan';
				break;
			case '4':
				$pr2_intro_class = 'col-md-3 col-sm-6 col-xs-12 pricing-choose';
				$pr2_class = 'col-md-3 col-sm-6 col-xs-12 pricing-plan';
				break;
			default:
				$pr2_intro_class = 'col-md-12 col-sm-12 col-xs-12 pricing-choose';
				$pr2_class = 'col-md-12 col-sm-12 col-xs-12 pricing-plan';
				break;
		}
		
		?>
		<div class="pricing-wrap pricing-layout2 clearfix <?php echo esc_attr($css_class); ?>">
		   <?php foreach ($pricing_lists2 as $key => $value) { 
				$pr2_bg_image= (!empty($atts['pr2_bg_image']))?$atts['pr2_bg_image']:'';
				$pr2_bg_img = '';
			    if (!empty($value['pr2_bg_image'])) {
			        $attachment_image = wp_get_attachment_image_src($value['pr2_bg_image'], 'full');
			        $pr2_bg_img = $attachment_image[0];
			    }  

			?> 

			<div class="pricing-item-wrap <?php echo esc_attr($pr2_class); ?> <?php if (!empty($value['pr2_feature'])) { echo esc_html($value['pr2_feature']); } ?>">
				<div class="pricing-item-inner">
					<div class="pricing-head clearfix" style="background-image: url(<?php echo esc_url($pr2_bg_img); ?>)">
						<?php if (!empty($value['pr2_bg_overlay'])) {?>
						<div class="bg-overlay" style="background-color: <?php echo esc_html($value['pr2_bg_overlay']); ?>"></div>
						<?php }?>   
						<div class="pricing-head-wrap">
							<?php if (!empty($value['pr2_package_name'])) {?>
	                        	<h3 class="cms-pricing-title"><?php echo esc_html($value['pr2_package_name']); ?></h3> 
	                        <?php }?>   
	                        <?php if (!empty($value['pr2_price'])){?>  
		                        <div class="pricing-price">   
		                            <span class="cms-pricing-price"><span><?php echo esc_html($value['pr2_currency']); ?></span><?php echo esc_html($value['pr2_price']); ?></span>  
		                            <span class="cms-pricing-time">/ <?php echo esc_html($value['pr2_time']); ?></span>
		                        </div>   
	                        <?php }?>  
	                        <?php if (!empty($value['pr2_subtitle'])) {?> 
	                        	<div class="cms-pricing-subtitle"><?php echo esc_html($value['pr2_subtitle']); ?></div> 
	                        <?php }?> 
	                    </div> 
                    </div>
                    <?php if (!empty($value['pr2_description'])) {?>
	                    <div class="pricing-content content-<?php echo esc_html($value['pr2_content_align']); ?>">
	                        <?php echo wp_kses_post($value['pr2_description']); ?>
	                    </div>
                    <?php }?> 
					<?php if (!empty($value['pr2_button'])) {?>
						<div class="pricing-footer">
		                    <a class="btn btn-secondary" href="<?php echo esc_html($value['pr2_button_url']); ?>"><span><?php echo esc_html($value['pr2_button']); ?></span></a>
		                </div>   
		            <?php }?> 
	            </div>
			</div>
			<?php } ?>
			<!-- End item -->
		</div>
		<?php
		break;
	case 'pricing3' : 
		$pricing_lists3 = (array) vc_param_group_parse_atts($pricing3);
		$pr3_class = $pr3_intro_class = '';
		$pr3_count = count($pricing_lists3);
		switch ($pr3_count) {
			case '2':
				$pr3_intro_class = 'col-md-6 col-sm-6 col-xs-12 pricing-choose';
				$pr3_class = 'col-md-6 col-sm-6 col-xs-12 pricing-plan';
				break;
			case '3':
				$pr3_intro_class = 'col-md-4 col-sm-12 col-xs-12 pricing-choose';
				$pr3_class = 'col-md-4 col-sm-12 col-xs-12 pricing-plan';
				break;
			case '4':
				$pr3_intro_class = 'col-md-3 col-sm-6 col-xs-12 pricing-choose';
				$pr3_class = 'col-md-3 col-sm-6 col-xs-12 pricing-plan';
				break;
			default:
				$pr3_intro_class = 'col-md-12 col-sm-12 col-xs-12 pricing-choose';
				$pr3_class = 'col-md-12 col-sm-12 col-xs-12 pricing-plan';
				break;
		}
		
		?>
		<div class="pricing-wrap pricing-layout3 clearfix <?php echo esc_attr($css_class); ?>">
		   <?php foreach ($pricing_lists3 as $key => $value) { 
				$pr3_bg_image= (!empty($atts['pr3_bg_image']))?$atts['pr3_bg_image']:'';
				$pr3_bg_img = '';
			    if (!empty($value['pr3_bg_image'])) {
			        $attachment_image = wp_get_attachment_image_src($value['pr3_bg_image'], 'full');
			        $pr3_bg_img = $attachment_image[0];
			    }  

			?> 

			<div class="pricing-item-wrap <?php echo esc_attr($pr3_class); ?> <?php if (!empty($value['pr3_feature'])) { echo esc_html($value['pr3_feature']); } ?>">
				<div class="pricing-item-inner">
					<div class="pricing-head clearfix" style="background-image: url(<?php echo esc_url($pr3_bg_img); ?>)">
						<div class="bg-gradient"></div>
						<div class="pricing-head-wrap">
							<?php if (!empty($value['pr3_package_name'])) {?>
	                        	<h3 class="cms-pricing-title"><?php echo esc_html($value['pr3_package_name']); ?></h3> 
	                        <?php }?>   
	                        <?php if (!empty($value['pr3_price'])){?>  
		                        <div class="pricing-price">   
		                            <span class="cms-pricing-price"><span><?php echo esc_html($value['pr3_currency']); ?></span><?php echo esc_html($value['pr3_price']); ?></span>  
		                            <span class="cms-pricing-time">/ <?php echo esc_html($value['pr3_time']); ?></span>
		                        </div>   
	                        <?php }?>  
	                        <?php if (!empty($value['pr3_subtitle'])) {?> 
	                        	<div class="cms-pricing-subtitle"><?php echo esc_html($value['pr3_subtitle']); ?></div> 
	                        <?php }?> 
	                    </div> 
                    </div>
                    <?php if (!empty($value['pr3_description'])) {?>
	                    <div class="pricing-content content-<?php echo esc_html($value['pr3_content_align']); ?>">
	                        <?php echo wp_kses_post($value['pr3_description']); ?>
	                    </div>
                    <?php }?> 
					<?php if (!empty($value['pr3_button'])) {?>
						<div class="pricing-footer">
		                    <a class="btn btn-secondary" href="<?php echo esc_html($value['pr3_button_url']); ?>"><span><?php echo esc_html($value['pr3_button']); ?></span></a>
		                </div>   
		            <?php }?> 
	            </div>
			</div>
			<?php } ?>
			<!-- End item -->
		</div>
		<?php
		break;
}