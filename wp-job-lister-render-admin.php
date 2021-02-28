<?php

function reorder_admin_jobs_callback() {
	
	$args = array(
		'post_type' 			=> 'job',
		'orderby' 				=> 'menu_order',
		'order' 				=> 'ASC',
		'no_found_rows' 		=> true,
		'update_post_term_cache' => false,
		'post_per_post' 		=> 50
	);

	$job_listing = new WP_Query( $args );
	echo '<pre>';
	var_dump( $job_listing );
	echo '</pre>';

}
