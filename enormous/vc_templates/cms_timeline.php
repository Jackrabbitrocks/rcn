<?php
extract(shortcode_atts(array(       
    'cms_timeline_title' => '',                  
    'cms_timeline_time' => '',                  
    'cms_timeline_des' => '',                                   
    'cms_timeline' => '',                                   
), $atts));

$cms_timelines = array();
$cms_timelines = (array) vc_param_group_parse_atts($cms_timeline);

?>
<div class="cms-timeline">
	<div class="cms-timeline-inner">
		<div class="cms-timeline-content">
			<ul>
	            <?php foreach ($cms_timelines as $key => $value) { ?>
	                <li class="cms-timeline-item clearfix">
						<span class="cms-timeline-year"><?php echo esc_html($value['cms_timeline_time']); ?><i class="entypo-icon entypo-icon-clock"></i></span>
	               		<div class="cms-timeline-content">
		            		<div class="cms-timeline-title"><?php echo esc_html($value['cms_timeline_title']); ?></div>
		                	<div class="cms-timeline-desc">
		                		<?php echo esc_html($value['cms_timeline_des']); ?>
		                	</div>
		                </div>
	                </li>
	            <?php } ?>
	        </ul>    
		</div>
	</div>
</div>


