<?php
	/**
	 * Created by PhpStorm.
	 * User: Nic
	 * Date: 5/5/2017
	 * Time: 9:25 PM
	 */
	$atts = array_merge( array(
		'active_section' => 1,
	), $atts );
	global $fullpage_id, $active_section;
	$active_section = $atts['active_section'];
	$fullpage_id         = 0;
?>
<div id="cms-fullpage">

	<?php echo do_shortcode( $content ) ?>

	<div id="fullpage" class="fullpage-content">
		<?php
			global $tabs_data;
			foreach ( $tabs_data as $fullpage_id => $content ) {
				echo ''.$content;
			} ?>
	</div>
</div>