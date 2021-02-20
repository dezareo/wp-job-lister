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

require_once ( plugin_dir_path(__FILE__) . 'wp-job-lister-cpt.php' );