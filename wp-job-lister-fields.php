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

function dez_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'dez_jobs_nonce' );
	$dez_stored_meta = get_post_meta( $post->ID );
	?>

	<div>
		<div class="meta-row">
			<div class="meta-th">
                <label for="job-id" class="dez-row-title">Job ID</label>
			</div>
			<div class="meta-td">
			<input type="text" name="job_id" id="job-id" value="<?php if ( ! empty ($dez_stored_meta['job_id'] ) ) echo esc_attr( $dez_stored_meta['job_id'] [0] ); ?>" />
			</div>
		</div>
		<div class="meta-row">
			<div class="meta-th">
                <label for="date-listed" class="dez-row-title">Date Listed</label>
			</div>
			<div class="meta-td">
				<input type="text" name="date_listed" id="date-listed" value="<?php if ( ! empty ($dez_stored_meta['date_listed'] ) ) echo esc_attr( $dez_stored_meta['date_listed'] [0] ); ?>" />
			</div>
		</div>
		<div class="meta-row">
			<div class="meta-th">
                <label for="application_deadline" class="dez-row-title">Application Deadline</label>
			</div>
			<div class="meta-td">
				<input type="text" name="application_deadline" id="application-deadline" value="<?php if ( ! empty ($dez_stored_meta['application_deadline'] ) ) echo esc_attr( $dez_stored_meta['application_deadline'] [0] ); ?>" />
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
	<div class="meta-row">
			<div class="meta-th">
                <label for="minimum-requirements" class="dez-row-title">Minimum Requirements</label>
			</div>
			<div class="meta-td">
				<input type="text" name="minimum_requirements" class="dez-textarea" id="minimum-requirements" value="<?php if ( ! empty ($dez_stored_meta['minimum_requirements'] ) ) echo esc_attr( $dez_stored_meta['minimum_requirements'] [0] ); ?>" />
			</div>
	</div>
	<div class="meta-row">
			<div class="meta-th">
                <label for="prefered-requirements" class="dez-row-title">Prefered Requirements</label>
			</div>
			<div class="meta-td">
				<input type="text" name="prefered_requirements" class="dez-textarea" id="prefered-requirements" value="<?php if ( ! empty ($dez_stored_meta['prefered_requirements'] ) ) echo esc_attr( $dez_stored_meta['prefered_requirements'] [0] ); ?>" />
			</div>
	</div>
<?php

}

function dez_meta_save( $post_id ) {
	//Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset ( $_POST[ 'dez_jobs_nonce' ] ) && wp_verify_nonce( $_POST ['dez_jobs_nonce'], basename( __FILE__ ) ) ) ? 'true' : 'false';

	//Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	if ( isset ( $_POST['job_id'] ) ) {
		update_post_meta( $post_id, 'job_id', sanitize_text_field(  $_POST[ 'job_id' ] ) );
	}
	if ( isset ( $_POST['date_listed'] ) ) {
		update_post_meta( $post_id, 'date_listed', sanitize_text_field(  $_POST[ 'date_listed' ] ) );
	}
	if ( isset ( $_POST['application_deadline'] ) ) {
		update_post_meta( $post_id, 'application_deadline', sanitize_text_field(  $_POST[ 'application_deadline' ] ) );
	}
	if ( isset ( $_POST['principle_duties'] ) ) {
		update_post_meta( $post_id, 'principle_duties', sanitize_text_field(  $_POST[ 'principle_duties' ] ) );
	}
	if ( isset ( $_POST['minimum_requirements'] ) ) {
		update_post_meta( $post_id, 'minimum_requirements', sanitize_text_field(  $_POST[ 'minimum_requirements' ] ) );
	}
	if ( isset ( $_POST['prefered_requirements'] ) ) {
		update_post_meta( $post_id, 'prefered_requirements', sanitize_text_field(  $_POST[ 'prefered_requirements' ] ) );
	}
}
add_action( 'save_post', 'dez_meta_save' );