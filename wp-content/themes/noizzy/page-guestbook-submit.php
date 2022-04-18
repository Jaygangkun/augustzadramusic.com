<?php 
/**
* Template Name: Guestbook Submit Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/ 

$edge_sidebar_layout = noizzy_edge_sidebar_layout();

get_header();
noizzy_edge_get_title();
get_template_part( 'slider' );
do_action('noizzy_edge_before_main_content');
?>
<style>
.guestbook_submit_btn {
	display: inline-block;
	cursor: pointer;
}

.guest-book-form-wrap--submit-btn {
	margin-top: 30px;
	text-align: center;
}

#guestbook_submit_btn {
	display: flex;
	align-items: center;
	justify-content: center;
}

#guestbook_submit_btn.loading {
	opacity: 0.8;
}

#guestbook_submit_btn .loader {
    border: 5px solid #f3f3f3;
    border-top: 5px solid #3498db;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    animation: spin 2s linear infinite;
	margin-left: 10px;
	display: none;
}

#guestbook_submit_btn.loading .loader {
	display: block;
}

@keyframes spin {
	0% { transform: rotate(0deg); }
	100% { transform: rotate(360deg); }
}
</style>
<div class="edge-container edge-default-page-template">
	<?php do_action( 'noizzy_edge_after_container_open' ); ?>
	
	<div class="edge-container-inner clearfix">
        <?php do_action( 'noizzy_edge_after_container_inner_open' ); ?>
		<div class="guestbook-submit-form">
			<form id="guestbook_submit_form">
				<div class="guest-book-form-wrap">
					<label>Name</label>
					<input type="text" name="guestbook_name" id="guestbook_name">
				</div>
				<div class="guest-book-form-wrap">
					<label>Place</label>
					<input type="text" name="guestbook_place" id="guestbook_place">
				</div>
				<div class="guest-book-form-wrap">
					<label>Date</label>
					<input type="text" name="guestbook_date" id="guestbook_date">
				</div>
				<div class="guest-book-form-wrap">
					<div id="guestbook_images"></div>
				</div>
				<div class="guest-book-form-wrap guest-book-form-wrap--submit-btn">
					<div class="edge-btn edge-btn-medium edge-btn-solid" id="guestbook_submit_btn">
						<span class="">Submit</span>
						<span class="loader"></span>
					</div>
				</div>
			</form>
		</div>
        <?php do_action( 'noizzy_edge_before_container_inner_close' ); ?>
	</div>
	
	<?php do_action( 'noizzy_edge_before_container_close' ); ?>
</div>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/lib/jquery-ui.css" media="all">
<script src="<?php echo get_template_directory_uri()?>/assets/lib/datepicker.min.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/lib/image-uploader.min.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/lib/image-uploader.min.js"></script>
<script>
jQuery(document).ready(function() {
	jQuery('#guestbook_date').datepicker({
		// "dateFormat": "mm\/dd\/yy",
		// "changeMonth": "true",
		// "changeYear": "true",
		// "yearRange": "2011:2031",
		// "defaultDate": "",
		// "beforeShowDay": null
	});

	jQuery('#guestbook_images').imageUploader({
		label: 'Drag & Drop images or click to browse',
		imagesInputName: 'guestbook_images'
	});

	var guestbook_submitting = false;
	jQuery(document).on('click', '#guestbook_submit_btn', function() {
		if(guestbook_submitting) {
			return;
		}
		var btn_instance = this;
		var guestbook_form_data = new FormData(jQuery('#guestbook_submit_form')[0]);        
		guestbook_form_data.append('action', 'guestbook_submit');

		guestbook_submitting = true;

		jQuery(btn_instance).addClass('disabled');
		jQuery(btn_instance).addClass('loading');

		jQuery.ajax({
			url: "<?php echo admin_url('admin-ajax.php')?>",
			type: 'post',
			enctype: 'multipart/form-data',
			data: guestbook_form_data,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				guestbook_submitting = false;
				jQuery(btn_instance).removeClass('disabled');
				jQuery(btn_instance).removeClass('loading');
			}
		})  
	})
})
</script>
<?php get_footer(); ?>