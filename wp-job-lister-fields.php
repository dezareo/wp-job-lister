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

function dez_meta_callback() {
	?>

	<div>
		<div class="meta-row">
			<div class="meta-th">
                <label for="job-id" class="dez-row-title">Job ID</label>
			</div>
			<div class="meta-td">
				<input type="text" name="job-id" id="job-id" value="" />
			</div>
		</div>
	</div>
	<div class="meta">
		<span>Principle Duties</span>
	</div>
	<div class="meta-editor">
	<?php 

		$content = get_post_meta( $post->ID, 'principle_duties', true );
		$editor = 'principle_duties';
		$settings = array(
			'textarea_rows' => 5,
			'media_buttons' => true,
		);

		wp_editor( $content, $editor, $settings, );
	?>
	</div>
<?php

}