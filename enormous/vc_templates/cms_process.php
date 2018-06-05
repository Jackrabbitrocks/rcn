<?php
extract(shortcode_atts(array(                     
    'process_title1' => '',                           
    'process_description1' => '',             
    'process_title2' => '',                          
    'process_description2' => '',              
    'process_title3' => '',                          
    'process_description3' => '',              
    'process_title4' => '',                                                        
    'process_description4' => '',                           
    'el_class' => 'style-1',                                                       
), $atts));
?>
<div class="cms-process cms-process-default clearfix <?php echo esc_attr($el_class); ?>">
	<ul class="cms-process-list">
		<?php
	        for($i=1;$i<5;$i++){
	            $title = ${"process_title".$i};
	            $description = ${"process_description".$i};
	            $number = $i;
	            if(!empty($title)): ?>
		            <li class="cms-process-item clearfix">
		            	<div class="cms-process-icon">
		            		<div class="cms-process-icon-inner">
			            		<span><?php echo esc_attr($number); ?>.</span>
			            	</div>
			            	<div class="arrow-right"></div>
		            	</div>
		            	<div class="cms-process-content">
		       
		            		<h3 class="cms-process-title"><?php echo esc_attr($title); ?></h3>	
		     
		            		<?php if(!empty($description)) {?>
		            			<div class="cms-process-desc"><?php echo esc_attr($description); ?></div>
		            		<?php } ?>
		            	</div>
		            </li>
		        <?php endif;
	        }
	    ?> 
	</ul>
</div>