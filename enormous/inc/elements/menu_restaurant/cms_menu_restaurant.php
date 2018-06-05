<?php
	$categories_map = array(
		'' => ''
	);
	$categories     = array();
	if ( function_exists( 'fr_get_categories' ) ) {
		$categories = fr_get_categories();
	}
	
	$child = array();
	foreach ( $categories as $slug => $category ) {
		$terms                               = array();
		$categories_map[ $category['name'] ] = $category['slug'];
		$terms_map                           = array();
		if ( ! is_wp_error( $category['terms'] ) ) {
			foreach ( $category['terms'] as $term ) {
				$terms_map[ $term->name ] = $term->slug;
			}
		}
		if ( ! empty( $terms_map ) ) {
			$child[] = array(
				"type"        => "checkbox",
				"heading"     => ( "Select " . $category['name'] . " category" ),
				"param_name"  => $category['slug'],
				"admin_label" => true,
				"value"       => $terms_map,
				"dependency"  => array(
					"element" => "our_menu_categories",
					"value"   => array(
						$category['slug'],
					)
				),
			);
		}
	}
	$price_type = array();
	if ( function_exists( 'fr_get_price_type' ) ) {
		$price_type = fr_get_price_type();
	}
	$price_map = array();
	foreach ( $price_type as $key => $type ) {
		$price_map[ $type['name'] ] = $key;
	}
	
	$params = array(
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( "Select Menu Category Type", "enormous" ),
			'param_name' => 'our_menu_categories',
			'value'      => $categories_map,
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( "Limit Menu", "enormous" ),
			'param_name' => 'limit_menu',
			'value'      => '',
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( "Select Price Type", 'enormous' ),
			'param_name' => 'price_type',
			'value'      => $price_map,
			"dependency" => array(
				"element" => "cms_template",
				"value"   => array(
					"cms_menu_restaurant--layout5.php",
				)
			),
		),
		
		array(
			'type'        => 'cms_template_img',
			'param_name'  => 'cms_template',
			"shortcode"   => "cms_menu_restaurant",
			"heading"     => esc_html__( "Menu Template", "enormous" ),
			"admin_label" => true,
			"group"       => esc_html__( "Template", "enormous" ),
		),
	);
	foreach ( $child as $param ) {
		$params[] = $param;
	}
	vc_map( array(
		"name"     => 'CMS Menu Restaurant',
		"base"     => "cms_menu_restaurant",
		"icon"     => "cs_icon_for_vc",
		"category" => esc_html__( 'CmsSuperheroes Shortcodes', "enormous" ),
		"params"   => $params
	) );
	
	class WPBakeryShortCode_cms_menu_restaurant extends CmsShortCode {
		
		protected function content( $atts, $content = null ) {			
			return parent::content( $atts, $content );
		}
	}

?>