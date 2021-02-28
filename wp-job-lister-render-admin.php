<?php

function reorder_admin_jobs_callback() {
	
	$args = array(
		'post_type' 			=> 'job',
		'orderby' 				=> 'menu_order',
		'order' 				=> 'ASC',
		'post_status'			=> 'publish',
		'no_found_rows' 		=> true,
		'update_post_term_cache' => false,
		'post_per_post' 		=> 50

	);

	$job_listing = new WP_Query( $args );
	
	?>

	<div id="job-sort" class="wrap">
		<div id="icon-job-admin" class="icon32">
			<br>
		</div>
		<h2><?php _e( 'Sort Job Positions', 'wp-job-lister' ); ?>
		<img src="<?php echo esc_url( admin_url() . '/images/loading.gif'); ?>" id="loading-animation" /></h2>
		<?php if ( $job_listing->have_posts() ) : ?>
			<p><?php _e('<strong>Note:</strong> this only affects the jobs listed using the shortcode functions!'); ?></p>
			<ul id="custom-type-list">
				<?php while( $job_listing->have_posts() ) : $job_listing->the_post(); ?>
					<li id="<?php the_id(); ?>"><?php the_title(); ?></li>
				<?php endwhile; ?>
			</ul>
			<?php else: ?>
				<p><?php _e('You have no Jobs to sort.', 'wp-job-lister'); ?></p>
			<?php endif; ?>
	</div>

	<?php

}
