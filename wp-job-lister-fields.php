<?php 

function dez_add_custom_metabox() {

	add_meta_box(
		'dez_meta',
		'Job Lister',
		'dez_meta_callback',
		'job',
		'normal',
		'high'
	);

}
add_action('add_meta_boxes', 'dez_add_custom_metabox');

