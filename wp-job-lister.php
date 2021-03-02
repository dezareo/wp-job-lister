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

   if ( $typenow == 'job' ){
   	wp_enqueue_style( 'dez-admin-css', plugins_url( 'css/admin-jobs.css' , __FILE__ ) );
   }

   if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' && $typenow == 'job' ) {
   		
   		wp_enqueue_script('dez-job-js', plugins_url('js/admin-jobs.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '21022021', true );
   		wp_enqueue_style( 'jquery-style', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', true );
   		wp_enqueue_script( 'dez-custom-quicktags', plugins_url( 'js/dez-quicktags.js', __FILE__ ), array ('quicktags' ), '22022021', true);
   }

   if ( $pagenow == 'edit.php' && $typenow == 'job' ){
   		wp_enqueue_script('reorder-js', plugins_url('js/reorder.js', __FILE__ ), array( 'jquery', 'jquery-ui-sortable' ), '21022021', true );
   }

}
add_action('admin_enqueue_scripts', 'dez_admin_enqueue_scripts');

function dez_add_submenu_page() {

	add_submenu_page(
		'edit.php?post_type=job',
		'Reorder Jobs',
		'Reorder Jobs',
		'manage_options',
		'reorder_jobs',
		'reorder_admin_jobs_callback'
	);
}
add_action('admin_menu', 'dez_add_submenu_page' );