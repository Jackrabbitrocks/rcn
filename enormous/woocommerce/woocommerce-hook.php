<?php
/* custom billing fields */
function wp_barberia_override_checkout_fields( $fields ) {
	$fields['billing']['billing_first_name']['placeholder'] = esc_html__('First name *', 'enormous');
	$fields['billing']['billing_last_name']['placeholder'] = esc_html__('Last name *', 'enormous');
	$fields['billing']['billing_company']['placeholder'] = esc_html__('Company', 'enormous');
	$fields['billing']['billing_email']['placeholder'] = esc_html__('Email address *', 'enormous');
	$fields['billing']['billing_phone']['placeholder'] = esc_html__('Phone number *', 'enormous');
	$fields['billing']['billing_address_1']['placeholder'] = esc_html__('Address *', 'enormous');
	$fields['billing']['billing_postcode']['placeholder'] = esc_html__('Postal code', 'enormous');
	$fields['billing']['billing_city']['placeholder'] = esc_html__('City *', 'enormous');
	
	$fields['shipping']['shipping_first_name']['placeholder'] = esc_html__('First name *', 'enormous');
	$fields['shipping']['shipping_last_name']['placeholder'] = esc_html__('Last name *', 'enormous');
	$fields['shipping']['shipping_company']['placeholder'] = esc_html__('Company', 'enormous');
	$fields['shipping']['shipping_address_1']['placeholder'] = esc_html__('Address *', 'enormous');
	$fields['shipping']['shipping_postcode']['placeholder'] = esc_html__('Postal code', 'enormous');
	$fields['shipping']['shipping_city']['placeholder'] = esc_html__('City *', 'enormous');

	return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'wp_barberia_override_checkout_fields' );