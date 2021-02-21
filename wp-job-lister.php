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
require_once ( plugin_dir_path(__FILE__) . 'wp-job-lister-render-admin.php' );
require_once ( plugin_dir_path(__FILE__) . 'wp-job-lister-fields.php' );

function dez_admin_enqueue_scripts() {
   global $pagenow, $typenow;

   if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' && $typenow == 'job' ) {
   		wp_enqueue_style( 'dez-admin-css', plugins_url( 'css/admin-jobs.css' , __FILE__ ) );
   		wp_enqueue_script('dez-job-js', plugins_url('js/admin-jobs.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), 21022021, true );
   }

}
add_action('admin_enqueue_scripts', 'dez_admin_enqueue_scripts');