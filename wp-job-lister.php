<?php
/* 
 * Plugin Name: WP Job Lister
 * Plugin URI: https://dezareo.me
 * Description: This plugin help you to add simple job listing section to your WordPress website
 * Author: Dragan Zaric
 * Author URI: https://dezareo.me
 * Version: 1.0.0
 * License: GPLv2
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

function dez_register_post_type() {

	$args = array( 

		'public' 	=> true,
		'label'  	=> 'Job Lister',
		'menu_icon' => 'dashicons-hammer'
	);

	register_post_type( 'job', $args );
}
add_action( 'init', 'dez_register_post_type');