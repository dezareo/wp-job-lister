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

	$singular = 'Job Listing';
	$plural = 'Job Listings';

	$labels = array(
		'name'               => $plural,
		'singular_name'      => $singular,
		'add_name'           => 'Add New',
		'add_new_item'       => 'Add New ' . $singular,
		'edit'               => 'Edit',
		'edit_item'          => 'Edit ' . $singular,
		'new_item'           => 'New ' . $singular,
		'view'               => 'View ' . $singular,
		'view_item'          => 'View ' . $singular,
		'search_term'        => 'Search' . $plural,
		'parent'             => 'Parent ' . $singular,
		'not_found'          => 'No ' . $plural . ' found',
		'not_found_in_trash' => 'No ' . $plural . ' in Trash' 
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicity_quaryable' => true,
		'exclude_from_search' => false,
		'show_in_nav_menus'   => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-hammer',
		'can_export'          => true,
		'delete_with_user'    => false,
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'capability_type'     => 'page',
		'map_meta_cap'        => true,
		'rewrite'             => array(
			'slug'            => 'jobs',
			'with_front'      => true,
			'pages'           => true,
			'feeds'           => false
		),
		'supports' => array(
			'title',
			'editor',
			'author',
			'custom-fields'
		)
	);

	register_post_type( 'job', $args );
}
add_action( 'init', 'dez_register_post_type');